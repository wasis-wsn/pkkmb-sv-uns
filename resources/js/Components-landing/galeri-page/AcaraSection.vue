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
                    bersama.
                </p>
            </div>
            <div class="container swiper my-3">
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
                            class="card flex flex-col bg-white border-2 rounded-3xl p-5 text-sm"
                        >
                            <div class="image-container">
                                <img
                                    :src="
                                        '/storage/galeri/' + slide.photo_dokum
                                    "
                                    :alt="slide.judul_dokum"
                                    class="w-full h-full object-cover rounded-3xl"
                                />
                            </div>
                            <header class="mt-7 font-bold">
                                PKKMB SV UNS 2024
                            </header>
                            <h2 class="text-2xl uppercase font-bold">
                                {{ slide.judul_dokum }}
                            </h2>
                            <p class="mt-5 text-base card-content">
                                {{ slide.deskripsi_dokum }}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Swiper Navigation Buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- Swiper Wrapper End -->
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import Swiper from "swiper";
import "swiper/swiper-bundle.css";
import { register } from "swiper/element/bundle";
register();

import AOS from "aos";
import "aos/dist/aos.css";

const slides = ref([]);

const fetchAcara = async () => {
    try {
        const response = await axios.get("/data-galeri");
        slides.value = response.data.data;
    } catch (error) {
        console.error("Failed to fetch data:", error);
    }
};

onMounted(() => {
    document.title = "PKKMB SV UNS - GALERI";
    AOS.init();
    fetchAcara();
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

/* Fixed height for cards with a scroll bar */
.card {
    display: flex;
    flex-direction: column;
    height: 600px; /* Set your desired fixed height */
}

/* Ensure the image container maintains aspect ratio and is responsive */
.image-container {
    flex-shrink: 0;
    height: 250px; /* Adjust this value as needed */
}

.card .card-content {
    flex-grow: 1;
    overflow-y: auto;
}
</style>
