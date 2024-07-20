<template>
  <div>
    <!-- BUKU IMPLEMENTASI -->
    <section v-if="firstMateri" class="flex gap-5 self-center mt-[45px] max-md:flex-wrap max-md:mt-10" data-aos="fade-up">
      <div class="flex flex-col grow shrink-0 self-start px-5 text-center basis-0 w-fit max-md:max-w-full">
        <h2 class="flex flex-col self-center max-w-full text-3xl font-bold capitalize text-neutral-900 w-[650px] max-md:w-full">
          <span class="max-md:max-w-full">
            {{ firstMateri.judul_materi }}<br />PKKMB SV UNS 2024
          </span>
          <div class="shrink-0 mt-2.5 h-1 bg-red-400 max-md:max-w-full"></div>
        </h2>
        <p class="mt-8 z-20 text-2xl text-stone-900 max-md:max-w-full max-md:text-xl text-[18px] md:text-[24px]">
          Hallo Vocazens! Materi ini berisi Buku Implementasi Nilai<br />Askara Muda yang digunakan sebagai materi
          dalam kegiatan<br />PKKMB SV UNS 2024.
        </p>
      </div>
    </section>
    <!-- ISI MATERI -->
    <section v-if="firstMateri" class="relative flex justify-center items-center pt-16 pb-32 w-full text-2xl font-bold text-black bg-white">
      <img loading="lazy" src="@assets/Materi/ImplementasiWave.png" alt="Decorative gradient"
        class="absolute top-0 left-0 z-0 w-full h-auto max-w-full max-h-full" />
      <div class="relative z-20 flex justify-center mt-5 md:mt-36 px-8 pt-10 md:pt-20 mb-0 w-full bg-slate-100 max-w-[90%] sm:max-w-[80%] md:max-w-[70%] lg:max-w-[1160px] pb-10 rounded-[60px] md:px-20 md:pb-[100px]">
        <div class="w-full max-md:px-5 top-[50px]">
          <div class="text-[16px] md:text-[20px]" data-aos="fade-up">
            <div v-for="(paragraph, index) in splitParagraphs(firstMateri.isi_materi)" :key="index">
              <p>{{ paragraph }}</p>
            </div>
          </div>
        </div>
      </div>
      <img loading="lazy" src="@assets/Materi/twibbon.png" alt="Decorative gradient"
        class="absolute left-0 right-0 z-10 w-full max-w-full max-h-full bottom-[70px] lg:bottom-[-80px] md:bottom-[20px]" />
    </section>

    <!-- MATERI BERIKUTNYA -->
    <div v-for="item in filteredMateri" :key="item.id">
      <section class="flex gap-5 self-center mt-[100px] max-md:flex-wrap max-sm:flex-wrap max-md:mt-10">
        <div class="flex flex-col grow shrink-0 self-start px-5 text-center basis-0 w-fit max-md:max-w-full">
          <h2 data-aos="fade-up" class="flex flex-col self-center max-w-full text-3xl font-bold capitalize text-neutral-900 w-[300px] max-md:w-full">
            <span class="max-md:max-w-full">
              {{ item.judul_materi }}<br />PKKMB SV UNS 2024
            </span>
            <div class="shrink-0 mt-2.5 h-1 bg-red-400 max-md:max-w-full"></div>
          </h2>
          <p data-aos="fade-up" class="mt-8 z-20 text-2xl text-stone-900 max-md:max-w-full max-md:text-xl text-[18px] md:text-[24px]">
            Hallo Vocazens! Materi yang pertama berisi<br />Tugas Twibbon sebagai tugas dalam kegiatan<br />PKKMB SV UNS 2024
          </p>
        </div>
      </section>
      <!-- ISI MATERI -->
      <section class="relative flex justify-center items-center -mt-[100px] pb-32 w-full text-2xl font-bold text-black bg-white">
        <div class="relative z-20 flex justify-center mt-[150px] md:mt-44 px-8 pt-10 md:pt-20 mb-0 w-full bg-slate-100 max-w-[90%] sm:max-w-[80%] md:max-w-[70%] lg:max-w-[1160px] pb-10 rounded-[60px] md:px-20 md:pb-[100px]">
          <div class="w-full max-md:px-5 top-[50px]">
            <div data-aos="fade-up" class="text-[16px] md:text-[20px]">
              <h3>{{ item.deskripsi_materi }}</h3>
              <div v-for="(paragraph, index) in splitParagraphs(item.isi_materi)" :key="index">
                <p>{{ paragraph }}</p>
              </div>
            </div>
          </div>
        </div>
        <img loading="lazy" src="@assets/Materi/twibbon.png" alt="Decorative gradient" class="absolute left-0 right-0 z-10 w-full max-w-full max-h-full bottom-[70px] lg:bottom-[-100px] md:bottom-[20px]" />
      </section>
    </div>
  </div>
</template>

<script>
import AOS from "aos";
import "aos/dist/aos.css";

import axios from 'axios';

export default {
  data() {
    return {
      firstMateri: null,
      filteredMateri: []
    };
  },
  mounted() {
    this.getMateri();
  },
  methods: {
    async getMateri() {
      try {
        const response = await axios.get('/materi/all');
        console.log('Materi data:', response.data.data); // Debugging line
        if (response.data.data.length > 0) {
          this.firstMateri = response.data.data[0];
          this.filteredMateri = response.data.data.slice(1); // Sisanya
        }
      } catch (error) {
        console.error('Error fetching materi:', error);
      }
    },
    splitParagraphs(text) {
      if (text) {
        return text.split('\n');
      }
      return [];
    }
  }
};
</script>

<style scoped>
/* Gaya Anda di sini */
</style>
