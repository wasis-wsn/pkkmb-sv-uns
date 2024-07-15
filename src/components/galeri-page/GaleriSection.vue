<template>
  <section class="galeri-page">
    <div class="galeri w-full bg-slate-100 pb-5 px-4" data-aos="fade-up">
      <header class="text-center py-10">
        <h1
          class="text-3xl font-bold inline-block border-b-4 border-[#F67366]"
          data-aos="fade-up"
        >
          DOKUMENTASI PKKMB SV UNS 2024
        </h1>
        <p class="text-lg mt-4 container mx-auto px-4" data-aos="fade-up">
          Halo, Vocazens! Selamat datang di galeri dokumentasi kegiatan
          Pengenalan Kehidupan Kampus bagi Mahasiswa Baru (PKKMB) Sekolah Vokasi
          Universitas Sebelas Maret tahun 2024. Galeri ini menyajikan berbagai
          momen berharga dan kenangan tak terlupakan dari setiap acara yang
          diadakan selama PKKMB. Selamat menikmati galeri PKKMB SV UNS 2024!
        </p>
      </header>

      <!-- Galeri Start -->
      <div class="container px-4 lg:px-8 md:px-6 sm:px-6 mx-auto">
        <div class="galeri-1" data-aos="fade-up">
          <div
            class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 gap-y-4 sm:gap-y-9 lg:gap-y-9 rounded-lg"
          >
            <div
              v-for="(image, index) in galeri1"
              :key="'galeri1-' + index"
              :class="image.class"
            >
              <img
                :src="image.src"
                :alt="'Image ' + (index + 1)"
                class="w-full h-auto rounded-3xl shadow-lg"
              />
            </div>
          </div>
        </div>
        <div class="galeri-2 mt-5" data-aos="fade-up">
          <div
            class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 gap-y-4 sm:gap-y-9 lg:gap-y-9"
          >
            <div
              v-for="(image, index) in galeri2"
              :key="'galeri2-' + index"
              :class="image.class"
            >
              <img
                :src="image.src"
                :alt="'Image ' + (index + 1)"
                class="w-full h-auto rounded-3xl shadow-lg"
              />
            </div>
          </div>
        </div>
        <div
          class="download-button text-center mt-7 sm:mt-7 md:mt-7 lg:mt-6 xl:mt-2"
          data-aos="fade-up"
        >
          <button
            class="button-biru justify-center items-center font-bold text-[20px] px-10 pt-1.5 pb-2 text-white whitespace-nowrap bg-slate-700 rounded-[15px] max-md:px-5"
          >
            <a href="https://bit.ly/FotoAskara2022" target="_blank">
              DOWNLOAD DISINI!
            </a>
          </button>
        </div>
      </div>
      <!-- Galeri Ends -->
    </div>
  </section>
</template>
