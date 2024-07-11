<template>
  <div class="flex flex-col justify-center">
    <div class="flex justify-center items-center px-16 py-10 w-full bg-primary max-md:px-5 max-md:max-w-full">
      <div class="flex flex-col w-full max-w-[1920px] max-md:max-w-full">
        <div class="max-md:max-w-full">
          <div class="flex gap-5 max-md:flex-col max-md:gap-0">
            <div class="flex flex-col w-[34%] max-md:ml-0 max-md:w-full">
              <div class="flex gap-5 mt-2 max-md:mt-10">
                <img loading="lazy" src="@/assets/logo.png" alt="Askara logo" class="shrink-0 aspect-[0.99] h-[83px] w-[93px] md:w-[100px]" />
                <div class="flex flex-col grow shrink-0 basis-0 w-fit">
                  <div class="text-lg font-bold leading-7 text-white">
                    Tentang Website
                  </div>
                  <div class="mt-7 text-sm leading-5 text-white">
                    Website PKKMB SV 2024 Dipergunakan Untuk Jembatan Informasi
                    Kepada Mahasiswa Baru Sekolah Vokasi UNS 2024.
                  </div>
                  <iframe 
                  class="rounded-2xl w-full max-w-4xl"
                  title="map"
                  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7910.283819674678!2d110.83837400000002!3d-7.559502!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1748cf551e55%3A0x54f8a762c0623225!2sSekolah%20Vokasi%20UNS!5e0!3m2!1sen!2sus!4v1720696547365!5m2!1sen!2sus" 
                  style="border:0;" 
                  allowfullscreen="" 
                  loading="lazy" 
                  referrerpolicy="no-referrer-when-downgrade">
                  </iframe>
                </div>
              </div>
            </div>
            <div class="flex flex-col ml-5 w-[66%] max-md:ml-0 max-md:w-full">
              <div
                class="flex grow gap-5 justify-between items-start max-md:flex-wrap max-md:mt-10 max-md:max-w-full"
              >
                <div
                  class="flex flex-col mt-1.5 text-sm font-medium text-white whitespace-nowrap"
                >
                  <div class="text-lg font-bold capitalize">Menu</div>
                  <router-link to="/" class="mt-6">Beranda</router-link>
                  <router-link to="/materi" class="mt-2.5 capitalize">Materi</router-link>
                  <router-link to="/kelompok" class="mt-2.5">Kelompok</router-link>
                  <router-link to="/galeri" class="mt-2.5">Galeri</router-link>
                  <router-link to="/tentang" class="mt-2.5">Tentang</router-link>
                </div>
                <div
                  class="flex flex-col mt-1.5 text-sm font-medium text-white"
                >
                  <div class="text-lg font-bold capitalize">Kontak Kami</div>
                  <div class="flex gap-1.5 mt-6">
                    <img
                      loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/77e238def65e87197f00e69693e8ace539175c95380f91b28eeb6166dceed10c?"
                      class="shrink-0 aspect-[1.06] w-[18px]"
                      alt=""
                    />
                    <div class="flex-auto">
                      Jl. Kolonel Sutarto 150 K, Jebres, Surakarta
                    </div>
                  </div>
                  <div class="flex gap-1 mt-1.5 whitespace-nowrap">
                    <img
                      loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/9adce307add65ea368ba29319356925668fe7a9f31cbb5c1c9aa160cbfae59d2?"
                      class="shrink-0 self-start w-5 aspect-square"
                      alt=""
                    />
                    <div class="flex-auto">pkkmbsekolahvokasiuns@gmail.com</div>
                  </div>
                  <div class="flex gap-1 mt-2">
                    <img
                      loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/f304f18dd3b166c7a3b3e94bb1144648292fb0126db22904bba4f5b0c3d9acba?"
                      class="shrink-0 self-start w-5 aspect-square"
                      alt=""
                    />
                    <div class="flex-auto underline">
                      <a
                        href="https://chat.whatsapp.com/Fr3bT6kNhUo0Lcvescpi5y"
                        target="_blank"
                      >
                      0812-3456-7890(PUBIT)</a
                      >
                    </div>
                  </div>
                </div>
                <div class="flex flex-col items-start max-md:w-full">
                  <div class="text-lg font-bold text-white capitalize">
                    Sosial Media
                  </div>
                  <div class="flex flex-wrap gap-5 mt-5">
                    <a href="https://x.com/pkkmbsvuns" target="_blank" class="social-icon">
                      <RiTwitterXFill size="36px" color="black" />
                    </a>
                    <a href="https://www.tiktok.com/@pkkmbsvuns" target="_blank" class="social-icon">
                      <RiTiktokLine size="36px" color="black" />
                    </a>
                    <a href="https://www.instagram.com/pkkmbsvuns" target="_blank" class="social-icon">
                      <RiInstagramLine size="36px" color="black" />
                    </a>
                    <a href="https://www.youtube.com/@pkkmbsvuns6317" target="_blank" class="social-icon">
                      <RiYoutubeFill size="36px" color="black" />
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div
          class="shrink-0 mt-5 h-px border-2 border-solid bg-neutral-200 bg-opacity-40 border-neutral-200 border-opacity-40 max-md:mt-10 max-md:max-w-full"
        ></div>
        <div class="self-center mt-5 text-xl text-white">
          PKKMB SV UNS 2024. All Rights Reserved.
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router';
import { RiTiktokLine, RiInstagramLine, RiTwitterXFill, RiYoutubeFill } from "@remixicon/vue";
</script>

<style scoped>

.logo {
  width: 100%;
  max-width: 83px;
  height: auto;
}

.social-icon {
  background-color: white;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 24px;
}

@media (max-width: 970px) {
  .social-icon {
    margin-bottom: 10px;
  }

  .flex.flex-wrap {
    justify-content: center;
  }
}
</style>
