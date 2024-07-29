<template>
  <LayoutAuthenticated>
    <Head title="chat" />
    <CardBox>
    <div class="flex h-screen">
      <!-- Sidebar -->
      <div class="w-1/4 bg-gray-800 text-white p-4">
        <div class="flex items-center mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-teal-400" viewBox="0 0 512 512">
            <!-- SVG content -->
          </svg>
          <h1 class="text-2xl font-semibold ml-4">Customer Support Chat</h1>
        </div>
        <div class="chat-list-wrapper mt-4">
          <ul id="chat-list" class="list-none p-0">
            <li v-for="chat in chats" :key="chat.id" @click="fetchMessages(chat.id)" class="chat-list-item p-2 mb-2 bg-gray-700 rounded-lg cursor-pointer hover:bg-gray-600">
              <span class="chat-list-name text-white">{{ chat.user.name }} ({{ chat.user.email }})</span>
              <div v-if="chat.unseen_messages > 0" class="mt-2 mr-2 bg-red-500 text-white text-xs font-semibold px-2 py-2 rounded-full">
                {{ chat.unseen_messages }}
              </div>
            </li>
          </ul>
          <button id="loading" class="load-more-btn bg-teal-500 text-white p-2 rounded-lg hover:bg-teal-400">
            Load more
          </button>
        </div>
      </div>
      <!-- Chat Area -->
        <form id="messageForm" @submit.prevent="sendMessage" class="flex-1 bg-gray-100 p-4">
          <div class="app-main h-full flex flex-col">
            <div id="messagesContainer" ref="messagesContainer" class="chat-wrapper flex-1 overflow-y-auto bg-white p-4 rounded-lg shadow-md">
              <!-- Messages will be shown here -->
              <div v-for="message in messages" :key="message.id" class="flex items-start space-x-4 mb-4">
                <!-- Conditional styling for user messages -->
                <div v-if="message.user_role === 'admin'" class="flex items-start ml-auto">
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
            <div class="chat-input-wrapper mt-4 flex items-center">
              <input type="hidden" v-model="chatId">
              <input type="text" v-model="newMessage" class="chat-input w-full p-2 border border-gray-300 rounded-lg mr-2" placeholder="Enter your message here">
              <button class="chat-send-btn bg-teal-500 text-white p-2 rounded-lg hover:bg-teal-400" type="submit">Send</button>
            </div>
          </div>
        </form>
    </div>
  </CardBox>
  </LayoutAuthenticated>
</template>

<script setup>
import { ref, onMounted, nextTick } from 'vue';
import axios from 'axios';
import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue';
import CardBox from "@/Components/CardBox.vue";
import { Head } from '@inertiajs/vue3';

const chats = ref([]);
const messages = ref([]);
const newMessage = ref('');
const chatId = ref(null);

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
  const container = document.querySelector('[ref="messagesContainer"]');
  if (container) {
    container.scrollTop = container.scrollHeight;
  }
};

onMounted(() => {
  fetchChats();
});
</script>

<style scoped>
/* Your styles here */
</style>
