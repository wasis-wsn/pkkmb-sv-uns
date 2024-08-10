<template>
    <CardBox>
        <div class="overflow">
            <div class="search-form flex items-center gap-2 mb-4 my-2">
                <FormField>
                    <FormControl
                        v-model="searchQuery"
                        placeholder="Cari nama"
                    />
                </FormField>
            </div>
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
                            <!-- Tambahkan tombol "Tambah Semua Mahasiswa" di sini -->
                            <BaseButton
                                :icon="mdiAccountMultiplePlus"
                                color="success"
                                @click="tambahSemuaMahasiswa"
                                label="Tambah Semua Mahasiswa"
                            />
                        </th>
                    </tr>
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Username
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Email
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Role
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-dark divide-y">
                    <tr v-for="item in paginatedUsers" :key="item.id">
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ item.username }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ item.email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ item.role }}
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
            <!-- Pagination controls -->
            <div class="flex justify-center mt-4">
                <button
                    @click="prevPage"
                    :disabled="currentPage === 1"
                    class="mx-1 px-3 py-1 bg-primary text-white rounded disabled:opacity-50"
                >
                    Prev
                </button>
                <span class="mx-2">{{ currentPage }} / {{ totalPages }}</span>
                <button
                    @click="nextPage"
                    :disabled="currentPage === totalPages"
                    class="mx-1 px-3 py-1 bg-primary text-white rounded disabled:opacity-50"
                >
                    Next
                </button>
            </div>
        </div>
        <EditModal
            v-if="showEditModal"
            :item="selectedItem"
            :show="showEditModal"
            @close="closeEditModal"
        />
        <ImportModal
            v-if="showImportModal"
            :show="showImportModal"
            @close="closeImportModal"
        />
    </CardBox>
</template>

<script setup>
import { ref, computed } from "vue";
import { mdiDelete, mdiPencil, mdiUpload, mdiDownload } from "@mdi/js";
import CardBox from "@/Components/CardBox.vue";
import BaseButton from "@/Components/BaseButton.vue";
import { useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import EditModal from "@/Components/User/EditModal.vue";
import ImportModal from "@/Components/User/ImportModal.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";

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

const showImportModal = ref(false);
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
            form.delete(route("user.destroy", id), {
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

const importData = () => {
    showImportModal.value = true;
};

const closeImportModal = () => {
    showImportModal.value = false;
};

const exportData = () => {
    window.location.href = route("userExport");
};

// Search and Filter Logic
const searchQuery = ref("");
const selectedKelompok = ref("");
const currentPage = ref(1);
const itemsPerPage = 20;

const handleSearch = () => {
    currentPage.value = 1;
};

const filterByKelompok = (user) => {
    if (!selectedKelompok.value) {
        return true;
    } else {
        return user.kelompok?.nama_kelompok === selectedKelompok.value;
    }
};

const filteredUsers = computed(() => {
    let result = props.data;
    if (searchQuery.value) {
        const lowercasedQuery = searchQuery.value.toLowerCase();
        result = result.filter(
            (user) =>
                user.username.toLowerCase().includes(lowercasedQuery) ||
                user.email.toLowerCase().includes(lowercasedQuery) ||
                user.role.toLowerCase().includes(lowercasedQuery)
        );
    }
    return result.filter(filterByKelompok);
});

const paginatedUsers = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return filteredUsers.value.slice(start, end);
});

const totalPages = computed(() =>
    Math.ceil(filteredUsers.value.length / itemsPerPage)
);

const prevPage = () => {
    if (currentPage.value > 1) {
        currentPage.value--;
    }
};

const nextPage = () => {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
    }
};

// Tambahkan fungsi untuk menangani klik tombol "Tambah Semua Mahasiswa"
const tambahSemuaMahasiswa = () => {
    form.post(route("tambah.semua.mahasiswa"), {
        preserveState: true,
        preserveScroll: true,
        onSuccess: (page) => {
            const flashMessage =
                page.props.flash?.message || "Berhasil menambahkan mahasiswa.";
            Swal.fire("Berhasil!", flashMessage, "success");
        },
        onError: (errors) => {
            Swal.fire(
                "Error!",
                "Terjadi kesalahan saat menambahkan mahasiswa.",
                "error"
            );
            console.log(errors);
        },
    });
};
</script>
