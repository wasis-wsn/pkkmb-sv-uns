<script setup>
    import {
        ref
    } from 'vue';
    import {
        mdiAsterisk,
        mdiFormTextboxPassword
    } from '@mdi/js';
    import CardBox from '@/Components/CardBox.vue';
    import FormField from '@/Components/FormField.vue';
    import FormControlProfile from '@/Components/FormControlProfile.vue';
    import BaseButton from '@/Components/BaseButton.vue';
    import BaseButtons from '@/Components/BaseButtons.vue';
    import BaseDivider from '@/Components/BaseDivider.vue';
    import { useForm } from '@inertiajs/vue3';
    import FormFilePicker from "@/Components/FormFilePicker.vue";


    const props = defineProps({
        prodi: {
            type: Array,
            required: true,
        },
        kelompok: {
            type: Array,
            required: true,
        },
    });

    const form = useForm({
        nama_mahasiswa: '',
        no_telp: '',
        prodi_id: '',
        kelompok_id: '',
        nama_skill: '',
        deskripsi_skill: '',
        photo_piagam: null
    });
    // const form = useForm({
    //     password_current: '',
    //     password: '',
    //     password_confirmation: null
    // });

    const errors = ref({});
    const showAlert = ref(false);

    const validateForm = () => {
        errors.value = {};
        if (!form.password_current) {
            errors.value.password_current = 'Current Password is required.';
        }
        if (!form.password) {
            errors.value.password = 'Password is required.';
        }
        if (!form.password_confirmation) {
            errors.value.password_confirmation = 'Password Confirmation is required.';
        }
        return Object.keys(errors.value).length === 0;
    };

    const submit = () => {
        if (validateForm()) {
            showAlert.value = false;
            form.post(route('mahasiswa.store'), {
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

    const profileForm = ref({
        name: '',
        email: '',
        isDisabled: true
    });

    const passwordForm = ref({
        current_password: '',
        password: '',
        password_confirmation: ''
    });

    const submitProfile = () => {
        // Logic to submit profile
    };

    const submitPass = () => {
        // Logic to submit password
    };

    const customCardBoxStyle = {
        backgroundColor: '#f1f5f9', // Warna latar belakang yang Anda inginkan
        color: '#333', // Warna teks yang Anda inginkan
        border: '1px solid #ccc', // Warna border yang Anda inginkan
        padding: '20px', // Padding untuk memperindah tampilan
        borderRadius: '10px' // Sudut membulat
    };
    const customFormFieldStyle = {
        backgroundColor: '#f1f5f9', // Warna latar belakang yang Anda inginkan
    };

</script>

<template>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8 max-md:mt-0">
        <CardBox :style="customCardBoxStyle" is-form @submit.prevent="submitPass">
            <FormField :style="customFormFieldStyle" label="Current password" help="Required. Your current password">
                <FormControlProfile v-model="passwordForm.current_password" :icon="mdiAsterisk" name="password_current"
                    type="password" required autocomplete="current-password" />
            </FormField>
            <BaseDivider />
            <FormField :style="customFormFieldStyle" label="New password" help="Required. New password">
                <FormControlProfile v-model="passwordForm.password" :icon="mdiFormTextboxPassword" name="password"
                    type="password" required autocomplete="new-password" />
            </FormField>
            <FormField :style="customFormFieldStyle" label="Confirm password"
                help="Required. New password one more time">
                <FormControlProfile v-model="passwordForm.password_confirmation" :icon="mdiFormTextboxPassword"
                    name="password_confirmation" type="password" required autocomplete="new-password" />
            </FormField>
            <template #footer>
                <BaseButtons>
                    <BaseButton type="submit" color="success" label="Submit" @click="submit" />
                    <BaseButton type="reset" color="danger" outline label="Reset" @click="reset" />
                </BaseButtons>
            </template>
        </CardBox>
        <CardBox @submit.prevent="submit" :style="customCardBoxStyle">
            <FormField label="Nama Skill">
                <FormControlProfile v-model="form.nama_skill" placeholder="Masukkan nama skill" />
            </FormField>

            <FormField label="Deskripsi Skill">
                <FormControlProfile v-model="form.deskripsi_skill" placeholder="Masukkan deskripsi skill" />
            </FormField>

            <FormField label="Photo Piagam (image max 10 MB)">
                <FormFilePicker v-model="form.photo_piagam" label="Upload" name="photo_piagam" />

            </FormField>
            <p v-if="errors.photo_piagam" class="text-red-500 text-sm mb-3">
                {{ errors.photo_piagam }}
            </p>

            <template #footer>
                <BaseButtons>
                    <BaseButton type="submit" color="success" label="Submit" @click="submit" />
                    <BaseButton type="reset" color="danger" outline label="Reset" @click="reset" />
                </BaseButtons>
            </template>
        </CardBox>
    </div>
</template>
