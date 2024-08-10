<template>
    <LayoutHeaderFooter>

        <header class="flex gap-5 max-md:flex-col max-md:gap-0">
            <section data-aos="fade-right"
                class="flex flex-col flex-1 items-start pb-32 mt-16 ml-2 rounded-full border border-solid border-violet-300 border-opacity-50 max-md:max-w-full">
                <div data-aos="fade-right" data-aos-delay="100"
                    class="shrink-0 mt-20 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[180px] max-md:mt-10">
                </div>
                <div data-aos="fade-right" data-aos-delay="200"
                    class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[120px] max-md:mt-10"></div>
                <div data-aos="fade-right" data-aos-delay="300"
                    class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[190px]"></div>
                <div data-aos="fade-right" data-aos-delay="400"
                    class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[150px]"></div>
                <div data-aos="fade-right" data-aos-delay="500"
                    class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[200px]"></div>
                <div class="self-end mt-1 mb-0 max-md:max-w-full">
                    <h1 data-aos="fade-right" data-aos-delay="600"
                        class="self-stretch pl-8 mt-5 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-10 max-md:max-w-full">
                        <span class="font-semibold">MATERI</span></h1>
                    <h1 data-aos="fade-right" data-aos-delay="700"
                        class="self-stretch pl-8 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-0 max-md:max-w-full">
                        <span class="text-5xl text-red-400">PKKMB SV UNS 2024</span>.
                    </h1>
                </div>
            </section>
            <section data-aos="fade-up" class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
                <img loading="lazy" src="@assets/logo_besar.png" alt=""
                    class="box-border object-cover overflow-hidden shrink-0 mt-0 w-full aspect-[0.99] min-h-[20px] min-w-[20px]" />
            </section>
        </header>
        <div class="flex flex-col bg-white">
            <div class="flex gap-5 self-end px-5 mt-0 max-md:mt-10">
                <div data-aos="fade-up" data-aos-delay="100"
                    class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"></div>
                <div data-aos="fade-up" data-aos-delay="200"
                    class="shrink-0 self-end mt-16 bg-red-300 bg-opacity-20 h-[130px] rounded-[100px] w-[5px] max-md:mt-10">
                </div>
                <div data-aos="fade-up" data-aos-delay="300"
                    class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"></div>
                <div data-aos="fade-up" data-aos-delay="400"
                    class="shrink-0 self-end mt-12 bg-red-300 bg-opacity-20 h-[150px] rounded-[100px] w-[5px] max-md:mt-10">
                </div>
                <div data-aos="fade-up" data-aos-delay="500"
                    class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"></div>
            </div>
        </div>
        <!-- Buku Panduan -->
        <div>
            <section v-if="bukuPanduan && bukuPanduan.link_drive" class="flex gap-5 self-center mt-[45px] max-md:flex-wrap max-md:mt-10" data-aos="fade-up">
                <div class="flex flex-col grow shrink-0 self-start px-5 text-center basis-0 w-fit max-md:max-w-full">
                    <h2
                        class="flex flex-col self-center max-w-full text-3xl font-bold capitalize text-neutral-900 w-[340px] max-md:w-full">
                        <span class="max-md:max-w-full">
                            Buku Panduan Umum<br />PKKMB SV UNS 2024
                        </span>
                        <div class="shrink-0 mt-2.5 h-1 bg-red-400 max-md:max-w-full"></div>
                    </h2>
                    <div class="justify-center items-center text-center">
                        <p data-aos="fade-up"
                            class="z-20 text-stone-900 text-[18px] md:text-[24px] max-md:max-w-[100%] md:max-w-[100%]">
                            Hallo Vocazens! Ini adalah <br />
                            Buku Panduan Umum PKKMB SV<br />
                            yang digunakan sebagai panduan umum tentang PKKMB SV
                        </p>
                    </div>
                </div>
            </section>
            <div v-if="bukuPanduan && bukuPanduan.link_drive">
            <section 
                class="flex gap-5 self-center mt-[50px] max-md:flex-wrap max-sm:flex-wrap max-md:mt-10"
                data-aos="fade-up">
                <div class="flex flex-col grow shrink-0 self-start px-5 text-center basis-0 w-fit max-md:max-w-full">
                    <div class="text-center">
                        <p class="text-2xl font-bold mb-4 text-[24px] md:text-[30px]">Download Panduan</p>
                        <button
                            class="button-biru justify-center items-center font-bold px-10 pt-1.5 pb-2 text-white whitespace-nowrap rounded-[15px] max-md:px-5">
                            <a class="text-[20px]" :href="bukuPanduan.link_drive" target="_blank">
                                Disini!
                            </a>
                        </button>
                    </div>
                </div>
            </section>
            <img loading="lazy" src="@assets/Materi/twibbon.png" alt="Decorative gradient"
                class=" mt-[-50px] left-0 z-0 w-full h-auto max-w-full max-h-full" />
        </div>
            <div v-else class="text-center py-20">
                <h2 class="text-3xl font-bold text-gray-600">
                    BUKU PANDUAN COMING SOON...
                </h2>
            </div>
        </div>

        <BukuImplementasiView />
        <MateriSectionView />
        <!-- DOWNLOAD Materi-->
        <div class="flex flex-row justify-center">
        <section v-if="linkMateri && linkMateri.link_drive"
            class="flex basis-1/2 gap-5 self-center mt-[100px] mb-[150px] max-md:flex-wrap max-sm:flex-wrap max-md:mt-10"
            data-aos="fade-up">
            <div class="flex flex-col grow shrink-0 self-start px-5 text-center basis-0 w-fit max-md:max-w-full">
                <div class="text-center">
                    <p class="text-2xl font-bold mb-4 text-[24px] md:text-[30px]">Download Penugasan</p>
                    <button
                        class="button-biru justify-center items-center font-bold px-10 pt-1.5 pb-2 text-white whitespace-nowrap rounded-[15px] max-md:px-5">
                        <a class="text-[20px]" :href="linkMateri.link_drive" target="_blank">
                            Disini!
                        </a>
                    </button>
                </div>
            </div>
        </section>
        <section v-else class="text-center py-20">
            <h2 class="text-3xl font-bold text-gray-600">
                DOWNLOAD MATERI COMING SOON...
            </h2>
        </section>
        <!-- PENUGASAN SUSULAN -->
        <section v-if="penugasanSusulan && penugasanSusulan.link_drive"
            class="flex basis-1/2 gap-5 self-center mt-[100px] mb-[150px] max-md:flex-wrap max-sm:flex-wrap max-md:mt-10"
            data-aos="fade-up">
            <div class="flex flex-col grow shrink-0 self-start px-5 text-center basis-0 w-fit max-md:max-w-full">
                <div class="text-center">
                    <p class="text-2xl font-bold mb-4 text-[24px] md:text-[30px]">Download Penugasan Susulan</p>
                    <button
                        class="button-biru justify-center items-center font-bold px-10 pt-1.5 pb-2 text-white whitespace-nowrap rounded-[15px] max-md:px-5">
                        <a class="text-[20px]" :href="penugasanSusulan.link_drive" target="_blank">
                            Disini!
                        </a>
                    </button>
                </div>
            </div>
        </section>
        <section v-else class="text-center py-20">
            <h2 class="text-3xl font-bold text-gray-600">
                DOWNLOAD MATERI COMING SOON...
            </h2>
        </section>
    </div>
    </LayoutHeaderFooter>
</template>

<script setup>
    import { ref, onMounted } from 'vue';
    import axios from 'axios';
    import "aos/dist/aos.css";
    import MateriSectionView from "@/Components-landing/materi-page/MateriSectionView.vue";
    import BukuImplementasiView from "@/Components-landing/materi-page/BukuImplementasiView.vue";
    import LayoutHeaderFooter from "@/Layouts/LayoutHeaderFooter.vue";

    const bukuPanduan = ref(null);
    const linkMateri = ref(null);
    const penugasanSusulan = ref(null);

    // Fetch materi data
    const getLink = async () => {
        try {
            const response = await axios.get('/data-linkmateri');
            console.log('Link Materi data:', response.data.data); // Debugging line
            if (response.data.data.length > 0) {
                linkMateri.value = response.data.data[1];
                bukuPanduan.value = response.data.data[0]; // Sisanya
                penugasanSusulan.value = response.data.data[2]; // Sisanya
            }
        } catch (error) {
            console.error('Error fetching link:', error);
        }
    };
    onMounted(() => {
        getLink();
    });
</script>
