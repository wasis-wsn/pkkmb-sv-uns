<script setup>
import { ref, onMounted } from "vue";
import { mdiAsterisk, mdiFormTextboxPassword, mdiMail } from "@mdi/js";
import axios from "axios"; // Import axios
import CardBox from "@/Components/CardBox.vue";
import FormField from "@/Components/FormField.vue";
import FormControlProfile from "@/Components/FormControlProfile.vue";
import BaseButton from "@/Components/BaseButton.vue";
import BaseButtons from "@/Components/BaseButtons.vue";
import BaseDivider from "@/Components/BaseDivider.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import FormFilePicker from "@/Components/FormFilePicker.vue";

// Form Deskripsi Skill
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

// Form Skill
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

// Form Email
const user = ref({}); // Initialize with an empty object

const fetchUserData = async () => {
    try {
        const response = await axios.get("/data-login");
        user.value = response.data;
        formEmail.email = user.value.email; // Set email in form
    } catch (error) {
        console.error("Error fetching user data:", error);
    }
};

onMounted(() => {
    fetchUserData();
});

const formEmail = useForm({
    email: "",
});

const resetEmail = () => {
    formEmail.reset();
    errors.value = {};
    showAlert.value = false;
};

const validateformEmail = () => {
    errors.value = {};
    if (!formEmail.email) {
        // Corrected validation field
        errors.value.email = "Email is required.";
    }
    return Object.keys(errors.value).length === 0;
};

const submitEmail = () => {
    if (validateformEmail()) {
        showAlert.value = false;
        formEmail.post(route("profileEmail.store"), {
            onSuccess: () => {
                resetEmail();
            },
            onError: (errors) => {
                console.log(errors);
            },
        });
    } else {
        showAlert.value = true;
    }
};

// Telepon
const formTelepon = useForm({
    no_telp: "",
});

const resetTelepon = () => {
    formTelepon.reset();
    errors.value = {};
    showAlert.value = false;
};

const validateformTelepon = () => {
    errors.value = {};
    if (!formTelepon.no_telp) {
        // Corrected validation field
        errors.value.no_telp = "Email is required konzz.";
    }
    return Object.keys(errors.value).length === 0;
};

const submitTelepon = () => {
    if (validateformTelepon()) {
        showAlert.value = false;
        formTelepon.post(route("profileTelepon.store"), {
            onSuccess: () => {
                resetTelepon();
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
        <CardBox @submit.prevent="submitEmail" :style="customCardBoxStyle">
            <FormField label="E-mail" help="Required. Your e-mail">
                <FormControlProfile
                    v-model="formEmail.email"
                    :icon="mdiMail"
                    type="email"
                    name="email"
                    required
                    autocomplete="email"
                />
            </FormField>
            <p v-if="errors.email" class="text-red-500 text-sm">
                {{ errors.email }}
            </p>
            <template #footer>
                <BaseButtons>
                    <BaseButton
                        type="submit"
                        color="success"
                        label="Submit"
                        @click="submitEmail"
                    />
                    <BaseButton
                        type="reset"
                        color="danger"
                        outline
                        label="Reset"
                        @click="resetEmail"
                    />
                </BaseButtons>
            </template>
        </CardBox>
        <!-- No telepon -->
        <CardBox @submit.prevent="submitTelepon" :style="customCardBoxStyle">
            <FormField
                label="Nomor Telepon"
                help="Required. Your nomor telepon"
            >
                <FormControlProfile
                    v-model="formTelepon.no_telp"
                    :icon="mdiMail"
                    name="no_telp"
                    required
                />
            </FormField>
            <p v-if="errors.no_telp" class="text-red-500 text-sm">
                {{ errors.no_telp }}
            </p>
            <template #footer>
                <BaseButtons>
                    <BaseButton
                        type="submit"
                        color="success"
                        label="Submit"
                        @click="submitTelepon"
                    />
                    <BaseButton
                        type="reset"
                        color="danger"
                        outline
                        label="Reset"
                        @click="resetTelepon"
                    />
                </BaseButtons>
            </template>
        </CardBox>
    </div>
</template>
