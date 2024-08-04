<template>
    <div>
        <div v-if="afterMovie.length > 0">
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
        <div v-else class="text-center py-20">
            <h2 class="text-3xl font-bold text-gray-600">
                AFTER MOVIE COMING SOON...
            </h2>
        </div>
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
        afterMovie.value = response.data.data
            .filter(item => item.judul_youtube === "AFTER MOVIE PKKMB SV UNS 2024")
            .map(item => ({
                title: item.judul_youtube,
                videoSrc: getEmbedUrl(item.link_youtube),
            }))
            .filter(item => item.videoSrc); // Ensure videoSrc is not empty
    } catch (error) {
        console.error("Failed to fetch data:", error);
    }
};


const getEmbedUrl = (url) => {
    let videoId;
    const urlObj = new URL(url);
    
    if (urlObj.hostname === "www.youtube.com") {
        const params = new URLSearchParams(urlObj.search);
        videoId = params.get("v");
    } else if (urlObj.hostname === "youtu.be") {
        videoId = urlObj.pathname.split("/").pop();
    }
    
    if (!videoId) {
        console.error("Invalid YouTube URL:", url);
        return "";
    }
    
    return `https://www.youtube.com/embed/${videoId}`;
};


onMounted(() => {
    document.title = "PKKMB SV UNS - GALERI";
    AOS.init();
    fetchYoutube();
});
</script>
