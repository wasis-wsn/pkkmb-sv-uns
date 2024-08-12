<template>
  <div class="grid-container">
    <div
      v-if="sponsors.length"
      class="image-container flex justify-center items-center w-1/2 md:w-1/4"
      v-for="(sponsor, index) in sponsors"
      :key="'sponsor' + index"
      data-aos="fade-up"
    >
      <img :src="'/storage/sponsor/' + sponsor.logo_sponsor" />
    </div>
    <div v-else class="coming-soon-container flex justify-center items-center">
      <h2 class="text-3xl font-bold text-gray-600">
        SPONSOR COMING SOON...
      </h2>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";
import AOS from "aos";
import "aos/dist/aos.css";

const sponsors = ref([]);

const fetchSponsor = async () => {
    try {
        const response = await axios.get("/data-sponsor");
        sponsors.value = response.data.data;
    } catch (error) {
        console.error("Failed to fetch data:", error);
    }
};  

onMounted(() => {
  fetchSponsor();
  document.title = "PKKMB SV UNS";
  AOS.init();
});
</script>

<style scoped>

.grid-container {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0;
  padding: 0;
  min-height: 200px; /* Atur tinggi minimum */
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

.coming-soon-container {
  grid-column: span 4; /* Agar teks Coming Soon mencakup seluruh grid */
  height: 100%; /* Sesuaikan tinggi kontainer */
}

@media (max-width: 700px) {
  .grid-container {
    grid-template-columns: repeat(2, 1fr);
  }

  .image-container img {
    max-width: 70%;
  }

  .coming-soon-container {
    grid-column: span 2; /* Sesuaikan dengan kolom pada layar kecil */
  }
}
</style>
