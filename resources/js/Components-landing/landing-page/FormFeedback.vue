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
                placeholder="Berikan feedback Anda" 
                rows="6" 
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

const submitFeedback = async () => {
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
