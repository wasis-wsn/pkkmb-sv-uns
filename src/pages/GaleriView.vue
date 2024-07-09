<template>
  <div class="container mx-auto bg-white p-3">
    <div class="min-h-screen">
      <header class="text-center py-8">
        <h1 class="text-3xl font-bold inline-block border-b-4 border-[#F67366]">
          DOKUMENTASI PKKMB SV UNS 2024
        </h1>
        <p class="text-lg mt-4">
          Hallo Vocazens!, Galeri ini berisi dokumentasi setiap acara yang
          terjadi selama kegiatan Pengenalan Kehidupan Kampus bagi Mahasiswa
          Baru di Sekolah Vokasi UNS. Selamat menikmati!
        </p>
      </header>

      <main class="container mx-auto">
        <div class="galeri-1">
          <div
            class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 gap-y-4 sm:gap-y-9 lg:gap-y-9"
          >
            <div class="row-span-2 sm:row-span-2 lg:row-span-3">
              <img
                src="@/assets/galeri/p-1.png"
                alt="Image 1"
                class="w-full h-auto rounded-lg shadow-lg"
              />
            </div>
            <div class="col-span-1">
              <img
                src="@/assets/galeri/p-2.png"
                alt="Image 2"
                class="w-full h-auto rounded-lg shadow-lg"
              />
            </div>
            <div class="col-span-1">
              <img
                src="@/assets/galeri/p-3.png"
                alt="Image 3"
                class="w-full h-auto rounded-lg shadow-lg"
              />
            </div>
            <div class="row-span-2 sm:row-span-2 lg:row-span-3">
              <img
                src="@/assets/galeri/p-1.png"
                alt="Image 1"
                class="w-full h-auto rounded-lg shadow-lg"
              />
            </div>
            <div class="col-span-1">
              <img
                src="@/assets/galeri/p-4.png"
                alt="Image 4"
                class="w-full h-auto rounded-lg shadow-lg"
              />
            </div>
            <div class="col-span-1">
              <img
                src="@/assets/galeri/p-5.png"
                alt="Image 5"
                class="w-full h-auto rounded-lg shadow-lg"
              />
            </div>
          </div>
        </div>
        <div class="galeri-2 mt-5">
          <div
            class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 gap-y-4 sm:gap-y-9 lg:gap-y-9"
          >
            <div class="row-span-2 sm:row-span-2 lg:row-span-3">
              <img
                src="@/assets/galeri/p-1.png"
                alt="Image 1"
                class="w-full h-auto rounded-lg shadow-lg"
              />
            </div>
            <div class="col-span-1">
              <img
                src="@/assets/galeri/p-2.png"
                alt="Image 2"
                class="w-full h-auto rounded-lg shadow-lg"
              />
            </div>
            <div class="row-span-2 sm:row-span-2 lg:row-span-3 col-end">
              <img
                src="@/assets/galeri/p-1.png"
                alt="Image 1"
                class="w-full h-auto rounded-lg shadow-lg"
              />
            </div>
            <div class="col-span-1">
              <img
                src="@/assets/galeri/p-3.png"
                alt="Image 3"
                class="w-full h-auto rounded-lg shadow-lg"
              />
            </div>
            <div class="col-span-1">
              <img
                src="@/assets/galeri/p-4.png"
                alt="Image 4"
                class="w-full h-auto rounded-lg shadow-lg"
              />
            </div>
            <div class="col-span-1">
              <img
                src="@/assets/galeri/p-5.png"
                alt="Image 5"
                class="w-full h-auto rounded-lg shadow-lg"
              />
            </div>
          </div>
        </div>
        <div
          class="download-button text-center mt-7 sm:mt-7 md:mt-7 lg:mt-6 xl:mt-2"
        >
          <a
            href="#"
            class="bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-red-600"
          >
            DOWNLOAD DISINI!
          </a>
        </div>
        <!-- Slider Acara -->
        <div class="slider-acara mt-5">
          <!-- Trending Section -->
          <section class="acara" id="acara">
            <div class="container mx-auto p-4">
              <div class="judul mb-3 text-center">
                <h1
                  class="text-3xl font-bold inline-block border-b-4 border-[#F67366]"
                >
                  DOKUMENTASI ACARA
                </h1>
                <p class="text-lg mt-4">
                  Hallo Vocazens!, Galeri ini berisi dokumentasi setiap acara
                  yang terjadi selama kegiatan Pengenalan Kehidupan Kampus bagi
                  Mahasiswa Baru di Sekolah Vokasi UNS. Selamat menikmati!
                </p>
              </div>
              <div class="container swiper mb-2">
                <!-- Swiper Wrapper -->
                <div class="swiper-wrapper flex">
                  <!-- Swipper Slide -->
                  <div class="swiper-slide flex-shrink-0 grow h-full flex-col">
                    <div
                      class="bg-white border-2 rounded-3xl p-5 pt-5 pb-20 text-sm flex flex-col"
                    >
                      <img
                        src="@/assets/galeri/acara-1.png"
                        alt="PKKMB SV UNS 2024 Seminar"
                        class="w-full aspect-[1.28] object-cover"
                      />
                      <header class="mt-7">PKKMB SV UNS 2024</header>
                      <h2 class="mt-3 text-2xl uppercase">
                        Seminar Inspiratif
                      </h2>
                      <p
                        class="mt-5 text-base flex flex-col justify-between flex-grow"
                      >
                        Mendengarkan paparan dari tokoh-tokoh inspiratif yang
                        berbagi pengalaman dan pengetahuan mereka.
                      </p>
                    </div>
                  </div>
                  <div class="swiper-slide flex-shrink-0 grow h-full flex-col">
                    <div
                      class="bg-white border-2 rounded-3xl p-5 pt-5 pb-20 text-sm flex flex-col"
                    >
                      <img
                        src="@/assets/galeri/acara-1.png"
                        alt="PKKMB SV UNS 2024 Seminar"
                        class="w-full aspect-[1.28] object-cover"
                      />
                      <header class="mt-7">PKKMB SV UNS 2024</header>
                      <h2 class="mt-3 text-2xl uppercase">
                        Seminar Inspiratif
                      </h2>
                      <p
                        class="mt-5 text-base flex flex-col justify-between flex-grow"
                      >
                        Mendengarkan paparan dari tokoh-tokoh inspiratif yang
                        berbagi pengalaman dan pengetahuan mereka.
                      </p>
                    </div>
                  </div>
                  <div class="swiper-slide flex-shrink-0 grow h-full flex-col">
                    <div
                      class="bg-white border-2 rounded-3xl p-5 pt-5 pb-20 text-sm flex flex-col"
                    >
                      <img
                        src="@/assets/galeri/acara-1.png"
                        alt="PKKMB SV UNS 2024 Seminar"
                        class="w-full aspect-[1.28] object-cover"
                      />
                      <header class="mt-7">PKKMB SV UNS 2024</header>
                      <h2 class="mt-3 text-2xl uppercase">
                        Seminar Inspiratif
                      </h2>
                      <p
                        class="mt-5 text-base flex flex-col justify-between flex-grow"
                      >
                        Mendengarkan paparan dari tokoh-tokoh inspiratif yang
                        berbagi pengalaman dan pengetahuan mereka.
                      </p>
                    </div>
                  </div>
                  <div class="swiper-slide flex-shrink-0 grow h-full flex-col">
                    <div
                      class="bg-white border-2 rounded-3xl p-5 pt-5 pb-20 text-sm flex flex-col"
                    >
                      <img
                        src="@/assets/galeri/acara-1.png"
                        alt="PKKMB SV UNS 2024 Seminar"
                        class="w-full aspect-[1.28] object-cover"
                      />
                      <header class="mt-7">PKKMB SV UNS 2024</header>
                      <h2 class="mt-3 text-2xl uppercase">
                        Seminar Inspiratif
                      </h2>
                      <p
                        class="mt-5 text-base flex flex-col justify-between flex-grow"
                      >
                        Mendengarkan paparan dari tokoh-tokoh inspiratif yang
                        berbagi pengalaman dan pengetahuan mereka.
                      </p>
                    </div>
                  </div>
                  <div class="swiper-slide flex-shrink-0 grow h-full flex-col">
                    <div
                      class="bg-white border-2 rounded-3xl p-5 pt-5 pb-20 text-sm flex flex-col"
                    >
                      <img
                        src="@/assets/galeri/acara-1.png"
                        alt="PKKMB SV UNS 2024 Seminar"
                        class="w-full aspect-[1.28] object-cover"
                      />
                      <header class="mt-7">PKKMB SV UNS 2024</header>
                      <h2 class="mt-3 text-2xl uppercase">
                        Seminar Inspiratif
                      </h2>
                      <p
                        class="mt-5 text-base flex flex-col justify-between flex-grow"
                      >
                        Mendengarkan paparan dari tokoh-tokoh inspiratif yang
                        berbagi pengalaman dan pengetahuan mereka.
                      </p>
                    </div>
                  </div>
                  <div class="swiper-slide flex-shrink-0 grow h-full flex-col">
                    <div
                      class="bg-white border-2 rounded-3xl p-5 pt-5 pb-20 text-sm flex flex-col"
                    >
                      <img
                        src="@/assets/galeri/acara-1.png"
                        alt="PKKMB SV UNS 2024 Seminar"
                        class="w-full aspect-[1.28] object-cover"
                      />
                      <header class="mt-7">PKKMB SV UNS 2024</header>
                      <h2 class="mt-3 text-2xl uppercase">
                        Seminar Inspiratif
                      </h2>
                      <p
                        class="mt-5 text-base flex flex-col justify-between flex-grow"
                      >
                        Mendengarkan paparan dari tokoh-tokoh inspiratif yang
                        berbagi pengalaman dan pengetahuan mereka.
                      </p>
                    </div>
                  </div>
                  <!-- Swipper Slide End -->
                </div>
                <!-- Swipper Wrapper End -->
              </div>
            </div>
          </section>
        </div>
        <!-- Trending Section Ends -->
      </main>
    </div>
  </div>
</template>

<script>
import Swiper from "swiper";
import "swiper/swiper-bundle.css";

export default {
  name: "GaleriView",
  mounted() {
    new Swiper(".swiper", {
      loop: true,
      direction: "horizontal",
      slidesPerView: 1,
      spaceBetween: 10,
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 40,
        },
        1280: {
          slidesPerView: 4,
          spaceBetween: 50,
        },
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  },
};
</script>

<style scoped>
/* Custom styles if needed */
</style>
