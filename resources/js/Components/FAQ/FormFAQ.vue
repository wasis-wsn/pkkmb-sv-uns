<script setup>
import { ref, computed } from 'vue';
import { useForm } from '@inertiajs/vue3';
import CardBox from '@/Components/CardBox.vue';
import FormField from '@/Components/FormField.vue';
import FormControl from '@/Components/FormControl.vue';
import BaseButton from '@/Components/BaseButton.vue';
import BaseButtons from '@/Components/BaseButtons.vue';

const form = useForm({
    pertanyaan: '',
    jawaban: ''
});

const errors = ref({});
const showAlert = ref(false);

const isFormValid = computed(() => {
    return form.pertanyaan && form.jawaban;
});

const validateForm = () => {
    errors.value = {};
    if (!form.pertanyaan) {
        errors.value.pertanyaan = 'Pertanyaan is required.';
    }
    if (!form.jawaban) {
        errors.value.jawaban = 'Jawaban is required.';
    }
    return Object.keys(errors.value).length === 0;
};

const submit = () => {
    if (validateForm()) {
        showAlert.value = false;
        form.post(route('faq.store'), {
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
        <FormField label="Pertanyaan">
            <FormControl v-model="form.pertanyaan" placeholder="Masukkan pertanyaan" />
        </FormField>
        <p v-if="errors.pertanyaan" class="text-red-500 text-sm">
            {{ errors.pertanyaan }}
        </p>

        <FormField label="Jawaban">
            <FormControl v-model="form.jawaban" placeholder="Masukkan jawaban" />
        </FormField>
        <p v-if="errors.jawaban" class="text-red-500 text-sm">
            {{ errors.jawaban }}
        </p>

        <template #footer>
            <BaseButtons>
                <BaseButton type="submit" color="success" label="Submit" @click="submit" />
                <BaseButton type="reset" color="danger" outline label="Reset" @click="reset" />
            </BaseButtons>
        </template>
    </CardBox>

    <div v-if="form.recentlySuccessful" class="mt-4 p-4 bg-green-100 text-green-700 rounded">
        FAQ submitted successfully!
    </div>

    <div v-if="showAlert" class="mt-4 p-4 bg-red-100 text-red-700 rounded">
        Please fill in all required fields.
    </div>
</template>
