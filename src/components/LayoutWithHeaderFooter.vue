<template>
  <div>
    <HeaderView />
    <router-view></router-view>
    <div>
      <button
        @click="scrollToTop"
        class="scroll-button button-biru fixed bottom-10 right-4 py-3 px-3 rounded-full shadow-md"
      >
        <ChevronDoubleUpIcon loading="lazy" alt="scrollup" class="size-6" />
      </button>
      <button
        @click="toggleChat"
        class="chat-button button-biru right-4 py-3 px-3 rounded-full shadow-md"
      >
        <ChatBubbleLeftRightIcon loading="lazy" alt="openchat" class="size-6" />
      </button>
    </div>
    <ChatView class="chat" :is-open="isChatOpen" @close="closeChat" />
    <FooterView />
  </div>
</template>

<script>
import HeaderView from "./NavbarView.vue";
import FooterView from "./FooterView.vue";
import {
  ChevronDoubleUpIcon,
  ChatBubbleLeftRightIcon,
} from "@heroicons/vue/24/solid";
import ChatView from "./ChatView.vue";

export default {
  components: {
    HeaderView,
    FooterView,
    ChevronDoubleUpIcon,
    ChatBubbleLeftRightIcon,
    ChatView,
  },
  data() {
    return {
      isChatOpen: false,
    };
  },
  methods: {
    scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    },
    toggleChat() {
      this.isChatOpen = !this.isChatOpen;
    },
    closeChat() {
      this.isChatOpen = false;
    },
  },
};
</script>

<style>
.chat-button {
  position: fixed; /* Mengambang di posisi tetap di layar */
  bottom: 100px; /* Atur posisi dari bawah */
  right: 20px; /* Atur posisi dari kanan */
  z-index: 25; /* Pastikan tombol chat muncul di atas konten lain */
}

.scroll-button {
  position: fixed; /* Mengambang di posisi tetap di layar */
  bottom: 100px; /* Atur posisi dari bawah */
  right: 20px; /* Atur posisi dari kanan */
  z-index: 25; /* Pastikan tombol chat muncul di atas konten lain */
}

.chat {
  position: fixed; /* Mengambang di posisi tetap di layar */
  bottom: 100px; /* Atur posisi dari bawah */
  right: 10px; /* Atur posisi dari kanan */
  z-index: 1000; /* Pastikan tombol chat muncul di atas konten lain */
}

@media (max-width: 970px) {
  .chat {
    left: 10px;
  }
}
</style>
