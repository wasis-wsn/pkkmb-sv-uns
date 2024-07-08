<template>
  <main class="flex gap-5 w-full capitalize max-md:flex-wrap max-md:pr-5 max-md:max-w-full">
    <section
      class="flex flex-col flex-1 items-start pb-32 mt-16 ml-2 rounded-full border border-solid border-violet-300 border-opacity-50 max-md:max-w-full">
      <div v-for="index in 5" :key="index"
        class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[187px]"
        :class="{ 'mt-20 max-md:mt-10': index === 1 }"></div>
      <h1
        class="self-stretch pl-8 mt-36 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-10 max-md:max-w-full">
        <span class="font-semibold">Selamat Datang di </span>
        <span class="text-5xl text-red-400">PKKMB SV UNS 2024</span>.
      </h1>
      <div class="flex gap-5 justify-between self-end mt-11 font-extrabold text-center max-md:mt-10 max-md:mr-2.5">
        <button class="justify-center px-10 py-5 text-sm text-white rounded-xl bg-slate-700 max-md:px-5">
          Cari Kelompok
        </button>
        <div class="flex flex-col justify-center text-lg leading-5 whitespace-nowrap text-slate-700">
          <div class="flex gap-5 justify-between px-6 py-4 bg-white shadow-lg rounded-[100px] max-md:px-5">
            <ClipboardIcon loading="lazy" alt="" class="size-6" />
            <span class="my-auto">Materi</span>
          </div>
        </div>
      </div>
    </section>
    <img loading="lazy" src="@/assets/Logo Besar.png" alt="PKKMB SV UNS 2024 illustration"
      class="flex-1 self-end mt-20 w-full aspect-[0.96] max-md:mt-10 max-md:max-w-full" />
  </main>
  <main>
    <div class="justify-center">
      <section class="flex ustify-center flex-col items-center px-5 font-bold text-center leading-[150%] max-w-[764px]">
        <h1 class="text-6xl text-red-400 capitalize max-md:max-w-full max-md:text-4xl">
          Askara Muda 2024!
        </h1>
        <p class="self-stretch mt-14 w-full text-3xl text-zinc-800 max-md:mt-10 max-md:max-w-full">
          "Jiwa Berkarakter, Kreativitas Tanpa Batas, Inovasi Mendunia"
        </p>
        <img loading="lazy" src="@/assets/vidio yt.png" alt="Askara Muda 2024 event illustration"
          class="mt-10 w-full aspect-[1.89] max-w-[682px] max-md:max-w-full" />
      </section>
    </div>

    <section
      class="flex justify-center items-center px-16 py-20 mt-10 w-full bg-slate-100 max-md:px-5 max-md:max-w-full">
      <div
        class="flex flex-col pr-20 pb-3 pl-0.5 mt-3.5 mb-3.5 w-full bg-white bg-opacity-0 max-w-[1015px] max-md:pr-5 max-md:max-w-full">
        <div class="max-md:max-w-full">
          <div class="flex gap-5 max-md:flex-col max-md:gap-0">
            <div class="flex flex-col w-[77%] max-md:ml-0 max-md:w-full">
              <div class="flex flex-col capitalize max-md:mt-10 max-md:max-w-full">
                <h2 class="self-end text-5xl font-bold text-red-400 leading-[69px] max-md:text-4xl">
                  <span class="text-6xl text-red-400">Kelompok!</span>
                </h2>
                <p class="mt-6 mr-11 text-4xl text-neutral-900 max-md:mr-2.5 max-md:max-w-full">
                  Ayo cari tahu kelompok kamu <br />selama PKKMB SV UNS berlangsung!
                </p>
                <div class="shrink-0 mt-3.5 h-1 bg-red-400 w-[130px]"></div>
              </div>
            </div>
            <article class="flex flex-col max-w-[192px]">
              <div class="shrink-0 self-end bg-slate-100 h-[150px] rounded-[100px] w-[150px] shadow-md inset-shadow"
                role="img" aria-label="Profile background"></div>
              <div class="flex z-10 flex-col justify-center items-start p-11 -mt-24 w-full bg-white rounded-[100px]">
                <UserGroupIcon loading="lazy" class="aspect-square w-[60px] text-red-400" alt="Profile icon" />
              </div>
            </article>
          </div>
        </div>
        <button
          class="justify-center items-center self-center p-7 mt-12 max-w-full text-sm font-extrabold text-center text-white capitalize rounded-xl bg-slate-700 w-[250px] max-md:px-5 max-md:mt-10">
          Check
        </button>
      </div>
    </section>

    <section class="flex justify-center items-center px-16 py-20 bg-white max-md:px-5">
      <div class="flex flex-col mt-20 w-full max-w-[1151px] max-md:mt-10 max-md:max-w-full">
        <h1
          class="self-center text-5xl font-semibold text-center capitalize leading-[69px] text-neutral-900 max-md:text-4xl">
          Timeline!
        </h1>
        <h2 class="self-center mt-8 text-4xl capitalize text-neutral-900 max-md:max-w-full">
          Lihat Timeline PKKMB SV UNS 2024!
        </h2>
        <div class="shrink-0 mt-2.5 ml-72 h-1 bg-red-400 w-[130px] max-md:ml-2.5"></div>
        <div class="max-md:max-w-full">
          <div class="flex gap-5 max-md:flex-col max-md:gap-0">
            <div class="flex items-center w-[43%] max-md:ml-0 max-md:w-full">
              <div class="flex flex-col self-stretch my-auto max-md:mt-10">
                <div class="flex gap-5 items-center capitalize">
                  <div
                    class="justify-center items-center flex-shrink-0 px-5 py-3 text-2xl font-bold text-center text-gray-50 whitespace-nowrap bg-slate-900 h-[50px] rounded-[100px] w-[50px]">
                    1
                  </div>
                  <h3 class="text-4xl font-black text-red-400">Day 1</h3>
                </div>
                <p class="mt-10 text-sm text-neutral-600">
                  You're currently running your store on Shopify, WooCommerce, or any other platform. As a first step,
                  you'll connect your store with our platform.
                </p>
              </div>
            </div>
            <div class="flex flex-col ml-5 w-[57%] max-md:ml-0 max-md:w-full">
              <img loading="lazy" src="@/assets/day 1.png" alt="Day 1 illustration"
                class="grow w-full aspect-[1.49] max-md:mt-10 max-md:max-w-full" />
            </div>
          </div>
        </div>
        <div class="mt-12 max-md:pr-5 max-md:mt-10 max-md:max-w-full">
          <div class="flex gap-5 max-md:flex-col max-md:gap-0">
            <div class="flex flex-col w-[65%] max-md:ml-0 max-md:w-full">
              <img loading="lazy" src="@/assets/day 2.png" alt="Day 2 illustration"
                class="w-full aspect-square max-md:mt-10" />
            </div>
            <div class="flex flex-col ml-5 w-[35%] max-md:ml-0 max-md:w-full">
              <div class="flex flex-col self-stretch my-auto max-md:mt-10">
                <div class="flex gap-5  capitalize">
                  <div
                    class="justify-center items-center px-5 py-3 text-2xl font-bold text-center text-gray-50 whitespace-nowrap bg-slate-900 h-[50px] rounded-[100px] w-[50px]">
                    2
                  </div>
                  <h3 class="text-4xl font-black text-red-400">Day 2</h3>
                </div>
                <p class="mt-10 text-sm text-neutral-600">
                  Then, you can send us your inventory and the fun begins. We'll choose a delivery day together so your
                  fulfilment is not interrupted.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-12 max-md:pr-5 max-md:mt-10 max-md:max-w-full">
          <div class="flex gap-5 max-md:flex-col max-md:gap-0">
            <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
              <div class="flex flex-col self-stretch my-auto max-md:mt-10">
                <div class="flex gap-5  capitalize">
                  <div
                    class="justify-center items-center px-5 py-3 text-2xl font-bold text-center text-gray-50 whitespace-nowrap bg-slate-900 h-[50px] rounded-[100px] w-[50px]">
                    3
                  </div>
                  <h3 class="text-4xl font-black text-red-400">Day 3</h3>
                </div>
                <p class="mt-10 text-sm text-neutral-600">
                  We pick, pack and ship all incoming orders directly from our own warehouse until 12pm on the same day,
                </p>
              </div>
            </div>
            <div class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
              <img loading="lazy" src="@/assets/day 3.png" alt="Day 3 illustration"
                class="w-full aspect-square max-md:mt-10" />
            </div>
          </div>
        </div>
        <div class="flex gap-5  mt-11 max-md:flex-wrap max-md:pr-5 max-md:mt-10 max-md:max-w-full">
          <img loading="lazy" src="@/assets/day 4.png" alt="Day 4 illustration" class="w-full aspect-square" />
          <div class="flex flex-col my-auto">
            <div class="flex gap-5  capitalize">
              <div
                class="justify-center items-center px-5 py-3 text-2xl font-bold text-center text-gray-50 whitespace-nowrap bg-slate-900 h-[50px] rounded-[100px] w-[50px]">
                4
              </div>
              <h3 class="text-4xl font-black text-red-400">Day 4</h3>
            </div>
            <p class="mt-10 text-sm text-neutral-600">
              Then, you can send us your inventory and the fun begins. We'll choose a delivery day together so your
              fulfilment is not interrupted.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- <section
      class="flex flex-col items-center px-16 pt-3.5 mt-5 w-full text-2xl font-medium text-black capitalize bg-violet-100 max-md:px-5 max-md:max-w-full">
      <div class="flex flex-col max-w-full w-[597px]">
        <h3 class="self-center">SPONSORED BY :</h3>
        <img loading="lazy"
          src="https://cdn.builder.io/api/v1/image/assets/TEMP/20f49a9641eea88cc8f29e51d23abe232378f2eb36cb50cf94a419c062697a09?apiKey=500874f732b04a0f9d2a6b3345b9b032&"
          alt="Sponsor logos" class="mt-5 w-full aspect-[2.56] max-md:max-w-full" />
      </div>
    </section> -->
  </main>
</template>

<script>
  // import './css/pages/landingview.css';
  import {
    ClipboardIcon,
    UserGroupIcon
  } from '@heroicons/vue/24/solid'
  // import {
  //   UserGroupIcon
  // } from '@heroicons/vue/24/solid'
  export default {
    name: 'LandingView',
    components: {
      ClipboardIcon,
      UserGroupIcon,
    }
  }
</script>
<style scoped>
  .inset-shadow {
    box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.2);
  }
</style>