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
                    Hallo Vocazens!, Bagian ini khusus berisi highlight
                    foto-foto dari setiap acara yang diadakan, menampilkan
                    berbagai kegiatan penting dan menarik yang telah kita jalani
                    bersama. Dari sesi pembukaan yang megah dan penuh semangat,
                    hingga kuliah umum yang inspiratif dan memberikan wawasan
                    baru. Tidak hanya itu, berbagai pelatihan keterampilan yang
                    bermanfaat dan kegiatan sosial yang menyenangkan juga
                    diabadikan dalam potret-potret indah.
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
                        <div
                            class="bg-white border-2 rounded-3xl p-5 pt-5 pb-20 text-sm"
                        >
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

<script setup>
import { ref, onMounted } from "vue";
import Swiper from "swiper";
import "swiper/swiper-bundle.css";
import { register } from "swiper/element/bundle";
register();

import AOS from "aos";
import "aos/dist/aos.css";

const slides = ref([
  {
    imgSrc: new URL("@assets/galeri/acara-1.png", import.meta.url).href,
    alt: "PKKMB SV UNS 2024 Seminar",
    judul: "PKKMB SV UNS 2024",
    judulAcara: "Seminar Inspiratif",
    deskripsi: "Mendengarkan paparan dari tokoh-tokoh inspiratif yang berbagi pengalaman dan pengetahuan mereka.",
  },
  {
    imgSrc: new URL("@assets/galeri/acara-1.png", import.meta.url).href,
    alt: "PKKMB SV UNS 2024 Seminar",
    judul: "PKKMB SV UNS 2024",
    judulAcara: "Seminar Inspiratif",
    deskripsi: "Mendengarkan paparan dari tokoh-tokoh inspiratif yang berbagi pengalaman dan pengetahuan mereka.",
  },
  {
    imgSrc: new URL("@assets/galeri/acara-1.png", import.meta.url).href,
    alt: "PKKMB SV UNS 2024 Seminar",
    judul: "PKKMB SV UNS 2024",
    judulAcara: "Seminar Inspiratif",
    deskripsi: "Mendengarkan paparan dari tokoh-tokoh inspiratif yang berbagi pengalaman dan pengetahuan mereka.",
  },
  {
    imgSrc: new URL("@assets/galeri/acara-1.png", import.meta.url).href,
    alt: "PKKMB SV UNS 2024 Seminar",
    judul: "PKKMB SV UNS 2024",
    judulAcara: "Seminar Inspiratif",
    deskripsi: "Mendengarkan paparan dari tokoh-tokoh inspiratif yang berbagi pengalaman dan pengetahuan mereka.",
  },
  {
    imgSrc: new URL("@assets/galeri/acara-1.png", import.meta.url).href,
    alt: "PKKMB SV UNS 2024 Seminar",
    judul: "PKKMB SV UNS 2024",
    judulAcara: "Seminar Inspiratif",
    deskripsi: "Mendengarkan paparan dari tokoh-tokoh inspiratif yang berbagi pengalaman dan pengetahuan mereka.",
  },
  {
    imgSrc: new URL("@assets/galeri/acara-1.png", import.meta.url).href,
    alt: "PKKMB SV UNS 2024 Seminar",
    judul: "PKKMB SV UNS 2024",
    judulAcara: "Seminar Inspiratif",
    deskripsi: "Mendengarkan paparan dari tokoh-tokoh inspiratif yang berbagi pengalaman dan pengetahuan mereka.",
  },
  // Add more slides here...
]);

onMounted(() => {
  document.title = "PKKMB SV UNS - GALERI";
  AOS.init();
  new Swiper(".swiper", {
    loop: true,
    direction: "horizontal",
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
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
});
</script>

<style scoped>
/* Custom styles if needed */
.swiper-button-next,
.swiper-button-prev {
    color: #000;
}
</style>
