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
        {{ movie.title }}
      </h1>
      <p
        class="self-stretch mt-9 w-full text-3xl text-zinc-800 max-md:mt-10 max-md:max-w-full"
        data-aos="fade-up"
      >
        "{{ movie.deskripsi }}"
      </p>
      <div class="video-container">
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
<script>
import AOS from "aos";
import "aos/dist/aos.css";

export default {
  name: "VidioSection",
  data() {
    return {
      comingSoon: [
        {
          title: "Askara Muda 2024!",
          deskripsi: "Jiwa Berkarakter, Kreativitas Tanpa Batas, Inovasi Mendunia",
          videoSrc: "https://www.youtube.com/embed/ySsWXVGp7_o?si=X1SEIQDeQYOS4lZN",
        },
      ],
    };
  },
  mounted() {
    document.title = "PKKMB SV UNS";
    AOS.init();
  },
};
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
