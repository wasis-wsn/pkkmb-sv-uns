<template>
  <div v-if="comingSoon.length > 0">
    <section
        v-for="(movie, index) in comingSoon"
        :key="'coming-' + index"
        class="flex flex-col items-center px-5 py-5 font-bold capitalize text-neutral-900"
        data-aos="fade-up"
    >
        <h1
        class="text-6xl text-red-400 capitalize max-md:max-w-full max-md:text-4xl"
        data-aos="fade-up"
      >
        Askara Muda 2024!
      </h1>
      <p
        class="self-stretch mt-5 w-full text-3xl text-zinc-800 max-md:mt-10 max-md:max-w-full text-center"
        data-aos="fade-up"
      >
        "Cipta Generasi, Kembangkan Potensi, Laksana Gentari"
      </p>
        <div
      class="video-container mt-5 w-full sm:w-2/3 md:w-2/3 xl:w-2/3 lg:w-2/3"
      data-aos="fade-up"
        >
      <div
    class="relative overflow-hidden"
    style="padding-top: 56.25%"
      >
    <iframe
        class="absolute top-0 left-0 w-full h-full rounded-3xl"
        :src="movie.videoSrc"
        title="Teaser PKKMB SV UNS 2024"
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
        TEASER COMING SOON...
    </h2>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import AOS from 'aos';
import 'aos/dist/aos.css';
import axios from "axios";

const comingSoon = ref([]);

const fetchYoutube = async () => {
    try {
        const response = await axios.get("/data-youtube");
        // Ambil data pertama jika ada
        const data = response.data.data;

        // Pastikan data pertama ada sebelum diakses
        if (data.length > 0) {
            const firstItem = data[0];
            comingSoon.value = [{
                title: firstItem.judul_youtube,
                videoSrc: getEmbedUrl(firstItem.link_youtube),
            }];
        } else {
          comingSoon.value = []; // Jika tidak ada data, kosongkan
        }
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
    document.title = "PKKMB SV UNS";
    AOS.init();
    fetchYoutube();
});
</script>
