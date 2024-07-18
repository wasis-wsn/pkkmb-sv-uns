<script setup>
import {
        ref
    } from "vue";
    import {
        mdiDelete,
        mdiPencil
    } from "@mdi/js";
    import CardBox from "@/Components/CardBox.vue";
import BaseButton from '@/Components/BaseButton.vue'
import { useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import EditModal from "@/Components/Materi/EditModal.vue";

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
            form.delete(route("materi.destroy", id), {
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
// const isModalActive = ref(false)
// const selectedClient = ref(null)

// const perPage = ref(5)
// const currentPage = ref(0)

// const itemsPaginated = computed(() =>
//   items.value.slice(perPage.value * currentPage.value, perPage.value * (currentPage.value + 1))
// )

// const numPages = computed(() => Math.ceil(items.value.length / perPage.value))

// const currentPageHuman = computed(() => currentPage.value + 1)  

// const pagesList = computed(() => {
//   const pagesList = []
//   for (let i = 0; i < numPages.value; i++) {
//     pagesList.push(i)
//   }
//   return pagesList
// })
</script>

<template>
  <CardBox>
      <table class="min-w-full divide-y mx-auto">
          <thead>
              <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Judul Materi
                  </th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Deskripsi Materi
                  </th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Isi Materi
                  </th>
              </tr>
          </thead>
          <tbody class="bg-dark divide-y">
              <tr v-for="item in data" :key="item.id">
                  <td class="px-6 py-4 whitespace-nowrap">
                      {{ item.judul_materi }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                      {{ item.deskripsi_materi }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                      {{ item.isi_materi }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                      <BaseButton :icon="mdiPencil" color="warning" @click="editData(item)" class="mx-4" />
                      <BaseButton :icon="mdiDelete" color="danger" @click="confirmDelete(item.id)" />
                  </td>
              </tr>
          </tbody>
      </table>

      <EditModal v-if="showEditModal" :item="selectedItem" :show="showEditModal" @close="closeEditModal" />
  </CardBox>
</template>

<!-- <style scoped>
.center-title {
  text-align: center;
}
</style> -->