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
    import TableLinkMateri from '@/Components/LinkMateri/TableLinkMateri.vue'
    import FormLinkMateri from '@/Components/LinkMateri/FormLinkMateri.vue'

    defineProps({
    data: {
        type: Array,
        required: true,
    },
});

</script>

<template>
    <LayoutAuthenticated>

        <Head title="LinkMateri" />
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Form Link Materi" main>
            </SectionTitleLineWithButton>
            <FormLinkMateri />
        <div class="text-center">
                <SectionTitleLineWithButton
                    class="mt-5"
                    :icon="mdiTableBorder"
                    title="Data Filee Materi"
                    main
                ></SectionTitleLineWithButton>
            </div>
            <TableLinkMateri :data="data" />
        </SectionMain>
    </LayoutAuthenticated>
</template>
