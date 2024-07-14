<template>
  <header class="flex gap-5 max-md:flex-col max-md:gap-0">
    <section
      class="flex flex-col flex-1 items-start pb-32 mt-16 ml-2 rounded-full border border-solid border-violet-300 border-opacity-50 max-md:max-w-full"
      data-aos="fade-right">
      <div class="shrink-0 mt-20 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[180px] max-md:mt-10"
        data-aos="fade-right" data-aos-delay="100"></div>
      <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[120px] max-md:mt-10"
        data-aos="fade-right" data-aos-delay="200"></div>
      <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[190px]" data-aos="fade-right"
        data-aos-delay="300"></div>
      <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[150px]" data-aos="fade-right"
        data-aos-delay="400"></div>
      <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[200px]" data-aos="fade-right"
        data-aos-delay="500"></div>
      <div class="self-end mt-1 mb-0 max-md:max-w-full">
        <h1
          class="self-stretch pl-8 mt-5 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-10 max-md:max-w-full"
          data-aos="fade-right" data-aos-delay="600">
          <span class="font-semibold">KELOMPOK</span>
        </h1>
        <h1
          class="self-stretch pl-8 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-0 max-md:max-w-full"
          data-aos="fade-right" data-aos-delay="700">
          <span class="text-5xl text-red-400">PKKMB SV UNS 2024</span>.
        </h1>
      </div>
    </section>
    <section class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full" data-aos="fade-up">
      <img loading="lazy" src="@/assets/logo_besar.png" alt=""
        class="box-border object-cover overflow-hidden shrink-0 mt-0 w-full aspect-[0.99] min-h-[20px] min-w-[20px]" />
    </section>
  </header>
  <div class="flex flex-col bg-white">
    <div class="flex gap-5 self-end px-5 mt-0 max-md:mt-10">
      <div class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]" data-aos="fade-up"
        data-aos-delay="100"></div>
      <div class="shrink-0 self-end mt-16 bg-red-300 bg-opacity-20 h-[130px] rounded-[100px] w-[5px] max-md:mt-10"
        data-aos="fade-up" data-aos-delay="200"></div>
      <div class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]" data-aos="fade-up"
        data-aos-delay="300"></div>
      <div class="shrink-0 self-end mt-12 bg-red-300 bg-opacity-20 h-[150px] rounded-[100px] w-[5px] max-md:mt-10"
        data-aos="fade-up" data-aos-delay="400"></div>
      <div class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]" data-aos="fade-up"
        data-aos-delay="500"></div>
    </div>
  </div>
  <div class="flex flex-col bg-white">
    <section
      class="flex justify-center items-center px-16 py-10 -mt-1 w-full bg-slate-100 max-md:px-5 max-md:mt-10 max-md:max-w-full">
      <div class="flex flex-col grow shrink-0 self-start px-5 text-center basis-0 w-fit max-md:max-w-full"
        data-aos="fade-down">
        <h2
          class="flex flex-col self-center max-w-full text-3xl font-bold capitalize text-neutral-900 w-[300px] max-md:w-full">
          <span class="max-md:max-w-full">KELOMPOK<br />PKKMB SV UNS 2024</span>
          <div class="shrink-0 mt-2.5 h-1 bg-red-400 max-md:max-w-full"></div>
        </h2>
        <p class="mt-8 z-20 text-2xl text-stone-900 max-md:max-w-full max-md:text-xl text-[18px] md:text-[24px]">
          Hallo Vocazens! Di bawah ini adalah informasi tentang kelompok dan<br> nama-nama mahasiswa di PKKMB SV UNS
          2024.
        </p>

        <!-- Search form -->
        <div class="bg-white p-4 mt-8 rounded-lg shadow-md overflow-x-auto">
          <form class="search-form flex items-center gap-2 mb-4" @submit.prevent="handleSearch">
            <div
              class="relative flex items-center border border-gray-300 rounded-lg p-1 focus-within:ring-2 focus-within:ring-blue-500">
              <input type="text" id="groupSearch" class="search-input w-full pl-3 py-2 focus:outline-none"
                placeholder="Cari dirimu" v-model="searchQuery" />
            </div>
            <div class="relative cursor-pointer">
              <RiEqualizerLine class="h-5 w-5 text-gray-400 absolute right-3 top-1/2 transform -translate-y-1/2" />
              <select v-model="selectedKelompok" @change="handleSearch"
                class="cursor-pointer block appearance-none w-full bg-white border border-gray-300 rounded-lg shadow-md py-2 pl-3 pr-10 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <option value="">Select All</option>
                <option v-for="kel in kelompokList" :key="kel.id" :value="kel.kelompok">{{ kel.kelompok }}</option>
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
                <td class="py-2 px-4 text-center">{{ user.nama }}</td>
                <td class="py-2 px-4 text-center">{{ user.prodi }}</td>
                <td class="py-2 px-4 text-center">{{ user.kelompok }}</td>
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
        <h2
          class="flex flex-col self-center max-w-full text-3xl font-bold capitalize text-neutral-900 w-[350px] max-md:w-full text-center mt-10">
          <span class="max-md:max-w-full">PENGUMPULAN TUGAS <br> PKKMB SV UNS 2024</span>
          <div class="shrink-0 mt-2.5 h-1 bg-red-400 max-md:max-w-full"></div>
        </h2>
        <div class="bg-white p-4 mt-8 rounded-lg shadow-md overflow-x-auto" data-aos="fade-down">
          <h1 class="text-gray-600 text-lg text-left mb-4">
            Tolong untuk menginputkan tugas disini ya adick-adick
          </h1>

          <!-- Upload form or uploaded files -->
          <div v-if="uploadedFiles.length === 0">
            <form id="file-upload-form"
              class="w-full flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-lg py-12"
              @drop.prevent="handleDrop" @dragover.prevent="handleDragOver">
              <input id="file-upload-input" type="file" class="hidden" @change="handleFileSelect" multiple />
              <label for="file-upload-input" class="text-center text-gray-500 cursor-pointer">
                <div class="flex flex-col items-center mt-7 mb-5">
                  <RiInboxArchiveLine class="h-10 w-10 text-gray-400 top-1/2 transform -translate-y-1/2" />
                  <span class="font-semibold">Drag and drop your files here</span>
                  <span class="text-sm mt-1 text-gray-400">or click to select files</span>
                </div>
              </label>
            </form>
            <div class="left-7 flex w-full pt-5">
              <p class="font-normal font text-sm text-left text-gray-500">
                Accepted File Types : <br>
                Archive (Zip) <br>
                Archive files .7z .bdoc .cdoc .ddoc .gtar .gz .gzip .hqx .rar .sit .tar .tgz .zip
              </p>
            </div>
          </div>
          <div v-else>
            <h2 class="text-gray-600 text-lg text-left">Uploaded Files:</h2>
            <div class="w-full flex flex-col items-center border-2 border-dashed border-gray-300 rounded-lg py-12">
              <p v-for="file in uploadedFiles" :key="file.name" class="text-gray-800 font text-sm text-left">
                {{ file.name }}</p>
            </div>
            <div class="left-7 flex w-full pt-5">
              <p class="font-normal font text-sm text-left text-gray-500">
                Accepted File Types : <br>
                Archive (Zip) <br>
                Archive files .7z .bdoc .cdoc .ddoc .gtar .gz .gzip .hqx .rar .sit .tar .tgz .zip
              </p>
            </div>
          </div>
          <button @click="handleFileUpload"
            class="px-6 mt-4 py-2 font-bold text-black bg-white border-2 border-gray-300 rounded-full hover:bg-gray-200 hover:border-gray-400">
            Upload
          </button>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
  import AOS from "aos";
  import "aos/dist/aos.css";
  import {
    ref,
    computed,
    onMounted
  } from 'vue';
  import {
    RiEqualizerLine,
    RiInboxArchiveLine
  } from "@remixicon/vue";

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
  ];

  const kelompokList = [{
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
  const currentPage = ref(1);
  const itemsPerPage = 20;
  const uploadedFiles = ref([]);

  const handleSearch = () => {
    currentPage.value = 1;
  };

  const filterByKelompok = (user) => {
    if (!selectedKelompok.value) {
      return true;
    } else {
      return user.kelompok === selectedKelompok.value;
    }
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

  const handleDrop = (event) => {
    event.preventDefault();
    const files = event.dataTransfer.files;
    handleFiles(files);
  };

  const handleDragOver = (event) => {
    event.preventDefault();
  };

  const handleFileSelect = (event) => {
    const files = event.target.files;
    handleFiles(files);
  };

  const handleFiles = (files) => {
    for (let i = 0; i < files.length; i++) {
      uploadedFiles.value.push(files[i]);
    }
  };

  const handleFileUpload = () => {
    console.log("Upload button clicked");
  };

  onMounted(() => {
    AOS.init();
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