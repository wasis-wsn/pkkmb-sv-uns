<template>
  <div class="flex flex-col bg-white">
      <header class="flex gap-5 max-md:flex-col max-md:gap-0">
        <section class="flex flex-col flex-1 items-start pb-32 mt-16 ml-2 rounded-full border border-solid border-violet-300 border-opacity-50 max-md:max-w-full">
            <div class="shrink-0 mt-20 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[180px] max-md:mt-10"></div>
            <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[120px] max-md:mt-10"></div>
            <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[190px]"></div>
            <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[150px]"></div>
            <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[200px]"></div>
            <div class="self-end mt-1 mb-0 max-md:max-w-full">
                <h1 class="self-stretch pl-8 mt-5 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-10 max-md:max-w-full">
                    <span class="font-semibold">Selamat Datang di </span></h1>
                <h1 class="self-stretch pl-8 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-0 max-md:max-w-full">
                    <span class="text-5xl text-red-400">PKKMB SV UNS 2024</span>.
                </h1>
            </div>
        </section>
        <section class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
            <img loading="lazy" src="@/assets/logo_besar.png" alt="" class="box-border object-cover overflow-hidden shrink-0 mt-0 w-full aspect-[0.99] min-h-[20px] min-w-[20px]" />
        </section>
      </header>
      <div class="flex gap-5 self-end px-5 mt-0 max-md:mt-10">
        <div class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"></div>
        <div class="shrink-0 self-end mt-16 bg-red-300 bg-opacity-20 h-[130px] rounded-[100px] w-[5px] max-md:mt-10"></div>
        <div class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"></div>
        <div class="shrink-0 self-end mt-12 bg-red-300 bg-opacity-20 h-[150px] rounded-[100px] w-[5px] max-md:mt-10"></div>
        <div class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"></div>
      </div>
  </div>
  <section class="flex justify-center items-center px-16 py-20 -mt-1 w-full bg-slate-100 max-md:px-5 max-md:mt-10 max-md:max-w-full">
      <div class="flex flex-col grow shrink-0 self-start px-5 text-center basis-0 w-fit max-md:max-w-full">
        <h2
          class="flex flex-col self-center max-w-full text-3xl font-bold capitalize text-neutral-900 w-[650px] max-md:w-full">
          <span class="max-md:max-w-full">
            BUKU IMPLEMENTASI NILAI ASKARA MUDA<br />PKKMB SV UNS 2024
          </span>
          <div class="shrink-0 mt-2.5 h-1 bg-red-400 max-md:max-w-full"></div>
        </h2>
        <p class="mt-8 z-20 text-2xl text-stone-900 max-md:max-w-full max-md:text-xl text-[18px] md:text-[24px]">
          Hallo Vocazens! Materi ini berisi Buku Implementasi Nilai<br />Askara Muda yang digunakan sebagai materi dalam
          kegiatan
          <br />PKKMB SV UNS 2024.
        </p>
        <div class="bg-white p-4 rounded-lg shadow-md overflow-x-auto">
  <form class="search-form flex items-center gap-2 mb-4" @submit.prevent>
    <div class="relative w-60">
      <div class="relative grid grid-cols-[auto_1fr] items-center border border-gray-300 rounded-lg p-1 focus-within:ring-2 focus-within:ring-blue-500">
        <input type="text" id="groupSearch" class="search-input w-full pl-2 py-2 focus:outline-none" placeholder="Masukkan nama anda" v-model="searchQuery" @input="handleSearch" />
        <Search v-if="!isSearching" />
      </div>
    </div>
    <div class="relative">
      <Filter @click="toggleDropdown" />
      <div v-show="showDropdown" class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-md">
        <div class="py-2">
          <div class="block px-4 py-2 text-gray-800 hover:bg-gray-100 w-full text-left cursor-pointer" v-for="kel in kelompok" :key="kel.id" @click="filterByKelompok(kel.kelompok)">{{ kel.kelompok }}</div>
        </div>
      </div>
    </div>
  </form>
  <table class="group-table w-full border-collapse">
    <thead>
      <tr class="bg-blue-100 ">
        <th class="py-2 px-4 text-center border">Nama</th>
        <th class="py-2 px-4 text-center border">Prodi</th>
        <th class="py-2 px-4 text-center border">Kelompok</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="user in paginatedUsers" :key="user.id" class="border-b">
        <td class="py-2 px-4 text-center">{{ user.nama }}</td>
        <td class="py-2 px-4 text-center">{{ user.prodi }}</td>
        <td class="py-2 px-4 text-center">{{ user.kelompok }}</td>
      </tr>
    </tbody>
  </table>
  <div class="flex justify-center mt-4">
    <button @click="prevPage" :disabled="currentPage === 1" class="mx-1 px-3 py-1 bg-blue-500 text-white rounded disabled:opacity-50">Prev</button>
    <span class="mx-2">{{ currentPage }} / {{ totalPages }}</span>
    <button @click="nextPage" :disabled="currentPage === totalPages" class="mx-1 px-3 py-1 bg-blue-500 text-white rounded disabled:opacity-50">Next</button>
  </div>
</div>

      </div>
  </section>
</template>

<script setup>
  import {
    ref,
    computed
  } from 'vue';
  import {
    Search,
    Filter
  } from 'lucide-vue-next';

  // Sample data, replace with actual data
  const users = [{
      id: 1,
      nama: 'yoga',
      prodi: 'd3 teknik informatika',
      kelompok: 'macan aung'
    },
    {
      id: 2,
      nama: 'ardya',
      prodi: 'd3 teknik informatika',
      kelompok: 'bangau wayaw'
    },
    {
      id: 3,
      nama: 'mamat',
      prodi: 'd3 teknik informatika',
      kelompok: 'elang putra'
    },
    {
      id: 4,
      nama: 'mamat',
      prodi: 'd3 teknik informatika',
      kelompok: 'elang putra'
    },
    {
      id: 5,
      nama: 'mamat',
      prodi: 'd3 teknik informatika',
      kelompok: 'elang putra'
    },
    {
      id: 6,
      nama: 'mamat',
      prodi: 'd3 teknik informatika',
      kelompok: 'elang putra'
    },
    {
      id: 7,
      nama: 'mamat',
      prodi: 'd3 teknik informatika',
      kelompok: 'elang putra'
    },
  ];

  const kelompok = [{
      id: 1,
      kelompok: 'macan aung'
    },
    {
      id: 2,
      kelompok: 'bangau wayaw'
    },
    {
      id: 3,
      kelompok: 'elang putra'
    },
  ];

  const searchQuery = ref('');
  const selectedKelompok = ref('');
  const showDropdown = ref(false);
  const isSearching = ref(false);

const currentPage = ref(1);
const itemsPerPage = 20;

const toggleDropdown = () => {
  showDropdown.value = !showDropdown.value;
};

  const filterByKelompok = (kel) => {
    selectedKelompok.value = kel;
    showDropdown.value = false;
  };

const handleSearch = () => {
  isSearching.value = searchQuery.value.length > 0;
  currentPage.value = 1; // Reset to first page when search query changes
};

const filteredUsers = computed(() => {
  let result = users;
  if (searchQuery.value) {
    const lowercasedQuery = searchQuery.value.toLowerCase();
    result = result.filter(user =>
      user.nama.toLowerCase().includes(lowercasedQuery) ||
      user.prodi.toLowerCase().includes(lowercasedQuery) ||
      user.kelompok.toLowerCase().includes(lowercasedQuery)
    );
  }
  if (selectedKelompok.value) {
    result = result.filter(user => user.kelompok === selectedKelompok.value);
  }
  return result;
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
</script>

<style>
  .group-table th,
  .group-table td {
    white-space: nowrap;
  }
  
  .group-table th,
  .group-table td {
    text-overflow: ellipsis;
    overflow: hidden;
    max-width: 150px; /* Adjust as needed */
  }
  
  @media (max-width: 390px) {
    .group-table th,
    .group-table td {
      max-width: 100px; /* Adjust as needed for smaller screens */
    }
  }
</style>
            wqaaezrsdfcvxwatbryhdgvfuygijmhkn bj bmnv