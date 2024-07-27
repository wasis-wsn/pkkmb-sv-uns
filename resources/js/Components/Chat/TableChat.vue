<template>
  <CardBox>
    <table class="min-w-full divide-y mx-auto">
      <thead>
        <tr>
          <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-1/4">
            Nama Pengguna
          </th>
          <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6">
            Jumlah Pesan Belum Dibaca
          </th>
          <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6">
            Pengirim Terakhir
          </th>
        </tr>
      </thead>
      <tbody class="bg-dark divide-y">
        <tr v-for="item in data" :key="item.id">
          <td class="px-6 py-4 whitespace-nowrap">{{ item.user_id }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-center">{{ item.unseen_messages_count }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-center">{{ item.last_sender }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-center">
            <BaseButton :icon="mdiDelete" color="danger" @click="confirmDelete(item.id)" />
          </td>
        </tr>
      </tbody>
    </table>
  </CardBox>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
  data: {
    type: Array, // Ubah ke Object jika `data` adalah objek paginasi
    required: true,
  },
});

</script>
