<script setup>
    import CardBox from '@/Components/CardBox.vue'
    import FormField from '@/Components/FormField.vue'
    import FormControl from '@/Components/FormControl.vue'
    import BaseButton from '@/Components/BaseButton.vue'
    import BaseButtons from '@/Components/BaseButtons.vue'
    
    const submit = () => {
        //
    }

</script>
<template>
    <CardBox form @submit.prevent="submit">
        <FormField label="Judul Materi" help="">
            <FormControl type="text" placeholder="Masukkan disini" />
        </FormField>
        <FormField label="Isi Materi" help="">
            <FormControl type="textarea" placeholder="Masukkan materi dengan format list manual. Contoh: A. / 1. / a." />
        </FormField>
        <template #footer>
            <BaseButtons>
                <BaseButton type="submit" color="success" label="Submit" />
                <BaseButton type="reset" color="danger" outline label="Reset" />
            </BaseButtons>
        </template>
    </CardBox>
</template>
