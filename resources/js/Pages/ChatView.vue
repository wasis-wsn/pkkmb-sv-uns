<template>
  <LayoutAuthenticated>
    <Head title="Chat" />
      <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-1/4 bg-gray-800 text-white p-4 flex flex-col">
          <div class="flex items-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-teal-400" viewBox="0 0 512 512">
              <!-- SVG content -->
            </svg>
            <h1 class="text-2xl font-semibold ml-4">Customer Support Chat</h1>
          </div>
          <div class="flex-1 overflow-y-auto bg-gray-700 rounded-lg">
            <ul id="chat-list" class="list-none p-0 m-0">
              <li v-for="chat in chats" :key="chat.id" @click="fetchMessages(chat.id)" class="chat-list-item p-2 mb-2 bg-gray-600 rounded-lg cursor-pointer hover:bg-gray-500">
                <span class="chat-list-name text-white">{{ chat.user.nama_mahasiswa || chat.user.username }} ({{ chat.user.email }})</span>
                <div v-if="chat.unseen_messages > 0" class="mt-2 bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                  {{ chat.unseen_messages }}
                </div>
              </li>
            </ul>
          </div>
        </div>
        <!-- Chat Area -->
        <form id="messageForm" @submit.prevent="sendMessage" class="flex-1 bg-gray-100 p-4 flex flex-col">
          <div id="messagesContainer" ref="messagesContainer" class="chat-wrapper flex-1 overflow-y-auto bg-white p-4 rounded-lg shadow-md">
            <!-- Messages will be shown here -->
            <div v-for="message in messages" :key="message.id" class="flex items-start mb-4">
              <!-- Conditional styling for admin messages -->
              <div v-if="message.user_role === 'admin'" class="flex items-start ml-auto">
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

              <!-- Conditional styling for user messages -->
              <div v-else class="flex items-start mr-auto">
                <div class="message-icon">
                  <!-- Ikon user -->
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
          <div class="mt-4 flex items-center">
            <input type="hidden" v-model="chatId">
            <input type="text" v-model="newMessage" class="flex-grow p-2 border border-gray-300 rounded-lg mr-2 text-black" placeholder="Enter your message here">
            <button class="chat-send-btn bg-teal-500 text-white p-2 rounded-lg hover:bg-teal-400" type="submit">Send</button>
          </div>
        </form>
      </div>
  </LayoutAuthenticated>
</template>

<script setup>
import { ref, onMounted, nextTick, watch } from 'vue';
import axios from 'axios';
import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue';
import { Head } from '@inertiajs/vue3';

const chats = ref([]);
const messages = ref([]);
const newMessage = ref('');
const chatId = ref(null);
const messagesContainer = ref(null);

const fetchChats = async () => {
  try {
    const response = await axios.get('/chats');
    chats.value = response.data;
    if (chats.value.length > 0) {
      chatId.value = chats.value[0].id; // Set default chat ID
      await fetchMessages(chatId.value);
    }
  } catch (error) {
    console.error('Error fetching chats:', error);
  }
};

const fetchMessages = async (id) => {
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
  if (!newMessage.value.trim() || !chatId.value) return;

  try {
    await axios.post('/messages', {
      room_id: chatId.value,
      message: newMessage.value,
    });
    newMessage.value = ''; // Clear input field
    await fetchMessages(chatId.value); // Refresh messages
  } catch (error) {
    console.error('Error sending message:', error);
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

// Listen for new messages
const listenForMessages = () => {
  if (window.Echo && chatId.value) {
    window.Echo.channel(`room.${chatId.value}`)
      .listen('MessageSent', (event) => {
        messages.value.push(event.message);
        scrollToBottom();
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
/* Sidebar */
#chat-list {
  height: calc(100vh - 120px); /* Adjust height as needed */
}

/* Chat list items */
.chat-list-item {
  transition: background-color 0.2s;
}

.chat-list-item:hover {
  background-color: #4a5568; /* Adjust hover color */
}

/* Chat area */
#messagesContainer {
  height: calc(100vh - 180px); /* Adjust height as needed */
}

.chat-wrapper {
  display: flex;
  flex-direction: column;
}

/* Message bubbles */
.bg-teal-100 {
  background-color: #e1ffc7;
}

.bg-gray-200 {
  background-color: #f1f0f0;
}

.text-teal-800 {
  color: #1d4ed8;
}

.max-w-xs {
  max-width: 60%;
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
