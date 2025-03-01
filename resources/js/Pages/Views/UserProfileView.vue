<template>
    <LayoutHeaderFooter>
        <Head title="ProfileUser" />
        <SectionMain>
            <main class="flex flex-col px-16 mt-7 w-full max-md:px-5">
                <SectionTitleLineWithButton
                    :icon="mdiAccount"
                    title="Profile"
                    class="font-bold"
                    main
                />
                <section
                    class="flex flex-col items-center px-16 pt-6 pb-6 mt-3 rounded-3xl bg-slate-100 max-md:px-5 max-md:mt-10 border border-gray-300 mb-5 md:mb-0"
                >
                    <div class="px-0.5 max-md:ml-0">
                        <div class="flex justify-center gap-5 max-md:flex-col">
                            <div
                                class="flex flex-col my-auto w-6/12 max-md:w-full"
                            >
                                <img
                                    loading="lazy"
                                    src="../../../assets/profile-user.png"
                                    alt="Profile picture"
                                    class="w-1/2 rounded-full mx-auto my-auto aspect-square max-md:mt-10 border border-gray-800"
                                />
                            </div>
                            <div
                                class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full"
                            >
                                <div
                                    class="flex flex-col my-auto self-stretch font-bold text-black max-md:mt-10"
                                >
                                    <h3 class="text-4xl max-md:text-2xl">
                                        Hallo,
                                        {{
                                            user
                                                ? user.mahasiswa.nama_mahasiswa
                                                : "Loading..."
                                        }}!
                                    </h3>
                                    <h1 class="text-2xl mt-2">
                                        {{ user ? user.email : "Loading..." }}
                                    </h1>
                                    <h1 class="text-2xl">
                                        {{
                                            user
                                                ? user.mahasiswa.no_telp
                                                : "Loading..."
                                        }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <FormEmail :skills="skills" :mahasiswa="mahasiswa" />
                <TableSkill :data="data" :skills="skills" />
                <!-- <SertifButton />
                <section>
                    <div class="flex flex-col items-center justify-center text-center">
                        <h3 class="text-2xl text-center font-bold text-black">Sertifikat PKKMB</h3>
                        <BaseButton type="download" color="info" label="Download" class="mt-6 mb-8" />
                    </div>
                </section> -->
            </main>
        </SectionMain>
    </LayoutHeaderFooter>
</template>

<script setup>
import { Head, useForm, usePage } from "@inertiajs/vue3";
import axios from "axios";
import { ref, onMounted } from "vue";
import { mdiAccount } from "@mdi/js";
import SectionMain from "@/Components/SectionMain.vue";
import LayoutHeaderFooter from "@/Layouts/LayoutHeaderFooter.vue";
import FormEmail from "@/Components-landing/profile-page/FormEmail.vue";
import TableSkill from "@/Components-landing/profile-page/TableSkill.vue";
import SertifButton from "@/Components-landing/profile-page/SertifButton.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";

defineProps({
    data: {
        type: Array,
        required: true,
    },
    skills: {
        type: Array,
        required: true,
    },
    mahasiswa: {
        type: Object,
        required: true,
    },
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = ref(null);

const fetchUserData = async () => {
    try {
        const response = await axios.get("/data-login");
        user.value = response.data;
    } catch (error) {
        console.error("Error fetching user data:", error);
    }
};

onMounted(() => {
    fetchUserData();
});
</script>
