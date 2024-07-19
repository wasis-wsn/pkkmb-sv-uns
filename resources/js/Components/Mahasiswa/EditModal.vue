<script setup>
import { ref, watch } from "vue";
import { useForm } from "@inertiajs/vue3";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseButton from "@/Components/BaseButton.vue";
import { mdiAccount, mdiPhone, mdiBook, mdiCertificate } from "@mdi/js";

const props = defineProps({
    item: Object,
    show: Boolean,
});

const emit = defineEmits(["close"]);

const form = useForm({
    _method: "PUT", // Add this line to force PUT method
    nama_mahasiswa: "",
    no_telp: "",
    prodi_id: "",
    kelompok_id: "",
    nama_skill: "",
    deskripsi_skill: "",
    photo_piagam: null,
});

watch(
    () => props.item,
    (newItem) => {
        if (newItem) {
            form.nama_mahasiswa = newItem.nama_mahasiswa;
            form.no_telp = newItem.no_telp;
            form.prodi_id = newItem.prodi_id;
            form.kelompok_id = newItem.kelompok_id;
            form.nama_skill = newItem.nama_skill;
            form.deskripsi_skill = newItem.deskripsi_skill;
        }
    },
    { immediate: true }
);

const submit = () => {
    form.post(route("mahasiswa.update", props.item.id), {
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
                >​</span
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
                                Edit Mahasiswa
                            </h3>
                            <div class="mt-2">
                                <FormField label="Nama Mahasiswa">
                                    <FormControl
                                        v-model="form.nama_mahasiswa"
                                        :icon="mdiAccount"
                                    />
                                </FormField>
                                <FormField label="No Telp">
                                    <FormControl
                                        v-model="form.no_telp"
                                        :icon="mdiPhone"
                                    />
                                </FormField>
                                <FormField label="Prodi">
                                    <FormControl
                                        v-model="form.prodi_id"
                                        :icon="mdiBook"
                                        placeholder="Masukkan ID Prodi"
                                    />
                                </FormField>
                                <FormField label="Kelompok">
                                    <FormControl
                                        v-model="form.kelompok_id"
                                        :icon="mdiBook"
                                        placeholder="Masukkan ID Kelompok"
                                    />
                                </FormField>
                                <FormField label="Nama Skill">
                                    <FormControl
                                        v-model="form.nama_skill"
                                        :icon="mdiCertificate"
                                    />
                                </FormField>
                                <FormField label="Deskripsi Skill">
                                    <FormControl
                                        v-model="form.deskripsi_skill"
                                        :icon="mdiCertificate"
                                    />
                                </FormField>
                                <FormField label="Photo Piagam">
                                    <input
                                        type="file"
                                        @change="(e) => form.photo_piagam = e.target.files[0]"
                                        class="form-control"
                                    />
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
