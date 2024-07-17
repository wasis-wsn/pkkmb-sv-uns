<template>
    <div class="container mx-auto">
      <div class="header text-center mb-8">
        <h1 class="text-2xl font-bold">Chat Mahasiswa</h1>
      </div>
      <div class="chat-messages h-500 overflow-y-auto pb-20">
        <div v-for="(message, index) in messages" :key="index" class="message flex mb-4" :class="message.role === 'admin' ? 'justify-end' : 'justify-start'">
          <div class="avatar flex items-center justify-center rounded-full w-12 h-12 mr-4" :class="message.role === 'admin' ? 'bg-blue-500' : 'bg-pink-500'">
            <UserCircleIcon class="h-10 w-10" />
          </div>
          <div class="content bg-gray-800 text-white p-3 rounded-lg max-w-[70%]">
            <p class="font-semibold">{{ message.name }}</p>
            <p>{{ message.text }}</p>
          </div>
        </div>
      </div>
      <div class="chat-input flex items-center">
        <input type="text" placeholder="Enter your message here" v-model="message" @keydown.enter="sendMessage" class="text-black flex-grow px-3 py-2 rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 border border-gray-300 mr-2">
        <button @click="sendMessage" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out">Send</button>
      </div>
    </div>
  </template>
  
  <script setup>
  import { UserCircleIcon } from "@heroicons/vue/24/solid";
  import { ref } from 'vue';
  
  const messages = ref([
    { name: 'Lord Faiz', text: 'Halo Etmin', role: 'user' },
    { name: 'Admin', text: 'Halo Paduka Samudro Faiz', role: 'admin' },
    { name: 'Lord Faiz', text: 'Saya ingin bertanya tentang kip', role: 'user' },
  ]);
  
  const message = ref('');
  
  const sendMessage = () => {
    if (message.value.trim() === '') return; // Pastikan pesan tidak kosong
    
    // Tambahkan pesan baru ke daftar pesan
    messages.value.push({
      name: 'Admin', // Nama pengirim menjadi "Admin"
      text: message.value,
      role: 'admin'
    });
  
    // Kosongkan input setelah pesan dikirim
    message.value = '';
  };
  </script>
  
  <style>
  /* Tambahkan styling tambahan jika diperlukan */
  </style>
  