<template>
    <CardBox form @submit.prevent="submit">
        <FormField label="Judul Gambar">
            <FormControl v-model="form.judul" :icon="mdiAccount" />
        </FormField>
        <FormField label="Deskripsi Gambar (Opsional)">
            <FormControl
                v-model="form.deskripsi"
                placeholder="Deskripsi Gambar/Acara"
            />
        </FormField>
        <FormField label="Jenis Gambar">
            <FormControl v-model="form.jenis" :options="selectOptions" />
        </FormField>
        <BaseDivider />
        <FormField label="Upload File (image max 10 MB)">
            <FormFilePicker v-model="form.file" label="Upload" />
        </FormField>
        <template #footer>
            <BaseButtons>
                <BaseButton type="submit" color="info" label="Submit" />
                <BaseButton type="reset" color="info" outline label="Reset" />
            </BaseButtons>
        </template>
    </CardBox>
</template>

<script setup>
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { mdiAccount } from "@mdi/js";
import CardBox from "@/Components/CardBox.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseDivider from "@/Components/BaseDivider.vue";
import BaseButton from "@/Components/BaseButton.vue";
import BaseButtons from "@/Components/BaseButtons.vue";
import FormFilePicker from "@/Components/FormFilePicker.vue";
import { useForm } from "@inertiajs/inertia-vue3";

const selectOptions = [
    { id: 1, label: "Galeri" },
    { id: 2, label: "Slide Acara" },
];

const form = useForm({
    judul: "",
    deskripsi: "",
    jenis: selectOptions[0].label,
    file: null,
});

const submit = () => {
    form.post(route("galerise.store"), {
        onFinish: () => form.reset(),
    });
};
</script>
