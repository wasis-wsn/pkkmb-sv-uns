<template>
    <section class="galeri-page">
        <div class="galeri w-full bg-slate-100 pb-5 px-4" data-aos="fade-up">
            <header class="text-center py-10">
                <h1
                    class="text-3xl font-bold inline-block border-b-4 border-[#F67366]"
                    data-aos="fade-up"
                >
                    DOKUMENTASI PKKMB SV UNS 2024
                </h1>
                <p
                    class="text-lg mt-4 container mx-auto px-4"
                    data-aos="fade-up"
                >
                    Halo, Vocazens! Selamat datang di galeri dokumentasi
                    kegiatan Pengenalan Kehidupan Kampus bagi Mahasiswa Baru
                    (PKKMB) Sekolah Vokasi Universitas Sebelas Maret tahun 2024.
                    Galeri ini menyajikan berbagai momen berharga dan kenangan
                    tak terlupakan dari setiap acara yang diadakan selama PKKMB.
                    Selamat menikmati galeri PKKMB SV UNS 2024!
                </p>
            </header>

            <!-- Galeri Start -->
            <div class="container lg:px-8 md:px-6 sm:px-6 mx-auto">
                <div class="galeri" data-aos="fade-up">
                    <div
                        class="grid grid-rows-2 min-[320px]:grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 rounded-lg"
                    >
                        <div
                            v-for="(image, index) in dokumentasi"
                            :key="'dokumentasi-' + index"
                            :class="getGridClass(index)"
                        >
                            <img
                                :src="'/storage/galeri/' + image.photo_galeri"
                                :alt="'Image ' + (index + 1)"
                                class="image rounded-3xl shadow-lg"
                            />
                        </div>
                    </div>
                </div>
                <div
                    class="download-button text-center mt-4 sm:mt-4 md:mt-7 lg:mt-6 xl:mt-4"
                    data-aos="fade-up"
                >
                    <button
                        class="button-biru justify-center items-center font-bold text-[24px] px-12 pt-4 pb-4 text-white whitespace-nowrap bg-slate-700 rounded-[20px] max-md:px-7"
                    >
                        <a href="https://bit.ly/FotoAskara2022" target="_blank"
                            >DOWNLOAD DISINI!</a
                        >
                    </button>
                </div>
            </div>
            <!-- Galeri Ends -->
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from "vue";
import AOS from "aos";
import "aos/dist/aos.css";
import axios from "axios";

const dokumentasi = ref([]);

const getGridClass = (index) => {
    if (index === 0 || index === 2 || index === 6 || index === 8) {
        return "row-span-2";
    } else {
        return "row-1";
    }
};

const fetchGaleri = async () => {
    try {
        const response = await axios.get("/data-dokumentasi");
        dokumentasi.value = response.data.data;
    } catch (error) {
        console.error("Failed to fetch data:", error);
    }
};

onMounted(() => {
    document.title = "PKKMB SV UNS - GALERI";
    AOS.init();
    fetchGaleri();
});
</script>

<style scoped>
.image {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Menyesuaikan gambar tanpa mempertahankan rasio aspek */
    border-radius: 12px; /* Optional: Tambahkan sudut melengkung untuk gambar */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional: Tambahkan bayangan */
}
</style>
