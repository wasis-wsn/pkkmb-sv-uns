<template>
  <div class="flex justify-center items-center">
    <section
      v-for="(movie, index) in comingSoon"
      :key="'comingSoon' + index"
      data-aos="fade-up"
      class="flex justify-center flex-col items-center font-bold text-center leading-[150%] max-w-[900px] pb-10 pl-5 pr-5"
    >
      <h1
        class="text-6xl text-red-400 capitalize max-md:max-w-full max-md:text-4xl"
        data-aos="fade-up"
      >
        Askara Muda 2024!
      </h1>
      <p
        class="self-stretch mt-5 w-full text-3xl text-zinc-800 max-md:mt-10 max-md:max-w-full"
        data-aos="fade-up"
      >
        "Cipta Generasi, Kembangkan Potensi, Laksana Gentari"
      </p>
      <div class="video-container mt-5">
        <iframe
          loading="lazy"
          alt="Coming Soon PKKMB SV UNS 2024"
          class="rounded-3xl w-full max-w-4xl"
          :src="movie.videoSrc"
          title="YouTube video player"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen
        ></iframe>
      </div>
    </section>
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

<style scoped>
.video-container {
  position: relative;
  width: 100%;
  padding-top: 56.25%;
  overflow: hidden;
}

.video-container iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>
