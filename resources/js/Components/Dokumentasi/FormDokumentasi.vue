<template>
    <CardBox @submit.prevent="submit" enctype="multipart/form-data">
        <h1 class="text-xl font-bold">Upload Foto Untuk Dokumentasi</h1>
        <BaseDivider />
        <FormField label="Upload Files (image max 10 MB)">
            <MultipleFormFilePicker
                v-model="form.photo_galeri"
                label="Upload"
                name="photo_galeri"
                multiple
            />
            <p v-if="errors.photo_galeri" class="text-red-500 text-sm mt-1">
                {{ errors.photo_galeri }}
            </p>
        </FormField>
        <template #footer>
            <BaseButtons>
                <BaseButton
                    type="submit"
                    color="success"
                    label="Submit"
                    @click="submit"
                />
                <BaseButton
                    type="reset"
                    color="danger"
                    @click="reset"
                    outline
                    label="Reset"
                />
            </BaseButtons>
        </template>
    </CardBox>
    <div
        v-if="form.recentlySuccessful"
        class="mt-4 p-4 bg-green-100 text-green-700 rounded"
    >
        Data berhasil ditambahkan
    </div>
    <div v-if="showAlert" class="mt-4 p-4 bg-red-100 text-red-700 rounded">
        Harus isi data di formnya
    </div>
</template>

<script setup>
import { ref, computed } from "vue";
import { useForm } from "@inertiajs/vue3";
import CardBox from "@/Components/CardBox.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import FormControlIcon from "@/Components/FormControlIcon.vue";
import BaseDivider from "@/Components/BaseDivider.vue";
import BaseButton from "@/Components/BaseButton.vue";
import BaseButtons from "@/Components/BaseButtons.vue";
import MultipleFormFilePicker from "@/Components/MultipleFormFilePicker.vue";

const form = useForm({
    photo_galeri: [],
});

const errors = ref({});
const showAlert = ref(false);

const isFormValid = computed(() => {
    return form.photo_galeri.length > 0;
});

const validateForm = () => {
    errors.value = {};
    if (form.photo_galeri.length === 0) {
        errors.value.photo_galeri = "Foto harus di isi";
    }
    return Object.keys(errors.value).length === 0;
};

const submit = () => {
    if (validateForm()) {
        showAlert.value = false;

        const formData = new FormData();
        form.photo_galeri.forEach((file, index) => {
            formData.append(`photo_galeri[${index}]`, file);
        });

        form.post(route("dokumentasi.store"), {
            data: formData,
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
