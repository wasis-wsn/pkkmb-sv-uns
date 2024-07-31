<template>
  <LayoutAuthenticated>
    <Head title="Profile" />
    <SectionMain>
      <SectionTitleLineWithButton :icon="mdiAccount" title="Profile" main />
      <UserCard class="mb-6" />

      <!-- Notification Bars -->
      <NotificationBar
        v-if="notificationMessage && notificationType === 'info'"
        color="info"
        :icon="mdiInformation"
        :outline="notificationsOutline"
        @dismiss="dismissNotification"
      >
        {{ notificationMessage }}
      </NotificationBar>

      <NotificationBar
        v-if="notificationMessage && notificationType === 'success'"
        color="success"
        :icon="mdiCheckCircle"
        :outline="notificationsOutline"
        @dismiss="dismissNotification"
      >
        {{ notificationMessage }}
      </NotificationBar>

      <NotificationBar
        v-if="notificationMessage && notificationType === 'warning'"
        color="warning"
        :icon="mdiAlert"
        :outline="notificationsOutline"
        @dismiss="dismissNotification"
      >
        {{ notificationMessage }}
      </NotificationBar>

      <NotificationBar
        v-if="notificationMessage && notificationType === 'danger'"
        color="danger"
        :icon="mdiAlertCircle"
        :outline="notificationsOutline"
        @dismiss="dismissNotification"
      >
        {{ notificationMessage }}
      </NotificationBar>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <CardBox is-form @submit.prevent="submitProfile">
          <FormField label="Avatar" help="Max 500kb">
            <FormFilePicker label="Upload" />
          </FormField>

          <FormField label="Name" help="Required. Your name">
            <FormControl
              v-model="profileForm.name"
              :icon="mdiAccount"
              name="username"
              required
              autocomplete="username"
            />
          </FormField>
          <FormField label="E-mail" help="Required. Your e-mail">
            <FormControl
              v-model="profileForm.email"
              :icon="mdiMail"
              type="email"
              name="email"
              required
              autocomplete="email"
            />
          </FormField>
          <div v-if="mustVerifyEmail && user.email_verified_at === null">
                <p class="text-sm mt-2 text-gray-800">
                    Your email address is unverified.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Click here to re-send the verification email.
                    </Link>
                </p>

                <div
                    v-show="status === 'verification-link-sent'"
                    class="mt-2 font-medium text-sm text-green-600"
                >
                    A new verification link has been sent to your email address.
                </div>
          </div>

          <template #footer>
            <BaseButtons>
              <BaseButton color="info" type="submit" label="Submit" />
              <BaseButton color="info" label="Options" outline />
            </BaseButtons>
          </template>
        </CardBox>

        <!-- Password Form -->
        <CardBox is-form @submit.prevent="submitPass">
          <FormField label="Current password" help="Required. Your current password">
            <FormControl
              v-model="passwordForm.current_password"
              :icon="mdiAsterisk"
              name="password_current"
              type="password"
              required
              autocomplete="current-password"
            />
          </FormField>

          <BaseDivider />

          <FormField label="New password" help="Required. New password (min 8 characters)">
            <FormControl
              v-model="passwordForm.password"
              :icon="mdiFormTextboxPassword"
              name="password"
              type="password"
              required
              autocomplete="new-password"
            />
          </FormField>

          <FormField label="Confirm password" help="Required. New password one more time">
            <FormControl
              v-model="passwordForm.password_confirmation"
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
              <BaseButton color="info" label="Options" outline />
            </BaseButtons>
          </template>
        </CardBox>
      </div>

      <CardBox class="mt-6" is-form @submit.prevent="submitDelete">
        <p class="text-sm mb-2">Are you sure you want to delete this account?</p>
        <FormField label="Password" help="Required. Your password">
          <FormControl
            id="password"
            v-model="form.password"
            type="password"
            class="mt-1 block w-3/4"
            placeholder="Password"
          />
        </FormField>
        <template #footer>
          <BaseButtons>
            <BaseButton type="submit" color="danger" label="Submit" />
            <BaseButton color="danger" label="Options" outline />
          </BaseButtons>
        </template>
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>

<script setup>
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import { mdiAccount, mdiMail, mdiAsterisk, mdiFormTextboxPassword, mdiInformation, mdiCheckCircle, mdiAlert, mdiAlertCircle } from '@mdi/js';
import SectionMain from '@/Components/SectionMain.vue';
import CardBox from '@/Components/CardBox.vue';
import BaseDivider from '@/Components/BaseDivider.vue';
import FormField from '@/Components/FormField.vue';
import FormControl from '@/Components/FormControl.vue';
import FormFilePicker from '@/Components/FormFilePicker.vue';
import BaseButton from '@/Components/BaseButton.vue';
import BaseButtons from '@/Components/BaseButtons.vue';
import UserCard from '@/Components/UserCard.vue';
import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue';
import SectionTitleLineWithButton from '@/Components/SectionTitleLineWithButton.vue';
import NotificationBar from '@/Components/NotificationBar.vue';

const props = defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;
const notificationsOutline = ref(true);
const notificationMessage = ref(null);
const notificationType = ref('');

const profileForm = useForm({
  name: user.name,
  email: user.email,
});

const passwordForm = useForm({
  current_password: '',
  password: '',
  password_confirmation: '',
});

const form = useForm({
  password: '',
});

const handleSuccessResponse = (message) => {
  notificationMessage.value = message;
  notificationType.value = 'success';
  setTimeout(dismissNotification, 3000); // Hide notification after 3 seconds
};

const handleErrorResponse = (message) => {
  notificationMessage.value = message;
  notificationType.value = 'danger';
  setTimeout(dismissNotification, 3000); // Hide notification after 3 seconds
};

const dismissNotification = () => {
  notificationMessage.value = null;
  notificationType.value = '';
};

const submitProfile = () => {
  profileForm.patch(route('profile.update'), {
    onSuccess: () => handleSuccessResponse('Profile updated successfully.'),
    onError: (errors) => handleErrorResponse(errors[0]),
  });
};

const submitPass = () => {
  if (passwordForm.current_password.length === 0) {
    handleErrorResponse('Current password is required.');
    return;
  }

  if (passwordForm.password.length < 8) {
    handleErrorResponse('New password must be at least 8 characters long.');
    return;
  }

  if (passwordForm.password !== passwordForm.password_confirmation) {
    handleErrorResponse('Passwords do not match.');
    return;
  }

  passwordForm.post(route('password.update'), {
    onSuccess: () => handleSuccessResponse('Password updated successfully.'),
    onError: (errors) => {
      if (errors.current_password) {
        handleErrorResponse(errors.current_password);
      } else {
        handleErrorResponse(errors[0]);
      }
    },
  });
};


const submitDelete = () => {
  form.delete(route('profile.delete'), {
    onSuccess: () => handleSuccessResponse('Your account has been deleted.'),
    onError: (errors) => handleErrorResponse(errors[0]),
  });
};

onMounted(() => {
  if (usePage().props.flash && usePage().props.flash.success) {
    handleSuccessResponse(usePage().props.flash.success);
  }
  if (usePage().props.flash && usePage().props.flash.error) {
    handleErrorResponse(usePage().props.flash.error);
  }
});
</script>
