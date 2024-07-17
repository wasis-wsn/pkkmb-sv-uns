<template>
  <LayoutHeaderFooter>
  <header class="flex gap-5 max-md:flex-col max-md:gap-0">
    <section
      class="flex flex-col flex-1 items-start pb-32 mt-16 ml-2 rounded-full border border-solid border-violet-300 border-opacity-50 max-md:max-w-full"
      data-aos="fade-right">
      <div class="shrink-0 mt-20 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[180px] max-md:mt-10"
        data-aos="fade-right" data-aos-delay="100"></div>
      <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[120px] max-md:mt-10"
        data-aos="fade-right" data-aos-delay="200"></div>
      <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[190px]" data-aos="fade-right"
        data-aos-delay="300"></div>
      <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[150px]" data-aos="fade-right"
        data-aos-delay="400"></div>
      <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[200px]" data-aos="fade-right"
        data-aos-delay="500"></div>
      <div class="self-end mt-1 mb-0 max-md:max-w-full">
        <h1
          class="self-stretch pl-8 mt-5 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-10 max-md:max-w-full"
          data-aos="fade-right" data-aos-delay="600">
          <span class="font-semibold">KELOMPOK</span>
        </h1>
        <h1
          class="self-stretch pl-8 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-0 max-md:max-w-full"
          data-aos="fade-right" data-aos-delay="700">
          <span class="text-5xl text-red-400">PKKMB SV UNS 2024</span>.
        </h1>
      </div>
    </section>
    <section class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full" data-aos="fade-up">
      <img loading="lazy" src="../../../assets/logo_besar.png" alt=""
        class="box-border object-cover overflow-hidden shrink-0 mt-0 w-full aspect-[0.99] min-h-[20px] min-w-[20px]" />
    </section>
  </header>
  <div class="flex flex-col bg-white">
    <div class="flex gap-5 self-end px-5 mt-0 max-md:mt-10">
      <div class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]" data-aos="fade-up"
        data-aos-delay="100"></div>
      <div class="shrink-0 self-end mt-16 bg-red-300 bg-opacity-20 h-[130px] rounded-[100px] w-[5px] max-md:mt-10"
        data-aos="fade-up" data-aos-delay="200"></div>
      <div class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]" data-aos="fade-up"
        data-aos-delay="300"></div>
      <div class="shrink-0 self-end mt-12 bg-red-300 bg-opacity-20 h-[150px] rounded-[100px] w-[5px] max-md:mt-10"
        data-aos="fade-up" data-aos-delay="400"></div>
      <div class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]" data-aos="fade-up"
        data-aos-delay="500"></div>
    </div>
  </div>
  <div class="flex flex-col bg-white">
    <section
      class="flex justify-center items-center px-16 py-10 -mt-1 w-full bg-slate-100 max-md:px-5 max-md:mt-10 max-md:max-w-full">
      <div class="flex flex-col grow shrink-0 self-start px-5 text-center basis-0 w-fit max-md:max-w-full"
        data-aos="fade-down">
        <h2
          class="flex flex-col self-center max-w-full text-3xl font-bold capitalize text-neutral-900 w-[300px] max-md:w-full">
          <span class="max-md:max-w-full">KELOMPOK<br />PKKMB SV UNS 2024</span>
          <div class="shrink-0 mt-2.5 h-1 bg-red-400 max-md:max-w-full"></div>
        </h2>
        <p class="mt-8 z-20 text-2xl text-stone-900 max-md:max-w-full max-md:text-xl text-[18px] md:text-[24px]">
          Hallo Vocazens! Di bawah ini adalah informasi tentang kelompok dan<br> nama-nama mahasiswa di PKKMB SV UNS
          2024.
        </p>

        <KelompokSectionView/>
        <h2
          class="flex flex-col self-center max-w-full text-3xl font-bold capitalize text-neutral-900 w-[350px] max-md:w-full text-center mt-10">
          <span class="max-md:max-w-full">PENGUMPULAN TUGAS <br> PKKMB SV UNS 2024</span>
          <div class="shrink-0 mt-2.5 h-1 bg-red-400 max-md:max-w-full"></div>
        </h2>
        <UploadTugasView/>
      </div>
    </section>
  </div>
</LayoutHeaderFooter>
</template>

<script setup>
  import KelompokSectionView from "../../Components-landing/kelompok-page/KelompokSectionView.vue";
  import UploadTugasView from "../../Components-landing/kelompok-page/UploadTugasView.vue";
  import LayoutHeaderFooter from "../../Layouts/LayoutHeaderFooter.vue";

  import AOS from "aos";
  import "aos/dist/aos.css";
  import {
    onMounted
  } from 'vue';

  onMounted(() => {
    document.title = "PKKMB SV UNS - KELOMPOK";
    AOS.init();
  });
</script>

<style>

</style>
