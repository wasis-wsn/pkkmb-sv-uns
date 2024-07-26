<script setup>
import { ref, watch } from "vue";
import { useForm } from "@inertiajs/vue3";
import FormField from "@/Components/FormField.vue";
import FormFilePicker from "@/Components/FormFilePicker.vue";
import FormControlProfile from "@/Components/FormControlProfile.vue";



const props = defineProps({
    item: {
        type: Object,
        required: true,
    },
    show: {
        type: Boolean,
        required: true,
    },
    skills: {
        type: Array,
        required: true,
    },
});

const emit = defineEmits(["close"]);

const form = useForm({
    _method: "PUT",
    deskripsi_skill: "",
    skill_id: "",
    photo_piagam: "",
});

watch(
    () => props.item,
    (newItem) => {
        if (newItem) {
            form.deskripsi_skill = newItem.deskripsi_skill;
            form.skill_id = newItem.skill_id;
            form.photo_piagam = null; // Reset file input
        }
    },
    { immediate: true }
);

const submit = () => {
    form.post(route("profileSkill.update", props.item.id), {
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
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Skill</h3>
                            <div class="mt-2">
                                <!-- Skill Select -->
                                <div class="mb-4">
                                    <label for="skill_id" class="block text-sm font-medium text-gray-700">Nama Skill</label>
                                    <FormControlProfile
                                        v-model="form.skill_id"
                                        :options="props.skills"
                                        optionLabel="nama_skill"
                                        optionValue="id"
                                        placeholder="Pilih Skill"
                                        class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    />
                                </div>

                                <!-- Description Input -->
                                <FormField label="Deskripsi Skill">
                                    <FormControlProfile
                                        v-model="form.deskripsi_skill"
                                        placeholder="Masukkan deskripsi skill"
                                    />
                                </FormField>

                                <!-- File Input -->
                                <FormField label="Upload File (image max 10 MB)">
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
                <div class="bg-blue-950 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button
                        type="button"
                        @click="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                    >
                        Save
                    </button>
                    <button
                        type="button"
                        @click="$emit('close')"
                        class="inline-flex justify-center py-2 px-4 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 mr-5"
                    >
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
