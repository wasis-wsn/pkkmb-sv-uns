<script setup>
import { ref, computed } from "vue";
import { useForm } from "@inertiajs/vue3";
import CardBox from "@/Components/CardBox.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseButton from "@/Components/BaseButton.vue";
import BaseButtons from "@/Components/BaseButtons.vue";
import BaseDivider from "@/Components/BaseDivider.vue";
import FormFilePicker from "@/Components/FormFilePicker.vue";

// Definisi props
const props = defineProps({
    skill: {
        type: Array,
        required: true,
    },
    mahasiswa: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    skill_id: "",
    deskripsi_skill: "",
    mahasiswa_id: "",
    photo_piagam: null,
});

const errors = ref({});
const showAlert = ref(false);

const isFormValid = computed(() => {
    return (
        form.skill_id &&
        form.deskripsi_skill &&
        form.mahasiswa_id &&
        form.photo_piagam
    );
});

const mahasiswaOptions = computed(() => {
    return Object.entries(props.mahasiswa).map(([id, nama]) => ({
        id: id,
        nama: nama,
    }));
});

const validateForm = () => {
    errors.value = {};
    if (!form.skill_id) {
        errors.value.skill_id = "Skill is required.";
    }
    if (!form.deskripsi_skill) {
        errors.value.deskripsi_skill = "Deskripsi Skill is required.";
    }
    if (!form.mahasiswa_id) {
        errors.value.mahasiswa_id = "Mahasiswa is required.";
    }
    if (!form.photo_piagam) {
        errors.value.photo_piagam = "File upload is required.";
    }
    return Object.keys(errors.value).length === 0;
};

const submit = () => {
    if (validateForm()) {
        showAlert.value = false;
        form.post(route("keterangan.store"), {
            preserveState: true,
            preserveScroll: true,
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
    <CardBox @submit.prevent="submit">
        <FormField label="Nama Skill">
            <FormControl
                v-model="form.skill_id"
                :options="props.skill"
                optionLabel="nama_skill"
                optionValue="id"
                placeholder="Pilih Skill"
            />
        </FormField>
        <FormField label="Deskripsi Skill">
            <FormControl
                v-model="form.deskripsi_skill"
                placeholder="Masukkan deskripsi skill"
            />
        </FormField>
        <FormField label="Mahasiswa">
            <FormControl
                v-model="form.mahasiswa_id"
                :options="mahasiswaOptions"
                optionLabel="nama"
                optionValue="id"
                placeholder="Pilih Mahasiswa"
            />
        </FormField>

        <BaseDivider />
        <FormField label="Upload File (image max 10 MB)">
            <FormFilePicker
                v-model="form.photo_piagam"
                label="Upload"
                name="photo_piagam"
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
                    :disabled="!isFormValid"
                    @click="submit"
                />
                <BaseButton
                    type="reset"
                    color="danger"
                    outline
                    label="Reset"
                    @click="reset"
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
