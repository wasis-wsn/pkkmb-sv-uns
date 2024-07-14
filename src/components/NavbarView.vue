<template>
  <nav :class="{ 'shadow-md': isHeaderShadowVisible }" class="sticky top-0 flex gap-5 justify-between items-center px-8 py-1 bg-white bg-opacity-90 z-30">
    <div class="flex items-center gap-2 pr-1.5 font-bold text-center text-black bg-white bg-opacity-0 leading-[150%]">
      <img loading="lazy" src="@/assets/logo.png" alt="Askara logo" class="shrink-0 aspect-[0.99] h-[83px] w-[93px] md:w-[100px]" />
      <div class="flex flex-col">
        <h1 class="text-xl">A S K A R A</h1>
        <p class="mt-1 text-xs">PKKMB SEKOLAH VOKASI 2024</p>
      </div>
    </div>
    <nav class="hidden md:flex gap-5 items-center text-sm font-medium capitalize whitespace-nowrap text-neutral-900 flex flex-grow">
      <router-link to="/" class="nav-link ml-auto">BERANDA</router-link>
      <router-link to="/materi" class="nav-link">MATERI</router-link>
      <router-link to="/kelompok" class="nav-link">KELOMPOK</router-link>
      <router-link to="/galeri" class="nav-link">GALERI</router-link>
      <router-link to="/tentang" class="nav-link">TENTANG</router-link>
      <router-link to="/login" class="button-biru justify-center px-5 py-2.5 md:px-10 md:py-5 rounded-xl text-white hover:shadow-md transition-shadow ml-auto">
        Login
      </router-link>
      <div class="relative ml-3">
        <button @click="toggleProfileDropdown" @mousedown="isClicked = true" @mouseup="isClicked = false" @mouseleave="isClicked = false" :class="['flex items-center p-2 rounded-full shadow-inner transition-all', { 'bg-gray-200': isClicked, 'hover:bg-gray-100': !isClicked }]" >
          <div class="relative">
            <div class="absolute inset-0 rounded-full bg-gray-200 shadow-inner"></div>
            <UserCircleIcon class="relative w-10 h-10 text-black" />
          </div>
        </button>
        <transition name="dropdown">
          <div v-if="isProfileDropdownOpen" class="absolute right-0 mt-2 w-80 bg-white rounded-md shadow-lg py-1 z-20 border">
            <ProfileView @close="toggleProfileDropdown" />
          </div>
        </transition>
      </div>
    </nav>

    <div class="relative md:hidden">
      <button @click="toggleDropdown" class="flex items-center transition-transform duration-300">
        <Bars3BottomRightIcon v-if="!isDropdownOpen" class="w-10 h-10 text-black transition-transform duration-300"/>
        <XMarkIcon v-else class="w-10 h-10 text-black transition-transform duration-300"/>
      </button>
      <transition name="dropdown">
        <SidebarView v-model:isOpen="isDropdownOpen" />
      </transition>
    </div>
  </nav>
</template>

<script>
import { ref } from 'vue';
import { Bars3BottomRightIcon, XMarkIcon, UserCircleIcon } from '@heroicons/vue/24/solid';
import ProfileView from './ProfileView.vue';
import SidebarView from './SidebarView.vue';

export default {
  name: 'NavbarView',
  components: {
    Bars3BottomRightIcon,
    XMarkIcon,
    UserCircleIcon,
    ProfileView,
    SidebarView
  },
  setup() {
    const isDropdownOpen = ref(false);
    const isProfileDropdownOpen = ref(false);
    const isHeaderShadowVisible = ref(false);
    const isClicked = ref(false);

    function toggleDropdown() {
      isDropdownOpen.value = !isDropdownOpen.value;
    }

    function toggleProfileDropdown() {
      isProfileDropdownOpen.value = !isProfileDropdownOpen.value;
    }

    window.addEventListener('scroll', () => {
      isHeaderShadowVisible.value = window.scrollY > 0;
    });

    return {
      isDropdownOpen,
      toggleDropdown,
      isProfileDropdownOpen,
      toggleProfileDropdown,
      isHeaderShadowVisible,
      isClicked
    };
  }
};
</script>

<style scoped>
.dropdown-enter-active, .dropdown-leave-active {
  transition: opacity 0.3s ease;
}
.dropdown-enter, .dropdown-leave-to {
  opacity: 0;
}
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
.nav-link:hover::after,
.router-link-exact-active.nav-link::after {
  width: 100%;
}
@import '../css/pages/_button.css';
</style>
