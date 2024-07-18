<script setup>
import { ref, watch } from "vue";
import { useForm } from "@inertiajs/vue3";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseButton from "@/Components/BaseButton.vue";
import { mdiAccount } from "@mdi/js";
import FormFilePicker from "@/Components/FormFilePicker.vue";

const props = defineProps({
    item: Object,
    show: Boolean,
});

const emit = defineEmits(["close"]);

const form = useForm({
    _method: "PUT", // Add this line to force PUT method
    nama_sponsor: "",
    logo_sponsor: null,
    logo_sponsor_preview: null,
});

watch(
    () => props.item,
    (newItem) => {
        if (newItem) {
            form.nama_sponsor = newItem.nama_sponsor;
            form.logo_sponsor_preview = newItem.logo_sponsor ? `/storage/${newItem.logo_sponsor}` : null;
            form.logo_sponsor = null; // Reset file input
        }
    },
    { immediate: true }
);

const selectOptions = [{ label: "Sponsor" }];

const submit = () => {
    form.post(route("sponsor.update", props.item.id), {
        preserveState: true,
        preserveScroll: true,
        forceFormData: true,
        onSuccess: () => {
            emit("close");
        },
        onError: (errors) => {
            console.log(errors);
        },
    });
};

const handleFileChange = (event) => {
    const file = event.target.files[0];
    form.logo_sponsor = file;
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            form.logo_sponsor_preview = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        form.logo_sponsor_preview = null;
    }
};
</script>

<template>
    <div class="fixed z-10 inset-0 overflow-y-auto" v-if="show">
        <div
            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
        >
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span
                class="hidden sm:inline-block sm:align-middle sm:h-screen"
                aria-hidden="true"
                ></span
            >
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            >
                <div class="bg-slate-900 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"
                        >
                            <h3
                                class="text-lg leading-6 font-medium text-gray-900"
                            >
                                Edit Sponsor
                            </h3>
                            <div class="mt-2">
                                <FormField label="Nama Sponsor">
                                    <FormControl
                                        v-model="form.nama_sponsor"
                                    />
                                </FormField>
                                
                                <FormField
                                    label="Upload File (image max 10 MB)"
                                >
                                    <FormFilePicker
                                        v-model="form.logo_sponsor"
                                        label="Upload"
                                        name="logo_sponsor"
                                        @change="handleFileChange"
                                    />
                                    <div v-if="form.logo_sponsor_preview" class="mt-2">
                                        <img :src="form.logo_sponsor_preview" v-if="form.logo_sponsor_preview"/>
                                    </div>
                                </FormField>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-blue-950 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                >
                    <BaseButton
                        type="button"
                        color="info"
                        label="Save"
                        @click="submit"
                    />
                    <BaseButton
                        class="mx-4"
                        type="button"
                        color="warning"
                        label="Cancel"
                        @click="$emit('close')"
                        outline
                    />
                </div>
            </div>
        </div>
    </div>
</template>
