<template>
    <header class="flex gap-5 justify-between items-center px-8 py-10 bg-white bg-opacity-0 max-md:flex-wrap max-md:px-5">
      <div class="flex gap-0 self-stretch pr-1.5 font-bold text-center text-black bg-white bg-opacity-0 leading-[150%]">
        <!-- <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/7f01c01ca99cb49b9035f1555dbc675c7f3af4d9d0305f7d12567039d48927e4?apiKey=500874f732b04a0f9d2a6b3345b9b032&" alt="Askara logo" class="shrink-0 aspect-[0.99] w-[89px]" /> -->
        <div class="flex flex-col self-start mt-5">
          <h1 class="text-3xl">A S K A R A</h1>
          <p class="mt-2.5 text-xs">PKKMB SEKOLAH VOKASI 2024</p>
        </div>
      </div>
      <nav class="flex gap-5 self-stretch my-auto text-sm font-medium capitalize whitespace-nowrap text-neutral-900">
        <a href="#" class="grow">HOME</a>
        <a href="#">MATERI</a>
        <a href="#">KELOMPOK</a>
        <a href="#">GALERI</a>
        <a href="#">TENTANG</a>
      </nav>
      <div class="flex gap-5 justify-between self-stretch my-auto text-sm font-extrabold text-center text-white capitalize whitespace-nowrap">
        <!-- <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/3a9699d1fb7b4c21b531de3f12a94cdf9200f53c59db1f21af83c3525bb4e5b4?apiKey=500874f732b04a0f9d2a6b3345b9b032&" alt="User profile icon" class="shrink-0 aspect-square w-[60px]" /> -->
        <button class="justify-center px-10 py-5 my-auto rounded-xl bg-slate-700 max-md:px-5">
          Login
        </button>
      </div>
    </header>
  </template>
  
  <script>
  export default {
    name: 'HeaderView'
    // Komponen header bisa memiliki properti, metode, atau logika lainnya sesuai kebutuhan
  };
  </script>
  
  <style scoped>
  /* Styling untuk header */
  </style>
  