<template>
  <div v-if="isOpen" class="absolute right-0 mt-2 w-80 bg-white rounded-md shadow-lg py-1 z-30 border">
    <main class="flex flex-col items-center pb-8 w-full text-base bg-white rounded-none">
      <section class="flex flex-col self-start ml-5 text-xl">
        <h1 class="font-bold text-black">Profile</h1>
        <h2 class="mt-2 font-semibold leading-[155%] text-neutral-900">Felicia Lopez</h2>
        <p class="mt-2 text-xs leading-4 text-neutral-500">@felicialopesz</p>
      </section>
      <dl class="w-full mt-12 px-5">
        <div class="flex gap-2.5 justify-between max-w-full font-medium leading-[155%] text-neutral-900">
          <dt>Nama</dt>
          <dd>Felicia Lopez</dd>
        </div>
        <div class="flex gap-2.5 justify-between mt-4 max-w-full font-medium leading-[155%] text-neutral-900">
          <dt>Kelompok</dt>
          <dd>Bangau Merah</dd>
        </div>
        <div class="flex gap-2.5 justify-between mt-4 max-w-full font-medium leading-[155%] text-neutral-900">
          <dt>Program Studi</dt>
          <dd>D3 Teknik Informatika</dd>
        </div>
      </dl>
    </main>
    <router-link to="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click="closeDropdown">BERANDA</router-link>
    <router-link to="/materi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click="closeDropdown">MATERI</router-link>
    <router-link to="/kelompok" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click="closeDropdown">KELOMPOK</router-link>
    <router-link to="/galeri" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click="closeDropdown">GALERI</router-link>
    <router-link to="/tentang" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click="closeDropdown">TENTANG</router-link>
    <router-link to="/login" class="mt-2 block w-full text-left px-4 py-2 text-sm text-white bg-slate-700 hover:bg-slate-600 transition-colors" @click="closeDropdown">
      <a class="flex items-center justify-between w-full">
        Change Password
        <ChevronRightIcon class="w-5 h-5"/>
      </a>
    </router-link>
    <router-link to="/login" class="mt-1 block w-full text-left px-4 py-2 text-sm text-white bg-slate-700 hover:bg-slate-600 transition-colors rounded-b-md" @click="closeDropdown">
      <a class="flex items-center justify-between w-full">
        Log out
        <ChevronRightIcon class="w-5 h-5"/>
      </a>
    </router-link>
  </div>
</template>

<script>
import { ChevronRightIcon } from '@heroicons/vue/24/solid';

export default {
  name: 'DropdownView',
  components: {
    ChevronRightIcon
  },
  props: {
    isOpen: Boolean
  },
  methods: {
    closeDropdown() {
      this.$emit('update:isOpen', false);
    }
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
</style>
