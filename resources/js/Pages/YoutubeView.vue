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
    import TableYoutube from '@/Components/Youtube/TableYoutube.vue'
    import FormYoutube from '@/Components/Youtube/FormYoutube.vue'

    defineProps({
    data: {
        type: Array,
        required: true,
    },
});

</script>

<template>
    <LayoutAuthenticated>

        <Head title="Youtube" />
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Form Youtube" main>
            </SectionTitleLineWithButton>
            <FormYoutube />
        <div class="text-center">
                <SectionTitleLineWithButton
                    class="mt-5"
                    :icon="mdiTableBorder"
                    title="Data Youtube"
                    main
                ></SectionTitleLineWithButton>
            </div>
            <TableYoutube :data="data" />
        </SectionMain>
    </LayoutAuthenticated>
</template>
