<template>
    <CardBox @submit.prevent="submit" enctype="multipart/form-data">
        <FormField label="Judul Dokumen">
            <FormControl v-model="form.judul_dokum" :icon="mdiAccount" />
            <p v-if="errors.judul_dokum" class="text-red-500 text-sm mt-1">
                {{ errors.judul_dokum }}
            </p>
        </FormField>
        <FormField label="Deskripsi Dokumen (Opsional)">
            <FormControl
                v-model="form.deskripsi_dokum"
                placeholder="Deskripsi Dokumen/Acara"
            />
        </FormField>

        <FormField label="Jenis Dokumen">
            <FormControl v-model="form.jenis_dokum" :options="selectOptions" optionValue="label" placeholder="Select an option"/>
            <p v-if="errors.jenis_dokum" class="text-red-500 text-sm mt-0">
                {{ errors.jenis_dokum }}
            </p>
        </FormField>

        <BaseDivider />
        <FormField label="Upload File (image max 10 MB)">
            <FormFilePicker
                v-model="form.photo_dokum"
                label="Upload"
                name="photo_dokum"
            />
            <p v-if="errors.photo_dokum" class="text-red-500 text-sm mt-1">
                {{ errors.photo_dokum }}
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
        Form submitted successfully!
    </div>
    <div v-if="showAlert" class="mt-4 p-4 bg-red-100 text-red-700 rounded">
        Please fill in all required fields.
    </div>
</template>

<script setup>
import { ref, computed } from "vue";
import { mdiAccount } from "@mdi/js";
import { useForm } from "@inertiajs/vue3";
import CardBox from "@/Components/CardBox.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseDivider from "@/Components/BaseDivider.vue";
import BaseButton from "@/Components/BaseButton.vue";
import BaseButtons from "@/Components/BaseButtons.vue";
import FormFilePicker from "@/Components/FormFilePicker.vue";

const selectOptions = [{ label: "Galeri" }, { label: "Slide Acara" }];

const form = useForm({
    judul_dokum: "",
    deskripsi_dokum: "",
    jenis_dokum: "",
    photo_dokum: null,
});

const errors = ref({});
const showAlert = ref(false);

const isFormValid = computed(() => {
    return form.judul_dokum && form.jenis_dokum && form.photo_dokum;
});

const validateForm = () => {
    errors.value = {};
    if (!form.judul_dokum) {
        errors.value.judul_dokum = "Judul Dokumen is required.";
    }
    if (!form.jenis_dokum) {
        errors.value.jenis_dokum = "Jenis Dokumen is required.";
    }
    if (!form.photo_dokum) {
        errors.value.photo_dokum = "File upload is required.";
    }
    return Object.keys(errors.value).length === 0;
};

const submit = () => {
    if (validateForm()) {
        showAlert.value = false;
        form.post(route("galeri.store"), {
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
