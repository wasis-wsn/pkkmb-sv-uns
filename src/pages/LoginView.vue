<template>
  <div>
    <nav class="sticky top-0 flex flex-col md:flex-row gap-5 justify-between items-center px-8 py-4 bg-white bg-opacity-90 z-10">
      <div class="flex items-center gap-2 pr-1.5 font-bold text-center text-black bg-white bg-opacity-0 leading-[150%]">
        <img loading="lazy" src="@/assets/logo.png" alt="Askara logo" class="shrink-0 aspect-[1.08] w-[89px]" />
        <div class="flex flex-col self-start mt-5">
          <h1 class="text-3xl">A S K A R A</h1>
          <p class="mt-2.5 text-xs">PKKMB SEKOLAH VOKASI 2024</p>
        </div>
      </div>
      <div class="flex gap-5 items-center text-xl text-right text-gray-600 tracking-[2px]">
        <a href="/hubungi-kami">Hubungi Kami</a>
        <a href="/">
          <HomeIcon class="w-10 h-10 self-end" />
        </a>
      </div>
    </nav>
    <div class="flex flex-col px-7 pt-8 pb-20 bg-white rounded max-md:px-5">
      <main class="self-center mt-12 w-full max-w-[1270px] max-md:mt-10 max-md:max-w-full">
        <div class="flex gap-5 max-md:flex-col max-md:gap-0">
          <section class="flex flex-col ml-5 w-[56%] max-md:ml-0 max-md:w-full">
            <img loading="lazy" src="@/assets/illustration.png" alt="Decorative illustration" class="grow w-full aspect-[1.11] max-md:mt-7 max-md:max-w-full" />
          </section>
          <section class="flex flex-col w-[44%] max-md:ml-0 max-md:w-full">
            <div class="flex flex-col self-stretch my-auto font-bold max-md:mt-10 max-md:max-w-full">
              <h2 class="self-center text-5xl text-black max-md:text-4xl">
                Halo Vocazens!
              </h2>
              <form @submit.prevent="handleSubmit">
                <div class="mt-20 text-2xl text-neutral-400 max-md:mt-10 max-md:max-w-full">
                  <label for="username" class="sr-only">Username</label>
                  <input v-model="username" type="text" id="username" placeholder="Username" class="w-full bg-transparent border-b-2 border-black outline-none" />
                </div>
                <div class="mt-20 text-2xl text-neutral-400 max-md:mt-10 max-md:max-w-full">
                  <label for="password" class="sr-only">Password</label>
                  <input v-model="password" type="password" id="password" placeholder="Password" class="w-full bg-transparent border-b-2 border-black outline-none" />
                </div>
                <div class="flex gap-5 mt-5 w-full text-2xl font-light text-black text-opacity-80 max-md:flex-wrap max-md:mt-10 max-md:max-w-full items-center">
                  <div class="flex items-center gap-2">
                    <input type="checkbox" id="remember" class="h-[24px] w-[24px]" />
                    <label for="remember" class="flex-auto">Remember me</label>
                  </div>
                  <a href="/lupa-password" class="text ml-auto">Lupa password?</a>
                </div>
                <button type="submit" class="justify-center items-center self-center px-16 py-4 mt-28 max-w-full text-4xl text-white whitespace-nowrap bg-slate-700 rounded-[70px] w-[365px] max-md:px-5 max-md:mt-10">
                  LOGIN
                </button>
              </form>
            </div>
          </section>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
import { HomeIcon } from '@heroicons/vue/24/solid'

export default {
  name: 'LoginView',
  components: {
    HomeIcon,
  },
  data() {
    return {
      isHeaderShadowVisible: false,
      username: '',
      password: ''
    };
  },
  mounted() {
    // Tambahkan event listener untuk mendeteksi scroll
    window.addEventListener('scroll', this.handleScroll);
  },
  beforeUnmount() {
    // Hapus event listener saat komponen dihapus
    window.removeEventListener('scroll', this.handleScroll);
  },
  methods: {
    handleScroll() {
      this.isHeaderShadowVisible = window.scrollY > 0;
    },
    handleSubmit() {
      // Logika untuk handle submit form login bisa ditambahkan di sini
      console.log('Username:', this.username);
      console.log('Password:', this.password);
      // Contoh redirect ke halaman setelah login berhasil
      this.$router.push('/');
      // Menghapus memori dari username dan password
      this.username = '';
      this.password = '';
    }
  }
}
</script>

<style scoped>
* {
  font-family: 'Lato', sans-serif;
}

/* Styling untuk animasi dropdown */
.dropdown-enter-active, .dropdown-leave-active {
  transition: opacity 0.3s ease;
}
.dropdown-enter, .dropdown-leave-to {
  opacity: 0;
}

/* Styling untuk memastikan tampilan konsisten pada mobile */
@media (max-width: 768px) {
  .header-title {
    font-size: 1.25rem;
  }
  .header-subtitle {
    margin-top: 0.25rem;
  }

  nav {
    flex-direction: column;
    align-items: center;
  }

  nav .flex {
    justify-content: center;
    margin-top: 10px; /* Sesuaikan jarak antara elemen */
  }

  main {
    order: -1; /* Menggeser main ke atas di tampilan mobile */
  }
}
</style>
