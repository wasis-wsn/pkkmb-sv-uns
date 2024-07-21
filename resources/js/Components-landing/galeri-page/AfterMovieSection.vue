<template>
    <div>
        <section
            v-for="(movie, index) in afterMovie"
            :key="'afterMovie-' + index"
            class="flex flex-col items-center px-5 py-5 font-bold capitalize text-neutral-900"
            data-aos="fade-up"
        >
            <h1 class="text-center text-3xl" data-aos="fade-up">
                {{ movie.title }}
            </h1>
            <div
                class="shrink-0 mt-2.5 max-w-full h-1 bg-red-400 w-full sm:w-[630px]"
                aria-hidden="true"
            ></div>
            <p
                class="mt-3 text-base sm:text-lg md:text-xl text-center font-normal"
                data-aos="fade-up"
            >
                Saksikan momen-momen terbaik kalian selama PKKMB SV UNS 2024
                dalam "After Movie" berikut ini!
            </p>
            <div
                class="video-container mt-1 w-full sm:w-3/4 md:w-3/4 xl:w-3/4 lg:w-3/4"
                data-aos="fade-up"
            >
                <div
                    class="relative overflow-hidden"
                    style="padding-top: 56.25%"
                >
                    <iframe
                        class="absolute top-0 left-0 w-full h-full rounded-3xl"
                        :src="movie.videoSrc"
                        title="After Movie PKKMB SV UNS 2024"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import AOS from "aos";
import "aos/dist/aos.css";
import axios from "axios";

const afterMovie = ref([]);

const fetchYoutube = async () => {
    try {
        const response = await axios.get("/data-youtube");
        afterMovie.value = response.data.data.map((item) => ({
            title: item.judul_youtube,
            videoSrc: getEmbedUrl(item.link_youtube),
        }));
    } catch (error) {
        console.error("Failed to fetch data:", error);
    }
};

const getEmbedUrl = (url) => {
    let videoId;
    if (url.includes("youtube.com")) {
        videoId = url.split("v=")[1];
        const ampersandPosition = videoId.indexOf("&");
        if (ampersandPosition !== -1) {
            videoId = videoId.substring(0, ampersandPosition);
        }
    } else if (url.includes("youtu.be")) {
        videoId = url.split("/").pop().split("?")[0];
    }
    return `https://www.youtube.com/embed/${videoId}`;
};

onMounted(() => {
    document.title = "PKKMB SV UNS - GALERI";
    AOS.init();
    fetchYoutube();
});
</script>
