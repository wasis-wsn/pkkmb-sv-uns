<script setup>
import { ref } from "vue";
import { mdiAsterisk, mdiFormTextboxPassword } from "@mdi/js";
import CardBox from "@/Components/CardBox.vue";
import FormField from "@/Components/FormField.vue";
import FormControlProfile from "@/Components/FormControlProfile.vue";
import BaseButton from "@/Components/BaseButton.vue";
import BaseButtons from "@/Components/BaseButtons.vue";
import BaseDivider from "@/Components/BaseDivider.vue";
import { useForm } from "@inertiajs/vue3";
import FormFilePicker from "@/Components/FormFilePicker.vue";

// Definisi props
const props = defineProps({
    skills: {
        type: Array,
        required: true,
    },
});

const form = useForm({
    skill_id: "",
    deskripsi_skill: "",
    photo_piagam: null,
});

const errors = ref({});
const showAlert = ref(false);

const validateForm = () => {
    errors.value = {};
    if (!form.skill_id) {
        errors.value.skill_id = "Skill is required.";
    }
    if (!form.deskripsi_skill) {
        errors.value.deskripsi_skill = "Deskripsi Skill is required.";
    }
    return Object.keys(errors.value).length === 0;
};

const submit = () => {
    if (validateForm()) {
        showAlert.value = false;
        form.post(route("profile.store"), {
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

const formSkill = useForm({
    nama_skill: "",
});

const resetSkill = () => {
    formSkill.reset();
    errors.value = {};
    showAlert.value = false;
};

const validateFormSkill = () => {
    errors.value = {};
    if (!formSkill.nama_skill) {
        errors.value.nama_skill = "Nama Skill is required.";
    }
    return Object.keys(errors.value).length === 0;
};

const submitSkill = () => {
    if (validateFormSkill()) {
        showAlert.value = false;
        formSkill.post(route("userSkill.store"), {
            onSuccess: () => {
                resetSkill();
            },
            onError: (errors) => {
                console.log(errors);
            },
        });
    } else {
        showAlert.value = true;
    }
};

const passwordForm = ref({
    current_password: "",
    password: "",
    password_confirmation: "",
});

const submitProfile = () => {
    // Logic to submit profile
};

const submitPass = () => {
    // Logic to submit password
};

const customCardBoxStyle = {
    backgroundColor: "#f1f5f9", // Warna latar belakang yang Anda inginkan
    color: "#333", // Warna teks yang Anda inginkan
    border: "1px solid #ccc", // Warna border yang Anda inginkan
    padding: "20px", // Padding untuk memperindah tampilan
    borderRadius: "10px", // Sudut membulat
};
const customFormFieldStyle = {
    backgroundColor: "#f1f5f9", // Warna latar belakang yang Anda inginkan
};
</script>

<template>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8 max-md:mt-0">
        <CardBox
            :style="customCardBoxStyle"
            is-form
            @submit.prevent="submitPass"
        >
            <FormField
                :style="customFormFieldStyle"
                label="Current password"
                help="Required. Your current password"
            >
                <FormControlProfile
                    v-model="passwordForm.current_password"
                    :icon="mdiAsterisk"
                    name="password_current"
                    type="password"
                    required
                    autocomplete="current-password"
                />
            </FormField>
            <BaseDivider />
            <FormField
                :style="customFormFieldStyle"
                label="New password"
                help="Required. New password"
            >
                <FormControlProfile
                    v-model="passwordForm.password"
                    :icon="mdiFormTextboxPassword"
                    name="password"
                    type="password"
                    required
                    autocomplete="new-password"
                />
            </FormField>
            <FormField
                :style="customFormFieldStyle"
                label="Confirm password"
                help="Required. New password one more time"
            >
                <FormControlProfile
                    v-model="passwordForm.password_confirmation"
                    :icon="mdiFormTextboxPassword"
                    name="password_confirmation"
                    type="password"
                    required
                    autocomplete="new-password"
                />
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
                        outline
                        label="Reset"
                        @click="reset"
                    />
                </BaseButtons>
            </template>
        </CardBox>
        <CardBox @submit.prevent="submit" :style="customCardBoxStyle">
            <FormField label="Nama Skill">
                <FormControlProfile
                    v-model="form.skill_id"
                    :options="props.skills"
                    optionLabel="nama_skill"
                    optionValue="id"
                    placeholder="Pilih Skill"
                />
            </FormField>
            <FormField label="Deskripsi Skill">
                <FormControlProfile
                    v-model="form.deskripsi_skill"
                    placeholder="Masukkan deskripsi skill"
                />
            </FormField>
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
        <CardBox @submit.prevent="submitSkill" :style="customCardBoxStyle">
            <FormField label="Nama Skill">
                <FormControlProfile
                    v-model="formSkill.nama_skill"
                    placeholder="Masukkan nama Skill"
                />
            </FormField>
            <p v-if="errors.nama_skill" class="text-red-500 text-sm">
                {{ errors.nama_skill }}
            </p>
            <template #footer>
                <BaseButtons>
                    <BaseButton
                        type="submit"
                        color="success"
                        label="Submit"
                        @click="submitSkill"
                    />
                    <BaseButton
                        type="reset"
                        color="danger"
                        outline
                        label="Reset"
                        @click="resetSkill"
                    />
                </BaseButtons>
            </template>
        </CardBox>
    </div>
</template>
