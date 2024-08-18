<template>
  <Head title="Login" />
  <div>
    <nav class="sticky top-0 flex flex-col md:flex-row gap-5 justify-between items-center px-8 py-4 bg-white bg-opacity-90 z-10">
      <Link href="/" class="flex items-center gap-2 pr-1.5 font-bold text-center text-black bg-white bg-opacity-0 leading-[150%]">
        <img loading="lazy" src="@assets/logo.png" alt="Askara logo" class="shrink-0 aspect-[1.08] w-[89px]" />
        <div class="flex flex-col self-start mt-5">
          <h1 class="text-3xl">A S K A R A</h1>
          <p class="mt-2.5 text-xs">PKKMB SEKOLAH VOKASI 2024</p>
        </div>
      </Link>
      <div class="flex gap-5 items-center text-xl text-right text-gray-600 tracking-[2px]">
        <a href="http://wa.me/6289512537245">Hubungi Admin</a>
        <a href="/">
          <HomeIcon class="w-10 h-10 self-end" />
        </a>
      </div>
    </nav>
    <div class="flex flex-col px-7 pt-8 pb-20 bg-white rounded max-md:px-5">
      <main class="self-center mt-12 w-full max-w-[1270px] max-md:mt-10 max-md:max-w-full">
        <div class="flex gap-5 max-md:flex-col max-md:gap-0">
          <section class="flex flex-col ml-5 w-[56%] max-md:ml-0 max-md:w-full">
            <img loading="lazy" src="@assets/illustration.png" alt="Decorative illustration" class="grow w-full aspect-[1.11] max-md:mt-7 max-md:max-w-full" />
          </section>
          <section class="flex flex-col w-[44%] max-md:ml-0 max-md:w-full">
            <div class="flex flex-col self-stretch my-auto font-bold max-md:mt-10 max-md:max-w-full">
              <h2 class="self-center text-5xl text-black max-md:text-4xl">
                Halo Askara Muda!
              </h2>
              <form @submit.prevent="submit">
                <div class="mt-20 text-2xl text-neutral-400 max-md:mt-10 max-md:max-w-full">
                  <label for="username" class="sr-only">Username</label>
                  <input v-model="form.username" type="text" id="username" placeholder="Username" class="w-full bg-transparent border-b-2 border-black outline-none" />
                  <p v-if="errors.username" class="text-red-500 text-sm mt-2">{{ errors.username }}</p>
                </div>
                <div class="mt-20 text-2xl text-neutral-400 max-md:mt-10 max-md:max-w-full">
                  <label for="password" class="sr-only">Password</label>
                  <input v-model="form.password" type="password" id="password" placeholder="Password" class="w-full bg-transparent border-b-2 border-black outline-none" />
                  <p v-if="errors.password" class="text-red-500 text-sm mt-2">{{ errors.password }}</p>
                </div>
                <div class="flex gap-5 mt-5 w-full text-2xl font-light text-black text-opacity-80 max-md:flex-wrap max-md:mt-10 max-md:max-w-full items-center">
                  <div class="flex items-center gap-2">
                    <input v-model="form.remember" type="checkbox" id="remember" class="h-[24px] w-[24px]" />
                    <label for="remember" class="flex-auto">Remember me</label>
                  </div>
                  <a href="forgot-password" class="text ml-auto">Lupa password?</a>
                </div>
                <button type="submit" class="button-biru justify-center items-center self-center px-16 py-4 mt-28 max-w-full text-4xl whitespace-nowrap rounded-[70px] w-[365px] max-md:px-5 max-md:mt-10">
                  LOGIN
                </button>
              </form>
              <!-- Modal for Error -->
              <div v-if="showModal" class="bg-black-200/70 fixed inset-0 flex items-center justify-center z-50">
                <div class="bg-white p-6 rounded shadow-lg max-w-sm w-full">
                  <h3 class="text-xl font-semibold mb-4">Error</h3>
                  <p class="text-red-500 mb-4">{{ modalMessage }}</p>
                  <button @click="closeModal" class="bg-blue-500 text-white px-4 py-2 rounded">OK</button>
                </div>
              </div>           
            </div>
          </section>
        </div>
      </main>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import { useRouter } from 'vue-router'
import { HomeIcon } from '@heroicons/vue/24/solid'
import { useForm, Head, Link } from '@inertiajs/vue3'

const form = useForm({
  username: '',
  password: '',
  remember: []
})

const errors = ref({})
const serverError = ref('')
const showModal = ref(false)
const modalMessage = ref('')

const submit = () => {
  errors.value = {}
  serverError.value = ''
  
  if (!form.username) {
    errors.value.username = 'Username is required.'
  }
  
  if (!form.password) {
    errors.value.password = 'Password is required.'
  }

  if (Object.keys(errors.value).length === 0) {
    form
      .transform(data => ({
        ...data,
        remember: form.remember && form.remember.length ? 'on' : ''
      }))
      .post(route('login'), {
        onFinish: () => form.reset('password'),
        onError: (errors) => {
          modalMessage.value = 'Username atau password Anda salah. Mohon ulangi sekali lagi.'
          showModal.value = true
        }
      })
  }
}

const closeModal = () => {
  showModal.value = false
}

const username = ref('')

const isHeaderShadowVisible = ref(false)
const router = useRouter()

const handleScroll = () => {
  isHeaderShadowVisible.value = window.scrollY > 0
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll)
})

onBeforeUnmount(() => {
  document.title = "PKKMB SV UNS - LOGIN"
  window.removeEventListener('scroll', handleScroll)
})

const props = defineProps({
  canResetPassword: Boolean,
  status: {
    type: String,
    default: null
  }
})
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

/* Add styling for modal */
.fixed {
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgba(0, 0, 0, 0.5);
}
.bg-white {
  background-color: #fff;
}
.shadow-lg {
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.max-w-sm {
  max-width: 24rem;
}
</style>
