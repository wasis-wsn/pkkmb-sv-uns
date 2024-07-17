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
    import TableYoutube from '@/Components/VidioYoutube/TableYoutube.vue'
    import FormYoutube from '@/Components/VidioYoutube/FormYoutube.vue'

    const submit = () => {
        //
    }

</script>

<template>
    <LayoutAuthenticated>

        <Head title="form" />
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Form Materi" main>
            </SectionTitleLineWithButton>
            <FormYoutube />
        </SectionMain>
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiTableBorder" title="Daftar Materi" main>
            </SectionTitleLineWithButton>
            <CardBox>
                <TableYoutube />
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>
