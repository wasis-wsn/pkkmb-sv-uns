<script setup>
import { ref } from "vue";
import { mdiDelete, mdiPencil } from "@mdi/js";
import CardBox from "@/Components/CardBox.vue";
import BaseButton from "@/Components/BaseButton.vue";
import { useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import EditModal from "@/Components/Hima/EditModal.vue";

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
        title: "Apakah kamu yakin?",
        text: "Anda tidak akan dapat mengembalikan lagi!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus ini!",
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route("hima.destroy", id), {
                preserveState: true,
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire(
                        "Dihapus!",
                        "Data Berhasil di hapus.",
                        "success"
                    );
                },
                onError: (errors) => {
                    Swal.fire(
                        "Error!",
                        "Ada masalah saat menghapus foto.",
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
    <CardBox>
        <table class="min-w-full divide-y mx-auto">
            <thead>
                <tr >
                  <th class="text-center" v-if="checkable" />
                    <th class="text-center">Nama Hima</th>
                    <th class="text-center">Logo Hima</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-dark divide-y ">
                <tr v-for="item in data" :key="item.id">
                    <td class="px-6 py-4 text-center">
                        {{ item.nama_hima }}
                    </td>
                    <td class="px-6 py-4 flex justify-center">
                        <img
                            :src="`/storage/hima/${item.logo_hima}`"
                            alt="Dokumen"
                            class="w-40 h-40 object-cover text-center"
                        />
                    </td>
                    <td class="px-6 py-4 text-center">
                        <BaseButton
                            :icon="mdiPencil"
                            color="warning"
                            @click="editData(item)"
                            outline
                            class="mx-4"
                        />
                        <BaseButton
                            :icon="mdiDelete"
                            color="danger"
                            outline
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
            @close="closeEditModal"
        />
    </CardBox>
</template>
