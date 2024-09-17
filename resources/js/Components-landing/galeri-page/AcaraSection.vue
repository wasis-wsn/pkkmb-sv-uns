<template>
    <section class="acara" id="acara">
        <div class="container mx-auto p-4">
            <div v-if="slides.length > 0">
                <div class="judul mb-3 text-center">
                    <h1
                        class="text-3xl font-bold inline-block border-b-4 border-[#F67366]"
                        data-aos="fade-up"
                    >
                        DOKUMENTASI ACARA
                    </h1>
                    <p class="text-lg mt-4" data-aos="fade-up">
                        Hallo Askara Muda!, Bagian ini khusus berisi highlight
                        foto-foto dari setiap acara yang diadakan, menampilkan
                        berbagai kegiatan penting dan menarik yang telah kita
                        jalani bersama.
                    </p>
                </div>
                <div
                    class="container swiper my-3"
                    :class="{ 'single-slide': slides.length === 1 }"
                >
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
                                class="card flex flex-col bg-white border-2 rounded-3xl p-5 text-sm mx-auto"
                                :style="{
                                    height: cardHeight,
                                    width: cardWidth,
                                }"
                            >
                                <div class="image-container">
                                    <img
                                        :src="
                                            '/storage/galeri/' +
                                            slide.photo_dokum
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
            <div v-else class="text-center py-20">
                <h2 class="text-3xl font-bold text-gray-600">
                    DOKUMENTASI ACARA COMING SOON...
                </h2>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted, computed } from "vue";
import axios from "axios";
import Swiper from "swiper";
import "swiper/swiper-bundle.css";
import { register } from "swiper/element/bundle";
register();

import AOS from "aos";
import "aos/dist/aos.css";

const slides = ref([]);
const windowWidth = ref(window.innerWidth);

const cardHeight = computed(() => {
    if (windowWidth.value < 640) {
        // Mobile
        return "600px";
    } else {
        // Desktop
        if (slides.value.length <= 2) {
            return "800px"; // Taller cards for 1-2 slides on desktop
        } else {
            return "600px"; // Original height for 3+ slides
        }
    }
});

const cardWidth = computed(() => {
    if (windowWidth.value >= 1024 && slides.value.length === 1) {
        return "50%"; // 50% width for single slide on desktop
    }
    return "100%"; // Full width for other cases
});

const fetchAcara = async () => {
    try {
        const response = await axios.get("/data-galeri");
        slides.value = response.data.data;
    } catch (error) {
        console.error("Failed to fetch data:", error);
    }
};

const updateWindowWidth = () => {
    windowWidth.value = window.innerWidth;
};

onMounted(() => {
    document.title = "PKKMB SV UNS - GALERI";
    AOS.init();
    window.addEventListener("resize", updateWindowWidth);

    fetchAcara().then(() => {
        if (slides.value.length > 0) {
            new Swiper(".swiper", {
                loop: slides.value.length > 4,
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
                        slidesPerView: Math.min(2, slides.value.length),
                        spaceBetween: 30,
                    },
                    1024: {
                        slidesPerView: Math.min(3, slides.value.length),
                        spaceBetween: 40,
                    },
                    1280: {
                        slidesPerView: Math.min(4, slides.value.length),
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
        }
    });
});

onUnmounted(() => {
    window.removeEventListener("resize", updateWindowWidth);
});
</script>

<style scoped>
.swiper-button-next,
.swiper-button-prev {
    color: #000;
}

.card {
    display: flex;
    flex-direction: column;
}

.image-container {
    flex-shrink: 0;
    height: 50%; /* Adjust this value as needed */
}

.card .card-content {
    flex-grow: 1;
    overflow-y: auto;
}

.single-slide {
    display: flex;
    justify-content: center;
}
</style>
