<script setup>
    import {
        mdiBallotOutline,
        mdiTableBorder,
        mdiYoutube
    } from '@mdi/js'
    import SectionMain from '@/Components/SectionMain.vue'
    import CardBox from '@/Components/CardBox.vue'
    import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue'
    import SectionTitleLineWithButton from '@/Components/SectionTitleLineWithButton.vue'
    import {
        Head
    } from '@inertiajs/vue3'
    import TableMateri from '@/Components/Materi/TableMateri.vue'
    import FormMateri from '@/Components/Materi/FormMateri.vue'

    const submit = () => {
        //
    }

</script>

<template>
    <LayoutAuthenticated>

        <Head title="materi" />
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Form Materi" main>
            </SectionTitleLineWithButton>
            <FormMateri />
        </SectionMain>
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiTableBorder" title="Daftar Materi" main>
            </SectionTitleLineWithButton>
            <CardBox>
                <TableMateri />
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>
