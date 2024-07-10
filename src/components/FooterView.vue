<template>
  <div class="flex flex-col justify-center">
    <div class="flex justify-center items-center px-16 py-16 w-full bg-custom-background max-md:px-5 max-md:max-w-full">
      <div class="flex flex-col w-full max-w-[1216px] max-md:max-w-full">
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
                  <router-link to="/" class="mt-6">Home</router-link>
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
                    />
                    <div class="flex-auto">pkkmbsekolahvokasiuns@gmail.com</div>
                  </div>
                  <div class="flex gap-1 mt-2">
                    <img
                      loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/f304f18dd3b166c7a3b3e94bb1144648292fb0126db22904bba4f5b0c3d9acba?"
                      class="shrink-0 self-start w-5 aspect-square"
                    />
                    <div class="flex-auto underline">
                      0812-3456-7890<a
                        href="https://chat.whatsapp.com/Fr3bT6kNhUo0Lcvescpi5y"
                        target="_blank"
                      >
                        (PUBIT)</a
                      >
                    </div>
                  </div>
                </div>
                <div class="flex flex-col">
                  <div class="text-lg font-bold text-white capitalize">
                    Social Media
                  </div>
                  <div class="flex gap-5 mt-5">
                    <a href="https://www.facebook.com" target="_blank" class="social-icon">
                      <RiFacebookFill size="36px" color="black" />
                    </a>
                    <a href="https://twitter.com" target="_blank" class="social-icon">
                      <RiTwitterXFill size="36px" color="black" />
                    </a>
                    <a href="https://www.tiktok.com" target="_blank" class="social-icon">
                      <RiTiktokLine size="36px" color="black" />
                    </a>
                    <a href="https://www.instagram.com" target="_blank" class="social-icon">
                      <RiInstagramLine size="36px" color="black" />
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div
          class="shrink-0 mt-12 h-px border-2 border-solid bg-neutral-200 bg-opacity-40 border-neutral-200 border-opacity-40 max-md:mt-10 max-md:max-w-full"
        ></div>
        <div class="self-center mt-9 text-xl text-white">
          PKKMB SV UNS 2024. All Rights Reserved.
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router';
import { RiTiktokLine, RiFacebookFill, RiInstagramLine, RiTwitterXFill } from "@remixicon/vue";

</script>

<style scoped>
.bg-custom-background {
  background-color: #2C2D5B;
}

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
  color: #2C2D5B;
  font-size: 24px;
}


</style>
