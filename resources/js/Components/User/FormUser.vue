<script setup>
    import {
        useForm
    } from "@inertiajs/vue3";
    import {
        computed,
        ref
    } from "vue";
    import {
        mdiAccount,
        mdiMail
    } from "@mdi/js";
    import CardBox from "@/Components/CardBox.vue";
    import FormField from "@/Components/FormField.vue";
    import FormControl from "@/Components/FormControl.vue";
    import BaseButton from "@/Components/BaseButton.vue";
    import BaseButtons from "@/Components/BaseButtons.vue";

    const role = [{
            label: "Admin",
            value: "admin"
        },
        {
            label: "User",
            value: "user"
        }
    ];
    const form = useForm({
        email: "",
        password: "",
        role: "",
    });


    const errors = ref({});
    const showAlert = ref(false);

    const isFormValid = computed(() => {
        return form.email && form.password && form.role;
    });

    const validateForm = () => {
        errors.value = {};
        if (!form.email) {
            errors.value.email = "Email is required.";
        }
        if (!form.password) {
            errors.value.password = "Password is required.";
        }
        if (!form.role) {
            errors.value.role = "role is required.";
        }
        return Object.keys(errors.value).length === 0;
    };

    const submit = () => {
        if (validateForm()) {
            showAlert.value = false;
            form.post(route("user.store"), {
                onSuccess: () => {
                    reset();
                },
                onError: (errors) => {
                    console.log(errors);
                },
            });
        } else {
            showAlert.value = true;
        }
    };

    const reset = () => {
        form.reset();
        errors.value = {};
        showAlert.value = false;
    };;

</script>

<template>
    <CardBox form @submit.prevent="submit">
        <FormField label="Email" label-for="email" help="Please enter your email">
            <FormControl v-model="form.email" id="email" :icon="mdiEmail" autocomplete="email" type="email" required />
        </FormField>


        <FormField label="Role">
            <FormControl v-model="form.role" :options="role" type="select" />
        </FormField>

        <FormField label="Password" label-for="password" help="Please enter new password">
            <FormControl v-model="form.password" id="password" :icon="mdiFormTextboxPassword" type="password"
                autocomplete="new-password" required />
        </FormField>


        <!-- <FormField label="Confirm Password" label-for="password_confirmation" help="Please confirm your password">
            <FormControl v-model="form.password_confirmation" id="password_confirmation" :icon="mdiFormTextboxPassword"
                type="password" autocomplete="new-password" required />
        </FormField> -->

        <template #footer>
            <BaseButtons>
                <BaseButton type="submit" color="info" label="Submit" @click="submit" />
                <BaseButton type="reset" color="info" @click="reset" outline label="Reset" />
            </BaseButtons>
        </template>
    </CardBox>

    <div v-if="form.recentlySuccessful" class="mt-4 p-4 bg-green-100 text-green-700 rounded">
        Form submitted successfully!
    </div>
    <div v-if="showAlert" class="mt-4 p-4 bg-red-100 text-red-700 rounded">
        Please fill in all required fields.
    </div>

</template>
