<script setup>
import { ref } from "vue";
import { mdiDelete, mdiPencil } from "@mdi/js";
import BaseButton from "@/Components/BaseButton.vue";
import { useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import EditModal from "@/Components-landing/profile-page/EditModal.vue";

const props = defineProps({
    data: {
        type: Array,
        required: true,
    },
    skills: {
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
            form.delete(route("profileSkill.destroy", id), {
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
</script>

<template>
    <div class="bg-white p-4 mt-8 rounded-lg shadow-md overflow-x-auto">

<!-- Table displaying users -->
<table class="group-table w-full border-collapse">
    <thead>
        <tr class="bg-blue-100">
            <th class="py-2 px-4 text-center border">Nama Skill</th>
            <th class="py-2 px-4 text-center border">Deskripsi Skill</th>
            <th class="py-2 px-4 text-center border">Piagam</th>
            <th class="py-2 px-4 text-center border">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="item in data" :key="item.id" class="border-b">
            <td class="py-2 px-4 text-center">{{ item.skill.nama_skill }}</td>
            <td class="py-2 px-4 text-center">{{ item.deskripsi_skill }}</td>
            <td class="py-2 px-4 text-center">
                <img
                    :src="`/storage/piagam/${item.photo_piagam}`"
                    alt="Dokumen"
                    class="w-20 h-20 object-cover mx-auto"
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
<EditModal
            v-if="showEditModal"
            :item="selectedItem"
            :show="showEditModal"
            :skills="skills"
            @close="closeEditModal"
        />
</div>
</template>
