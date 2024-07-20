<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import CardBox from '@/Components/CardBox.vue';
import FormField from '@/Components/FormField.vue';
import FormControl from '@/Components/FormControl.vue';
import BaseButton from '@/Components/BaseButton.vue';
import BaseButtons from '@/Components/BaseButtons.vue';

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

const errors = ref({});
const showAlert = ref(false);

const validateForm = () => {
    errors.value = {};
    if (!form.nama_mahasiswa) {
        errors.value.nama_mahasiswa = 'Nama Mahasiswa is required.';
    }
    if (!form.no_telp) {
        errors.value.no_telp = 'No Telp is required.';
    }
    if (!form.prodi_id) {
        errors.value.prodi_id = 'Prodi is required.';
    }
    if (!form.kelompok_id) {
        errors.value.kelompok_id = 'Kelompok is required.';
    }
    if (!form.photo_piagam) {
        errors.value.photo_piagam = 'Photo Piagam is required.';
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
</script>

<template>
    <CardBox @submit.prevent="submit">
        <FormField label="Nama Mahasiswa">
            <FormControl v-model="form.nama_mahasiswa" placeholder="Masukkan nama mahasiswa" />
            <p v-if="errors.nama_mahasiswa" class="text-red-500 text-sm mt-0">
                {{ errors.nama_mahasiswa }}
            </p>
        </FormField>

        <FormField label="No Telp">
            <FormControl v-model="form.no_telp" placeholder="Masukkan no telp" />
            <p v-if="errors.no_telp" class="text-red-500 text-sm mt-0">
                {{ errors.no_telp }}
            </p>
        </FormField>

        <FormField label="Prodi">
            <FormControl v-model="form.prodi_id" :options="prodi" optionLabel="nama_prodi" optionValue="id" placeholder="Pilih Prodi"/>
            <p v-if="errors.prodi_id" class="text-red-500 text-sm mt-0">
                {{ errors.prodi_id }}
            </p>
        </FormField>

        <FormField label="Kelompok">
            <FormControl v-model="form.kelompok_id" :options="kelompok" optionLabel="nama_kelompok" optionValue="id" placeholder="Pilih Kelompok"/>
            <p v-if="errors.kelompok_id" class="text-red-500 text-sm mt-0">
                {{ errors.kelompok_id }}
            </p>
        </FormField>

        <FormField label="Nama Skill">
            <FormControl v-model="form.nama_skill" placeholder="Masukkan nama skill" />
        </FormField>

        <FormField label="Deskripsi Skill">
            <FormControl v-model="form.deskripsi_skill" placeholder="Masukkan deskripsi skill" />
        </FormField>

        <FormField label="Photo Piagam">
            <input type="file" @change="e => form.photo_piagam = e.target.files[0]" />
            <p v-if="errors.photo_piagam" class="text-red-500 text-sm mt-0">
                {{ errors.photo_piagam }}
            </p>
        </FormField>

        <template #footer>
            <BaseButtons>
                <BaseButton type="submit" color="success" label="Submit" @click="submit"/>
                <BaseButton type="reset" color="danger" outline label="Reset" @click="reset" />
            </BaseButtons>
        </template>
    </CardBox>
    <div v-if="form.recentlySuccessful" class="mt-4 p-4 bg-green-100 text-green-700 rounded">
        Form submitted successfully!
    </div>
    <div v-if="showAlert" class="mt-4 p-4 bg-red-100 text-red-700 rounded">
        Please fill in all required fields.
    </div>
</template>
