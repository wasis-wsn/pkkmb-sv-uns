<template>
    <LayoutHeaderFooter>
        <SectionMain>
            <main class="flex flex-col px-16 mt-7 w-full max-md:px-5">
                <h2 class="self-start ml-16 text-5xl font-bold text-black capitalize max-md:ml-2.5" :icon="mdiMail">
                    Profile
                </h2>
                <section
                    class="flex flex-col items-start px-16 pt-14 pb-6 mt-11 rounded-3xl bg-slate-100 max-md:px-5 max-md:mt-10">
                    <div class="px-0.5 ml-20 max-md:ml-0">
                        <div class="flex gap-5 max-md:flex-col">
                            <div class="flex flex-col w-6/12 max-md:w-full">
                                <img loading="lazy" src="../../../assets/Ellipse 19.png" alt="Profile picture"
                                    class="w-full rounded-full aspect-square max-md:mt-10" />
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
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-14 max-md:mt-10">
                    <CardBox
                        :style="customCardBoxStyle"
                        is-form
                        @submit.prevent="submitProfile"
                    >
                        <FormField :style="customFormFieldStyle" label="Avatar" help="Max 500kb">
                            <FormFilePicker label="Upload" />
                        </FormField>
                        <FormField :style="customFormFieldStyle" label="Name" help="Required. Your name">
                            <FormControl v-model="profileForm.name" :icon="mdiAccount" name="username" required
                                autocomplete="username" />
                        </FormField>
                        <FormField :style="customFormFieldStyle" label="E-mail" help="Required. Your e-mail">
                            <FormControl v-model="profileForm.email" :icon="mdiMail" type="email" name="email" required
                                autocomplete="email" />
                        </FormField>
                        <template #footer>
                            <BaseButtons>
                                <BaseButton color="info" type="submit" label="Submit" />
                                <BaseButton color="info" label="Options" outline />
                            </BaseButtons>
                        </template>
                    </CardBox>
                    <CardBox
                        :style="customCardBoxStyle"
                        is-form
                        @submit.prevent="submitPass"
                    >
                        <FormField :style="customFormFieldStyle" label="Current password" help="Required. Your current password">
                            <FormControl v-model="passwordForm.current_password" :icon="mdiAsterisk"
                                name="password_current" type="password" required autocomplete="current-password" />
                        </FormField>
                        <BaseDivider />
                        <FormField :style="customFormFieldStyle" label="New password" help="Required. New password">
                            <FormControl v-model="passwordForm.password" :icon="mdiFormTextboxPassword" name="password"
                                type="password" required autocomplete="new-password" />
                        </FormField>
                        <FormField :style="customFormFieldStyle" label="Confirm password" help="Required. New password one more time">
                            <FormControl v-model="passwordForm.password_confirmation" :icon="mdiFormTextboxPassword"
                                name="password_confirmation" type="password" required autocomplete="new-password" />
                        </FormField>
                        <template #footer>
                            <BaseButtons>
                                <BaseButton type="submit" color="info" label="Submit" />
                                <BaseButton color="info" label="Options" outline />
                            </BaseButtons>
                        </template>
                    </CardBox>
                </div>
                <section
                    class="flex flex-col md:flex-row items-center justify-center gap-5 pt-16 pr-20 mt-14 max-w-full capitalize rounded-3xl bg-slate-100 w-full max-md:pt-10 max-md:pr-5 max-md:mt-10">
                    <div class="flex flex-col items-center justify-center text-center">
                        <h3 class="text-2xl font-bold text-black">Sertifikat PKKMB</h3>
                        <BaseButton type="download" color="info" label="Download" class="mt-6" />
                    </div>
                </section>

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
        mdiMail,
        mdiAsterisk,
        mdiFormTextboxPassword
    } from '@mdi/js';
    import SectionMain from '@/Components/SectionMain.vue';
    import CardBox from '@/Components/CardBox.vue';
    import BaseDivider from '@/Components/BaseDivider.vue';
    import FormField from '@/Components/FormField.vue';
    import FormControl from '@/Components/FormControl.vue';
    import FormFilePicker from '@/Components/FormFilePicker.vue';
    import BaseButton from '@/Components/BaseButton.vue';
    import BaseButtons from '@/Components/BaseButtons.vue';
    import LayoutHeaderFooter from "@/Layouts/LayoutHeaderFooter.vue"; // make sure path is correct

    const profileForm = ref({
        name: '',
        email: ''
    });

    const passwordForm = ref({
        current_password: '',
        password: '',
        password_confirmation: ''
    });

    const submitProfile = () => {
        // Logic to submit profile
    };

    const submitPass = () => {
        // Logic to submit password
    };

    const customCardBoxStyle = {
        backgroundColor: '#f1f5f9', // Warna latar belakang yang Anda inginkan
        color: '#333', // Warna teks yang Anda inginkan
        border: '1px solid #ccc', // Warna border yang Anda inginkan
        padding: '20px', // Padding untuk memperindah tampilan
        borderRadius: '10px' // Sudut membulat
    };
    const customFormFieldStyle = {
        backgroundColor: '#f1f5f9', // Warna latar belakang yang Anda inginkan
    };

</script>

// import { Head, useForm, usePage } from '@inertiajs/vue3';
// import { ref, onMounted } from 'vue';
// import { mdiAccount, mdiMail, mdiAsterisk, mdiFormTextboxPassword, mdiInformation, mdiCheckCircle, mdiAlert, mdiAlertCircle, mdiContrastCircle } from '@mdi/js';
// import SectionMain from '@/Components/SectionMain.vue';
// import CardBox from '@/Components/CardBox.vue';
// import BaseDivider from '@/Components/BaseDivider.vue';
// import FormField from '@/Components/FormField.vue';
// import FormControl from '@/Components/FormControl.vue';
// import FormFilePicker from '@/Components/FormFilePicker.vue';
// import BaseButton from '@/Components/BaseButton.vue';
// import BaseButtons from '@/Components/BaseButtons.vue';
// import UserCard from '@/Components/UserCard.vue';
// import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue';
// import SectionTitleLineWithButton from '@/Components/SectionTitleLineWithButton.vue';
// import NotificationBar from '@/Components/NotificationBar.vue';

// const user = usePage().props.auth.user;
// const notificationsOutline = ref(true);
// const notificationMessage = ref(null);
// const notificationType = ref('');

// const profileForm = useForm({
//   name: user.name,
//   email: user.email,
// });

// const passwordForm = useForm({
//   current_password: '',
//   password: '',
//   password_confirmation: '',
// });

// const form = useForm({
//   password: '',
// });

// const handleSuccessResponse = (message) => {
//   notificationMessage.value = message;
//   notificationType.value = 'success';
//   setTimeout(dismissNotification, 3000); // Menyembunyikan notifikasi setelah 3 detik
// };

// const handleErrorResponse = (message) => {
//   notificationMessage.value = message;
//   notificationType.value = 'danger';
//   setTimeout(dismissNotification, 3000); // Menyembunyikan notifikasi setelah 3 detik
// };

// const dismissNotification = () => {
//   notificationMessage.value = null;
//   notificationType.value = '';
// };

// const submitProfile = () => {
//   profileForm.patch(route('profile.update'), {
//     onSuccess: () => handleSuccessResponse('Profile updated successfully.'),
//     onError: (errors) => handleErrorResponse(errors[0]),
//   });
// };

// const submitPass = () => {
//   passwordForm.put(route('password.update'), {
//     onSuccess: () => handleSuccessResponse('Password updated successfully.'),
//     onError: (errors) => handleErrorResponse(errors[0]),
//   });
// };

// const submitDelete = () => {
//   form.delete(route('profile.delete'), {
//     onSuccess: () => handleSuccessResponse('Your account has been deleted.'),
//     onError: (errors) => handleErrorResponse(errors[0]),
//   });
// };

// onMounted(() => {
//   if (usePage().props.flash && usePage().props.flash.success) {
//     handleSuccessResponse(usePage().props.flash.success);
//   }
//   if (usePage().props.flash && usePage().props.flash.error) {
//     handleErrorResponse(usePage().props.flash.error);
//   }
// });
