<template>
  <div ref="wordCloudCanvas" class="wordcloud-canvas"></div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import WordCloud from 'wordcloud';

const colors = ['#b4cc52', '#e96f7f', '#4d4d4d', '#ce1a38', '#e1d37f'];

const props = defineProps({
  words: {
    type: Array,
    required: true,
  },
});

const wordCloudCanvas = ref(null);

onMounted(() => {
  WordCloud(wordCloudCanvas.value, {
    list: props.words.map(word => [word.text, Math.random() * (word.size - 10) + 10]), // Random font size between 10 and word.size
    gridSize: 8,
    weightFactor: (size) => size * 1.5, // Adjust size scaling
    color: () => colors[Math.floor(Math.random() * colors.length)], // Random color from the list
    backgroundColor: 'transparent', // Transparent background for the word cloud
    rotateRatio: 0.5, // Optional: Rotates text to improve appearance
    fontFamily: 'Impact', // Use Impact font
    fontWeight: 'bold', // Use bold font weight
  });
});
</script>

<style>
.wordcloud-canvas {
  position: relative;
  width: 100%;
  height: 400px; /* Atur tinggi sesuai kebutuhan */
  border-radius: 50%; /* Jika ingin bentuk bulat atau oval */
  background-color: #D3D3D3; /* Background warna jika diinginkan */
}

/* Responsive adjustments */
@media (max-width: 1024px) {
  .wordcloud-canvas {
    width: 100%; /* Sesuaikan tinggi untuk tampilan lebih kecil */
  }
}

@media (max-width: 768px) {
  .wordcloud-canvas {
    width: 100%;; /* Sesuaikan tinggi untuk tampilan lebih kecil */
  }
}

@media (max-width: 375px) {
  .wordcloud-canvas {
    width: 100%; /* Sesuaikan tinggi untuk tampilan lebih kecil */
  }
}
</style>
