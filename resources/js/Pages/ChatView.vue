<script setup>
    import SectionMain from '@/Components/SectionMain.vue'
    import CardBox from '@/Components/CardBox.vue'
    import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue'
    import {
        Head
    } from '@inertiajs/vue3'
    import TableChat from '@/Components/Chat/TableChat.vue'
    import FormChat from '@/Components/Chat/FormChat.vue'

    const props = defineProps({
        data: {
            type: Array,
            required: true,
        },
    });
</script>

<template>
    <LayoutAuthenticated>
        <Head title="chat" />
        <div class="flex grid-cols-2 gap-4">
            <SectionMain class="flex">
                <CardBox>
                    <TableChat :data="data"/>
                </CardBox>
            </SectionMain>
            <SectionMain class="flex-1">
                <CardBox>
                    <FormChat />
                </CardBox>
            </SectionMain>
        </div>
    </LayoutAuthenticated>
</template>

<style scoped>
    .grid {
        display: grid;
    }

    /* .grid-cols-2 {
        grid-template-columns: 1fr 1fr;
    }

    .gap-4 {
        gap: 1rem;
    } */
</style>
