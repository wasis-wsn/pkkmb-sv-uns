<template>
  <main
    class="flex gap-5 w-full capitalize max-md:flex-wrap max-md:pr-5 max-md:max-w-full"
  >
    <section
      class="flex flex-col flex-1 items-start pb-32 mt-16 ml-2 rounded-full border border-solid border-violet-300 border-opacity-50 max-md:max-w-full"
    >
      <div
        v-for="index in 5"
        :key="index"
        class="shrink-0 mt-5 bg-red-300 bg-opacity-20 h-[5px] rounded-[100px] w-[187px]"
        :class="{ 'mt-20 max-md:mt-10': index === 1 }"
      ></div>
      <h1
        class="self-stretch pl-8 mt-36 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-10 max-md:max-w-full"
      >
        <span class="font-semibold">Selamat Datang di </span>
        <span class="text-5xl text-red-400">PKKMB SV UNS 2024</span>.
      </h1>
      <div
        class="flex gap-5 justify-between self-end mt-11 font-extrabold text-center max-md:mt-10 max-md:mr-2.5"
      >
        <router-link
          to="/kelompok"
          class="btn-outline justify-center px-10 py-5 text-sm text-white rounded-xl bg-slate-700 max-md:px-5 hover:text-slate-700 hover:bg-white hover:border-slate-700"
        >
          Cari Kelompok
        </router-link>
        <div
          class="flex flex-col justify-center text-lg leading-5 whitespace-nowrap text-slate-700"
        >
          <router-link
            to="/materi"
            href=""
            class="btn-outline flex gap-5 justify-between px-6 py-4 bg-white shadow-lg rounded-[100px] max-md:px-5 btn btn-light hover:bg-slate-700 hover:text-white hover:border-white"
          >
            <ClipboardIcon loading="lazy" alt="" class="size-6" />
            <span class="my-auto">Materi</span>
          </router-link>
        </div>
      </div>
    </section>
    <img
      loading="lazy"
      src="@/assets/Logo Besar.png"
      alt="PKKMB SV UNS 2024 illustration"
      class="flex-1 self-end mt-20 w-full aspect-[0.96] max-md:mt-10 max-md:max-w-full"
    />
  </main>
  <main>
    <div class="flex justify-center items-center min-h-screen">
      <section
        class="flex justify-center flex-col items-center px-5 font-bold text-center leading-[150%] max-w-[764px] mt-[180px]"
      >
        <h1 class="text-6xl text-red-400 capitalize max-md:max-w-full max-md:text-4xl">
          Askara Muda 2024!
        </h1>
        <p
          class="self-stretch mt-9 w-full text-3xl text-zinc-800 max-md:mt-10 max-md:max-w-full"
        >
          "Jiwa Berkarakter, Kreativitas Tanpa Batas, Inovasi Mendunia"
        </p>
        <div class="video-container">
          <iframe
            loading="lazy"
            alt="After Movie PKKMB SV UNS 2024"
            class="mx-auto rounded-xl mt-3"
            src="https://www.youtube.com/embed/CoTPJXtsH3E?si=I1aetGJA8GqErgRU"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
      </section>
    </div>

    <section
      class="flex justify-center items-center px-16 py-20 mt-10 w-full bg-slate-100 max-md:px-5 max-md:max-w-full"
    >
      <div
        class="flex flex-col pr-20 pb-3 pl-0.5 mt-3.5 mb-3.5 w-full bg-white bg-opacity-0 max-w-[1015px] max-md:pr-5 max-md:max-w-full"
      >
        <div class="max-md:max-w-full">
          <div class="flex gap-5 max-md:flex-col max-md:gap-0">
            <div class="flex flex-col w-[77%] max-md:ml-0 max-md:w-full">
              <div class="flex flex-col capitalize max-md:mt-10 max-md:max-w-full">
                <div class="flex items-center">
                  <h2
                    class="self-end text-5xl font-bold text-red-400 leading-[69px] text-center max-md:text-4xl"
                  >
                    <span class="text-6xl text-red-400">Kelompok!</span>
                  </h2>
                </div>
                <p
                  class="mt-6 mr-11 text-4xl text-neutral-900 max-md:mr-2.5 max-md:max-w-full"
                >
                  Ayo cari tahu kelompok kamu <br />selama PKKMB SV UNS berlangsung!
                </p>
                <div class="shrink-0 mt-3.5 h-1 bg-red-400 w-[130px]"></div>
              </div>
            </div>
            <article class="flex flex-col max-w-[192px]">
              <div
                class="shrink-0 self-end bg-slate-100 h-[150px] rounded-[100px] w-[150px] shadow-md inset-shadow"
                role="img"
                aria-label="Profile background"
              ></div>
              <div
                class="flex z-10 flex-col justify-center items-start p-11 -mt-24 w-full bg-white rounded-[100px]"
              >
                <UserGroupIcon
                  loading="lazy"
                  class="aspect-square w-[60px] text-red-400"
                  alt="Profile icon"
                />
              </div>
            </article>
          </div>
        </div>
        <router-link
          to="/kelompok"
          class="btn-outline justify-center items-center self-center p-7 mt-12 max-w-full text-sm font-extrabold text-center text-white capitalize rounded-xl bg-slate-700 w-[250px] max-md:px-5 max-md:mt-10 hover:text-slate-700 hover:bg-white hover:border-slate-700"
        >
          Check
        </router-link>
      </div>
    </section>

    <section class="flex justify-center items-center px-16 py-20 bg-white max-md:px-5">
      <div
        class="flex flex-col mt-20 w-full max-w-[1151px] max-md:mt-10 max-md:max-w-full"
      >
        <h1
          class="self-center text-5xl font-semibold text-center capitalize leading-[69px] text-neutral-900 max-md:text-4xl"
        >
          Timeline!
        </h1>
        <h2
          class="self-center mt-8 text-4xl capitalize text-neutral-900 max-md:max-w-full"
        >
          Lihat Timeline PKKMB SV UNS 2024!
        </h2>
        <div class="shrink-0 mt-2.5 ml-72 h-1 bg-red-400 w-[130px] max-md:ml-2.5"></div>
        <div class="max-md:max-w-full">
          <div class="flex gap-5 max-md:flex-col max-md:gap-0">
            <div class="flex items-center w-[43%] max-md:ml-0 max-md:w-full">
              <div class="flex flex-col self-stretch my-auto max-md:mt-10">
                <div class="flex gap-5 capitalize">
                  <div
                    class="flex justify-center items-center flex-shrink-0 px-5 py-3 text-2xl font-bold text-center text-gray-50 whitespace-nowrap bg-slate-900 h-[50px] rounded-full w-[50px]"
                  >
                    1
                  </div>
                  <h3 class="text-4xl font-black text-red-400">Day 1</h3>
                </div>
                <p class="mt-10 text-sm text-neutral-600">
                  You're currently running your store on Shopify, WooCommerce, or any
                  other platform. As a first step, you'll connect your store with our
                  platform.
                </p>
              </div>
            </div>
            <div class="flex flex-col ml-5 w-[57%] max-md:ml-0 max-md:w-full">
              <img
                loading="lazy"
                src="@/assets/day 1.png"
                alt="Day 1 illustration"
                class="grow w-full aspect-[1.49] max-md:mt-10 max-md:max-w-full"
              />
            </div>
          </div>
        </div>
        <div class="mt-12 max-md:pr-5 max-md:mt-10 max-md:max-w-full">
          <div class="flex gap-5 max-md:flex-col max-md:gap-0">
            <div class="flex flex-col w-[65%] max-md:ml-0 max-md:w-full">
              <img
                loading="lazy"
                src="@/assets/day 2.png"
                alt="Day 2 illustration"
                class="w-full aspect-square max-md:mt-10"
              />
            </div>
            <div class="flex flex-col ml-5 w-[35%] max-md:ml-0 max-md:w-full">
              <div class="flex flex-col self-stretch my-auto max-md:mt-10">
                <div class="flex gap-5 items-center capitalize">
                  <div
                    class="flex justify-center items-center flex-shrink-0 px-5 py-3 text-2xl font-bold text-center text-gray-50 whitespace-nowrap bg-slate-900 h-[50px] rounded-full w-[50px]"
                  >
                    2
                  </div>
                  <h3 class="text-4xl font-black text-red-400">Day 2</h3>
                </div>
                <p class="mt-10 text-sm text-neutral-600">
                  You're currently running your store on Shopify, WooCommerce, or any
                  other platform. As a first step, you'll connect your store with our
                  platform.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-12 max-md:mt-10 max-md:max-w-full">
          <div class="flex gap-5 max-md:flex-col max-md:gap-0">
            <div class="flex items-center w-[43%] max-md:ml-0 max-md:w-full">
              <div class="flex flex-col self-stretch my-auto max-md:mt-10">
                <div class="flex gap-5 items-center capitalize">
                  <div
                    class="flex justify-center items-center flex-shrink-0 px-5 py-3 text-2xl font-bold text-center text-gray-50 whitespace-nowrap bg-slate-900 h-[50px] rounded-[100px] w-[50px]"
                  >
                    3
                  </div>
                  <h3 class="text-4xl font-black text-red-400">Day 3</h3>
                </div>
                <p class="mt-10 text-sm text-neutral-600">
                  You're currently running your store on Shopify, WooCommerce, or any
                  other platform. As a first step, you'll connect your store with our
                  platform.
                </p>
              </div>
            </div>
            <div class="flex flex-col ml-5 w-[57%] max-md:ml-0 max-md:w-full">
              <img
                loading="lazy"
                src="@/assets/day 3.png"
                alt="Day 3 illustration"
                class="grow w-full aspect-[1.49] max-md:mt-10"
              />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Slider Acara -->
    <div class="slider-acara mt-5">
      <!-- Trending Section -->
      <section class="acara" id="acara">
        <div class="background">
          <div class="mb-3 text-center">
            <h1
              class="text-3xl text-[#2C2D5B] font-bold inline-block border-b-4 border-[#F67366] mt-5"
            >
              SPONSORED BY :
            </h1>
            <div class="image-container">
              <img src="@/assets/telkom.png" alt="Telkom" />
              <img src="@/assets/bca.png" alt="BCA" />
              <img src="@/assets/mandiri.png" alt="Mandiri" />
              <img src="@/assets/bri.png" alt="BRI" />
            </div>
          </div>
          <div class="background container swiper mt-5">
            <!-- Slides -->
            <div class="swiper-wrapper flex mx-auto mb-5">
              <div
                class="swiper-slide slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img
                  src="@/assets/logo_hima/hima_sv.png"
                  alt="PKKMB SV UNS 2024 Seminar"
                  class="object-cover"
                />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img src="@/assets/logo_hima/himakesja.png" class="object-cover" />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img src="@/assets/logo_hima/himama.png" class="object-cover" />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img src="@/assets/logo_hima/emailkom.png" class="object-cover" />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img src="@/assets/logo_hima/himapsdku.png" class="object-cover" />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img src="@/assets/logo_hima/himafarma.png" class="object-cover" />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img src="@/assets/logo_hima/hmps.png" class="object-cover" />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img src="@/assets/logo_hima/himavida.png" class="object-cover" />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img src="@/assets/logo_hima/fondasi.png" class="object-cover" />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img src="@/assets/logo_hima/HMB.png" class="object-cover" />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img src="@/assets/logo_hima/himaagrib.png" class="object-cover" />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img src="@/assets/logo_hima/himapertanian.png" class="object-cover" />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img src="@/assets/logo_hima/himamanajemen.png" class="object-cover" />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img src="@/assets/logo_hima/formadasi.png" class="object-cover" />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img src="@/assets/logo_hima/himaakuntansi.png" class="object-cover" />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img src="@/assets/logo_hima/chinese.png" class="object-cover" />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img src="@/assets/logo_hima/himaupw.png" class="object-cover" />
              </div>
            </div>
            <div class="swiper-pagination"></div>
            <!-- Swiper end -->
          </div>
        </div>
      </section>
    </div>
    <!-- Trending Section Ends -->
  </main>
</template>

<script>
import { ClipboardIcon, UserGroupIcon } from "@heroicons/vue/24/solid";
import Swiper from "swiper";
import "swiper/swiper-bundle.css";

export default {
  name: "LandingView",
  components: {
    ClipboardIcon,
    UserGroupIcon,
  },
  mounted() {
    new Swiper(".swiper", {
      loop: true,
      slidesPerView: 10,
      spaceBetween: 10,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      autoplay: {
        delay: 1000,
        disableOnInteraction: false,
      },
      breakpoints: {
        480: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 5,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 6,
          spaceBetween: 40,
        },
        1280: {
          slidesPerView: 7,
          spaceBetween: 50,
        },
      },
    });
  },
};
</script>

<style scoped>
.inset-shadow {
  box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.2);
}

.swiper-button-next,
.swiper-button-prev {
  position: absolute;
  top: 50%;
  width: 27px;
  height: 44px;
  margin-top: -22px;
  z-index: 10;
  cursor: pointer;
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
  border-radius: 0 10px 10px 0;
  text-align: center;
  line-height: 44px;
}

.swiper-button-next {
  right: 0;
  border-radius: 10px 0 0 10px;
}

.swiper-button-prev {
  left: 0;
  border-radius: 10px 0 0 10px;
}

.btn-outline {
  border: 2px solid transparent;
  transition: all 0.3s ease;
}

.btn-outline:hover {
  border-color: currentColor;
}

.background {
  background-color: #89a4f1;
}

.image-container {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  /* Allow wrapping */
  gap: 50px;
  margin-top: 20px;
  width: 100%;
  background-color: #89a4f1;
  /* Ensure the background color */
  padding: 20px;
  /* Add padding to contain logos within the background */
  box-sizing: border-box;
  /* Ensure padding is included in the width */
}

.image-container img {
  max-width: 100%;
  /* Ensure images do not exceed container width */
  height: auto;
}

@media (max-width: 700px) {
  .image-container {
    gap: 10px;
    /* Adjust gap for smaller screens */
  }

  .image-container img {
    max-width: 50%;
    /* Adjust image width for smaller screens */
  }
}

.swiper-slide img {
  width: 100%;
  height: 100%;
  object-fit: contain;
}

.rounded-iframe {
  border-radius: 15px;
  /* Adjust the value as needed */
  overflow: hidden;
  /* Ensures content inside iframe is clipped to the rounded border */
}

.video-container {
  position: relative;
  width: 100%;
  padding-top: 56.25%; /* Aspect ratio 16:9 */
  overflow: hidden;
}

.video-container iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>
