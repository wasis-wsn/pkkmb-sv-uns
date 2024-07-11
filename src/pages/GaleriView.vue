<template>
  <div class="flex flex-col bg-white">
    <header class="flex gap-5 max-md:flex-col max-md:gap-0">
      <section
        class="flex flex-col flex-1 items-start pb-32 mt-16 ml-2 rounded-full border border-solid border-violet-300 border-opacity-50 max-md:max-w-full"
      >
        <div
          class="shrink-0 mt-20 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[180px] max-md:mt-10"
        ></div>
        <div
          class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[120px] max-md:mt-10"
        ></div>
        <div
          class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[190px]"
        ></div>
        <div
          class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[150px]"
        ></div>
        <div
          class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[200px]"
        ></div>
        <div class="self-end mt-1 mb-0 max-md:max-w-full">
          <h1
            class="self-stretch pl-8 mt-5 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-10 max-md:max-w-full"
          >
            <span class="font-semibold">GALERI</span>
          </h1>
          <h1
            class="self-stretch pl-8 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-0 max-md:max-w-full"
          >
            <span class="text-5xl text-red-400">PKKMB SV UNS 2024</span>.
          </h1>
        </div>
      </section>
      <section class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
        <img
          loading="lazy"
          src="@/assets/logo_besar.png"
          alt=""
          class="box-border object-cover overflow-hidden shrink-0 mt-0 w-full aspect-[0.99] min-h-[20px] min-w-[20px]"
        />
      </section>
    </header>
    <div class="flex gap-5 self-end px-5 mt-0 max-md:mt-10">
      <div
        class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"
      ></div>
      <div
        class="shrink-0 self-end mt-16 bg-red-300 bg-opacity-20 h-[130px] rounded-[100px] w-[5px] max-md:mt-10"
      ></div>
      <div
        class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"
      ></div>
      <div
        class="shrink-0 self-end mt-12 bg-red-300 bg-opacity-20 h-[150px] rounded-[100px] w-[5px] max-md:mt-10"
      ></div>
      <div
        class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"
      ></div>
    </div>
  </div>
  <div class="mx-auto bg-white">
    <div class="min-h-screen">
      <div class="galeri w-full bg-slate-100 pb-5">
        <header class="text-center py-8">
          <h1
            class="text-3xl font-bold inline-block border-b-4 border-[#F67366]"
          >
            DOKUMENTASI PKKMB SV UNS 2024
          </h1>
          <p class="text-lg mt-4 container mx-auto">
            Halo, Vocazens! Berikut adalah dokumentasi PKKMB SV UNS 2024. Selamat menonton!
          </p>
        </header>
        <!-- Galeri Start -->

        <!-- Galeri Start -->
        <div class="container mx-auto">
          <div class="galeri-1">
            <div
              class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 gap-y-4 sm:gap-y-9 lg:gap-y-9 rounded-lg"
            >
              <div class="row-span-2 sm:row-span-2 lg:row-span-3">
                <img
                  src="@/assets/galeri/p-1.png"
                  alt="1"
                  class="w-full h-auto rounded-3xl shadow-lg"
                />
              </div>
              <div class="col-span-1">
                <img
                  src="@/assets/galeri/p-2.png"
                  alt="2"
                  class="w-full h-auto rounded-3xl shadow-lg"
                />
              </div>
              <div class="col-span-1">
                <img
                  src="@/assets/galeri/p-3.png"
                  alt="3"
                  class="w-full h-auto rounded-3xl shadow-lg"
                />
              </div>
              <div class="row-span-2 sm:row-span-2 lg:row-span-3">
                <img
                  src="@/assets/galeri/p-1.png"
                  alt="1"
                  class="w-full h-auto rounded-3xl shadow-lg"
                />
              </div>
              <div class="col-span-1">
                <img
                  src="@/assets/galeri/p-4.png"
                  alt="4"
                  class="w-full h-auto rounded-3xl shadow-lg"
                />
              </div>
              <div class="col-span-1">
                <img
                  src="@/assets/galeri/p-5.png"
                  alt="5"
                  class="w-full h-auto rounded-3xl shadow-lg"
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
                  alt="1"
                  class="w-full h-auto rounded-3xl shadow-lg"
                />
              </div>
              <div class="col-span-1">
                <img
                  src="@/assets/galeri/p-2.png"
                  alt="2"
                  class="w-full h-auto rounded-3xl shadow-lg"
                />
              </div>
              <div class="row-span-2 sm:row-span-2 lg:row-span-3 col-end">
                <img
                  src="@/assets/galeri/p-1.png"
                  alt="1"
                  class="w-full h-auto rounded-3xl shadow-lg"
                />
              </div>
              <div class="col-span-1">
                <img
                  src="@/assets/galeri/p-3.png"
                  alt="3"
                  class="w-full h-auto rounded-3xl shadow-lg"
                />
              </div>
              <div class="col-span-1">
                <img
                  src="@/assets/galeri/p-4.png"
                  alt="4"
                  class="w-full h-auto rounded-3xl shadow-lg"
                />
              </div>
              <div class="col-span-1">
                <img
                  src="@/assets/galeri/p-5.png"
                  alt="5"
                  class="w-full h-auto rounded-3xl shadow-lg"
                />
              </div>
            </div>
          </div>
          <div
            class="download-button text-center mt-7 sm:mt-7 md:mt-7 lg:mt-6 xl:mt-2"
          >
            <button
              class="button-biru justify-center items-center font-bold text-[20px] px-10 pt-1.5 pb-2 whitespace-nowrap rounded-[15px] max-md:px-5"
            >
              <a href="#" target="_blank"> DOWNLOAD DISINI! </a>
            </button>
          </div>
        </div>
      </div>
      <!-- Galeri Ends -->

      <!-- Slider Acara -->
      <div class="slider-acara mt-5 container mx-auto">
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
                Bagian ini berisi highlight foto-foto
                dari setiap acara yang diadakan, menampilkan berbagai kegiatan
                penting dan menarik yang telah kita jalani bersama.
              </p>
            </div>
            <div class="container swiper mb-2">
              <!-- Swiper Wrapper -->
              <div class="swiper-wrapper flex items-stretch">
                <!-- Swiper Slide -->
                <div class="swiper-slide">
                  <div
                    class="bg-white border-2 rounded-3xl p-5 pt-5 pb-20 text-sm"
                  >
                    <img
                      src="@/assets/galeri/acara-1.png"
                      alt="PKKMB SV UNS 2024 Seminar"
                      class="w-full aspect-[1.28] object-cover"
                    />
                    <header class="mt-7">PKKMB SV UNS 2024</header>
                    <h2 class="mt-3 text-2xl uppercase">Seminar Inspiratif</h2>
                    <p class="mt-5 text-base justify-between">
                      Mendengarkan paparan dari tokoh-tokoh inspiratif yang
                      berbagi pengalaman dan pengetahuan mereka.
                    </p>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div
                    class="bg-white border-2 rounded-3xl p-5 pt-5 pb-20 text-sm"
                  >
                    <img
                      src="@/assets/galeri/acara-1.png"
                      alt="PKKMB SV UNS 2024 Seminar"
                      class="w-full aspect-[1.28] object-cover"
                    />
                    <header class="mt-7">PKKMB SV UNS 2024</header>
                    <h2 class="mt-3 text-2xl uppercase">Seminar Inspiratif</h2>
                    <p class="mt-5 text-base justify-between">
                      Mendengarkan paparan dari tokoh-tokoh inspiratif yang
                      berbagi pengalaman dan pengetahuan mereka.
                    </p>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div
                    class="bg-white border-2 rounded-3xl p-5 pt-5 pb-20 text-sm"
                  >
                    <img
                      src="@/assets/galeri/acara-1.png"
                      alt="PKKMB SV UNS 2024 Seminar"
                      class="w-full aspect-[1.28] object-cover"
                    />
                    <header class="mt-7">PKKMB SV UNS 2024</header>
                    <h2 class="mt-3 text-2xl uppercase">Seminar Inspiratif</h2>
                    <p class="mt-5 text-base justify-between">
                      Mendengarkan paparan dari tokoh-tokoh inspiratif yang
                      berbagi pengalaman dan pengetahuan mereka.
                    </p>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div
                    class="bg-white border-2 rounded-3xl p-5 pt-5 pb-20 text-sm"
                  >
                    <img
                      src="@/assets/galeri/acara-1.png"
                      alt="PKKMB SV UNS 2024 Seminar"
                      class="w-full aspect-[1.28] object-cover"
                    />
                    <header class="mt-7">PKKMB SV UNS 2024</header>
                    <h2 class="mt-3 text-2xl uppercase">Seminar Inspiratif</h2>
                    <p class="mt-5 text-base justify-between">
                      Mendengarkan paparan dari tokoh-tokoh inspiratif yang
                      berbagi pengalaman dan pengetahuan mereka.
                    </p>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div
                    class="bg-white border-2 rounded-3xl p-5 pt-5 pb-20 text-sm"
                  >
                    <img
                      src="@/assets/galeri/acara-1.png"
                      alt="PKKMB SV UNS 2024 Seminar"
                      class="w-full aspect-[1.28] object-cover"
                    />
                    <header class="mt-7">PKKMB SV UNS 2024</header>
                    <h2 class="mt-3 text-2xl uppercase">Seminar Inspiratif</h2>
                    <p class="mt-5 text-base justify-between">
                      Mendengarkan paparan dari tokoh-tokoh inspiratif yang
                      berbagi pengalaman dan pengetahuan mereka.
                    </p>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div
                    class="bg-white border-2 rounded-3xl p-5 pt-5 pb-20 text-sm"
                  >
                    <img
                      src="@/assets/galeri/acara-1.png"
                      alt="PKKMB SV UNS 2024 Seminar"
                      class="w-full aspect-[1.28] object-cover"
                    />
                    <header class="mt-7">PKKMB SV UNS 2024</header>
                    <h2 class="mt-3 text-2xl uppercase">Seminar Inspiratif</h2>
                    <p class="mt-5 text-base justify-between">
                      Mendengarkan paparan dari tokoh-tokoh inspiratif yang
                      berbagi pengalaman dan pengetahuan mereka.
                    </p>
                  </div>
                </div>
                <!-- Swiper Slide End -->
              </div>
              <!-- Swiper Navigation Buttons -->
              <div class="swiper-button-next text-lg"></div>
              <div class="swiper-button-prev text-lg"></div>
              <!-- Swiper Wrapper End -->
            </div>
          </div>
        </section>
        <!-- Trending Section Ends -->

        <!-- After Movie -->
        <section
          class="flex flex-col items-center px-5 font-bold capitalize text-neutral-900"
        >
          <h1 class="text-center text-3xl">AFTER MOVIE PKKMB SV UNS 2024</h1>
          <div
            class="shrink-0 mt-2.5 max-w-full h-1 bg-red-400 w-full sm:w-[630px]"
            aria-hidden="true"
          ></div>
          <p
            class="mt-3 text-base sm:text-lg md:text-xl text-center font-normal"
          >
            Saksikan momen-momen terbaik kalian selama PKKMB SV UNS 2024 dalam
            "After Movie" berikut ini!
          </p>
          <div class="image mt-3 mb-5 flex justify-center w-full">
            <iframe
              width="853"
              height="480"
              src="https://www.youtube.com/embed/ySsWXVGp7_o"
              title="After Movie PKKMB SV UNS 2024"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen
              class="rounded-3xl w-full max-w-4xl"
            ></iframe>
          </div>
        </section>
      </div>
    </div>
  </div>
</template>

<script>
import "../css/pages/_button.css";
import Swiper from "swiper";
import "swiper/swiper-bundle.css";
import { register } from "swiper/element/bundle";
register();

export default {
  name: "GaleriView",
  mounted() {
  console.log('Initializing Swiper...');
  const swiper = new Swiper('.swiper-container', {
    loop: true,
    direction: 'horizontal',
    slidesPerView: 1,
    spaceBetween: 10,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
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
        spaceBetween: 40,
      },
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
  console.log('Swiper initialized:', swiper);
}
};
</script>

<style scoped>
/* Custom styles if needed */
.swiper-button-next,
.swiper-button-prev {
  color: #000;
}
</style>
