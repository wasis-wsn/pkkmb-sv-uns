<template>
  <main class="flex flex-col justify-center max-w-full">
    <section v-if="isOpen" class="flex flex-col pb-5 w-full bg-white rounded-xl border border-solid shadow-sm border-black border-opacity-30">
      <!-- Navbar -->
      <div class="flex justify-between items-center px-4 py-2 bg-gray-100 rounded-t-xl">
        <h1 class="text-lg font-bold">Chat dengan admin</h1>
        <button @click="closeChat">
          <XMarkIcon class="h-6 w-6 rounded cursor-pointer text-gray-500 hover:text-gray-700" />
        </button>
      </div>

      <!-- Daftar Pesan -->
      <div class="flex flex-col gap-3 mt-3 px-4 main-container" ref="messagesContainer">
        <div v-for="message in messages" :key="message.id" class="flex items-start mb-4">
          <!-- Conditional styling for user messages -->
          <div v-if="message.user_role === 'user'" class="flex items-start ml-auto">
            <div class="mr-4">
              <p class="font-semibold text-gray-800 text-right">{{ message.sender_name }}</p>
              <p class="text-gray-600 text-right">{{ message.message }}</p>
            </div>
            <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center rounded-full bg-gray-200">
              <!-- User icon -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>
              </svg>
            </div>
          </div>

          <!-- Conditional styling for admin messages -->
          <div v-else class="flex items-start mr-auto">
            <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center rounded-full bg-gray-200">
              <!-- Admin icon -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>
              </svg>
            </div>
            <div class="ml-4">
              <p class="font-semibold text-gray-800 text-left">{{ message.sender_name }}</p>
              <p class="text-gray-600 text-left">{{ message.message }}</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Input untuk pesan -->
      <div class="flex justify-between items-center px-4 py-2 bg-gray-50 rounded-b-xl">
        <input
          v-model="newMessage"
          @keyup.enter="sendMessage"
          type="text"
          placeholder="Ketik pesan Anda..."
          class="flex-grow px-3 py-1.5 rounded-lg bg-stone-300 focus:outline-none focus:ring-2 focus:ring-gray-500"
        />
        <button @click="sendMessage">
          <PaperAirplaneIcon class="h-6 w-6 cursor-pointer text-gray-500 hover:text-gray-700" />
        </button>
      </div>
    </section>
  </main>
</template>


<script setup>
import { ref, watch, onMounted, nextTick } from 'vue';
import axios from 'axios';

import { XMarkIcon, PaperAirplaneIcon } from "@heroicons/vue/24/solid";

// Props
const props = defineProps({
  isOpen: {
    type: Boolean,
    required: true
  }
});

// Define emits
const emit = defineEmits(['close']);

// Methods
const closeChat = () => {
  emit('close'); // Emit event untuk menutup chat
};

const newMessage = ref('');
const messages = ref([]);
const chats = ref([]);
const chatId = ref(null);
const messagesContainer = ref(null);

const fetchChats = async () => {
  try {
    const response = await axios.get('/chats');
    chats.value = response.data;
    if (chats.value.length > 0) {
      chatId.value = chats.value[0].id;
      await fetchMessages(chatId.value);
      await nextTick(); // Wait for DOM update
      scrollToBottom();
    }
  } catch (error) {
    console.error('Error fetching chats:', error);
  }
};

const fetchMessages = async (roomId) => {
  try {
    const response = await axios.get(`/messages/${roomId}`);
    messages.value = response.data;
    await nextTick(); // Wait for DOM update
    scrollToBottom();
 // Scroll to bottom after messages are updated
  } catch (error) {
    console.error('Error fetching messages:', error);
  }
};

const sendMessage = async () => {
  if (!newMessage.value.trim()) return; // Jangan kirim pesan jika pesan kosong

  try {
    // Jika chatId tidak ada, buat room baru di backend
    if (!chatId.value) {
      const response = await axios.post('/rooms', {
      });
      chatId.value = response.data.room_id; // Set chatId ke ID room yang baru dibuat
    }

    // Kirim pesan ke room yang ada
    await axios.post('/messages', {
      room_id: chatId.value,
      message: newMessage.value,
    });
    newMessage.value = '';
    await fetchMessages(chatId.value); // Refresh pesan setelah mengirim
  } catch (error) {
    console.error('Error sending message:', error);
  }
};


const scrollToBottom = () => {
  if (messagesContainer.value) {
    messagesContainer.value.scrollTop = messagesContainer.value.scrollHeight;
  }
};

// Watch for chat open state to fetch messages and scroll to bottom
watch(() => props.isOpen, (newValue) => {
  if (newValue) {
    fetchChats(); // Fetch chats when chat opens
  } else {
    nextTick(() => {
    scrollToBottom();
  });
  }
}, { immediate: true });

onMounted(() => {
  fetchChats();
});
</script>



<style scoped>
/* Container chat utama */
.main-container {
  height: 400px; /* Atur tinggi maksimum container chat */
  overflow-y: auto; /* Aktifkan scroll vertical jika konten lebih dari container */
}

/* Atur lebar maksimum dan responsif untuk main container */
@media (max-width: 970px) {
  .main-container {
    max-width: 100%; /* Maksimalkan lebar container untuk layar kecil */
  }
}
</style>
