<template>
  <LayoutHeaderFooter>
  <header class="flex gap-5 max-md:flex-col max-md:gap-0">
    <section data-aos="fade-right"
      class="flex flex-col flex-1 items-start pb-32 mt-16 ml-2 rounded-full border border-solid border-violet-300 border-opacity-50 max-md:max-w-full">
      <div data-aos="fade-right" data-aos-delay="100"
        class="shrink-0 mt-20 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[180px] max-md:mt-10"></div>
      <div data-aos="fade-right" data-aos-delay="200"
        class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[120px] max-md:mt-10"></div>
      <div data-aos="fade-right" data-aos-delay="300"
        class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[190px]"></div>
      <div data-aos="fade-right" data-aos-delay="400"
        class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[150px]"></div>
      <div data-aos="fade-right" data-aos-delay="500"
        class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[200px]"></div>
      <div class="self-end mt-1 mb-0 max-md:max-w-full">
        <h1 data-aos="fade-right" data-aos-delay="600"
          class="self-stretch pl-8 mt-5 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-10 max-md:max-w-full">
          <span class="font-semibold">MATERI</span></h1>
        <h1 data-aos="fade-right" data-aos-delay="700"
          class="self-stretch pl-8 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-0 max-md:max-w-full">
          <span class="text-5xl text-red-400">PKKMB SV UNS 2024</span>.
        </h1>
      </div>
    </section>
    <section data-aos="fade-up" class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
      <img loading="lazy" src="@assets/logo_besar.png" alt=""
        class="box-border object-cover overflow-hidden shrink-0 mt-0 w-full aspect-[0.99] min-h-[20px] min-w-[20px]" />
    </section>
  </header>
  <div class="flex flex-col bg-white">
    <div class="flex gap-5 self-end px-5 mt-0 max-md:mt-10">
      <div data-aos="fade-up" data-aos-delay="100"
        class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"></div>
      <div data-aos="fade-up" data-aos-delay="200"
        class="shrink-0 self-end mt-16 bg-red-300 bg-opacity-20 h-[130px] rounded-[100px] w-[5px] max-md:mt-10">
      </div>
      <div data-aos="fade-up" data-aos-delay="300"
        class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"></div>
      <div data-aos="fade-up" data-aos-delay="400"
        class="shrink-0 self-end mt-12 bg-red-300 bg-opacity-20 h-[150px] rounded-[100px] w-[5px] max-md:mt-10">
      </div>
      <div data-aos="fade-up" data-aos-delay="500"
        class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"></div>
    </div>
  </div>
  <MateriSectionView />
  <!-- DOWNLOAD -->
  <section class="flex gap-5 self-center  mt-[100px] mb-[150px] max-md:flex-wrap max-sm:flex-wrap max-md:mt-10"
      data-aos="fade-up">
      <div class="flex flex-col grow shrink-0 self-start px-5 text-center basis-0 w-fit max-md:max-w-full">
        <div class="text-center y">
          <p class="text-2xl font-bold mb-4 text-[30px]">Download Materi</p>
          <button
            class="button-biru justify-center items-center font-bold  px-10 pt-1.5 pb-2 text-white whitespace-nowrap rounded-[15px] max-md:px-5">
            <a class="text-[20px]" href="https://drive.google.com/file/d/1Z2uPvLgO2ECDyT9ku2SqoE9-VKtdV2Zc/view" target="_blank">
              Disini!
            </a>
          </button>
        </div>
      </div>
    </section>
  </LayoutHeaderFooter>
</template>

<script setup>
  import "aos/dist/aos.css";
  import MateriSectionView from "@/Components-landing/materi-page/MateriSectionView.vue";
  import LayoutHeaderFooter from "@/Layouts/LayoutHeaderFooter.vue";

</script>

<!-- <style scoped>
  @import '../css/pages/materiview.css';
  @import '../css/pages/_button.css';
</style> -->
