<script setup>
    import {
        Head
    } from "@inertiajs/vue3";
    import {
        reactive,
        ref
    } from "vue";
    import {
        mdiBallotOutline,
        mdiAccount,
        mdiMail,
        mdiGithub
    } from "@mdi/js";
    import SectionMain from "@/Components/SectionMain.vue";
    import CardBox from "@/Components/CardBox.vue";
    import FormCheckRadioGroup from "@/Components/FormCheckRadioGroup.vue";
    import FormFilePicker from "@/Components/FormFilePicker.vue";
    import FormField from "@/Components/FormField.vue";
    import FormControl from "@/Components/FormControl.vue";
    import BaseDivider from "@/Components/BaseDivider.vue";
    import BaseButton from "@/Components/BaseButton.vue";
    import BaseButtons from "@/Components/BaseButtons.vue";
    import SectionTitle from "@/Components/SectionTitle.vue";
    import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
    import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
    import NotificationBarInCard from "@/Components/NotificationBarInCard.vue";

    const selectOptions = [{
            id: 1,
            label: "Admin"
        },
        {
            id: 2,
            label: "User"
        }
    ];

    const form = reactive({
        name: "John Doe",
        email: "john.doe@example.com",
        phone: "",
        department: selectOptions[0],
        subject: "",
        question: "",
    });

    const customElementsForm = reactive({
        checkbox: ["lorem"],
        radio: "one",
        switch: ["one"],
        file: null,
    });

    const submit = () => {
        //
    };

    const formStatusWithHeader = ref(true);

    const formStatusCurrent = ref(0);

    const formStatusOptions = ["info", "success", "danger", "warning"];

    const formStatusSubmit = () => {
        formStatusCurrent.value = formStatusOptions[formStatusCurrent.value + 1] ?
            formStatusCurrent.value + 1 :
            0;
    };

</script>

<template>
    <CardBox form @submit.prevent="submit">
        <FormField label="Nama & Email">
            <FormControl v-model="form.name" :icon="mdiAccount" />
            <FormControl v-model="form.email" type="email" :icon="mdiMail" />
        </FormField>


        <FormField label="Role">
            <FormControl v-model="form.department" :options="selectOptions" />
        </FormField>

        <FormField label="Password"
            help="Gunakan kombinasi huruf besar, huruf kecil, angka, dan simbol (misalnya, @, #, $, &).">
            <FormControl v-model="form.phone" type="password" placeholder="Password" />
        </FormField>

        <FormField label="Konfirmasi Password">
            <FormControl v-model="form.phone" type="password" placeholder="Konfirmasi Password" />
        </FormField>

        <template #footer>
            <BaseButtons>
                <BaseButton type="submit" color="success" label="Submit" />
                <BaseButton type="reset" color="danger" outline label="Reset" />
            </BaseButtons>
        </template>
    </CardBox>
</template>
