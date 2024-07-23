<script setup>
import { ref } from "vue";
import { mdiDelete, mdiPencil } from "@mdi/js";
import CardBox from "@/Components/CardBox.vue";
import BaseButton from "@/Components/BaseButton.vue";
import { useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import EditModal from "@/Components-landing/profile-page/EditModal.vue";

const props = defineProps({
    data: {
        type: Array,
        required: true,
    },
});

const showEditModal = ref(false);
const selectedItem = ref(null);

const form = useForm({});

const confirmDelete = (id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route("mahasiswa.destroy", id), {
                preserveState: true,
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire(
                        "Deleted!",
                        "The item has been deleted.",
                        "success"
                    );
                },
                onError: (errors) => {
                    Swal.fire(
                        "Error!",
                        "There was a problem deleting the file.",
                        "error"
                    );
                    console.log(errors);
                },
            });
        }
    });
};

const editData = (item) => {
    selectedItem.value = item;
    showEditModal.value = true;
};

const closeEditModal = () => {
    showEditModal.value = false;
    selectedItem.value = null;
};
const customCardBoxStyle = {
        backgroundColor: '#f1f5f9', // Warna latar belakang yang Anda inginkan
        color: '#333', // Warna teks yang Anda inginkan
        border: '1px solid #ccc', // Warna border yang Anda inginkan
        padding: '20px', // Padding untuk memperindah tampilan
        borderRadius: '10px' // Sudut membulat
    };
</script>

<template>
    <CardBox :style="customCardBoxStyle" class="mt-5">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y mx-auto">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Nama Skill
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Deskripsi Skill
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Photo Piagam
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-dark divide-y">
                    <tr v-for="item in data" :key="item.id">
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ item.nama_skill }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ item.deskripsi_skill }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img
                                :src="`/storage/mahasiswa/${item.photo_piagam}`"
                                alt="Piagam"
                                class="w-20 h-20 object-cover"
                            />
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <BaseButton
                                :icon="mdiPencil"
                                color="warning"
                                @click="editData(item)"
                                class="mx-4"
                            />
                            <BaseButton
                                :icon="mdiDelete"
                                color="danger"
                                @click="confirmDelete(item.id)"
                            />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <EditModal
            v-if="showEditModal"
            :item="selectedItem"
            :show="showEditModal"
            @close="closeEditModal"
        />
    </CardBox>
</template>
