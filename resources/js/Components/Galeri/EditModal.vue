<script setup>
import { ref, watch } from "vue";
import { useForm } from "@inertiajs/vue3";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseButton from "@/Components/BaseButton.vue";
import { mdiAccount } from "@mdi/js";
import FormFilePicker from "@/Components/FormFilePicker.vue";
import CardBox from "../CardBox.vue";

const props = defineProps({
    item: Object,
    show: Boolean,
});

const emit = defineEmits(["close"]);

const form = useForm({
    _method: "PUT", // Add this line to force PUT method
    judul_dokum: "",
    deskripsi_dokum: "",
    jenis_dokum: "",
    photo_dokum: null,
});

watch(
    () => props.item,
    (newItem) => {
        if (newItem) {
            form.judul_dokum = newItem.judul_dokum;
            form.deskripsi_dokum = newItem.deskripsi_dokum;
            form.jenis_dokum = newItem.jenis_dokum;
            form.photo_dokum = null; // Reset file input
        }
    },
    { immediate: true }
);

const selectOptions = [{ label: "Galeri" }, { label: "Slide Acara" }];

const submit = () => {
    form.post(route("galeri.update", props.item.id), {
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
    form.photo_dokum = event.target.files[0];
};
</script>

<template>
    <div class="fixed z-10 inset-0 overflow-y-auto" v-if="show">
        <div
            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
        >
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 "></div>
            </div>
            <span
                class="hidden sm:inline-block sm:align-middle sm:h-screen"
                aria-hidden="true"
                >​</span
            >
            <div
                class="inline-block align-bottom rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            >
                <CardBox>
                    <div class=" sm:items-start">
                        <div
                            class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"
                        >
                            <h3
                                class="text-lg leading-6 font-medium"
                            >
                                Edit Galeri
                            </h3>
                            <div class="mt-2">
                                <FormField label="Judul Dokumen">
                                    <FormControl
                                        v-model="form.judul_dokum"
                                        :icon="mdiAccount"
                                    />
                                </FormField>
                                <FormField label="Deskripsi Dokumen">
                                    <FormControl
                                        v-model="form.deskripsi_dokum"
                                        placeholder="Deskripsi Dokumen/Acara"
                                    />
                                </FormField>
                                <FormField label="Jenis Dokumen">
                                    
                                    <select
                                        v-model="form.jenis_dokum"
                                        class=""
                                    >
                                        <option
                                            v-for="option in selectOptions"
                                            :key="option.label"
                                            :value="option.label"
                                        >
                                            {{ option.label }}
                                        </option>
                                    </select>
                                </FormField>
                                <FormField
                                    label="Upload File (image max 10 MB)"
                                >
                                    <FormFilePicker
                                        v-model="form.photo_dokum"
                                        label="Upload"
                                        name="photo_dokum"
                                    />
                                </FormField>
                            </div>
                        </div>
                    </div>
                
                <div
                    class=" px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
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
            </CardBox>
            </div>
        </div>
    </div>
</template>
