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
