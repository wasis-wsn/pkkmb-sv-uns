<script setup>
import { ref } from "vue";
import { mdiBallotOutline, mdiTableBorder } from "@mdi/js";
import SectionMain from "@/Components/SectionMain.vue";
import CardBox from "@/Components/CardBox.vue";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import { Head } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    kelompok: {
        type: Array,
        required: true,
    },
});

const form = useForm({
    nama_kelompok: "",
});

const generateSertifikat = () => {
    if (!form.nama_kelompok) {
        alert("Silakan pilih kelompok terlebih dahulu");
        return;
    }

    form.post(route("sertifikat.generate"), {
        preserveScroll: true,
        onSuccess: () => {
            alert("Sertifikat berhasil dibuat");
            form.reset();
        },
        onError: (errors) => {
            console.error("Error:", errors);
            alert("Terjadi kesalahan saat membuat sertifikat");
        },
    });
};
</script>

<template>
    <LayoutAuthenticated>
        <Head title="Pembuatan Sertifikat" />
        <SectionMain>
            <SectionTitleLineWithButton
                :icon="mdiBallotOutline"
                title="Pembuatan Sertifikat"
                main
            >
            </SectionTitleLineWithButton>
            <CardBox>
                <form @submit.prevent="generateSertifikat">
                    <div class="mb-4">
                        <label
                            for="kelompok"
                            class="block text-sm font-medium text-gray-700"
                            >Pilih Kelompok</label
                        >
                        <select
                            id="kelompok"
                            v-model="form.nama_kelompok"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                        >
                            <option value="">Pilih Kelompok</option>
                            <option
                                v-for="k in kelompok"
                                :key="k.nama_kelompok"
                                :value="k.nama_kelompok"
                            >
                                {{ k.nama_kelompok }}
                            </option>
                        </select>
                    </div>
                    <button
                        type="submit"
                        :disabled="form.processing || !form.nama_kelompok"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        Generate Sertifikat
                    </button>
                </form>
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>
