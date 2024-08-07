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
  <div v-for="message in messages" :key="message.id" class="flex items-start">
<!-- Pesan pengguna -->
<div v-if="message.user_role === 'user'" class="flex items-start ml-auto message-container">
  <div class="user-message">
    <p class="font-semibold text-gray-800">{{ message.sender_name }}</p>
    <p class="text-gray-600">{{ message.message }}</p>
  </div>
  <div class="message-icon">
    <!-- Ikon pengguna -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
      <circle cx="12" cy="7" r="4"></circle>
    </svg>
  </div>
</div>

<!-- Pesan admin -->
<div v-if="message.user_role === 'admin'" class="flex items-start mr-auto message-container">
  <div class="message-icon">
    <!-- Ikon admin -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
      <circle cx="12" cy="7" r="4"></circle>
    </svg>
  </div>
  <div class="admin-message">
    <p class="font-semibold text-gray-800">{{ message.sender_name }}</p>
    <p class="text-gray-600">{{ message.message }}</p>
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
        <button @click="sendMessage" :disabled="isSending">
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
const isSending = ref(false);

const fetchChats = async () => {
  try {
    const response = await axios.get('/chats');
    chats.value = response.data;
    if (chats.value.length > 0) {
      chatId.value = chats.value[0].id; // Set default chat ID
    }
  } catch (error) {
    console.error('Error fetching chats:', error);
  }
};

const fetchMessages = async (id) => {
  console.log('Fetching messages for chat ID:', id); // Debugging line
  chatId.value = id; // Set selected chat ID
  try {
    const response = await axios.get(`/messages/${id}`);
    messages.value = response.data;
    await nextTick(); // Wait for DOM update
    scrollToBottom();
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
    isSending.value = true;
    // Kirim pesan ke room yang ada
    await axios.post('/messages', {
      room_id: chatId.value,
      message: newMessage.value,
    });
    newMessage.value = '';
    await fetchMessages(chatId.value); // Refresh pesan setelah mengirim
  } catch (error) {
    console.error('Error sending message:', error);
  } finally {
    isSending.value = false; // Re-enable sending
  }
};


const scrollToBottom = () => {
  nextTick(() => {
    const container = messagesContainer.value; // Use ref here
    if (container) {
      container.scrollTop = container.scrollHeight;
    }
  });
};

// Watch for chat open state to fetch messages and scroll to bottom
watch(() => props.isOpen, (newValue) => {
  fetchMessages(chatId.value);
}, { immediate: true });

// Listen for new messages
const listenForMessages = () => {
  if (window.Echo && chatId.value) {
    window.Echo.channel(`room.${chatId.value}`)
      .listen('MessageSent', (event) => {
        messages.value.push(event.message);
      });
  } else {
    console.error('Echo or chatId is not defined.');
  }
};

onMounted(() => {
  fetchChats();
  if (chatId.value) {
    listenForMessages();
  }
});

watch(() => chatId.value, (newChatId) => {
  if (newChatId) {
    listenForMessages();
  }
});
</script>



<style scoped>
section {
  max-width: 300px; /* Lebar maksimum untuk section chat */
  width: 100%; /* Lebar section mengikuti lebar kontainer parent */
  margin: 0 auto; /* Tengah-kan section pada halaman */
  box-sizing: border-box; /* Sertakan padding dalam perhitungan lebar */
}

/* Container chat utama */
.main-container {
  height: 400px; /* Atur tinggi maksimum container chat */
  overflow-y: auto; /* Aktifkan scroll vertical jika konten lebih dari container */
  padding: 10px; /* Tambahkan padding jika diperlukan */
}

/* Gaya untuk pesan pengguna */
.user-message {
  max-width: 70%; /* Lebar maksimum bubble chat pengguna */
  word-wrap: break-word; /* Membungkus kata yang terlalu panjang */
  background-color: #e1ffc7; /* Warna latar belakang untuk pesan pengguna */
  border-radius: 8px; /* Sudut melengkung pada pesan pengguna */
  padding: 8px; /* Jarak dalam pesan pengguna */
  margin-left: auto; /* Mengatur pesan pengguna ke sebelah kanan */
  text-align: right; /* Teks rata kanan untuk pesan pengguna */
  overflow-wrap: break-word; /* Membungkus teks yang terlalu panjang */
  white-space: pre-wrap; /* Membungkus teks dengan spasi dan baris baru */
}

/* Gaya untuk pesan admin */
.admin-message {
  max-width: 70%; /* Lebar maksimum bubble chat admin */
  word-wrap: break-word; /* Membungkus kata yang terlalu panjang */
  background-color: #f1f0f0; /* Warna latar belakang untuk pesan admin */
  border-radius: 8px; /* Sudut melengkung pada pesan admin */
  padding: 8px; /* Jarak dalam pesan admin */
  margin-right: auto; /* Mengatur pesan admin ke sebelah kiri */
  text-align: left; /* Teks rata kiri untuk pesan admin */
  overflow-wrap: break-word; /* Membungkus teks yang terlalu panjang */
  white-space: pre-wrap; /* Membungkus teks dengan spasi dan baris baru */
}

/* Gaya untuk wadah pesan */
.message-container {
  display: flex;
  align-items: flex-start;
  margin-bottom: 0.5rem; /* Jarak antara pesan */
}

/* Ikon pesan */
.message-icon {
  width: 36px; /* Ukuran ikon */
  height: 36px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  background-color: #d1d1d1;
  margin: 0 0.5rem; /* Jarak antara ikon dan pesan */
}

</style>
