<template>
<div class="flex flex-col bg-white">
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
            class="self-stretch pl-8 mt-5 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-10 max-md:max-w-full"
          >
            <span class="font-semibold">Selamat Datang di</span>
          </h1>
          <h1
            class="self-stretch pl-8 -mr-1 ml-8 text-4xl font-bold leading-[60px] text-neutral-900 max-md:mt-0 max-md:max-w-full"
          >
            <span class="text-5xl text-red-400">PKKMB SV UNS 2024</span>.
          </h1>
          <div
            class="flex justify-end gap-5 font-extrabold text-center max-md:mt-10 max-md:mr-2.5"
          >
            <router-link
              to="/kelompok"
              class="button-biru justify-center px-10 py-5 text-sm text-white rounded-xl max-md:px-5"
            >
              Cari Kelompok
            </router-link>
            <router-link
              to="/materi"
              href=""
              class="button-putih flex gap-5 justify-between px-6 py-4 bg-white shadow-lg rounded-[100px] max-md:px-5 btn btn-light"
            >
              <ClipboardIcon loading="lazy" alt="" class="size-6" />
              <span class="my-auto">Materi</span>
            </router-link>
          </div>
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
  </div>
  <main>
    <div class="flex justify-center items-center">
      <section
        class="flex justify-center flex-col items-center font-bold text-center leading-[150%] max-w-[900px] pb-10 pl-5 pr-5"
      >
        <h1
          class="text-6xl text-red-400 capitalize max-md:max-w-full max-md:text-4xl"
        >
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
            alt="Coming Soon PKKMB SV UNS 2024"
            class="rounded-3xl w-full max-w-4xl"
            src="https://www.youtube.com/embed/ySsWXVGp7_o?si=BgW2ZuraVzfWmmrN"
            title="YouTube video player"
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
              <div
                class="flex flex-col capitalize max-md:mt-10 max-md:max-w-full"
              >
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
                  Ayo cari tahu kelompok kamu <br />selama PKKMB SV UNS
                  berlangsung!
                </p>
                <div class="shrink-0 mt-3.5 h-1 bg-red-400 w-[130px]"></div>
              </div>
            </div>
            <article class="flex flex-col max-w-[192px] mx-auto">
              <div class="relative mt-5">
                <!-- Lingkaran luar dengan bayangan -->
                <div class="absolute top-[-10px] left-[-10px] right-[-10px] bottom-[-10px] bg-slate-100 rounded-full shadow-md inset-shadow"></div>
                <!-- Lingkaran putih untuk icon -->
                <div class="relative z-10 flex items-center justify-center bg-white h-[150px] w-[150px] rounded-full shadow-md">
                  <UserGroupIcon class="aspect-square w-12 h-12 text-red-400" alt="Profile icon" />
                </div>
              </div>
            </article>
          </div>
        </div>
        <router-link
          to="/kelompok"
          class="button-biru justify-center items-center self-center p-7 mt-12 max-w-full text-sm font-extrabold text-center text-white capitalize rounded-xl w-[250px] max-md:px-5 max-md:mt-10"
        >
          Check
        </router-link>
      </div>
    </section>

    <section
      class="flex justify-center items-center px-16 py-20 bg-white max-md:px-5"
    >
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
        <div
          class="shrink-0 mt-2.5 ml-72 h-1 bg-red-400 w-[130px] max-md:ml-2.5"
        ></div>
        <div class="max-md:max-w-full">
          <div class="flex gap-5 max-md:flex-col-reverse max-md:gap-0">
            <div class="flex items-center w-[43%] max-md:w-full">
              <div class="flex flex-col self-stretch my-auto max-md:mt-10">
                <div class="flex gap-5 capitalize">
                  <div
                    class="flex justify-center items-center flex-shrink-0 px-5 py-3 text-2xl font-bold text-center text-gray-50 whitespace-nowrap bg-slate-900 h-[50px] rounded-full w-[50px]"
                  >
                    1
                  </div>
                  <h3 class="text-4xl font-black text-red-400">Day 1</h3>
                </div>
                <p class="mt-10 text-2xl font-bold text-neutral-600">
                  Opening Ceremony.
                </p>
                <p class="mt-5 text-lg text-neutral-600">
                  Pada hari pertama, secara garis besar akan diisi dengan sesi
                  pemaparan materi. Acara ini mencakup talkshow dengan materi
                  tentang entrepreneur dan talkshow dengan materi tentang cara
                  bertahan hidup di kehidupan kampus.
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
          <div class="flex gap-5 max-md:flex-col max-md:gap-0 max-md:flex-col">
            <div class="flex flex-col w-[65%] max-md:w-full">
              <img
                loading="lazy"
                src="@/assets/day 2.png"
                alt="Day 2 illustration"
                class="grow w-full max-md:mt-10 max-md:max-w-full"
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
                <p class="mt-10 text-2xl font-bold text-neutral-600">
                  Prodi's Time
                </p>
                <p class="mt-5 text-lg text-neutral-600">
                  Dalam kegiatan PKKMB (Pengenalan Kehidupan Kampus bagi
                  Mahasiswa Baru) Prodi's Time adalah sesi khusus yang diadakan
                  untuk memperkenalkan mahasiswa baru kepada program studi
                  (prodi) yang kalian pilih.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-12 max-md:mt-10 max-md:max-w-full">
          <div class="flex gap-5 max-md:flex-col-reverse max-md:gap-0">
            <div class="flex items-center w-[43%] max-md:w-full">
              <div class="flex flex-col self-stretch my-auto max-md:mt-10">
                <div class="flex gap-5 items-center capitalize">
                  <div
                    class="flex justify-center items-center flex-shrink-0 px-5 py-3 text-2xl font-bold text-center text-gray-50 whitespace-nowrap bg-slate-900 h-[50px] rounded-[100px] w-[50px]"
                  >
                    3
                  </div>
                  <h3 class="text-4xl font-black text-red-400">Day 3</h3>
                </div>
                <p class="mt-10 text-2xl font-bold text-neutral-600">
                  Closing Ceremony
                </p>
                <p class="mt-5 text-lg text-neutral-600">
                  Di pagi hari, kita akan melakukan sesi Mind Mapping, dan pada
                  siang harinya dilanjutkan dengan apresiasi Mahasiswa Baru.
                </p>
              </div>
            </div>
            <div class="flex flex-col ml-5 w-[57%] max-md:ml-0 max-md:w-full">
              <img
                loading="lazy"
                src="@/assets/day 3.png"
                alt="Day 3 illustration"
                class="grow w-full max-md:mt-10 max-md:max-w-full"
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
              class="text-3xl text-white font-bold inline-block border-b-4 border-[#F67366] mt-5"
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
                <img
                  src="@/assets/logo_hima/himakesja.png"
                  class="object-cover"
                />
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
                <img
                  src="@/assets/logo_hima/emailkom.png"
                  class="object-cover"
                />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img
                  src="@/assets/logo_hima/himapsdku.png"
                  class="object-cover"
                />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img
                  src="@/assets/logo_hima/himafarma.png"
                  class="object-cover"
                />
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
                <img
                  src="@/assets/logo_hima/himavida.png"
                  class="object-cover"
                />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img
                  src="@/assets/logo_hima/fondasi.png"
                  class="object-cover"
                />
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
                <img
                  src="@/assets/logo_hima/himaagrib.png"
                  class="object-cover"
                />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img
                  src="@/assets/logo_hima/himapertanian.png"
                  class="object-cover"
                />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img
                  src="@/assets/logo_hima/himamanajemen.png"
                  class="object-cover"
                />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img
                  src="@/assets/logo_hima/formadasi.png"
                  class="object-cover"
                />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img
                  src="@/assets/logo_hima/himaakuntansi.png"
                  class="object-cover"
                />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img
                  src="@/assets/logo_hima/chinese.png"
                  class="object-cover"
                />
              </div>
              <div
                class="swiper-slide"
                style="max-width: 200px; max-height: 200px; margin: 0 0px"
              >
                <img
                  src="@/assets/logo_hima/himaupw.png"
                  class="object-cover"
                />
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
      spaceBetween: 5,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      autoplay: {
        delay: 1000,
        disableOnInteraction: false,
      },
      breakpoints: {
        300: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        480: {
          slidesPerView: 4,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 5,
          spaceBetween: 10,
        },
        1024: {
          slidesPerView: 6,
          spaceBetween: 10,
        },
        1280: {
          slidesPerView: 7,
          spaceBetween: 10,
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
  max-width: 50%; /* Menyesuaikan ukuran gambar */
  height: auto;
}

@media (max-width: 700px) {
  .image-container {
    gap: 5px; /* Sesuaikan gap untuk layar kecil */
  }

  .image-container img {
    max-width: 70%; /* Menyesuaikan ukuran gambar untuk layar kecil */
  }
}

@media (max-width: 768px) {
  .max-md\\:order-first {
    order: -1;
  }
}

.swiper-wrapper {
  display: flex;
  gap: 10px; /* Sesuaikan gap untuk memperdekat foto */
  margin-bottom: 5px; /* Sesuaikan margin-bottom untuk memperdekat foto */
}

.swiper-slide {
  max-width: 200px;
  max-height: 200px;
  margin: 0 5px; /* Kurangi margin untuk memperdekat foto */
}

.swiper-slide img {
  width: 50%; /* Pastikan gambar mengisi slide */
  height: auto;
  object-fit: contain;
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

@import '../css/pages/_button.css';
</style>
