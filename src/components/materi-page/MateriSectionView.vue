<template>
  <main>
    <!-- BUKU IMPLEMENTASI -->
    <section class="flex gap-5 self-center  mt-[45px] max-md:flex-wrap max-md:mt-10 " data-aos="fade-up">
      <div class="flex flex-col grow shrink-0 self-start px-5 text-center basis-0 w-fit max-md:max-w-full">
        <h2
          class="flex flex-col self-center max-w-full text-3xl font-bold capitalize text-neutral-900 w-[650px] max-md:w-full">
          <span class="max-md:max-w-full">
            {{ materi[0].judul }}<br />PKKMB SV UNS 2024
          </span>
          <div class="shrink-0 mt-2.5 h-1 bg-red-400 max-md:max-w-full"></div>
        </h2>
        <p class="mt-8 z-20 text-2xl text-stone-900 max-md:max-w-full max-md:text-xl text-[18px] md:text-[24px]">
          Hallo Vocazens! Materi ini berisi Buku Implementasi Nilai<br />Askara Muda yang digunakan sebagai materi
          dalam
          kegiatan
          <br />PKKMB SV UNS 2024.
        </p>
      </div>
    </section>
    <!-- ISI MATERI -->
    <section
      class="relative flex justify-center items-center pt-16 pb-32 w-full text-2xl font-bold text-black bg-white">
      <img loading="lazy" src="@/assets/Materi/ImplementasiWave.png" alt="Decorative gradient"
        class="absolute top-0 left-0 z-0 w-full h-auto max-w-full max-h-full" />
      <div
        class="relative z-20 flex justify-center mt-5 md:mt-36 px-8 pt-10 md:pt-20 mb-0 w-full bg-slate-100 max-w-[90%] sm:max-w-[80%] md:max-w-[70%] lg:max-w-[1160px] pb-10 rounded-[60px] md:px-20 md:pb-[100px]">
        <div class="w-full max-md:px-5 top-[50px]">
          <ul class=" text-[16px] md:text-[20px] " data-aos="fade-up">
            <!-- <li v-for="(guideline, index) in guidelines" :key="index">{{ guideline }}</li> -->
            <li v-if="materi.length > 0">
              <h3>{{ materi[0].materi }}</h3>
              <ul class="list-disc list-inside">
                <li v-for="(isi, index) in materi[0].isi" :key="index">{{ isi }}</li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <img loading="lazy" src="@/assets/Materi/twibbon.png" alt="Decorative gradient"
        class="absolute left-0 right-0 z-10 w-full max-w-full max-h-full bottom-[70px] lg:bottom-[-80px] md:bottom-[20px]" />
    </section>
    <!-- MATERI PERTAMA -->
    <section class="flex gap-5 self-center  mt-[200px] max-md:flex-wrap max-sm:flex-wrap max-md:mt-10">
      <div class="flex flex-col grow shrink-0 self-start px-5 text-center basis-0 w-fit max-md:max-w-full">
        <h2 data-aos="fade-up"
          class="flex flex-col self-center max-w-full text-3xl font-bold capitalize text-neutral-900 w-[300px] max-md:w-full">
          <span class="max-md:max-w-full">
            {{ materi[1].judul }}<br />PKKMB SV UNS 2024
          </span>
          <div class="shrink-0 mt-2.5 h-1 bg-red-400 max-md:max-w-full"></div>
        </h2>
        <p data-aos="fade-up"
          class="mt-8 z-20 text-2xl text-stone-900 max-md:max-w-full max-md:text-xl text-[18px] md:text-[24px] ">
          Hallo Vocazens! Materi yang pertama berisi<br />Tugas Twibbon sebagai tugas dalam kegiatan<br />PKKMB SV UNS
          2024
        </p>
      </div>
    </section>
    <!-- ISI MATERI -->
    <section
      class="relative flex justify-center items-center -mt-[100px] pb-32 w-full text-2xl font-bold text-black bg-white">
      <div
        class="relative z-20 flex justify-center mt-[150px] md:mt-44 px-8 pt-10 md:pt-20 mb-0 w-full bg-slate-100 max-w-[90%] sm:max-w-[80%] md:max-w-[70%] lg:max-w-[1160px] pb-10 rounded-[60px] md:px-20 md:pb-[100px]">
        <div class="w-full max-md:px-5 top-[50px]">
          <ul data-aos="fade-up" class=" text-[16px] md:text-[20px]">
            <!-- <li v-for="(guideline, index) in guidelines" :key="index">{{ guideline }}</li> -->
            <li v-if="materi.length > 0">
              <h3>{{ materi[1].materi }}</h3>
              <ul class="list-disc list-inside">
                <li v-for="(isi, index) in materi[1].isi" :key="index">{{ isi }}</li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <img loading="lazy" src="@/assets/Materi/Co-Card.png" alt="Decorative gradient"
        class="absolute left-0 right-0 z-10 w-full max-w-full max-h-full bottom-[50px] lg:bottom-[-180px] md:bottom-[20px]" />
    </section>
    <!-- MATERI KEDUA -->
    <section class="flex gap-5 self-center  mt-[200px] max-md:flex-wrap max-sm:flex-wrap max-md:mt-10">
      <div class="flex flex-col grow shrink-0 self-start px-5 text-center basis-0 w-fit max-md:max-w-full">
        <h2 data-aos="fade-up"
          class="flex flex-col self-center max-w-full text-3xl font-bold capitalize text-neutral-900 w-[300px] max-md:w-full">
          <span class="max-md:max-w-full">
            {{ materi[2].judul }}<br />PKKMB SV UNS 2024
          </span>
          <div class="shrink-0 mt-2.5 h-1 bg-red-400 max-md:max-w-full"></div>
        </h2>
        <p data-aos="fade-up"
          class="mt-8 z-20 text-2xl text-stone-900 max-md:max-w-full max-md:text-xl text-[18px]  md:text-[24px] ">
          Hallo Vocazens! Materi yang kedua berisi<br />Tugas Co-Card sebagai tugas dalam kegiatan<br />PKKMB SV UNS
          2024
        </p>
      </div>
    </section>
    <!-- ISI MATERI -->
    <section
      class="relative flex justify-center items-center -mt-[100px] pb-32 w-full text-2xl font-bold text-black bg-white">
      <div
        class="relative z-20 flex justify-center mt-[150px] md:mt-44 px-8 pt-10 md:pt-20 mb-0 w-full bg-slate-100 max-w-[90%] sm:max-w-[80%] md:max-w-[70%] lg:max-w-[1160px] pb-10 rounded-[60px] md:px-20 md:pb-[100px]">
        <div class="w-full max-md:px-5 top-[50px]">
          <ul data-aos="fade-up" class=" text-[16px] md:text-[20px]">
            <!-- <li v-for="(guideline, index) in guidelines" :key="index">{{ guideline }}</li> -->
            <li v-if="materi.length > 0">
              <h3>{{ materi[2].materi }}</h3>
              <ul class="list-disc list-inside">
                <li v-for="(isi, index) in materi[2].isi" :key="index">{{ isi }}</li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <img loading="lazy" src="@/assets/Materi/banggaVokasi.png" alt="Decorative gradient"
        class="absolute left-0 right-0 z-10 w-full max-w-full max-h-full bottom-[5px] lg:bottom-[-320px] md:bottom-[20px]" />
    </section>
    <!-- MATERI KETIGA -->
    <section class="flex gap-5 self-center  mt-[200px] max-md:flex-wrap max-sm:flex-wrap max-md:mt-10">
      <div class="flex flex-col grow shrink-0 self-start px-5 text-center basis-0 w-fit max-md:max-w-full">
        <h2 data-aos="fade-up"
          class="flex flex-col self-center max-w-full text-3xl font-bold capitalize text-neutral-900 w-[300px] max-md:w-full">
          <span class="max-md:max-w-full">
            {{ materi[3].judul }}<br />PKKMB SV UNS 2024
          </span>
          <div class="shrink-0 mt-2.5 h-1 bg-red-400 max-md:max-w-full"></div>
        </h2>
        <p data-aos="fade-up"
          class="mt-8 z-20 text-2xl text-stone-900 max-md:max-w-full max-md:text-xl text-[18px] md:text-[24px] ">
          Hallo Vocazens! Materi yang ketiga berisi<br />Tugas Vidio Bangga Vokasi sebagai tugas dalam
          kegiatan<br />PKKMB SV UNS 2024
        </p>
      </div>
    </section>
    <!-- ISI MATERI -->
    <section
      class="relative flex justify-center items-center -mt-[100px] pb-32 w-full text-2xl font-bold text-black bg-white">
      <div
        class="relative z-20 flex justify-center mt-[150px] md:mt-44 px-8 pt-10 md:pt-20 mb-0 w-full bg-slate-100 max-w-[90%] sm:max-w-[80%] md:max-w-[70%] lg:max-w-[1160px] pb-10 rounded-[60px] md:px-20 md:pb-[100px]">
        <div class="w-full max-md:px-5 top-[50px]">
          <ul data-aos="fade-up" class=" text-[16px] md:text-[20px]">
            <!-- <li v-for="(guideline, index) in guidelines" :key="index">{{ guideline }}</li> -->
            <li v-if="materi.length > 0">
              <h3>{{ materi[3].materi }}</h3>
              <ul class="list-disc list-inside">
                <li v-for="(isi, index) in materi[3].isi" :key="index">{{ isi }}</li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <img loading="lazy" src="@/assets/Materi/ringkasan.png" alt="Decorative gradient"
        class="absolute left-0 right-0 z-10 w-full max-w-full max-h-full bottom-[5px] lg:bottom-[-240px] md:bottom-[20px]" />
    </section>
    <!-- MATERI KEEMPAT -->
    <section class="flex gap-5 self-center  mt-[200px] max-md:flex-wrap max-sm:flex-wrap max-md:mt-10">
      <div class="flex flex-col grow shrink-0 self-start px-5 text-center basis-0 w-fit max-md:max-w-full">
        <h2 data-aos="fade-up"
          class="flex flex-col self-center max-w-full text-3xl font-bold capitalize text-neutral-900 w-[300px] max-md:w-full">
          <span class="max-md:max-w-full">
            {{ materi[4].judul }}<br />PKKMB SV UNS 2024
          </span>
          <div class="shrink-0 mt-2.5 h-1 bg-red-400 max-md:max-w-full"></div>
        </h2>
        <p data-aos="fade-up"
          class="mt-8 z-20 text-2xl text-stone-900 max-md:max-w-full max-md:text-xl text-[18px] md:text-[24px] ">
          Hallo Vocazens! Materi yang keempat berisi<br />Tugas merangkum pembicara dalam
          kegiatan<br />PKKMB SV UNS 2024
        </p>
      </div>
    </section>
    <!-- ISI MATERI -->
    <section
      class="relative flex justify-center items-center -mt-[100px] pb-32 w-full text-2xl font-bold text-black bg-white">
      <div
        class="relative z-20 flex justify-center mt-[150px] md:mt-44 px-8 pt-10 md:pt-20 mb-0 w-full bg-slate-100 max-w-[90%] sm:max-w-[80%] md:max-w-[70%] lg:max-w-[1160px] pb-10 rounded-[60px] md:px-20 md:pb-[100px]">
        <div class="w-full max-md:px-5 top-[50px]">
          <ul data-aos="fade-up" class=" text-[16px] md:text-[20px]">
            <!-- <li v-for="(guideline, index) in guidelines" :key="index">{{ guideline }}</li> -->
            <li v-if="materi.length > 0">
              <h3>{{ materi[4].materi }}</h3>
              <ul class="list-disc list-inside">
                <li v-for="(isi, index) in materi[4].isi" :key="index">{{ isi }}</li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <!-- DOWNLOAD MATERI -->
    </section>
  </main>
</template>

<script>
  import AOS from "aos";
  import "aos/dist/aos.css";
  
  export default {
    name: 'MateriSectionView',

    data() {
      return {
        materi: [{
            judul: "BUKU IMPLEMENTASI NILAI ASKARA MUDA",
            materi: "Petunjuk Umum Implementasi Nilai",
            isi: [
              "Askara Muda adalah sebutan untuk Mahasiswa Baru yang mengikuti PKKMB SV UNS Askara 2023.",
              "Seluruh Implementasi Nilai bersifat WAJIB.",
              "Implementasi nilai diberikan sebagai penunjang penanaman nilai-nilai dan visi misi dari PKKMB SV UNS 2023, yaitu Jiwa Berkarakter, Kreativitas Tanpa Batas, Inovasi Mendunia.",
              "Implementasi nilai menjadi indikator kelulusan PKKMB SV UNS 2023 bagi mahasiswa baru.",
              "Implementasi nilai menjadi salah satu syarat pokok untuk mendapatkan penilaian yang akan dicantumkan dalam sertifikat PKKMB SV UNS 2023.",
              "Sertifikat PKKMB SV UNS 2023 nantinya akan digunakan sebagai salah satu syarat kelulusan.",
              "Implementasi nilai tidak boleh dihapus atau diarsip sampai mendapat arahan dari gardana.",
              "Askara Muda wajib mempunyai akun Instagram.",
              "Implementasi nilai menjadi indikator kelulusan PKKMB SV UNS 2023 bagi mahasiswa baru.",
              "Implementasi nilai menjadi salah satu syarat pokok untuk mendapatkan penilaian yang akan dicantumkan dalam sertifikat PKKMB SV UNS 2023.",
              "Sertifikat PKKMB SV UNS 2023 nantinya akan digunakan sebagai salah satu syarat kelulusan.",
              "Implementasi nilai tidak boleh dihapus atau diarsip sampai mendapat arahan dari gardana.",
              "Askara Muda wajib mempunyai akun Instagram.",
              "Askara Muda adalah sebutan untuk Mahasiswa Baru yang mengikuti PKKMB SV UNS Askara 2023.",
              "Seluruh Implementasi Nilai bersifat WAJIB.",
              "Implementasi nilai diberikan sebagai penunjang penanaman nilai-nilai dan visi misi dari PKKMB SV UNS 2023, yaitu Jiwa Berkarakter, Kreativitas Tanpa Batas, Inovasi Mendunia.",
              "Implementasi nilai menjadi indikator kelulusan PKKMB SV UNS 2023 bagi mahasiswa baru.",
              "Implementasi nilai menjadi salah satu syarat pokok untuk mendapatkan penilaian yang akan dicantumkan dalam sertifikat PKKMB SV UNS 2023.",
              "Sertifikat PKKMB SV UNS 2023 nantinya akan digunakan sebagai salah satu syarat kelulusan.",
              "Implementasi nilai tidak boleh dihapus atau diarsip sampai mendapat arahan dari gardana.",
              "Askara Muda wajib mempunyai akun Instagram.",

            ]
          },
          {
            judul: "TWIBBON",
            materi: "Materi Pertama: Twibbon",
            isi: [
              "Askara Muda adalah sebutan untuk Mahasiswa Baru yang mengikuti PKKMB SV UNS Askara 2023.",
              "Seluruh Implementasi Nilai bersifat WAJIB.",
              "Implementasi nilai diberikan sebagai penunjang penanaman nilai-nilai dan visi misi dari PKKMB SV UNS 2023, yaitu Jiwa Berkarakter, Kreativitas Tanpa Batas, Inovasi Mendunia.",
              "Implementasi nilai menjadi indikator kelulusan PKKMB SV UNS 2023 bagi mahasiswa baru.",
              "Implementasi nilai menjadi salah satu syarat pokok untuk mendapatkan penilaian yang akan dicantumkan dalam sertifikat PKKMB SV UNS 2023.",
              "Sertifikat PKKMB SV UNS 2023 nantinya akan digunakan sebagai salah satu syarat kelulusan.",
              "Implementasi nilai tidak boleh dihapus atau diarsip sampai mendapat arahan dari gardana.",
              "Askara Muda wajib mempunyai akun Instagram.",
              "Implementasi nilai menjadi indikator kelulusan PKKMB SV UNS 2023 bagi mahasiswa baru.",
              "Implementasi nilai menjadi salah satu syarat pokok untuk mendapatkan penilaian yang akan dicantumkan dalam sertifikat PKKMB SV UNS 2023.",
              "Sertifikat PKKMB SV UNS 2023 nantinya akan digunakan sebagai salah satu syarat kelulusan.",
              "Implementasi nilai tidak boleh dihapus atau diarsip sampai mendapat arahan dari gardana.",
              "Askara Muda wajib mempunyai akun Instagram.",
              "Askara Muda adalah sebutan untuk Mahasiswa Baru yang mengikuti PKKMB SV UNS Askara 2023.",
              "Seluruh Implementasi Nilai bersifat WAJIB.",
              "Implementasi nilai diberikan sebagai penunjang penanaman nilai-nilai dan visi misi dari PKKMB SV UNS 2023, yaitu Jiwa Berkarakter, Kreativitas Tanpa Batas, Inovasi Mendunia.",
              "Implementasi nilai menjadi indikator kelulusan PKKMB SV UNS 2023 bagi mahasiswa baru.",
              "Implementasi nilai menjadi salah satu syarat pokok untuk mendapatkan penilaian yang akan dicantumkan dalam sertifikat PKKMB SV UNS 2023.",
              "Sertifikat PKKMB SV UNS 2023 nantinya akan digunakan sebagai salah satu syarat kelulusan.",
              "Implementasi nilai tidak boleh dihapus atau diarsip sampai mendapat arahan dari gardana.",
              "Askara Muda wajib mempunyai akun Instagram.",

            ]
          },
          {
            judul: "CO-CARD",
            materi: "Materi Kedua: Co-Card",
            isi: [
              "Askara Muda adalah sebutan untuk Mahasiswa Baru yang mengikuti PKKMB SV UNS Askara 2023.",
              "Seluruh Implementasi Nilai bersifat WAJIB.",
              "Implementasi nilai diberikan sebagai penunjang penanaman nilai-nilai dan visi misi dari PKKMB SV UNS 2023, yaitu Jiwa Berkarakter, Kreativitas Tanpa Batas, Inovasi Mendunia.",
              "Implementasi nilai menjadi indikator kelulusan PKKMB SV UNS 2023 bagi mahasiswa baru.",
              "Implementasi nilai menjadi salah satu syarat pokok untuk mendapatkan penilaian yang akan dicantumkan dalam sertifikat PKKMB SV UNS 2023.",
              "Sertifikat PKKMB SV UNS 2023 nantinya akan digunakan sebagai salah satu syarat kelulusan.",
              "Implementasi nilai tidak boleh dihapus atau diarsip sampai mendapat arahan dari gardana.",
              "Askara Muda wajib mempunyai akun Instagram.",
              "Implementasi nilai menjadi indikator kelulusan PKKMB SV UNS 2023 bagi mahasiswa baru.",
              "Implementasi nilai menjadi salah satu syarat pokok untuk mendapatkan penilaian yang akan dicantumkan dalam sertifikat PKKMB SV UNS 2023.",
              "Sertifikat PKKMB SV UNS 2023 nantinya akan digunakan sebagai salah satu syarat kelulusan.",
              "Implementasi nilai tidak boleh dihapus atau diarsip sampai mendapat arahan dari gardana.",
              "Askara Muda wajib mempunyai akun Instagram.",
              "Askara Muda adalah sebutan untuk Mahasiswa Baru yang mengikuti PKKMB SV UNS Askara 2023.",
              "Seluruh Implementasi Nilai bersifat WAJIB.",
              "Implementasi nilai diberikan sebagai penunjang penanaman nilai-nilai dan visi misi dari PKKMB SV UNS 2023, yaitu Jiwa Berkarakter, Kreativitas Tanpa Batas, Inovasi Mendunia.",
              "Implementasi nilai menjadi indikator kelulusan PKKMB SV UNS 2023 bagi mahasiswa baru.",
              "Implementasi nilai menjadi salah satu syarat pokok untuk mendapatkan penilaian yang akan dicantumkan dalam sertifikat PKKMB SV UNS 2023.",
              "Sertifikat PKKMB SV UNS 2023 nantinya akan digunakan sebagai salah satu syarat kelulusan.",
              "Implementasi nilai tidak boleh dihapus atau diarsip sampai mendapat arahan dari gardana.",
              "Askara Muda wajib mempunyai akun Instagram.",

            ]
          },
          {
            judul: "VIDIO BANGGA VOKASI",
            materi: "Materi Ketiga: Vidio Bangga Vokasi",
            isi: [
              "Askara Muda adalah sebutan untuk Mahasiswa Baru yang mengikuti PKKMB SV UNS Askara 2023.",
              "Seluruh Implementasi Nilai bersifat WAJIB.",
              "Implementasi nilai diberikan sebagai penunjang penanaman nilai-nilai dan visi misi dari PKKMB SV UNS 2023, yaitu Jiwa Berkarakter, Kreativitas Tanpa Batas, Inovasi Mendunia.",
              "Implementasi nilai menjadi indikator kelulusan PKKMB SV UNS 2023 bagi mahasiswa baru.",
              "Implementasi nilai menjadi salah satu syarat pokok untuk mendapatkan penilaian yang akan dicantumkan dalam sertifikat PKKMB SV UNS 2023.",
              "Sertifikat PKKMB SV UNS 2023 nantinya akan digunakan sebagai salah satu syarat kelulusan.",
              "Implementasi nilai tidak boleh dihapus atau diarsip sampai mendapat arahan dari gardana.",
              "Askara Muda wajib mempunyai akun Instagram.",
              "Implementasi nilai menjadi indikator kelulusan PKKMB SV UNS 2023 bagi mahasiswa baru.",
              "Implementasi nilai menjadi salah satu syarat pokok untuk mendapatkan penilaian yang akan dicantumkan dalam sertifikat PKKMB SV UNS 2023.",
              "Sertifikat PKKMB SV UNS 2023 nantinya akan digunakan sebagai salah satu syarat kelulusan.",
              "Implementasi nilai tidak boleh dihapus atau diarsip sampai mendapat arahan dari gardana.",
              "Askara Muda wajib mempunyai akun Instagram.",
              "Askara Muda adalah sebutan untuk Mahasiswa Baru yang mengikuti PKKMB SV UNS Askara 2023.",
              "Seluruh Implementasi Nilai bersifat WAJIB.",
              "Implementasi nilai diberikan sebagai penunjang penanaman nilai-nilai dan visi misi dari PKKMB SV UNS 2023, yaitu Jiwa Berkarakter, Kreativitas Tanpa Batas, Inovasi Mendunia.",
              "Implementasi nilai menjadi indikator kelulusan PKKMB SV UNS 2023 bagi mahasiswa baru.",
              "Implementasi nilai menjadi salah satu syarat pokok untuk mendapatkan penilaian yang akan dicantumkan dalam sertifikat PKKMB SV UNS 2023.",
              "Sertifikat PKKMB SV UNS 2023 nantinya akan digunakan sebagai salah satu syarat kelulusan.",
              "Implementasi nilai tidak boleh dihapus atau diarsip sampai mendapat arahan dari gardana.",
              "Askara Muda wajib mempunyai akun Instagram.",
            ]
          },
          {
            judul: "RINGAKASAN MATERI",
            materi: "Materi Keempat: Ringakasan Materi",
            isi: [
              "Askara Muda adalah sebutan untuk Mahasiswa Baru yang mengikuti PKKMB SV UNS Askara 2023.",
              "Seluruh Implementasi Nilai bersifat WAJIB.",
              "Implementasi nilai diberikan sebagai penunjang penanaman nilai-nilai dan visi misi dari PKKMB SV UNS 2023, yaitu Jiwa Berkarakter, Kreativitas Tanpa Batas, Inovasi Mendunia.",
              "Implementasi nilai menjadi indikator kelulusan PKKMB SV UNS 2023 bagi mahasiswa baru.",
              "Implementasi nilai menjadi salah satu syarat pokok untuk mendapatkan penilaian yang akan dicantumkan dalam sertifikat PKKMB SV UNS 2023.",
              "Sertifikat PKKMB SV UNS 2023 nantinya akan digunakan sebagai salah satu syarat kelulusan.",
              "Implementasi nilai tidak boleh dihapus atau diarsip sampai mendapat arahan dari gardana.",
              "Askara Muda wajib mempunyai akun Instagram.",
              "Implementasi nilai menjadi indikator kelulusan PKKMB SV UNS 2023 bagi mahasiswa baru.",
              "Implementasi nilai menjadi salah satu syarat pokok untuk mendapatkan penilaian yang akan dicantumkan dalam sertifikat PKKMB SV UNS 2023.",
              "Sertifikat PKKMB SV UNS 2023 nantinya akan digunakan sebagai salah satu syarat kelulusan.",
              "Implementasi nilai tidak boleh dihapus atau diarsip sampai mendapat arahan dari gardana.",
              "Askara Muda wajib mempunyai akun Instagram.",
              "Askara Muda adalah sebutan untuk Mahasiswa Baru yang mengikuti PKKMB SV UNS Askara 2023.",
              "Seluruh Implementasi Nilai bersifat WAJIB.",
              "Implementasi nilai diberikan sebagai penunjang penanaman nilai-nilai dan visi misi dari PKKMB SV UNS 2023, yaitu Jiwa Berkarakter, Kreativitas Tanpa Batas, Inovasi Mendunia.",
              "Implementasi nilai menjadi indikator kelulusan PKKMB SV UNS 2023 bagi mahasiswa baru.",
              "Implementasi nilai menjadi salah satu syarat pokok untuk mendapatkan penilaian yang akan dicantumkan dalam sertifikat PKKMB SV UNS 2023.",
              "Sertifikat PKKMB SV UNS 2023 nantinya akan digunakan sebagai salah satu syarat kelulusan.",
              "Implementasi nilai tidak boleh dihapus atau diarsip sampai mendapat arahan dari gardana.",
              "Askara Muda wajib mempunyai akun Instagram.",
            ]
          }
        ]
      }

    },
    mounted() {
      AOS.init();
    }
  };
</script>