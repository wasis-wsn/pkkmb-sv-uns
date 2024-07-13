<template>
  <div class="flex flex-col bg-white">
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
          class="self-stretch pl-8 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-0 max-md:max-w-full"
          data-aos="fade-right">
          <span class="text-5xl text-red-400">Apa sih PKKMB itu?</span>
        </h1>
        <h1 class="self-stretch pl-8 mt-5 -mr-1 ml-8 font-bold leading-[20px] text-neutral-900" data-aos="fade-right"
          data-aos-delay="700">
          <span class="font-semibold">PKKMB (Pengenalan Kehidupan Kampus bagi Mahasiswa Baru) di Universitas
            Sebelas Maret (UNS) adalah program orientasi untuk mahasiswa baru yang
            bertujuan memperkenalkan mereka pada lingkungan kampus, sistem pendidikan, dan
            berbagai aspek kehidupan akademik dan non-akademik. Kegiatan ini meliputi
            pengenalan fasilitas kampus, pengarahan akademik, dan pengembangan karakter
            untuk membantu mahasiswa baru beradaptasi dengan kehidupan di perguruan
            tinggi.
          </span>
        </h1>
      </div>
    </section>
    <section class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full" data-aos="fade-up">
      <img loading="lazy" src="@/assets/logo_besar.png" alt=""
        class="box-border object-cover overflow-hidden shrink-0 mt-0 w-full aspect-[0.99] min-h-[20px] min-w-[20px]" />
    </section>
  </header>
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
  <div class="bg-gray-100 py-10">
    <section
      class="flex flex-col items-center self-stretch px-16 pt-12 pb-6 w-full text-4xl capitalize bg-slate-100 text-neutral-900 max-md:px-5 max-md:mt-10 max-md:max-w-full">
      <div class="judul mb-3 text-center">
        <h1 class="text-3xl font-bold inline-block border-b-4 border-[#F67366]" data-aos="fade-down">
          TUJUAN PKKMB
        </h1>
      </div>
    </section>
    <div class="timeline-container">
      <!-- Timeline -->
      <div class="timeline relative">
        <!-- Garis tengah -->
        <div class="absolute inset-0 flex justify-center">
          <div class="timeline-line bg-gray-200 w-1"></div>
        </div>

        <!-- Day 1 -->
        <div class="timeline-item flex items-center p-4">
          <div class="timeline-circle bg-red-400 h-8 w-8 rounded-full"></div>
          <div class="icon w-full sm:w-1/2">
            <div class="icon-wrapper relative w-1/2 mx-auto" data-aos="fade-up">
              <img src="@/assets/galeri/p-2.png" alt="Perkenalan Icon"
                class="rounded-full border-4 border-white shadow-lg" />
            </div>
          </div>
          <div class="text flex flex-col justify-center w-full sm:w-1/2 sm:pl-8">
            <div class="flex items-center">
              <div
                class="flex justify-center items-center flex-shrink-0 px-5 py-3 text-2xl font-bold text-center text-gray-50 whitespace-nowrap bg-slate-900 h-[50px] rounded-full w-[50px]"
                data-aos="fade-up">
                1
              </div>
              <h3 class="ml-4 text-4xl font-black text-red-400" data-aos="fade-up">PERKENALAN</h3>
            </div>
            <p class="mt-4 text-gray-700 text-lg" data-aos="fade-up">
              Perkenalan kehidupan kampus khususnya pengenalan sejarah Vokasi kepada seluruh mahasiswa baru.
            </p>
          </div>
        </div>

        <!-- Day 2 -->
        <div class="timeline-item flex items-center p-4">
          <div class="timeline-circle bg-red-400 h-8 w-8 rounded-full"></div>
          <div class="icon w-full sm:w-1/2">
            <div class="icon-wrapper relative w-1/2 mx-auto" data-aos="fade-up">
              <img src="@/assets/galeri/p-4.png" alt="Pengamalan Icon"
                class="rounded-full border-4 border-white shadow-lg" />
            </div>
          </div>
          <div class="text flex flex-col justify-center w-full sm:w-1/2 sm:pl-8">
            <div class="flex items-center">
              <div
                class="flex justify-center items-center flex-shrink-0 px-5 py-3 text-2xl font-bold text-center text-gray-50 whitespace-nowrap bg-slate-900 h-[50px] rounded-full w-[50px]"
                data-aos="fade-up">
                2
              </div>
              <h3 class="ml-4 text-4xl font-black text-red-400" data-aos="fade-up">PENGALAMAN</h3>
            </div>
            <p class="mt-4 text-gray-700 text-lg" data-aos="fade-up">
              Membekali mahasiswa vokasi yang mampu mengamalkan Pancasila dan Tri Dharma Perguruan Tinggi.
            </p>
          </div>
        </div>

        <!-- Day 3 -->
        <div class="timeline-item flex items-center p-4">
          <div class="timeline-circle bg-red-400 h-8 w-8 rounded-full"></div>
          <div class="icon w-full sm:w-1/2">
            <div class="icon-wrapper relative mx-auto" data-aos="fade-up">
              <img src="@/assets/galeri/acara.png" alt="Pemimpin Icon"
                class="rounded-full border-4 border-white shadow-lg" />
            </div>
          </div>
          <div class="text flex flex-col justify-center w-full sm:w-1/2 sm:pl-8">
            <div class="flex items-center">
              <div
                class="flex justify-center items-center flex-shrink-0 px-5 py-3 text-2xl font-bold text-center text-gray-50 whitespace-nowrap bg-slate-900 h-[50px] rounded-full w-[50px]"
                data-aos="fade-up">
                3
              </div>
              <h3 class="ml-4 text-4xl font-black text-red-400" data-aos="fade-up">PEMIMPIN</h3>
            </div>
            <p class="mt-4 text-gray-700 text-lg" data-aos="fade-up">
              Menjadikan mahasiswa vokasi sebagai pemimpin masa depan bangsa yang cerdas dan berkarakter.
            </p>
          </div>
        </div>

        <!-- Day 4 -->
        <div class="timeline-item flex items-center p-4">
          <div class="timeline-circle bg-red-400 h-8 w-8 rounded-full"></div>
          <div class="icon w-full sm:w-1/2">
            <div class="icon-wrapper relative w-1/2 mx-auto" data-aos="fade-up">
              <img src="@/assets/galeri/p-3.png" alt="Kompeten Icon"
                class="rounded-full border-4 border-white shadow-lg" />
            </div>
          </div>
          <div class="text flex flex-col justify-center w-full sm:w-1/2 sm:pl-8">
            <div class="flex items-center">
              <div
                class="flex justify-center items-center flex-shrink-0 px-5 py-3 text-2xl font-bold text-center text-gray-50 whitespace-nowrap bg-slate-900 h-[50px] rounded-full w-[50px]"
                data-aos="fade-up">
                4
              </div>
              <h3 class="ml-4 text-4xl font-black text-red-400" data-aos="fade-up">KOMPETEN</h3>
            </div>
            <p class="mt-4 text-gray-700 text-lg" data-aos="fade-up">
              Membentuk mahasiswa vokasi yang kompeten dan profesional di bidangnya.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Developers Section -->
  <div class="container mx-auto py-10">
    <h2 class="text-3xl font-bold text-center mb-6" data-aos="fade-up">Our Developers</h2>
    <div class="flex flex-wrap justify-center items-center text-center mx-auto">
      <div
        class="developer m-4 flex flex-col items-center bg-gray-100 p-4 rounded-full shadow-lg hover:shadow-xl transition-shadow duration-300 w-40 h-40">
        <img src="@/assets/dev(ardya)/chamber.png" alt="Wasis Wicaksono"
          class="foto1 bg-gray-100 w-24 h-24 rounded-full" />
        <div class="nama text-lg font-medium">Wasis</div>
      </div>
      <div
        class="developer m-4 flex flex-col items-center bg-gray-100 p-4 rounded-full shadow-lg hover:shadow-xl transition-shadow duration-300 w-40 h-40">
        <img src="@/assets/dev(ardya)/raze.png" alt="Ardya Pusaka" class="foto1 bg-gray-100 w-24 h-24 rounded-full" />
        <div class="nama text-lg font-medium">Ardya</div>
      </div>
      <div
        class="developer m-4 flex flex-col items-center bg-gray-100 p-4 rounded-full shadow-lg hover:shadow-xl transition-shadow duration-300 w-40 h-40">
        <img src="@/assets/dev(ardya)/sova.png" alt="Muhammad Raihan"
          class="foto1 bg-gray-100 w-24 h-24 rounded-full" />
        <div class="nama text-lg font-medium">Raihan</div>
      </div>
      <div
        class="developer m-4 flex flex-col items-center bg-gray-100 p-4 rounded-full shadow-lg hover:shadow-xl transition-shadow duration-300 w-40 h-40">
        <img src="@/assets/dev(ardya)/reyna.png" alt="Michael Jamie" class="foto1 bg-gray-100 w-24 h-24 rounded-full" />
        <div class="nama text-lg font-medium">Michael</div>
      </div>
      <div
        class="developer m-4 flex flex-col items-center bg-gray-100 p-4 rounded-full shadow-lg hover:shadow-xl transition-shadow duration-300 w-40 h-40">
        <img src="@/assets/dev(ardya)/chyper.png" alt="Muhamad Prayoga"
          class="foto1 bg-gray-100 w-24 h-24 rounded-full" />
        <div class="nama text-lg font-medium">Yoga</div>
      </div>
      <div
        class="developer m-4 flex flex-col items-center bg-gray-100 p-4 rounded-full shadow-lg hover:shadow-xl transition-shadow duration-300 w-40 h-40">
        <img src="@/assets/dev(ardya)/Sage.png" alt="Ariel Wage" class="foto1 bg-gray-100 w-24 h-24 rounded-full" />
        <div class="nama text-lg font-medium">Ariel</div>
      </div>
    </div>
  </div>

</template>

<script>
  import AOS from "aos";
  import "aos/dist/aos.css";

  export default {
    name: "AboutView",
    mounted() {
      AOS.init();
    }
  }
</script>

<style scoped>
  .timeline-container {
    position: relative;
  }

  .timeline {
    position: relative;
    max-width: 1000px;
    margin: 0 auto;
  }

  .timeline-line {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 49, 5%;
    width: 4px;
    background-color: #e5e7eb;
    z-index: 1;
  }

  .timeline-item {
    display: flex;
    flex-direction: row;
    align-items: center;
    padding: 10px 40px;
    position: relative;
  }

  .timeline-item:nth-child(even) {
    flex-direction: row-reverse;
  }

  .timeline-circle {
    width: 16px;
    height: 16px;
    background-color: #f56565;
    border-radius: 50%;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    z-index: 2;
  }

  .icon-wrapper {
    width: 200px;
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 16px;
  }

  .icon-wrapper img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
  }

  .timeline-item:nth-child(odd) .text {
    padding-left: 20px;
  }

  .timeline-item:nth-child(even) .text {
    padding-right: 20px;
  }

  @media (max-width: 768px) {
    .timeline-item {
      flex-direction: column;
      padding: 20px 0;
    }

    .timeline-item:nth-child(even) {
      flex-direction: column;
    }

    .timeline-circle {
      position: relative;
      left: auto;
      transform: none;
      margin-bottom: 10px;
    }

    .timeline-line {
      left: 50%;
      transform: translateX(-2px);
      /* Sesuaikan dengan lebar garis */
      height: calc(100% + 20px);
      z-index: 0;
    }

    .text {
      padding-left: 20px;
    }

  }
</style>