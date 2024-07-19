<script setup>
    import {
        Head
    } from '@inertiajs/vue3'
    import {
        mdiBallotOutline,
        mdiTableBorder,
    } from '@mdi/js'
    import SectionMain from '@/Components/SectionMain.vue'
    import CardBox from '@/Components/CardBox.vue'
    import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue'
    import SectionTitleLineWithButton from '@/Components/SectionTitleLineWithButton.vue'
    import TableUser from '@/Components/User/TableUser.vue'
    import FormUser from '@/Components/User/FormUser.vue'

    const props = defineProps({
    data: {
        type: Array,
        required: true,
    },
});

</script>

<template>
    <LayoutAuthenticated>

        <Head title="user" />
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Form User" main></SectionTitleLineWithButton>
            <FormUser />
        </SectionMain>
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiTableBorder" title="User Data" main>
            </SectionTitleLineWithButton>
            <CardBox>
                <TableUser :data="data"/>
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>
