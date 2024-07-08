<template>
  <nav :class="{ 'shadow-md': isHeaderShadowVisible }" class="sticky top-0 flex gap-5 justify-between items-center px-8 py-4 bg-white bg-opacity-90 z-10">
    <div class="flex items-center gap-2 pr-1.5 font-bold text-center text-black bg-white bg-opacity-0 leading-[150%]">
      <img loading="lazy" src="@/assets/logo.png" alt="Askara logo" class="shrink-0 aspect-[0.99] w-[60px] md:w-[89px]" />
      <div class="flex flex-col">
        <h1 class="text-xl">A S K A R A</h1>
        <p class="mt-1 text-xs">PKKMB SEKOLAH VOKASI 2024</p>
      </div>
    </div>
    <nav class="hidden md:flex gap-5 items-center text-sm font-medium capitalize whitespace-nowrap text-neutral-900 flex flex-grow">
      <router-link to="/" class="nav-link ml-auto">HOME</router-link>
      <router-link to="/materi" class="nav-link">MATERI</router-link>
      <router-link to="/kelompok" class="nav-link">KELOMPOK</router-link>
      <router-link to="/galeri" class="nav-link">GALERI</router-link>
      <router-link to="/tentang" class="nav-link">TENTANG</router-link>
      <button class="login-button justify-center px-5 py-2.5 md:px-10 md:py-5 rounded-xl text-white hover:shadow-md transition-shadow ml-auto">
        Login
      </button>
    </nav>

    <div class="relative md:hidden">
      <button @click="toggleDropdown" class="flex items-center transition-transform duration-300">
        <Bars3BottomRightIcon v-if="!isDropdownOpen" class="w-10 h-10 text-black transition-transform duration-300"/>
        <XMarkIcon v-else class="w-10 h-10 text-black transition-transform duration-300"/>
      </button>
      <transition name="dropdown">
        <div v-if="isDropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
          <router-link to="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">HOME</router-link>
          <router-link to="/materi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">MATERI</router-link>
          <router-link to="/kelompok" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">KELOMPOK</router-link>
          <router-link to="/galeri" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">GALERI</router-link>
          <router-link to="/tentang" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">TENTANG</router-link>
          <button class="block w-full text-left px-4 py-2 text-sm text-white bg-slate-700 hover:bg-slate-600 transition-colors rounded-b-md">
            Login
          </button>
        </div>
      </transition>
    </div>
  </nav>
</template>

<script>
import { ref } from 'vue';
import {  Bars3BottomRightIcon, XMarkIcon } from '@heroicons/vue/24/solid';

export default {
  name: 'HeaderView',
  components: {
    Bars3BottomRightIcon,
    XMarkIcon
  },
  setup() {
    const isDropdownOpen = ref(false);
    const isHeaderShadowVisible = ref(false);

    function toggleDropdown() {
      isDropdownOpen.value = !isDropdownOpen.value;
    }

    // Tambahkan event listener untuk mendeteksi scroll
    window.addEventListener('scroll', () => {
      isHeaderShadowVisible.value = window.scrollY > 0;
    });

    return {
      isDropdownOpen,
      toggleDropdown,
      isHeaderShadowVisible
    };
  }
};
</script>

<style scoped>
/* Styling untuk animasi dropdown */
.dropdown-enter-active, .dropdown-leave-active {
  transition: opacity 0.3s ease;
}
.dropdown-enter, .dropdown-leave-to {
  opacity: 0;
}

/* Styling untuk memastikan tampilan konsisten pada mobile */
@media (max-width: 768px) {
  .header-title {
    font-size: 1.25rem;
  }
  .header-subtitle {
    margin-top: 0.25rem;
  }
}

/* Styling untuk efek hover */
.nav-link {
  position: relative;
  color: #333;
  text-decoration: none;
  transition: color 0.3s ease;
}

.nav-link::after {
  content: '';
  display: block;
  width: 0;
  height: 2px;
  background-color: black;
  position: absolute;
  bottom: -1px;
  left: 0;
  transition: width 0.3s ease;
}

.nav-link:hover::after {
  width: 100%;
}

/* Styling for login button */
.login-button {
  background-color: #2C2D5B;
  color: white;
  padding: 20px 40px;
  font-size: 14px;
}

.login-button:hover {
  background-color: #24244a;
}
</style>
