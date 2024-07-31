<template>
  <div class="background container swiper mt-5">
    <div class="swiper-wrapper flex mx-auto mb-5">
      <div
        class="swiper-slide slide"
        style="max-width: 200px; max-height: 200px; margin: 0 0px"
        v-for="(slide, index) in slides"
        :key="'slide-' + index"
        data-aos="fade-up"
      >
        <img :src="'/storage/hima/' + slide.logo_hima" class="object-cover" />
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div>
</template>
<script setup>
import { onMounted, ref } from 'vue';
import axios from "axios";
import AOS from 'aos';
import 'aos/dist/aos.css';
import Swiper from 'swiper';
import 'swiper/swiper-bundle.css';
import { register } from "swiper/element/bundle";
register();

const slides = ref([]);

const fetchHima = async () => {
    try {
        const response = await axios.get("/data-hima");
        slides.value = response.data.data;
    } catch (error) {
        console.error("Failed to fetch data:", error);
    }
};  

onMounted(() => {
  fetchHima();
  document.title = 'PKKMB SV UNS';
  AOS.init();
  new Swiper('.swiper-container', {
    loop: true,
    slidesPerView: 10,
    spaceBetween: 5,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    autoplay: {
      delay: 1000,
      disableOnInteraction: false,
    },
    breakpoints: {
      300: {
        slidesPerView: 2,
        spaceBetween: 10,
      },
      480: {
        slidesPerView: 4,
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 5,
        spaceBetween: 10,
      },
      1024: {
        slidesPerView: 6,
        spaceBetween: 10,
      },
      1280: {
        slidesPerView: 7,
        spaceBetween: 10,
      },
    },
  });
});
</script>
<style scoped>
.swiper-button-next,
.swiper-button-prev {
  position: absolute;
  top: 50%;
  width: 27px;
  height: 44px;
  margin-top: -22px;
  z-index: 10;
  cursor: pointer;
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
  border-radius: 0 10px 10px 0;
  text-align: center;
  line-height: 44px;
}

.swiper-button-next {
  right: 0;
  border-radius: 10px 0 0 10px;
}

.swiper-button-prev {
  left: 0;
  border-radius: 10px 0 0 10px;
}

.background {
  background-color: #89a4f1;
}

.swiper-wrapper {
  display: flex;
  gap: 10px;
  margin-bottom: 5px;
}

.swiper-slide {
  max-width: 200px;
  max-height: 200px;
  margin: 0 5px;
}

.swiper-slide img {
  width: 50%;
  height: auto;
  object-fit: contain;
}
</style>
