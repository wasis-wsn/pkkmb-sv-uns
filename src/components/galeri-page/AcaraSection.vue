<template>
  <section class="acara" id="acara">
    <div class="container mx-auto p-4">
      <div class="judul mb-3 text-center">
        <h1
          class="text-3xl font-bold inline-block border-b-4 border-[#F67366]"
          data-aos="fade-up"
        >
          DOKUMENTASI ACARA
        </h1>
        <p class="text-lg mt-4" data-aos="fade-up">
          Hallo Vocazens!, Bagian ini khusus berisi highlight foto-foto dari
          setiap acara yang diadakan, menampilkan berbagai kegiatan penting dan
          menarik yang telah kita jalani bersama. Dari sesi pembukaan yang megah
          dan penuh semangat, hingga kuliah umum yang inspiratif dan memberikan
          wawasan baru. Tidak hanya itu, berbagai pelatihan keterampilan yang
          bermanfaat dan kegiatan sosial yang menyenangkan juga diabadikan dalam
          potret-potret indah.
        </p>
      </div>
      <div class="container swiper mb-2">
        <!-- Swiper Wrapper -->
        <div class="swiper-wrapper flex items-stretch">
          <div
            v-for="(slide, index) in slides"
            :key="'slide-' + index"
            class="swiper-slide"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <div class="bg-white border-2 rounded-3xl p-5 pt-5 pb-20 text-sm">
              <img
                :src="slide.imgSrc"
                :alt="slide.alt"
                class="w-full aspect-[1.28] object-cover"
              />
              <header class="mt-7">{{ slide.judul }}</header>
              <h2 class="mt-3 text-2xl uppercase">
                {{ slide.judulAcara }}
              </h2>
              <p class="mt-5 text-base justify-between">
                {{ slide.deskripsi }}
              </p>
            </div>
          </div>
        </div>
        <!-- Swiper Navigation Buttons -->
        <div class="swiper-button-next text-lg"></div>
        <div class="swiper-button-prev text-lg"></div>
        <!-- Swiper Wrapper End -->
      </div>
    </div>
  </section>
</template>
