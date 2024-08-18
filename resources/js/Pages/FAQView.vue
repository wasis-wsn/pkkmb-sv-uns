@ -1,42 +0,0 @@
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
    import TableFAQ from '@/Components/FAQ/TableFAQ.vue'
    import FormFAQ from '@/Components/FAQ/FormFAQ.vue'

    defineProps({
    data: {
        type: Array,
        required: true,
    },
});

</script>

<template>
    <LayoutAuthenticated>

        <Head title="FAQ" />
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Form FAQ" main>
            </SectionTitleLineWithButton>
            <FormFAQ />
        </SectionMain>
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiTableBorder" title="Daftar FAQ" main>
            </SectionTitleLineWithButton>
            <CardBox>
                <TableFAQ :data="data"/>
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>