<template>
  <div>
    <div v-if="wordCloudData.length">
      <WordCloudSection :words="wordCloudData" />
    </div>
    <div class="p-10">
      <div class="flex justify-center">
        <div class="bg-gray-300 p-8 rounded-lg shadow-md w-full">
          <form @submit.prevent="submitFeedback">
            <div class="flex justify-center mb-4">
              <textarea 
                v-model="feedback" 
                @input="handleInput" 
                placeholder="Satu kata untuk PKKMB SV UNS 2024" 
                rows="1" 
                class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
              ></textarea>
            </div>
            <div class="flex justify-center">
              <button class="button-biru rounded-full h-10 w-24" type="submit">Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import WordCloudSection from './WordCloudSection.vue';

const feedback = ref('');
const wordCloudData = ref([]);

const validateSingleWord = (input) => {
  // Check if input is a single word and has no spaces
  const trimmed = input.trim();
  return trimmed.length > 0 && !/\s/.test(trimmed);
};

const handleInput = (event) => {
  const input = event.target.value;
  // Remove all spaces from input
  feedback.value = input.replace(/\s+/g, '');
};

const submitFeedback = async () => {
  if (!validateSingleWord(feedback.value)) {
    alert('Harap masukkan hanya satu kata tanpa spasi.');
    return;
  }

  try {
    await axios.post('/api/feedback', { feedback: feedback.value });
    feedback.value = '';
    await fetchWordCloudData();  // Fetch new data after submission
  } catch (error) {
    console.error('Error submitting feedback:', error);
  }
};

const fetchWordCloudData = async () => {
  try {
    const response = await axios.get('/api/feedback/words');
    wordCloudData.value = response.data.words;
  } catch (error) {
    console.error('Error fetching word cloud data:', error);
  }
};

onMounted(() => {
  fetchWordCloudData();
});
</script>
