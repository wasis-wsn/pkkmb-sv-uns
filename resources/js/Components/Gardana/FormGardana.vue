<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import CardBox from "@/Components/CardBox.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseButton from "@/Components/BaseButton.vue";
import BaseButtons from "@/Components/BaseButtons.vue";

const form = useForm({
    nama_gardana: "",
    link_wa: "",
});

const errors = ref({});
const showAlert = ref(false);
const emit = defineEmits(["close"]);

const validateForm = () => {
    errors.value = {};
    if (!form.nama_gardana) {
        errors.value.nama_gardana = "Nama Gardana is required.";
    }
    if (!form.link_wa) {
        errors.value.link_wa = "Link Whatsapp is required.";
    }
    return Object.keys(errors.value).length === 0;
};

const submit = () => {
    if (validateForm()) {
        showAlert.value = false;
        form.post(route("gardana.store"), {
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
        <FormField label="Nama Gardana">
            <FormControl
                v-model="form.nama_gardana"
                placeholder="Masukkan nama gardana"
            />
        </FormField>
        <p v-if="errors.nama_gardana" class="text-red-500 text-sm mb-3">
            {{ errors.nama_gardana }}
        </p>

        <FormField label="No WhatsApp">
            <FormControl
                v-model="form.link_wa"
                placeholder="Masukkan link WA dengan menggunakan "
            />
        </FormField>
        <p v-if="errors.link_wa" class="text-red-500 text-sm mb-3">
            {{ errors.link_wa }}
        </p>

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
