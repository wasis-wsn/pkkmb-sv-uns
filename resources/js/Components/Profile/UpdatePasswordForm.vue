<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
<CardBox is-form @submit.prevent="updatePassword">
    <FormField label="Current password" help="Required. Your current password">
      <FormControl
        v-model="form.current_password"
        :icon="mdiAsterisk"
        name="current_password"
        type="password"
        required
        autocomplete="current-password"
      />
    </FormField>

    <BaseDivider />

    <FormField label="New password" help="Required. New password">
      <FormControl
        v-model="form.password"
        :icon="mdiFormTextboxPassword"
        name="password"
        type="password"
        required
        autocomplete="new-password"
      />
    </FormField>

    <FormField label="Confirm password" help="Required. New password one more time">
      <FormControl
        v-model="form.password_confirmation"
        :icon="mdiFormTextboxPassword"
        name="password_confirmation"
        type="password"
        required
        autocomplete="new-password"
      />
    </FormField>

    <template #footer>
      <BaseButtons>
        <BaseButton type="submit" color="info" label="Submit" />
        <BaseButton color="info" label="Reset" @click="passwordForm.reset()" outline />
      </BaseButtons>
    </template>
</CardBox>
</template>

