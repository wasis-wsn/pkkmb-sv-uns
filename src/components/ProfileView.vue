<template>
    <header class="flex gap-5 justify-end items-start pt-3.5 pr-3.5 pb-px pl-3 w-full bg-white rounded-3xl">
      <XMarkIcon class="w-6 h-6 cursor-pointer" @click="$emit('close')" />
    </header>
    <div class="flex justify-center items-center mt-4">
      <UserCircleIcon class="w-24 h-24 text-gray-400"/>
    </div>
    <main class="flex flex-col items-center pb-8 w-full text-base bg-white rounded-none">
      <section class="flex flex-col self-start ml-5 text-xl">
        <h1 class="font-bold text-black">Profile</h1>
        <h2 class="mt-9 font-semibold leading-[155%] text-neutral-900">Felicia Lopez</h2>
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
      <hr class="self-stretch mt-5 w-full border border-solid bg-neutral-900 bg-opacity-10 border-neutral-900 border-opacity-10 min-h-[1px]" />
      <nav class="w-full mt-5">
        <ul>
          <li class="flex gap-2.5 justify-between px-5 w-full font-medium text-red-600 leading-[155%] max-w-[375px]">
            <a href="#" class="flex items-center justify-between w-full">
              Change Password
              <ChevronRightIcon class="w-5 h-5"/>
            </a>
          </li>
          <li class="flex gap-2.5 justify-between px-5 mt-5 w-full font-medium text-red-600 leading-[155%] max-w-[375px]">
            <a href="#" class="flex items-center justify-between w-full">
              Log out
              <ChevronRightIcon class="w-5 h-5"/>
            </a>
          </li>
        </ul>
      </nav>
    </main>
</template>

<script>
import { UserCircleIcon, ChevronRightIcon, XMarkIcon } from '@heroicons/vue/24/solid';

export default {
  name: 'ProfileView',
  components: {
    UserCircleIcon,
    ChevronRightIcon,
    XMarkIcon
  }
};
</script>

<style scoped>
/* Style tambahan jika diperlukan */
</style>
