<template>
    <div v-if="isOpen" class="absolute right-0 mt-2 w-80 bg-white rounded-md shadow-lg py-1 z-30 border">
        <main class="flex flex-col items-center pb-8 w-full text-base bg-white rounded-none">
            <section class="flex flex-col self-start ml-5 text-xl">
                <h1 class="font-bold text-black">Profile</h1>
                <h2 class="mt-9 font-semibold leading-[155%] text-neutral-900">
                    {{ user ? user.mahasiswa?.nama_mahasiswa || user.name || 'N/A' : 'Loading...' }}</h2>
                <p class="mt-2 text-xs leading-4 text-neutral-500">@{{ user ? user.email || 'N/A' : 'Loading...' }}
                </p>
            </section>
            <dl v-if="user && user.role === 'user'" class="w-full mt-12 px-5 space-y-2">
                <div class="flex flex-wrap justify-between font-medium leading-[155%] text-neutral-900">
                    <dt>Nama:</dt>
                    <dd>{{ user ? user.mahasiswa?.nama_mahasiswa || 'N/A' : 'Loading...' }}</dd>
                </div>
                <div class="flex flex-wrap justify-between font-medium leading-[155%] text-neutral-900">
                    <dt>Kelompok:</dt>
                    <dd>{{ user ? user.mahasiswa?.kelompok?.nama_kelompok || 'N/A' : 'Loading...' }}</dd>
                </div>
                <div class="flex flex-wrap justify-between font-medium leading-[155%] text-neutral-900">
                    <dt>Program Studi:</dt>
                    <dd>{{ user ? user.mahasiswa?.prodi?.nama_prodi || 'N/A' : 'Loading...' }}</dd>
                </div>
            </dl>
        </main>


        <Link href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click="closeDropdown">HOME
        </Link>
        <Link href="/materi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click="closeDropdown">
        MATERIALS</Link>
        <Link href="/kelompok" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click="closeDropdown">
        GROUPS</Link>
        <Link href="/galeri" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click="closeDropdown">
        GALLERY</Link>
        <Link href="/tentang" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click="closeDropdown">
        ABOUT</Link>

        <!-- untuk user -->
        <Link href="/profile" v-if="user && user.role === 'user'"
            class="mt-1 flex items-center justify-between w-full text-left px-4 py-2 text-sm text-white bg-slate-700 hover:bg-slate-600 transition-colors rounded-b-md">
        Profile Settings
        <ChevronRightIcon class="w-5 h-5" />
        </Link>

        <!-- untuk admin -->
        <Link href="/dashboard" v-if="user && user.role === 'admin'"
            class="mt-1 flex items-center justify-between w-full text-left px-4 py-2 text-sm text-white bg-slate-700 hover:bg-slate-600 transition-colors rounded-b-md">
        Dashboard
        <ChevronRightIcon class="w-5 h-5" />
        </Link>

        <Link v-if="isAuthenticated" href="" @click="logout"
            class="mt-1 block w-full text-left px-4 py-2 text-sm text-white bg-slate-700 hover:bg-slate-600 transition-colors rounded-b-md">
        <a class="flex items-center justify-between w-full">
            Log out
            <ChevronRightIcon class="w-5 h-5" />
        </a>
        </Link>

        <!-- Login button for mobile view -->
        <Link v-else href="/login"
            class="sm:hidden mt-2 block cursor-pointer button-biru justify-center px-5 py-2.5 md:px-10 md:py-5 rounded-xl text-white hover:shadow-md transition-shadow ml-auto"
            @click="closeDropdown">
        Login
        </Link>
    </div>
</template>

<script setup>
    import {
        Link,
        router
    } from '@inertiajs/vue3';
    import {
        ChevronRightIcon
    } from '@heroicons/vue/24/solid';
    import {
        ref,
        onBeforeMount
    } from 'vue';
    import axios from 'axios';
    import {
        usePage
    } from '@inertiajs/vue3';

    const user = ref(null);

    const fetchUserData = async () => {
        try {
            const response = await axios.get('/data-login');
            user.value = response.data;
        } catch (error) {
            console.error('Error fetching user data:', error);
        }
    };

    onBeforeMount(() => {
        fetchUserData();
    });

    const {
        props
    } = usePage();
    const isAuthenticated = ref(props.auth.user !== null); // Check if user is authenticated

    defineProps({
        isOpen: Boolean
    });

    const emit = defineEmits(['update:isOpen']);

    const closeDropdown = () => {
        emit('update:isOpen', false);
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    };

    const logout = () => {
        router.post(route("logout"));
    }

</script>

<style scoped>
    .dropdown-enter-active,
    .dropdown-leave-active {
        transition: opacity 0.3s ease;
    }

    .dropdown-enter,
    .dropdown-leave-to {
        opacity: 0;
    }

    .item-row {
        padding: 8px 0;
    }

    .item-label {
        width: 30%;
        max-width: 30%;
        padding-right: 10px;
    }

    .item-content {
        flex-grow: 1;
        padding-left: 10px;
    }

    @media (min-width: 476px) {
        .sm\:hidden {
            display: none;
        }
    }

</style>
