<template>
  <div class="bg-gray-100">
    <section
      class="flex flex-col items-center self-stretch px-16 pt-12 pb-20 w-full text-4xl font-bold capitalize bg-slate-100 text-neutral-900 max-md:px-5 max-md:mt-10 max-md:max-w-full">
      <div class="flex flex-col items-center w-full max-w-[1196px] max-md:max-w-full">
        <h2>Tujuan PKKMB</h2>
        <div class="shrink-0 mt-1 h-1 bg-red-500 w-[200px]"></div>
      </div>
    </section>
    <div class="line" aria-hidden="true"></div>
    <div class="space-y-8 mx-auto bg-white bg-opacity-0">
      <div class="timeline container mx-auto p-4">
        <!-- Day 1 -->
        <div
          class="flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-4 bg-white p-4 rounded-lg shadow-md mb-4">
          <div class="icon w-full sm:w-1/2 order-1 sm:order-1">
            <img src="@/assets/galeri/p-2.png" alt="Perkenalan Icon"
              class="w-3/4 h-auto object-cover object-center mx-auto">
          </div>
          <div class="text flex flex-col justify-center w-full sm:w-1/2 order-2 sm:order-2">
            <h2 class="text-3xl font-bold">Day 1</h2>
            <p class="mt-4 text-gray-700 text-lg">Perkenalan kehidupan kampus khususnya pengenalan sejarah Vokasi kepada
              seluruh mahasiswa baru.</p>
          </div>
        </div>
        <!-- Day 2 -->
        <div
          class="flex flex-col sm:flex-row-reverse items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-4 bg-white p-4 rounded-lg shadow-md mb-4">
          <div class="icon w-full sm:w-1/2 order-1 sm:order-1">
            <img src="@/assets/galeri/p-4.png" alt="Pengamalan Icon"
              class="w-3/4 h-auto object-cover object-center mx-auto">
          </div>
          <div class="text flex flex-col justify-center w-full sm:w-1/2 order-2 sm:order-2">
            <h2 class="text-3xl font-bold">Day 2</h2>
            <p class="mt-4 text-gray-700 text-lg">Membekali mahasiswa vokasi yang mampu mengamalkan Pancasila dan Tri
              Dharma Perguruan Tinggi.</p>
          </div>
        </div>
        <!-- Day 3 -->
        <div
          class="flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-4 bg-white p-4 rounded-lg shadow-md mb-4">
          <div class="icon w-full sm:w-1/2 order-1 sm:order-1">
            <img src="@/assets/galeri/acara.png" alt="Pemimpin Icon"
              class="w-3/4 h-auto object-cover object-center mx-auto">
          </div>
          <div class="text flex flex-col justify-center w-full sm:w-1/2 order-2 sm:order-2">
            <h2 class="text-3xl font-bold">Day 3</h2>
            <p class="mt-4 text-gray-700 text-lg">Mempersiapkan mahasiswa baru sebagai penerus masa depan yang unggul
              berkarakter kuat sesuai dengan profil pelajar Pancasila yang beriman, bertakwa kepada Tuhan Yang Maha Esa,
              dan berakhlak mulia.</p>
          </div>
        </div>
        <!-- Day 4 -->
        <div
          class="flex flex-col sm:flex-row-reverse items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-4 bg-white p-4 rounded-lg shadow-md mb-4">
          <div class="icon w-full sm:w-1/2 order-1 sm:order-1">
            <img src="@/assets/galeri/p-3.png" alt="Bangga Icon"
              class="w-3/4 h-auto object-cover object-center mx-auto">
          </div>
          <div class="text flex flex-col justify-center w-full sm:w-1/2 order-2 sm:order-2">
            <h2 class="text-3xl font-bold">Day 4</h2>
            <p class="mt-4 text-gray-700 text-lg">Menanamkan rasa bangga, terhormat, dan berintegritas bersama vokasi.
            </p>
          </div>
        </div>
      </div>

    </div>

    <div class="dev flex flex-wrap justify-center items-center text-center mx-auto">
      <div class="developer m-2 flex flex-col items-center">
        <img src="@/assets/dev(ardya)/chamber.png" alt="Wasis Wicaksono"
          class="foto1 bg-gray-200 w-16 h-16 rounded-full mb-2">
        <div class="nama">Wasis Wicaksono</div>
      </div>
      <div class="developer m-2 flex flex-col items-center">
        <img src="@/assets/dev(ardya)/raze.png" alt="Ardya Pusaka"
          class="foto1 bg-gray-200 w-16 h-16 rounded-full mb-2">
        <div class="nama">Ardya Pusaka</div>
      </div>
      <div class="developer m-2 flex flex-col items-center">
        <img src="@/assets/dev(ardya)/sova.png" alt="Muhammad Raihan"
          class="foto1 bg-gray-200 w-16 h-16 rounded-full mb-2">
        <div class="nama">Muhammad Raihan</div>
      </div>
      <div class="developer m-2 flex flex-col items-center">
        <img src="@/assets/dev(ardya)/reyna.png" alt="Michael Jamie"
          class="foto1 bg-gray-200 w-16 h-16 rounded-full mb-2">
        <div class="nama">Michael Jamie</div>
      </div>
      <div class="developer m-2 flex flex-col items-center">
        <img src="@/assets/dev(ardya)/chyper.png" alt="Muhamad Prayoga"
          class="foto1 bg-gray-200 w-16 h-16 rounded-full mb-2">
        <div class="nama">Muhamad Prayoga</div>
      </div>
      <div class="developer m-2 flex flex-col items-center">
        <img src="@/assets/dev(ardya)/Sage.png" alt="Ariel Wage" class="foto1 bg-gray-200 w-16 h-16 rounded-full mb-2">
        <div class="nama">Ariel Wage</div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'AboutView',
  };
</script>

<style scoped>
  /* @import '../css/pages/aboutview.css'; */
</style>