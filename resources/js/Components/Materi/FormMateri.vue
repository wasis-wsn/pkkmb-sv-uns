<script setup>
    import CardBox from '@/Components/CardBox.vue'
    import FormField from '@/Components/FormField.vue'
    import FormControl from '@/Components/FormControl.vue'
    import BaseButton from '@/Components/BaseButton.vue'
    import BaseButtons from '@/Components/BaseButtons.vue'
    import { ref, computed } from "vue";
    import { useForm } from "@inertiajs/vue3";
    

const form = useForm({
    judul_materi: "",
    deskripsi_materi: "",
    isi_materi: "",
});

const errors = ref({});
const showAlert = ref(false);

const isFormValid = computed(() => {
    return form.judul_materi && form.deskripsi_materi && form.isi_materi;
});

const validateForm = () => {
    errors.value = {};
    if (!form.judul_materi) {
        errors.value.judul_materi = "Judul Materi is required.";
    }
    if (!form.deskripsi_materi) {
        errors.value.deskripsi_materi = "Deskripsi Materi is required.";
    }
    if (!form.isi_materi) {
        errors.value.isi_materi = "Isi Materi is required.";
    }
    return Object.keys(errors.value).length === 0;
};

const submit = () => {
    if (validateForm()) {
        showAlert.value = false;
        form.post(route("materi.store"), {
            onSuccess: () => {
                reset();
            },
            onError: (errors) => {
                console.log(errors);
            },
        });
    } else {
        showAlert.value = true;
    }
};
const reset = () => {
    form.reset();
    errors.value = {};
    showAlert.value = false;
};

</script>
<template>
    <CardBox form @submit.prevent="submit" >
        <FormField label="Judul Materi" help="">
            <FormControl v-model="form.judul_materi" type="text" placeholder="Masukkan judul materi" />
            <p v-if="errors.judul_materi" class="text-red-500 text-sm mt-1">
                {{ errors.judul_materi }}
            </p>
        </FormField>
        <FormField label="Deskripsi Materi" help="">
            <FormControl v-model="form.deskripsi_materi" type="text" placeholder="Materi ke..." />
        </FormField>
        <FormField label="Isi Materi" help="">
            <FormControl v-model="form.isi_materi" type="textarea" placeholder="Masukkan materi dengan format list manual. Contoh: A. / 1. / a." />
        </FormField>
        <template #footer>
            <BaseButtons>
                <BaseButton type="submit" color="success" label="Submit" @click="submit"/>
                <BaseButton type="reset" color="danger" outline label="Reset" @click="reset" />
            </BaseButtons>
        </template>
    </CardBox>
    <div
        v-if="form.recentlySuccessful"
        class="mt-4 p-4 bg-green-100 text-green-700 rounded"
    >
        Form submitted successfully!
    </div>
    <div v-if="showAlert" class="mt-4 p-4 bg-red-100 text-red-700 rounded">
        Please fill in all required fields.
    </div>
</template>
