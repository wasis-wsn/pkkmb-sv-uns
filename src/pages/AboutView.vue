<template>
  <!-- <div class="flex flex-col bg-white">
    <header class="flex gap-5 max-md:flex-col max-md:gap-0">
      <section
        class="flex flex-col flex-1 items-start pb-32 mt-16 ml-2 rounded-full border border-solid border-violet-300 border-opacity-50 max-md:max-w-full">
        <div class="shrink-0 mt-20 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[180px] max-md:mt-10"></div>
        <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[120px] max-md:mt-10"></div>
        <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[190px]"></div>
        <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[150px]"></div>
        <div class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[200px]"></div>
        <div class="self-end mt-1 mb-0 max-md:max-w-full">
          <h1
            class="self-stretch pl-8 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-0 max-md:max-w-full">
            <span class="text-5xl text-red-400">Apa sih PKKMB itu?</span>
          </h1>
          <h1
            class="self-stretch pl-8 mt-5 -mr-1 ml-8 text-4xl font leading-[60px] text-neutral-900 max-md:mt-10 max-md:max-w-full">
            <span class="font-thin">PKKMB (Pengenalan Kehidupan Kampus bagi Mahasiswa Baru) di Universitas Sebelas
              Maret (UNS) adalah program orientasi untuk mahasiswa baru yang bertujuan memperkenalkan mereka pada
              lingkungan kampus, sistem pendidikan, dan berbagai aspek kehidupan akademik dan non-akademik. Kegiatan ini
              meliputi pengenalan fasilitas kampus, pengarahan akademik, dan pengembangan karakter untuk membantu
              mahasiswa baru beradaptasi dengan kehidupan di perguruan tinggi. </span>
          </h1>
        </div>
      </section>
      <section class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
        <img loading="lazy" src="@/assets/logo_besar.png" alt=""
          class="box-border object-cover overflow-hidden shrink-0 mt-0 w-full aspect-[0.99] min-h-[20px] min-w-[20px]" />
      </section>
    </header>
    <div class="flex gap-5 self-end px-5 mt-0 max-md:mt-10">
      <div class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"></div>
      <div class="shrink-0 self-end mt-16 bg-red-300 bg-opacity-20 h-[130px] rounded-[100px] w-[5px] max-md:mt-10">
      </div>
      <div class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"></div>
      <div class="shrink-0 self-end mt-12 bg-red-300 bg-opacity-20 h-[150px] rounded-[100px] w-[5px] max-md:mt-10">
      </div>
      <div class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"></div>
    </div>
  </div> -->
  <header class="flex gap-5 max-md:flex-col max-md:gap-0">
    <section
      class="flex flex-col flex-1 items-start pb-32 mt-16 ml-2 rounded-full border border-solid border-violet-300 border-opacity-50 max-md:max-w-full"
    >
      <div
        class="shrink-0 mt-20 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[180px] max-md:mt-10"
      ></div>
      <div
        class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[120px] max-md:mt-10"
      ></div>
      <div
        class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[190px]"
      ></div>
      <div
        class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[150px]"
      ></div>
      <div
        class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[200px]"
      ></div>
      <div class="self-end mt-1 mb-0 max-md:max-w-full">
        <h1
          class="self-stretch pl-8 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-0 max-md:max-w-full"
        >
          <span class="text-5xl text-red-400">Apa sih PKKMB itu?</span>
        </h1>
        <h1
          class="self-stretch pl-8 mt-5 -mr-1 ml-8 font-bold leading-[20px] text-neutral-900"
        >
          <span class="font-semibold"
            >PKKMB (Pengenalan Kehidupan Kampus bagi Mahasiswa Baru) di Universitas
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
    <section class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
      <img
        loading="lazy"
        src="@/assets/logo_besar.png"
        alt=""
        class="box-border object-cover overflow-hidden shrink-0 mt-0 w-full aspect-[0.99] min-h-[20px] min-w-[20px]"
      />
    </section>
  </header>
  <div class="flex gap-5 self-end px-5 mt-0 max-md:mt-10">
    <div
      class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"
    ></div>
    <div
      class="shrink-0 self-end mt-16 bg-red-300 bg-opacity-20 h-[130px] rounded-[100px] w-[5px] max-md:mt-10"
    ></div>
    <div
      class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"
    ></div>
    <div
      class="shrink-0 self-end mt-12 bg-red-300 bg-opacity-20 h-[150px] rounded-[100px] w-[5px] max-md:mt-10"
    ></div>
    <div
      class="shrink-0 bg-red-300 bg-opacity-20 h-[200px] rounded-[100px] w-[5px]"
    ></div>
  </div>
  <div class="bg-gray-100">
    <section
      class="flex flex-col items-center self-stretch px-16 pt-12 pb-6 w-full text-4xl capitalize bg-slate-100 text-neutral-900 max-md:px-5 max-md:mt-10 max-md:max-w-full"
    >
      <div class="judul mb-3 text-center">
        <h1 class="text-3xl font-bold inline-block border-b-4 border-[#F67366]">
          TUJUAN PKKMB
        </h1>
      </div>
    </section>
    <div class="line" aria-hidden="true"></div>
    <div class="w-full max-md:pr-5 max-md:mt-10 max-md:max-w-full">
      <!-- Day 1 -->
      <div
        class="flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-4 bg-white p-4 rounded-lg shadow-md mb-4"
      >
        <div class="icon w-full sm:w-1/2 order-1 sm:order-1">
          <img
            src="@/assets/galeri/p-2.png"
            alt="Perkenalan Icon"
            class="w-2/4 h-auto object-cover object-center mx-auto"
          />
        </div>
        <div class="flex flex-col justify-center w-full sm:w-1/2 order-2 sm:order-2">
          <div class="flex items-center">
            <div
              class="flex justify-center items-center flex-shrink-0 px-5 py-3 text-2xl font-bold text-center text-gray-50 whitespace-nowrap bg-slate-900 h-[50px] rounded-full w-[50px]"
            >
              1
            </div>
            <h3 class="ml-4 text-4xl font-black text-red-400">PERKENALAN</h3>
          </div>
          <p class="mt-4 text-gray-700 text-lg">
            Perkenalan kehidupan kampus khususnya pengenalan sejarah Vokasi kepada seluruh
            mahasiswa baru.
          </p>
        </div>
      </div>
      <!-- Day 2 -->
      <div
        class="flex flex-col sm:flex-row-reverse items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-4 bg-white p-4 rounded-lg shadow-md mb-4"
      >
        <div class="icon w-full sm:w-1/2 order-1 sm:order-1">
          <img
            src="@/assets/galeri/p-4.png"
            alt="Pengamalan Icon"
            class="w-2/4 h-auto object-cover object-center mx-auto"
          />
        </div>
        <div class="text flex flex-col justify-center w-full sm:w-1/2 order-2 sm:order-2">
          <div class="flex items-center">
            <div
              class="flex justify-center items-center flex-shrink-0 px-5 py-3 text-2xl font-bold text-center text-gray-50 whitespace-nowrap bg-slate-900 h-[50px] rounded-full w-[50px]"
            >
              2
            </div>
            <h3 class="ml-4 text-4xl font-black text-red-400">PENGALAMAN</h3>
          </div>
          <p class="mt-4 text-gray-700 text-lg">
            Membekali mahasiswa vokasi yang mampu mengamalkan Pancasila dan Tri Dharma
            Perguruan Tinggi.
          </p>
        </div>
      </div>
      <!-- Day 3 -->
      <div
        class="flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-4 bg-white p-4 rounded-lg shadow-md mb-4"
      >
        <div class="icon w-full sm:w-1/2 order-1 sm:order-1">
          <img
            src="@/assets/galeri/acara.png"
            alt="Pemimpin Icon"
            class="w-2/4 h-auto object-cover object-center mx-auto"
          />
        </div>
        <div class="text flex flex-col justify-center w-full sm:w-1/2 order-2 sm:order-2">
          <div class="flex items-center">
            <div
              class="flex justify-center items-center flex-shrink-0 px-5 py-3 text-2xl font-bold text-center text-gray-50 whitespace-nowrap bg-slate-900 h-[50px] rounded-full w-[50px]"
            >
              3
            </div>
            <h3 class="ml-4 text-4xl font-black text-red-400">PEMIMPIN</h3>
          </div>
          <p class="mt-4 text-gray-700 text-lg">
            Mempersiapkan mahasiswa baru sebagai penerus masa depan yang unggul
            berkarakter kuat sesuai dengan profil pelajar Pancasila yang beriman, bertakwa
            kepada Tuhan Yang Maha Esa, dan berakhlak mulia.
          </p>
        </div>
      </div>
      <!-- Day 4 -->
      <div
        class="flex flex-col sm:flex-row-reverse items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-4 bg-white p-4 rounded-lg shadow-md mb-4"
      >
        <div class="icon w-full sm:w-1/2 order-1 sm:order-1">
          <img
            src="@/assets/galeri/p-3.png"
            alt="Bangga Icon"
            class="w-2/4 h-auto object-cover object-center mx-auto"
          />
        </div>
        <div class="text flex flex-col justify-center w-full sm:w-1/2 order-2 sm:order-2">
          <div class="flex items-center">
            <div
              class="flex justify-center items-center flex-shrink-0 px-5 py-3 text-2xl font-bold text-center text-gray-50 whitespace-nowrap bg-slate-900 h-[50px] rounded-full w-[50px]"
            >
              4
            </div>
            <h3 class="ml-4 text-4xl font-black text-red-400">BANGGA</h3>
          </div>
          <p class="mt-4 text-gray-700 text-lg">
            Menanamkan rasa bangga, terhormat, dan berintegritas bersama vokasi.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="container mx-auto py-10">
    <h2 class="text-3xl font-bold text-center mb-6">Our Developers</h2>
    <div class="flex flex-wrap justify-center items-center text-center mx-auto">
      <div
        class="developer m-4 flex flex-col items-center bg-gray-100 p-4 rounded-full shadow-lg hover:shadow-xl transition-shadow duration-300 w-40 h-40"
      >
        <img
          src="@/assets/dev(ardya)/chamber.png"
          alt="Wasis Wicaksono"
          class="foto1 bg-gray-100 w-24 h-24 rounded-full"
        />
        <div class="nama text-lg font-medium">Wasis</div>
      </div>
      <div
        class="developer m-4 flex flex-col items-center bg-gray-100 p-4 rounded-full shadow-lg hover:shadow-xl transition-shadow duration-300 w-40 h-40"
      >
        <img
          src="@/assets/dev(ardya)/raze.png"
          alt="Ardya Pusaka"
          class="foto1 bg-gray-100 w-24 h-24 rounded-full"
        />
        <div class="nama text-lg font-medium">Ardya</div>
      </div>
      <div
        class="developer m-4 flex flex-col items-center bg-gray-100 p-4 rounded-full shadow-lg hover:shadow-xl transition-shadow duration-300 w-40 h-40"
      >
        <img
          src="@/assets/dev(ardya)/sova.png"
          alt="Muhammad Raihan"
          class="foto1 bg-gray-100 w-24 h-24 rounded-full"
        />
        <div class="nama text-lg font-medium">Raihan</div>
      </div>
      <div
        class="developer m-4 flex flex-col items-center bg-gray-100 p-4 rounded-full shadow-lg hover:shadow-xl transition-shadow duration-300 w-40 h-40"
      >
        <img
          src="@/assets/dev(ardya)/reyna.png"
          alt="Michael Jamie"
          class="foto1 bg-gray-100 w-24 h-24 rounded-full"
        />
        <div class="nama text-lg font-medium">Michael</div>
      </div>
      <div
        class="developer m-4 flex flex-col items-center bg-gray-100 p-4 rounded-full shadow-lg hover:shadow-xl transition-shadow duration-300 w-40 h-40"
      >
        <img
          src="@/assets/dev(ardya)/chyper.png"
          alt="Muhamad Prayoga"
          class="foto1 bg-gray-100 w-24 h-24 rounded-full"
        />
        <div class="nama text-lg font-medium">Yoga</div>
      </div>
      <div
        class="developer m-4 flex flex-col items-center bg-gray-100 p-4 rounded-full shadow-lg hover:shadow-xl transition-shadow duration-300 w-40 h-40"
      >
        <img
          src="@/assets/dev(ardya)/Sage.png"
          alt="Ariel Wage"
          class="foto1 bg-gray-100 w-24 h-24 rounded-full"
        />
        <div class="nama text-lg font-medium">Ariel</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AboutView",
};
</script>

<style scoped>
img {
  max-width: 100%;
  height: auto;
}
</style>
