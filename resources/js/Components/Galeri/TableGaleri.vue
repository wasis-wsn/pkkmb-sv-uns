<template>
    <CardBox>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Judul
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Deskripsi
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Jenis
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        File
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="item in data" :key="item.id">
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ item.judul }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ item.deskripsi }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ item.jenis }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a :href="item.file_url" target="_blank">View File</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <BaseButton
                            icon="mdiPencil"
                            color="warning"
                            @click="editData(item)"
                        />
                        <BaseButton
                            icon="mdiDelete"
                            color="danger"
                            @click="deleteData(item.id)"
                        />
                    </td>
                </tr>
            </tbody>
        </table>
    </CardBox>
</template>

<script setup>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import CardBox from "@/Components/CardBox.vue";
import BaseButton from "@/Components/BaseButton.vue";
import { usePage } from "@inertiajs/vue3";

const { props } = usePage();
const data = ref(props.data);

const editData = (item) => {
    // Implement your edit logic here
};

const deleteData = (id) => {
    Inertia.delete(`/data/${id}`);
};
</script>
