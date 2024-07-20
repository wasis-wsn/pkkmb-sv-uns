<template>
    <!-- Search form -->
    <div class="bg-white p-4 mt-8 rounded-lg shadow-md overflow-x-auto">
        <form class="search-form flex items-center gap-2 mb-4" @submit.prevent="handleSearch">
            <div class="relative flex items-center border border-gray-300 rounded-lg p-1 focus-within:ring-2 focus-within:ring-blue-500">
                <input type="text" id="groupSearch" class="search-input w-full pl-3 py-2 focus:outline-none"
                    placeholder="Cari dirimu" v-model="searchQuery" />
            </div>
            <div class="relative cursor-pointer">
                <RiEqualizerLine class="h-5 w-5 text-gray-400 absolute right-3 top-1/2 transform -translate-y-1/2" />
                <select v-model="selectedKelompok" @change="handleSearch"
                    class="cursor-pointer block appearance-none w-full bg-white border border-gray-300 rounded-lg shadow-md py-2 pl-3 pr-10 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">Select All</option>
                    <option v-for="kel in kelompokList" :key="kel.id" :value="kel.nama_kelompok">{{ kel.nama_kelompok }}</option>
                </select>
            </div>
        </form>

        <!-- Table displaying users -->
        <table class="group-table w-full border-collapse">
            <thead>
                <tr class="bg-blue-100">
                    <th class="py-2 px-4 text-center border">Nama</th>
                    <th class="py-2 px-4 text-center border">Prodi</th>
                    <th class="py-2 px-4 text-center border">Kelompok</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in paginatedUsers" :key="user.id" class="border-b">
                    <td class="py-2 px-4 text-center">{{ user.nama_mahasiswa }}</td>
                    <td class="py-2 px-4 text-center">{{ user.prodi.nama_prodi }}</td>
                    <td class="py-2 px-4 text-center">{{ user.kelompok.nama_kelompok }}</td>
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
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { RiEqualizerLine } from "@remixicon/vue";
import axios from 'axios';

const searchQuery = ref('');
const selectedKelompok = ref('');
const currentPage = ref(1);
const itemsPerPage = 20;
const totalUsers = ref([]);
const kelompokList = ref([]);

const handleSearch = () => {
    currentPage.value = 1;
};

const fetchKelompok = async () => {
    try {
        const response = await axios.get('data-mahasiswa');
        console.log('Response:', response.data);
        totalUsers.value = response.data.data;
        kelompokList.value = response.data.kelompok;
    } catch (error) {
        console.error('Error fetching users:', error);
    }
};

const filterByKelompok = (user) => {
    if (!selectedKelompok.value) {
        return true;
    } else {
        return user.kelompok.nama_kelompok === selectedKelompok.value;
    }
};

const filteredUsers = computed(() => {
    let result = totalUsers.value;
    if (searchQuery.value) {
        const lowercasedQuery = searchQuery.value.toLowerCase();
        result = result.filter(user =>
            user.nama_mahasiswa.toLowerCase().includes(lowercasedQuery) ||
            user.prodi.nama_prodi.toLowerCase().includes(lowercasedQuery) ||
            user.kelompok.nama_kelompok.toLowerCase().includes(lowercasedQuery)
        );
    }
    return result.filter(filterByKelompok);
});

const paginatedUsers = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return filteredUsers.value.slice(start, end);
});

const totalPages = computed(() => Math.ceil(filteredUsers.value.length / itemsPerPage));

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

onMounted(() => {
    fetchKelompok();
});
</script>

<style>
  .group-table th,
  .group-table td {
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    max-width: 150px;
  }

  @media (max-width: 390px) {
    .group-table th,
    .group-table td {
      max-width: 100px;
    }
  }

  .search-input:focus+label {
    top: 1px;
    font-size: 12px;
    color: #333;
  }
</style>
