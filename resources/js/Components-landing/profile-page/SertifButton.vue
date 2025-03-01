<script setup>
    import {
        ref
    } from 'vue';

    // Tentukan tanggal buka
    const releaseDate = new Date('2024-08-27'); // Ganti dengan tanggal yang Anda inginkan

    // Dapatkan tanggal sekarang
    const today = new Date();

    // Periksa apakah sudah lewat tanggal buka
    const isReleased = ref(today >= releaseDate);

</script>

<template>
    <section
        class="flex flex-col mt-5 items-center px-16 pb-6 rounded-3xl bg-slate-100 max-md:px-5 border border-gray-300 mb-5 md:mb-0">
        <div
            class="justify-center items-center self-center flex flex-col my-auto self-stretch font-bold text-black mt-5">
            <h1 class="text-4xl max-md:text-2xl">
                SERTIFIKAT PKKMB SEKOLAH VOKASI
            </h1>
        </div>
        <div v-if="isReleased" class="justify-center items-center self-center flex flex-col mt-10">
            <button type="submit"
                class="button-biru justify-center items-center self-center px-16 py-4 max-w-full text-4xl whitespace-nowrap rounded-[70px] w-[365px] max-md:px-5 max-md:mt-10">
                Download Disini
            </button>
        </div>
        <div v-else class="justify-center items-center self-center flex flex-col mt-10">
            <h2 class="text-3xl font-bold text-gray-600">
                SERTIF PKKMB SV UNS 2024 COMING SOON...
            </h2>
        </div>
    </section>
</template>
