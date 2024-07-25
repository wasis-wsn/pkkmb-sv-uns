<script setup>
import { mdiBallotOutline, mdiTableBorder } from "@mdi/js";
import SectionMain from "@/Components/SectionMain.vue";
import CardBox from "@/Components/CardBox.vue";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import { Head } from "@inertiajs/vue3";
import TableSkill from "@/Components/Keterangan/TableSkill.vue";
import FormSkill from "@/Components/Keterangan/FormSkill.vue";

const props = defineProps({
    data: {
        type: Array,
        required: true,
    },
    skill: {
        type: Array,
        required: true,
    },
    mahasiswa: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <LayoutAuthenticated>
        <Head title="Skill" />
        <SectionMain>
            <SectionTitleLineWithButton
                :icon="mdiBallotOutline"
                title="Form Skill"
                main
            >
            </SectionTitleLineWithButton>
            <FormSkill :skill="props.skill" :mahasiswa="props.mahasiswa" />
        </SectionMain>
        <SectionMain>
            <SectionTitleLineWithButton
                :icon="mdiTableBorder"
                title="Daftar Skill"
                main
            >
            </SectionTitleLineWithButton>
            <CardBox>
                <TableSkill
                    :data="data"
                    :skill="skill"
                    :mahasiswa="mahasiswa"
                />
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>
