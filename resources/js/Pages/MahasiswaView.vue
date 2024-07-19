<script setup>
    import {
        mdiBallotOutline,
        mdiTableBorder
    } from '@mdi/js'
    import SectionMain from '@/Components/SectionMain.vue'
    import CardBox from '@/Components/CardBox.vue'
    import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue'
    import SectionTitleLineWithButton from '@/Components/SectionTitleLineWithButton.vue'
    import {
        Head
    } from '@inertiajs/vue3'
    import TableMahasiswa from '@/Components/Mahasiswa/TableMahasiswa.vue'
    import FormMahasiswa from '@/Components/Mahasiswa/FormMahasiswa.vue'
    
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
            <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Form Mahasiswa" main>
            </SectionTitleLineWithButton>
            <FormMahasiswa />
        </SectionMain>
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiTableBorder" title="Daftar Mahasiswa" main>
            </SectionTitleLineWithButton>
            <CardBox>
                <TableMahasiswa :data="data"/>
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>
