<template>
  <div class="grid-container">
    <div
      class="image-container flex justify-center items-center w-1/2 md:w-1/4"
      v-for="(sponsor, index) in sponsor"
      :key="'sponsor' + index"
      data-aos="fade-up"
    >
      <img :src="sponsor.imgSrc" :alt="sponsor.alt" />
    </div>
  </div>
</template>

<script>
import AOS from "aos";
import "aos/dist/aos.css";
import telkom from "@assets/telkom.png";
import bca from "@assets/bca.png";
import mandiri from "@assets/mandiri.png";
import bri from "@assets/bri.png";

export default {
  name: "SponsorSection",
  data() {
    return {
      sponsor: [
        { imgSrc: telkom, alt: "Telkom" },
        { imgSrc: bca, alt: "BCA" },
        { imgSrc: mandiri, alt: "Mandiri" },
        { imgSrc: bri, alt: "BRI" },
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
.grid-container {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0;
  padding: 0;
}

.image-container {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  gap: 50px;
  margin-top: 20px;
  width: 100%;
  background-color: #89a4f1;
  padding: 20px;
  box-sizing: border-box;
}

.image-container img {
  max-width: 100%;
  height: auto;
}

@media (max-width: 700px) {
  .grid-container {
    grid-template-columns: repeat(2, 1fr);
  }

  .image-container img {
    max-width: 70%;
  }
}
</style>
