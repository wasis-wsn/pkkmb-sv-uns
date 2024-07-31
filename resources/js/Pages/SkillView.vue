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
    import TableSkill from '@/Components/Skill/TableSkill.vue'
    import FormSkill from '@/Components/Skill/FormSkill.vue'

    defineProps({
    data: {
        type: Array,
        required: true,
    },
});

</script>

<template>
    <LayoutAuthenticated>

        <Head title="Skill" />
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Form Skill" main>
            </SectionTitleLineWithButton>
            <FormSkill />
        </SectionMain>
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiTableBorder" title="Daftar Skill" main>
            </SectionTitleLineWithButton>
            <CardBox>
                <TableSkill :data="data"/>
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>