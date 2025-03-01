<script setup>
    import {
        mdiBallotOutline,
        mdiTableBorder,
    } from '@mdi/js'
    import SectionMain from '@/Components/SectionMain.vue'
    import CardBox from '@/Components/CardBox.vue'
    import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue'
    import SectionTitleLineWithButton from '@/Components/SectionTitleLineWithButton.vue'
    import {
        Head
    } from '@inertiajs/vue3'
    import TableKelompok from '@/Components/Kelompok/TableKelompok.vue'
    import FormKelompok from '@/Components/Kelompok/FormKelompok.vue'

    defineProps({
    data: {
        type: Array,
        required: true,
    },
    gardana: {
        type: Array,
        required: true,
    },
});

</script>

<template>
    <LayoutAuthenticated>

        <Head title="Kelompok" />
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Form Kelompok" main>
            </SectionTitleLineWithButton>
            <FormKelompok :gardana="gardana" />
        </SectionMain>
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiTableBorder" title="Daftar Kelompok" main>
            </SectionTitleLineWithButton>
            <CardBox>
                <TableKelompok :data="data" :gardana="gardana"/>
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>
