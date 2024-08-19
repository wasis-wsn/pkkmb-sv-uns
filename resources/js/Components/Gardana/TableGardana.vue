<template>
    <CardBox>
        <div class="overflow">
            <div class="search-form flex items-center gap-2 mb-4 my-2">
                <FormField>
                    <FormControl v-model="searchQuery" placeholder="Cari disini" @input="handleSearch" />
                    <FormControl
                        v-model="selectedKelompok"
                        :options="kelompok"
                        optionLabel="nama_kelompok"
                        optionValue="id"
                        placeholder="Select All"
                        @change="handleSearch"
                        multiple
                    />
                </FormField>
            </div>
            <table class="min-w-full divide-y mx-auto">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nama Gardana
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            No WhatsApp
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Kelompok
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-dark divide-y">
                    <tr v-for="item in paginatedGardana" :key="item.id">
                        <td class="px-6 py-4">
                            {{ item.nama_gardana }}
                        </td>
                        <td class="px-6 py-4">
                            {{ item.link_wa }}
                        </td>
                        <td class="px-6 py-4">
                            <ul>
                                <li v-for="kelompok in item.kelompok" :key="kelompok.id">
                                    {{ kelompok.nama_kelompok }}
                                </li>
                            </ul>
                        </td>
                        <td class="px-6 py-4">
                            <BaseButton :icon="mdiPencil" color="warning" @click="editData(item)" class="mx-4" />
                            <BaseButton :icon="mdiDelete" color="danger" @click="confirmDelete(item.id)" />
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Pagination controls -->
            <div class="flex justify-center mt-4">
                <button @click="prevPage" :disabled="currentPage === 1"
                    class="mx-1 px-3 py-1 bg-primary text-white rounded disabled:opacity-50">Prev</button>
                <span class="mx-2">{{ currentPage }} / {{ totalPages }}</span>
                <button @click="nextPage" :disabled="currentPage === totalPages"
                    class="mx-1 px-3 py-1 bg-primary text-white rounded disabled:opacity-50">Next</button>
            </div>
        </div>

        <EditModal v-if="showEditModal" :item="selectedItem" :show="showEditModal" :kelompok="kelompok"
            @close="closeEditModal" />
    </CardBox>
</template>

<script setup>
import { ref, computed } from "vue";
import { mdiDelete, mdiPencil, mdiDownload, mdiUpload } from "@mdi/js";
import CardBox from "@/Components/CardBox.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseButton from "@/Components/BaseButton.vue";
import { useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import EditModal from "@/Components/Gardana/EditModal.vue";

const props = defineProps({
    data: {
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
            form.delete(route("gardana.destroy", id), {
                preserveState: true,
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire("Deleted!", "The item has been deleted.", "success");
                },
                onError: (errors) => {
                    Swal.fire("Error!", "There was a problem deleting the file.", "error");
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

// Filter and Pagination Logic
const searchQuery = ref('');
const selectedKelompok = ref([]);
const currentPage = ref(1);
const itemsPerPage = 20;

const handleSearch = () => {
    currentPage.value = 1;
};

const filterByKelompok = (gardana) => {
    if (!selectedKelompok.value.length) {
        return true;
    } else {
        return selectedKelompok.value.includes(gardana.kelompok_id); // Pastikan ini sesuai dengan field ID dari kelompok
    }
};

const filteredGardana = computed(() => {
    let result = props.data;
    if (searchQuery.value) {
        const lowercasedQuery = searchQuery.value.toLowerCase();
        result = result.filter(gardana =>
            gardana.nama_gardana.toLowerCase().includes(lowercasedQuery) ||
            gardana.link_wa.toLowerCase().includes(lowercasedQuery) ||
            gardana.kelompok.some(kelompok =>
                kelompok.nama_kelompok.toLowerCase().includes(lowercasedQuery)
            )
        );
    }
    return result.filter(filterByKelompok);
});

const paginatedGardana = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return filteredGardana.value.slice(start, end);
});

const totalPages = computed(() => Math.ceil(filteredGardana.value.length / itemsPerPage));

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
</script>
