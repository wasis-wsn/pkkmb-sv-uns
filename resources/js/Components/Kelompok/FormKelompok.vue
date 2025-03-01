<script setup>
import { ref, computed } from 'vue';
import { useForm } from '@inertiajs/vue3';
import CardBox from '@/Components/CardBox.vue';
import FormField from '@/Components/FormField.vue';
import FormControl from '@/Components/FormControl.vue';
import BaseButton from '@/Components/BaseButton.vue';
import BaseButtons from '@/Components/BaseButtons.vue';

const props = defineProps({
    gardana: {
        type: Array,
        required: true
    }
});

const form = useForm({
    nama_kelompok: "",
    gardana_id: "",
});

const errors = ref({});
const showAlert = ref(false);

const isFormValid = computed(() => {
    return form.nama_kelompok && form.gardana_id;
});

const validateForm = () => {
    errors.value = {};
    if (!form.nama_kelompok) {
        errors.value.nama_kelompok = 'Nama Kelompok is required.';
    }
    if (!form.gardana_id) {
        errors.value.gardana_id = 'Gardana is required.';
    }
    return Object.keys(errors.value).length === 0;
};

const submit = () => {
    if (validateForm()) {
        showAlert.value = false;
        form.post(route('kelompok.store'), {
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
        <FormField label="Nama Kelompok">
            <FormControl v-model="form.nama_kelompok" placeholder="Masukkan nama Kelompok" />
        </FormField>
        <p v-if="errors.nama_kelompok" class="text-red-500 text-sm">
            {{ errors.nama_kelompok }}
        </p>

        <FormField label="Gardana">
            <FormControl
                v-model="form.gardana_id"
                :options="gardana"
                optionLabel="nama_gardana"
                optionValue="id"
                placeholder="Pilih Gardana"
            />
        </FormField>
        <p v-if="errors.gardana_id" class="text-red-500 text-sm">
            {{ errors.gardana_id }}
        </p>

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
