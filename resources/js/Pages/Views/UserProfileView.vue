<template>
    <LayoutHeaderFooter>
        <SectionMain>
            <main class="flex flex-col px-16 mt-7 w-full max-md:px-5">
            <SectionTitleLineWithButton :icon="mdiAccount" title="Profile" class="font-bold" main/>
                <section
                    class="flex flex-col items-start px-16 pt-14 pb-6 mt-3 rounded-3xl bg-slate-100 max-md:px-5 max-md:mt-10 border border-gray-300">
                    <div class="px-0.5 ml-20 max-md:ml-0">
                        <div class="flex gap-5 max-md:flex-col">
                            <div class="flex flex-col w-6/12 max-md:w-full">
                                <img loading="lazy" src="../../../assets/Ellipse 19.png" alt="Profile picture"
                                    class="w-full rounded-full aspect-square max-md:mt-10 border border-gray-800" />
                            </div>
                            <div class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
                                <div
                                    class="flex flex-col self-stretch my-auto font-bold text-center text-black capitalize max-md:mt-10">
                                    <h3 class="text-6xl max-md:text-4xl">Sigma Skibidi</h3>
                                    <p class="self-center mt-10 text-xl max-md:mt-10">
                                        Sigma@gmail.com
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <FormEmail/>
                <TableSkill :data="data" />
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
    import {
        ref
    } from 'vue';
    import {
        mdiAccount,
    } from '@mdi/js'
    import SectionMain from '@/Components/SectionMain.vue';
    import LayoutHeaderFooter from "@/Layouts/LayoutHeaderFooter.vue"; // make sure path is correct
    import FormEmail from "@/Components-landing/profile-page/FormEmail.vue";
    import TableSkill from "@/Components-landing/profile-page/TableSkill.vue";
    import SectionTitleLineWithButton from '@/Components/SectionTitleLineWithButton.vue'

    defineProps({
    data: {
        type: Array,
        required: true,
    },
});
    // Sertifikat PKKMB
    const certificates = ref([]);
    const newCertificate = ref({
        skill: '',
        description: '',
        piagam: ''
    });

    const addCertificate = () => {
        certificates.value.push({
            ...newCertificate.value
        });
        newCertificate.value.skill = '';
        newCertificate.value.description = '';
        newCertificate.value.piagam = '';
    };

</script>
