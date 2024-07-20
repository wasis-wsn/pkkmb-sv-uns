<template>
    <LayoutAuthenticated>
        <Head title="Form" />
        <SectionMain>
            <SectionTitleLineWithButton
                :icon="mdiBallotOutline"
                title="Acara Form"
                main
            >
                <BaseButton
                    href="https://github.com/justboil/admin-one-vue-tailwind"
                    target="_blank"
                    :icon="mdiGithub"
                    label="Star on GitHub"
                    color="contrast"
                    rounded-full
                    small
                />
            </SectionTitleLineWithButton>
            <FormGaleri />
            <div class="text-center">
                <SectionTitleLineWithButton
                    class="mt-5"
                    :icon="mdiBallotOutline"
                    title="Table Data"
                    main
                ></SectionTitleLineWithButton>
            </div>
            <TableGaleri :data="data" />
        </SectionMain>
    </LayoutAuthenticated>
</template>

<script setup>
import { mdiBallotOutline, mdiGithub } from "@mdi/js";
import { Head } from "@inertiajs/vue3";
import SectionMain from "@/Components/SectionMain.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import BaseButton from "@/Components/BaseButton.vue";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import FormGaleri from "@/Components/Galeri/FormGaleri.vue";
import TableGaleri from "@/Components/Galeri/TableGaleri.vue";

defineProps({
    data: {
        type: Array,
        required: true,
    },
});
</script>
