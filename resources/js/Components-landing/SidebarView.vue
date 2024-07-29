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
          <dt class="item-label">Name</dt>
          <dd class="item-content">Felicia Lopez</dd>
        </div>
        <div class="flex gap-2.5 justify-between mt-4 max-w-full font-medium leading-[155%] text-neutral-900">
          <dt class="item-label">Group</dt>
          <dd class="item-content">Red Crane</dd>
        </div>
        <div class="flex gap-2.5 justify-between mt-4 max-w-full font-medium leading-[155%] text-neutral-900">
          <dt class="item-label">Study Program</dt>
          <dd class="item-content">D3 Information Technology</dd>
        </div>
      </dl>
    </main>
    <Link href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click="closeDropdown">HOME</Link>
    <Link href="/materi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click="closeDropdown">MATERIALS</Link>
    <Link href="/kelompok" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click="closeDropdown">GROUPS</Link>
    <Link href="/galeri" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click="closeDropdown">GALLERY</Link>
    <Link href="/tentang" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click="closeDropdown">ABOUT</Link>
    <Link href="/login" class="mt-2 block w-full text-left px-4 py-2 text-sm text-white bg-slate-700 hover:bg-slate-600 transition-colors" @click="closeDropdown">
      <a class="flex items-center justify-between w-full">
        Change Password
        <ChevronRightIcon class="w-5 h-5"/>
      </a>
    </Link>
    <Link href="/login" class="mt-1 block w-full text-left px-4 py-2 text-sm text-white bg-slate-700 hover:bg-slate-600 transition-colors rounded-b-md" @click="closeDropdown">
      <a class="flex items-center justify-between w-full">
        Log out
        <ChevronRightIcon class="w-5 h-5"/>
      </a>
    </Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ChevronRightIcon } from '@heroicons/vue/24/solid';

defineProps({
  isOpen: Boolean
});

const closeDropdown = () => {
  emit('update:isOpen', false);
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
};
</script>

<style scoped>
.dropdown-enter-active, .dropdown-leave-active {
  transition: opacity 0.3s ease;
}

.dropdown-enter, .dropdown-leave-to {
  opacity: 0;
}

.item-row {
  padding: 8px 0;
}

.item-label {
  width: 30%;
  max-width: 30%;
  padding-right: 10px;
}

.item-content {
  flex-grow: 1;
  padding-left: 10px;
}
</style>
