<template>
    <CardBox>
        <table class="min-w-full divide-y mx-auto">
            <thead>
                <tr>
                    <th colspan="8">
                        <BaseButton :icon="mdiDownload" @click="exportData" color="success" label="Export" />
                        <BaseButton :icon="mdiUpload" color="info" @click="importData()" class="mx-4" label="Import" />
                    </th>
                </tr>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Username
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Role
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-dark divide-y">
                <tr v-for="item in data" :key="item.id">
                    <td class="px-6 py-4 whitespace-nowrap">{{ item.username }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ item.email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ item.role }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <BaseButton :icon="mdiPencil" color="warning" @click="editData(item)" class="mx-4" />
                        <BaseButton :icon="mdiDelete" color="danger" @click="confirmDelete(item.id)" />
                    </td>
                </tr>
            </tbody>
        </table>
        <EditModal v-if="showEditModal" :item="selectedItem" :show="showEditModal" @close="closeEditModal" />
        <ImportModal v-if="showImportModal" :show="showImportModal" @close="closeImportModal" />
    </CardBox>
</template>

<script setup>
    import {
        ref
    } from 'vue';
    import {
        mdiDelete,
        mdiPencil,
        mdiUpload,
        mdiDownload
    } from '@mdi/js';
    import CardBox from '@/Components/CardBox.vue';
    import BaseButton from '@/Components/BaseButton.vue';
    import {
        useForm
    } from '@inertiajs/vue3';
    import Swal from 'sweetalert2';
    import EditModal from '@/Components/User/EditModal.vue';
    import ImportModal from "@/Components/User/ImportModal.vue";

    const props = defineProps({
        data: {
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
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.isConfirmed) {
                form.delete(route('user.destroy', id), {
                    preserveState: true,
                    preserveScroll: true,
                    onSuccess: () => {
                        Swal.fire('Deleted!', 'The item has been deleted.', 'success');
                    },
                    onError: (errors) => {
                        Swal.fire('Error!', 'There was a problem deleting the file.', 'error');
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
        window.location.href = route('userExport');
    };
</script>
