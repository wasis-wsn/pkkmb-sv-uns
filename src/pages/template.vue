<template>
    <div class="flex flex-col pb-20 bg-white">
      <header class="flex gap-5 max-md:flex-col max-md:gap-0">
        <section class="flex flex-col flex-1 items-start pb-32 mt-16 ml-2 rounded-full border border-solid border-violet-300 border-opacity-50 max-md:max-w-full"          >
            <div class="shrink-0 mt-20 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[180px] max-md:mt-10"></div>
            <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[120px] max-md:mt-10"></div>
            <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[190px]"></div>
            <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[150px]"></div>
            <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[200px]"></div>
            <div class="self-end mt-1 mb-0 max-md:max-w-full">
                <h1 class="self-stretch pl-8 mt-5 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-10 max-md:max-w-full">
                    <span class="font-semibold">Selamat Datang di </span></h1>
                <h1 class="self-stretch pl-8 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-0 max-md:max-w-full">
                    <span class="text-5xl text-red-400">PKKMB SV UNS 2024</span>.
                </h1>
            </div>
        </section>
        <section class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
            <img loading="lazy" src="@/assets/logo_besar.png" alt="" class="box-border object-cover overflow-hidden shrink-0 mt-0 w-full aspect-[0.99] min-h-[20px] min-w-[20px]" />
        </section>
      </header>
      <div class="flex gap-5 self-end px-5 mt-0 max-md:mt-10">
        <div class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"></div>
        <div class="shrink-0 self-end mt-16 bg-red-300 bg-opacity-20 h-[130px] rounded-[100px] w-[5px] max-md:mt-10"></div>
        <div class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"></div>
        <div class="shrink-0 self-end mt-12 bg-red-300 bg-opacity-20 h-[150px] rounded-[100px] w-[5px] max-md:mt-10"></div>
        <div class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"></div>
      </div>
      <section class="flex justify-center items-center px-16 py-20 -mt-1 w-full bg-slate-100 max-md:px-5 max-md:mt-10 max-md:max-w-full">
        <div class="flex flex-col my-5 w-full max-w-[1140px] max-md:max-w-full">
          <div class="flex gap-5 justify-between text-4xl font-bold capitalize text-neutral-900 max-md:flex-wrap max-md:max-w-full">
            <div class="flex flex-col justify-center my-auto">
              <h2>Services <span>we offer</span></h2>
              <div class="shrink-0 mt-2.5 h-1 bg-red-400"></div>
            </div>
            <img loading="lazy" src="@/assets/logo_besar.png" alt="" class="shrink-0 w-48 max-w-full aspect-[0.94]" />
          </div>
          <div class="flex gap-5 justify-between self-center mt-24 text-lg font-extrabold text-center capitalize max-md:flex-wrap max-md:mt-10">
            <button class="button-putih justify-center px-12 py-6 rounded-xl max-md:px-5">
              request quote
            </button>
            <button class="button-biru justify-center px-12 py-6 rounded-xl max-md:px-5">
              join now
            </button>
          </div>
        </div>
      </section>
    </div>
  </template>

<script>
  export default {
    name: 'template',
  };

</script>

<style>
@import '../css/pages/_button.css';
</style>