<template>
  <div class="container flex items-center justify-center w-full mx-auto">
    <main class="main-content mt-10 mb-10 w-full max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md flex-grow"
      style="background-color: #e0f2fe">
      <section class="search-section mb-6">
        <div class="search-header text-center">
          <h2 class="search-title text-2xl font-bold text-gray-800 mb-2">PENCARIAN KELOMPOK</h2>
          <div class="search-underline w-1/2 mx-auto h-1 bg-orange-500 mb-4"></div>
          <p class="search-description text-gray-600">
            Hallo Vocazens! Kamu dapat melakukan pencarian <br> terkait pembagian kelompok pada halaman ini. Selamat
            menikmati!
          </p>
        </div>
      </section>
      <div class="table-container bg-white p-4 rounded-lg shadow-md">
        <form class="search-form flex items-center gap-2 mb-4">
          <div class="relative w-60">
            <div class="relative">
              <input type="text" id="groupSearch"
                class="search-input w-full pl-4 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan nama anda &#xEF0E;" v-model="searchQuery" />
            </div>
          </div>
          <div class="relative">
            <FunnelIcon class="size-8 w-8 h-8 text-gray-500 cursor-pointer" @click="toggleDropdown" />
            <div v-show="showDropdown"
              class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-md">
              <div class="py-2">
                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100" v-for="kel in kelompok"
                  :key="kel.id" @click="filterByKelompok(kel.kelompok)">{{ kel.kelompok }}</a>
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
            <tr v-for="user in filteredUsers" :key="user.id" class="border-b">
              <td class="py-2 px-4 text-center">{{ user.nama }}</td>
              <td class="py-2 px-4 text-center">{{ user.prodi }}</td>
              <td class="py-2 px-4 text-center">{{ user.kelompok }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</template>

<script setup>

  import {
    ref,
    computed
  } from 'vue';
  import {
    FunnelIcon
  } from '@heroicons/vue/24/solid';

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

  const toggleDropdown = () => {
    showDropdown.value = !showDropdown.value;
  };

  const filterByKelompok = (kel) => {
    selectedKelompok.value = kel;
    showDropdown.value = false;
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
</script>

<style>
</style>