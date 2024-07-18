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

defineProps({
    data: {
        type: Array,
        required: true,
    },
});

</script>

<template>
    <LayoutAuthenticated>

        <Head title="Materi" />
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Form Materi" main>
            </SectionTitleLineWithButton>
            <FormMateri />
            <div class="text-center">
                <SectionTitleLineWithButton
                    class="mt-5"
                    :icon="mdiBallotOutline"
                    title="Table Data"
                    main
                ></SectionTitleLineWithButton>
            </div>
            <TableMateri :data="data" />
        </SectionMain>
    </LayoutAuthenticated>
</template>
