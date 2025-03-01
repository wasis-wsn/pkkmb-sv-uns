<template>
    <div>
        <!-- MATERI BERIKUTNYA -->
        <div v-if="filteredMateri.length">
            <div v-for="item in filteredMateri" :key="item.id">
                <section class="flex gap-5 self-center mt-[100px] max-md:flex-wrap max-sm:flex-wrap max-md:mt-10">
                    <div class="flex flex-col grow shrink-0 self-start px-5 text-center basis-0 w-fit max-md:max-w-full">
                        <h2 data-aos="fade-up"
                            class="flex flex-col self-center max-w-full text-3xl font-bold capitalize text-neutral-900 w-[300px] max-md:w-full">
                            <span class="max-md:max-w-full">
                                {{ item.judul_materi }}<br />PKKMB SV UNS 2024
                            </span>
                            <div class="shrink-0 mt-2.5 h-1 bg-red-400 max-md:max-w-full"></div>
                        </h2>
                        <div class="justify-center items-center text-center mt-2 z-20 text-2xl text-stone-900 max-md:max-w-[100%] md:max-w-[100%] max-md:text-xl text-[18px] md:text-[24px]">
                            <p v-for="(paragraph, index) in splitParagraphs(item.deskripsi_materi)" :key="index"
                                data-aos="fade-up">
                                {{ paragraph }}
                            </p>
                        </div>
                    </div>
                </section>
                <!-- ISI MATERI -->
                <section
                    class="relative flex justify-center items-center -mt-[100px] pb-32 w-full text-2xl font-bold text-black bg-white">
                    <div
                        class="relative z-20 flex justify-center mt-[150px] md:mt-44 px-8 pt-10 md:pt-20 mb-0 w-full bg-slate-100 max-w-[90%] sm:max-w-[80%] md:max-w-[70%] lg:max-w-[1160px] pb-10 rounded-[60px] md:px-20 md:pb-[100px]">
                        <div class="w-full max-md:px-5 top-[50px]">
                            <div data-aos="fade-up" class="text-[16px] md:text-[20px]">
                                <ol class="list-decimal list-outside pl-5 space-y-4">
                                    <h3 v-for="(paragraph, index) in splitParagraphs(item.isi_materi)" :key="index"
                                        class="formatted-text-materi text-justify">
                                        {{ paragraph }}
                                    </h3>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <img loading="lazy" src="@assets/Materi/twibbon.png" alt="Decorative gradient"
                        class="absolute left-0 right-0 z-10 w-full max-w-full max-h-full bottom-[70px] lg:bottom-[-100px] md:bottom-[20px]" />
                </section>
            </div>
        </div>
        <div v-else class="text-center py-20">
            <h2 class="text-3xl font-bold text-gray-600">
                MATERI COMING SOON...
            </h2>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeMount } from 'vue';
import axios from 'axios';
import AOS from "aos";
import 'aos/dist/aos.css';

// Import components
import NavbarView from '@/Components-landing/NavbarView.vue';
import FooterView from '@/Components-landing/FooterView.vue';
import ChatView from '@/Components-landing/ChatView.vue';
import { ChevronDoubleUpIcon, ChatBubbleLeftRightIcon } from '@heroicons/vue/24/solid';

// Component registration
const components = {
    NavbarView,
    FooterView,
    ChevronDoubleUpIcon,
    ChatBubbleLeftRightIcon,
    ChatView
};

// Reactive properties
const filteredMateri = ref([]);

// Fetch materi data
const getMateri = async () => {
    try {
        const response = await axios.get('/data-materi');
        console.log('Materi data:', response.data.data); // Debugging line
        if (response.data.data.length > 0) {
            filteredMateri.value = response.data.data.slice(1); // Sisanya
        }
    } catch (error) {
        console.error('Error fetching materi:', error);
    }
    console.log('filteredMateri:', filteredMateri.value); // Debugging line
};

// Split paragraphs by new line
const splitParagraphs = (text) => {
    if (text) {
        return text.split('\n');
    }
    return [];
};

// Lifecycle hook
onMounted(() => {
    getMateri();
});

onBeforeMount(() => {
    AOS.init();
    document.title = "PKKMB SV UNS - MATERI";
});
</script>

<style scoped>
.formatted-text {
    display: block;
    margin-bottom: 10px;
    padding-left: 15px;
    text-indent: -30px;
}

.formatted-text-materi {
    /* display: block; */
    margin-bottom: 10px;
    padding-left: 0px;
    text-indent: -25px;
}
</style>
