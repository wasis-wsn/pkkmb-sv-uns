<template>
  <div class="background container swiper mt-5">
    <div class="swiper-wrapper flex mx-auto mb-5">
      <div
        class="swiper-slide slide"
        style="max-width: 200px; max-height: 200px; margin: 0 0px"
        v-for="(slides, index) in slides"
        :key="'slides' + index"
        data-aos="fade-up"
      >
        <img :src="slides.imgSrc" class="object-cover" />
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div>
</template>
<script setup>
import { onMounted, ref } from 'vue';
import AOS from 'aos';
import 'aos/dist/aos.css';
import Swiper from 'swiper';
import 'swiper/swiper-bundle.css';
import hima_sv from '../../../assets/logo_hima/hima_sv.png';
import himakesja from '../../../assets/logo_hima/himakesja.png';
import himama from '../../../assets/logo_hima/himama.png';
import emailkom from '../../../assets/logo_hima/emailkom.png';
import himapsdku from '../../../assets/logo_hima/himapsdku.png';
import himafarma from '../../../assets/logo_hima/himafarma.png';
import hmps from '../../../assets/logo_hima/hmps.png';
import himavida from '../../../assets/logo_hima/himavida.png';
import HMB from '../../../assets/logo_hima/HMB.png';
import himaagrib from '../../../assets/logo_hima/himaagrib.png';
import himapertanian from '../../../assets/logo_hima/himapertanian.png';
import himamanajemen from '../../../assets/logo_hima/himamanajemen.png';
import formadasi from '../../../assets/logo_hima/formadasi.png';
import fondasi from '../../../assets/logo_hima/fondasi.png';
import himaakuntansi from '../../../assets/logo_hima/himaakuntansi.png';
import chinese from '../../../assets/logo_hima/chinese.png';
import himaupw from '../../../assets/logo_hima/himaupw.png';

const slides = ref([
  { imgSrc: hima_sv },
  { imgSrc: himakesja },
  { imgSrc: himama },
  { imgSrc: emailkom },
  { imgSrc: himapsdku },
  { imgSrc: himafarma },
  { imgSrc: hmps },
  { imgSrc: himavida },
  { imgSrc: HMB },
  { imgSrc: himaagrib },
  { imgSrc: himapertanian },
  { imgSrc: himamanajemen },
  { imgSrc: formadasi },
  { imgSrc: fondasi },
  { imgSrc: himaakuntansi },
  { imgSrc: chinese },
  { imgSrc: himaupw },
]);

onMounted(() => {
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
