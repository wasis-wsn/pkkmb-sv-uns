<script setup>
    import CardBox from '@/Components/CardBox.vue'
    import FormField from '@/Components/FormField.vue'
    import FormControl from '@/Components/FormControl.vue'
    import BaseButton from '@/Components/BaseButton.vue'
    import BaseButtons from '@/Components/BaseButtons.vue'
    import { ref, computed } from "vue";
    import { useForm } from "@inertiajs/vue3";
    
    const form = useForm({
        judul_youtube: "",
        link_youtube: "",
    });

    const errors = ref({});
    const showAlert = ref(false);

    const isFormValid = computed(() => {
        return form.judul_youtube && form.link_youtube;
    });

    const validateForm = () => {
    errors.value = {};
    if (!form.judul_youtube) {
        errors.value.judul_youtube = "Judul Youtube is required.";
    }
    if (!form.link_youtube) {
        errors.value.link_youtube = "link Youtube is required.";
    }
    return Object.keys(errors.value).length === 0;
};

const submit = () => {
    if (validateForm()) {
        showAlert.value = false;
        form.post(route("youtube.store"), {
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
    <CardBox form @submit.prevent="submit">
        <FormField label="Nama Vidio Youtube" help="">
            <FormControl v-model="form.judul_youtube" type="text" placeholder="Judul vidio youtube" />
        </FormField>
        <FormField label="Link Youtube" help="">
            <FormControl v-model="form.link_youtube" type="text" placeholder="Masukkan link disini" />
            <p v-if="errors.link_youtube" class="text-red-500 text-sm mt-1">
                {{ errors.link_youtube }}
            </p>
        </FormField>
        <template #footer>
            <BaseButtons>
                <BaseButton type="submit" color="success" label="Submit" @click="submit" />
                <BaseButton type="reset" color="danger" outline label="Reset" @click="reset"/>
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
