<script setup>
import { ref, watch, computed } from "vue";
import { useForm } from "@inertiajs/vue3";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseButton from "@/Components/BaseButton.vue";
import { mdiAccount } from "@mdi/js";
import FormFilePicker from "@/Components/FormFilePicker.vue";

const props = defineProps({
    item: {
        type: Object,
        required: true,
    },
    show: {
        type: Boolean,
        required: true,
    },
    skill: {
        type: Array,
        required: true,
    },
    mahasiswa: {
        type: Object,
        required: true,
    },
});

const emit = defineEmits(["close"]);

const form = useForm({
    _method: "PUT", // Add this line to force PUT method
    nama_skill: "",
    deskripsi_skill: "",
    photo_piagam: null,
});

const mahasiswaOptions = computed(() => {
    return Object.entries(props.mahasiswa).map(([id, nama]) => ({
        id: id,
        nama: nama,
    }));
});

watch(
    () => props.item,
    (newItem) => {
        if (newItem) {
            form.nama_skill = newItem.nama_skill;
            form.deskripsi_skill = newItem.deskripsi_skill;
            form.photo_piagam = newItem.photo_piagam;
        }
    },
    { immediate: true }
);

const submit = () => {
    form.post(route("keterangan.update", props.item.id), {
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
                                Edit Skill
                            </h3>
                            <div class="mt-2">
                                <FormField label="Nama Skill">
                                    <FormControl
                                        v-model="form.skill_id"
                                        :options="props.skill"
                                        optionLabel="nama_skill"
                                        optionValue="id"
                                        placeholder="Pilih Skill"
                                    />
                                </FormField>
                                <FormField label="Deskripsi Skill">
                                    <FormControl
                                        v-model="form.deskripsi_skill"
                                        placeholder="Masukkan deskripsi skill"
                                    />
                                </FormField>
                                <FormField label="Mahasiswa">
                                    <FormControl
                                        v-model="form.mahasiswa_id"
                                        :options="mahasiswaOptions"
                                        optionLabel="nama"
                                        optionValue="id"
                                        placeholder="Pilih Mahasiswa"
                                    />
                                </FormField>
                                <FormField
                                    label="Upload File (image max 10 MB)"
                                >
                                    <FormFilePicker
                                        v-model="form.photo_piagam"
                                        label="Upload"
                                        name="photo_piagam"
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
