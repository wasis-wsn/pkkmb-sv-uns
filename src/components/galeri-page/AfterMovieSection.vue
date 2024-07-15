<template>
  <!-- After Movie -->
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
      {{ movie.deskripsi }}
    </p>
    <div class="image mt-3 flex justify-center w-full" data-aos="fade-up">
      <iframe
        width="853"
        height="480"
        :src="movie.videoSrc"
        title="After Movie PKKMB SV UNS 2024"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen
        class="rounded-3xl w-full max-w-4xl"
      ></iframe>
    </div>
  </section>
</template>

<script>
import AOS from "aos";
import "aos/dist/aos.css";

export default {
  name: "GaleriView",
  data() {
    return {
      afterMovie: [
        {
          title: "AFTER MOVIE PKKMB SV UNS 2024",
          deskripsi:
            'Saksikan momen-momen terbaik kalian selama PKKMB SV UNS 2024 dalam "After Movie" berikut ini!',
          videoSrc:
            "https://www.youtube.com/embed/CoTPJXtsH3E?si=YFeI5igbxu-j6b3a",
        },
      ],
    };
  },
  mounted() {
    document.title = "PKKMB SV UNS - GALERI";
    AOS.init();
  },
};
</script>
