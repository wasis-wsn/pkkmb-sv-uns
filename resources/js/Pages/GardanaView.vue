<script setup>
import { mdiBallotOutline, mdiTableBorder } from "@mdi/js";
import SectionMain from "@/Components/SectionMain.vue";
import CardBox from "@/Components/CardBox.vue";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import { Head } from "@inertiajs/vue3";
import TableGardana from "@/Components/Gardana/TableGardana.vue";
import FormGardana from "@/Components/Gardana/FormGardana.vue";

defineProps({
    data: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <LayoutAuthenticated>
        <Head title="form" />
        <SectionMain>
            <SectionTitleLineWithButton
                :icon="mdiBallotOutline"
                title="Form Gardana"
                main
            >
            </SectionTitleLineWithButton>
            <FormGardana />
        </SectionMain>
        <SectionMain>
            <SectionTitleLineWithButton
                :icon="mdiTableBorder"
                title="Daftar Gardana"
                main
            >
            </SectionTitleLineWithButton>
            <CardBox>
                <TableGardana
                    :data="data"
                />
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>
