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
        <FormField label="Nama Program Studi" help="">
            <FormControl type="text" placeholder="Masukkan nama prodi" />
        </FormField>
        <template #footer>
            <BaseButtons>
                <BaseButton type="submit" color="success" label="Submit" />
                <BaseButton type="reset" color="danger" outline label="Reset" />
            </BaseButtons>
        </template>
    </CardBox>
</template>
