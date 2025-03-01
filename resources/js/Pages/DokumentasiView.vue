<template>
    <LayoutAuthenticated>
        <Head title="Form" />
        <SectionMain>
            <SectionTitleLineWithButton
                :icon="mdiBallotOutline"
                title="Dokumentasi Form"
                main
            >
            </SectionTitleLineWithButton>
            <FormDokumentasi />
            <div class="div mt-4">
                <CardBox>
                    <h2 class="text-2xl font-bold mb-4">
                        Cara Penggunaan Dashboard Admin Dokumentasi Foto :
                    </h2>

                    <ol class="list-decimal pl-6 space-y-4">
                        <li>
                            <h2 class="text-xl font-semibold mb-2">
                                Upload Foto
                            </h2>
                            <ul class="list-disc pl-6">
                                <li>Ukuran maksimal: 10 MB</li>
                                <li>
                                    Format yang diperbolehkan: jpeg, png, jpg,
                                    gif, svg
                                </li>
                                <li>Maksimal ukuran file: 10240 KB</li>
                            </ul>
                        </li>

                        <li>
                            <h2 class="text-xl font-semibold mb-2">
                                Kesesuaian Layout
                            </h2>
                            <p class="font-bold">WAJIB:</p>
                            <p>
                                Untuk menjaga tampilan layout tetap bagus di
                                website, pastikan jumlah foto yang diupload
                                adalah kelipatan 6, yaitu 6, 12, 18, dan
                                seterusnya.
                            </p>
                        </li>

                        <li>
                            <h2 class="text-xl font-semibold mb-2">
                                Multiple Upload
                            </h2>
                            <p>
                                Admin dapat melakukan upload beberapa foto
                                sekaligus.
                            </p>
                        </li>

                        <li>
                            <h2 class="text-xl font-semibold mb-2">
                                Edit dan Hapus Foto
                            </h2>
                            <p>
                                Admin dapat mengedit dan menghapus foto melalui
                                tabel yang tersedia di bawah jika diperlukan.
                            </p>
                        </li>
                    </ol>
                </CardBox>
            </div>

            <div class="text-center">
                <SectionTitleLineWithButton
                    class="mt-5"
                    :icon="mdiBallotOutline"
                    title="Table Data"
                    main
                ></SectionTitleLineWithButton>
            </div>
            <TableDokumentasi :data="data" />
        </SectionMain>
    </LayoutAuthenticated>
</template>

<script setup>
import { mdiBallotOutline, mdiGithub } from "@mdi/js";
import CardBox from "@/Components/CardBox.vue";
import { Head } from "@inertiajs/vue3";
import SectionMain from "@/Components/SectionMain.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import BaseButton from "@/Components/BaseButton.vue";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import FormHima from "@/Components/Dokumentasi/FormDokumentasi.vue";
import TableHima from "@/Components/Dokumentasi/TableDokumentasi.vue";
import TableDokumentasi from "@/Components/Dokumentasi/TableDokumentasi.vue";
import FormDokumentasi from "@/Components/Dokumentasi/FormDokumentasi.vue";

defineProps({
    data: {
        type: Array,
        required: true,
    },
});
</script>
