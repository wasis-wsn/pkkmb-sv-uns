<template>
  <main class="flex flex-col justify-center max-w-[574px]">
    <section v-if="isOpen" class="flex flex-col pb-5 w-full bg-white rounded-xl border border-solid shadow-sm border-black border-opacity-30 max-md:max-w-full">
      <!-- Navbar -->
      <div class="flex justify-between items-center px-4 py-2 bg-gray-100 rounded-t-xl">
        <h1 class="text-lg font-bold">Chat dengan admin</h1>
        <button @click="closeChat">
          <XMarkIcon class="h-6 w-6 rounded cursor-pointer text-gray-500 hover:text-gray-700" />
        </button>
      </div>

      <!-- Daftar Pesan -->
      <div class="flex flex-col gap-3 mt-3 px-4 main-container">
        <div v-for="(message, index) in messages" :key="index" :class="message.sender === 'admin' ? 'items-start text-left' : 'items-end text-right'">
          <template v-if="message.type === 'text'">
            <div v-if="message.sender === 'admin'" class="flex">
              <UserCircleIcon class="h-6 w-6 text-blue-500 mr-2" />
              <div class="bg-blue-100 rounded-lg p-2 max-w-[80%]">
                <p class="text-sm text-gray-700">{{ message.text }}</p>
                <span class="text-xs text-gray-500">{{ message.time }}</span>
              </div>
            </div>
            <div v-else class="flex justify-end">
              <div class="bg-blue-100 rounded-lg p-2 max-w-[80%]">
                <p class="text-sm text-gray-700">{{ message.text }}</p>
                <span class="text-xs text-gray-500">{{ message.time }}</span>
              </div>
              <UserCircleIcon class="h-6 w-6 text-red-500 ml-2" />
            </div>
          </template>
          <template v-else-if="message.type === 'image'">
            <div v-if="message.sender === 'admin'" class="flex">
              <UserCircleIcon class="h-6 w-6 text-blue-500 mr-2" />
              <div class="bg-blue-100 rounded-lg p-2 max-w-[80%]">
                <img :src="message.text" alt="Image" class="max-w-full h-auto rounded-lg"/>
                <span class="text-xs text-gray-500">{{ message.time }}</span>
              </div>
            </div>
            <div v-else class="flex justify-end">
              <div class="bg-blue-100 rounded-lg p-2 max-w-[80%]">
                <img :src="message.text" alt="Image" class="max-w-full h-auto rounded-lg"/>
                <span class="text-xs text-gray-500">{{ message.time }}</span>
              </div>
              <UserCircleIcon class="h-6 w-6 text-red-500 ml-2" />
            </div>
          </template>
        </div>
      </div>

      <!-- Input untuk pesan -->
      <div class="flex justify-between items-center px-4 py-2 bg-gray-50 rounded-b-xl">
        <input
          v-model="newMessage.text"
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
import { ref, defineEmits } from 'vue';
import { XMarkIcon, PaperAirplaneIcon, UserCircleIcon } from "@heroicons/vue/24/solid";

// Props
const props = defineProps({
  isOpen: {
    type: Boolean,
    required: true
  }
});

// Reactive state
const messages = ref([
  { type: 'text', text: 'Halo, ada yang bisa saya bantu?', time: '09:00', sender: 'admin' },
  { type: 'text', text: 'Ya, apakah saya bisa bertanya tentang UKT.', time: '09:05', sender: 'user' },
  { type: 'text', text: 'Malas.', time: '09:10', sender: 'admin' },
  { type: 'image', text: 'Malas.', time: '09:10', sender: 'admin' }
]);

const newMessage = ref({
  text: '',
  type: 'text'
});

// Define emits
const emit = defineEmits(['close']);
// Methods
const closeChat = () => {
  emit('close'); // Emit event untuk menutup chat
};

const sendMessage = () => {
  if (newMessage.value.text.trim() === '') return;
  // Simpan pesan sementara untuk ditampilkan
  const message = {
    ...newMessage.value,
    time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }),
    sender: 'user' // Menandai pengirim sebagai user
  };
  messages.value.push(message);
  newMessage.value.text = ''; // Bersihkan input setelah mengirim pesan

  // Simulasi balasan dari admin setelah beberapa detik
  setTimeout(() => {
    messages.value.push({
      type: 'text',
      text: 'Terima kasih atas pertanyaannya!',
      time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }),
      sender: 'admin'
    });
  }, 1500);
};
</script>

<style scoped>
.main-container {
  height: 400px; /* Atur tinggi maksimum container chat */
  overflow-y: auto; /* Aktifkan scroll vertical jika konten lebih dari container */
}
</style>
