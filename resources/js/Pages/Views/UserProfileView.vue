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
                    class="flex flex-col items-start px-16 pt-14 pb-6 mt-3 rounded-3xl bg-slate-100 max-md:px-5 max-md:mt-10 border border-gray-300 mb-5 md:mb-0"
                >
                    <div class="px-0.5 ml-20 max-md:ml-0">
                        <div class="flex gap-5 max-md:flex-col">
                            <div class="flex flex-col w-6/12 max-md:w-full">
                                <img
                                    loading="lazy"
                                    src="../../../assets/Ellipse 19.png"
                                    alt="Profile picture"
                                    class="w-full rounded-full aspect-square max-md:mt-10 border border-gray-800"
                                />
                            </div>
                            <div
                                class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full"
                            >
                                <div
                                    class="flex flex-col self-stretch my-auto font-bold text-center text-black max-md:mt-10"
                                >
                                    <h3 class="text-6xl max-md:text-4xl">
                                        {{
                                            user
                                                ? user.mahasiswa.nama_mahasiswa
                                                : "Loading..."
                                        }}
                                    </h3>
                                    <h1 class="text-2xl">
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
                <!-- <section>
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
