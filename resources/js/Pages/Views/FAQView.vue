<template>
  <LayoutHeaderFooter>
    <div class="flex flex-col bg-white">
      <!-- Bagian FAQ -->
      <div class="bg-gray-100 py-10">
        <section class="flex flex-col items-center self-stretch px-16 pt-12 pb-6 w-full text-4xl capitalize bg-slate-100 text-neutral-900 max-md:px-5 max-md:mt-10 max-md:max-w-full">
          <div class="judul mb-3 text-center">
            <h1 class="text-3xl font-bold inline-block border-b-4 border-[#F67366]" data-aos="fade-down">
              Frequently Asked Questions (FAQ)
            </h1>
          </div>
        </section>

        <div class="faq-container px-16">
          <!-- FAQ Item -->
          <div v-for="(faq, index) in faqs" :key="index" class="faq-item mb-4">
            <button @click="toggleFaq(index)"
              class="w-full text-left p-4 bg-white rounded-lg shadow-md hover:shadow-lg focus:outline-none">
              <div class="flex justify-between items-center">
                <span class="font-semibold">{{ faq.pertanyaan }}</span>
                <svg v-if="faq.open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                  viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
                </svg>
                <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                  viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 9l-7 7-7-7" />
                </svg>
              </div>
            </button>
            <transition name="faq">
              <div v-if="faq.open" class="p-4 bg-gray-50 rounded-b-lg shadow-md">
                <p class="text-gray-700">{{ faq.jawaban }}</p>
              </div>
            </transition>
          </div>
        </div>
      </div>
    </div>
  </LayoutHeaderFooter>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import LayoutHeaderFooter from "@/Layouts/LayoutHeaderFooter.vue";

const faqs = ref([]);

const fetchFaqs = async () => {
  try {
    const response = await axios.get('/data-faqs'); // Endpoint untuk getAllFAQ
    faqs.value = response.data.data;
  } catch (error) {
    console.error('Error fetching FAQs:', error);
  }
};

const toggleFaq = (index) => {
  faqs.value[index].open = !faqs.value[index].open;
};

onMounted(() => {
  fetchFaqs();
});
</script>

<style scoped>
/* Transisi FAQ */
.faq-enter-active, .faq-leave-active {
  transition: max-height 0.5s ease, opacity 0.5s ease;
}

.faq-enter-from, .faq-leave-to {
  opacity: 0;
  max-height: 0;
  overflow: hidden;
}

.faq-enter-to, .faq-leave-from {
  opacity: 1;
  max-height: 500px; /* Bisa disesuaikan tergantung seberapa panjang jawaban FAQ */
}

.faq-item {
  border-radius: 12px;
  border: 1px solid #e2e8f0;
}
</style>
