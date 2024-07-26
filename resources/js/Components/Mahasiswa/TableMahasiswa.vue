<script setup>
import { ref } from "vue";
import { mdiDelete, mdiPencil, mdiDownload, mdiUpload } from "@mdi/js";
import CardBox from "@/Components/CardBox.vue";
import BaseButton from "@/Components/BaseButton.vue";
import { useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import EditModal from "@/Components/Mahasiswa/EditModal.vue";
import ImportModal from "@/Components/Mahasiswa/ImportModal.vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    data: {
        type: Array,
        required: true,
    },
    prodi: {
        type: Array,
        required: true,
    },
    kelompok: {
        type: Array,
        required: true,
    },
});

const showEditModal = ref(false);
const showImportModal = ref(false);
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

const importData = () => {
    showImportModal.value = true;
};

const closeEditModal = () => {
    showEditModal.value = false;
    selectedItem.value = null;
};

const closeImportModal = () => {
    showImportModal.value = false;
};

const exportData = () => {
    window.location.href = route("mahasiswaExport");
};
</script>

<template>
    <CardBox>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y mx-auto">
                <thead>
                    <tr>
                        <th colspan="8">
                            <BaseButton
                                :icon="mdiDownload"
                                @click="exportData"
                                color="success"
                                label="Export"
                            />
                            <BaseButton
                                :icon="mdiUpload"
                                color="info"
                                @click="importData()"
                                class="mx-4"
                                label="Import"
                            />
                        </th>
                    </tr>
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Nama Mahasiswa
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            No Telp
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Prodi
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Kelompok
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
                            {{ item.nama_mahasiswa }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ item.no_telp }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ item.prodi?.nama_prodi }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ item.kelompok?.nama_kelompok }}
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
            :prodi="prodi"
            :kelompok="kelompok"
            @close="closeEditModal"
        />
        <ImportModal
            v-if="showImportModal"
            :show="showImportModal"
            @close="closeImportModal"
        />
    </CardBox>
</template>
