<template>
  <CardBox @submit.prevent="submit" enctype="multipart/form-data">
      <FormField label="Nama Sponsor">
          <FormControl v-model="form.nama_sponsor" />
          <p v-if="errors.nama_sponsor" class="text-red-500 text-sm mt-1">
              {{ errors.nama_sponsor }}
          </p>
      </FormField>
      <BaseDivider />
      <FormField label="Upload File (image max 10 MB)">
          <FormFilePicker
              v-model="form.logo_sponsor"
              label="Upload"
              name="logo_sponsor"
          />
          <p v-if="errors.logo_sponsor" class="text-red-500 text-sm mt-1">
              {{ errors.logo_sponsor }}
          </p>
      </FormField>
      <template #footer>
          <BaseButtons>
              <BaseButton
                  type="submit"
                  color="success"
                  label="Submit"
                  @click="submit"
              />
              <BaseButton
                  type="reset"
                  color="danger"
                  @click="reset"
                  outline
                  label="Reset"
              />
          </BaseButtons>
      </template>
  </CardBox>
  <div
      v-if="form.recentlySuccessful"
      class="mt-4 p-4 bg-green-100 text-green-700 rounded"
  >
      Form submitted successfully!
  </div>
  <div v-if="showAlert" class="mt-4 p-4 bg-red-100 text-red-700 rounded">
      Please fill in all required fields.
  </div>
</template>

<script setup>
import { ref, computed } from "vue";
import { useForm } from "@inertiajs/vue3";
import CardBox from "@/Components/CardBox.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import FormControlIcon from "@/Components/FormControlIcon.vue";
import BaseDivider from "@/Components/BaseDivider.vue";
import BaseButton from "@/Components/BaseButton.vue";
import BaseButtons from "@/Components/BaseButtons.vue";
import FormFilePicker from "@/Components/FormFilePicker.vue";

const selectOptions = [{ label: "Sponsor" }];

const form = useForm({
  nama_sponsor: "",
  logo_sponsor: null,
});

const errors = ref({});
const showAlert = ref(false);

const isFormValid = computed(() => {
  return form.nama_sponsor && form.jenis_dokum && form.logo_sponsor;
});

const validateForm = () => {
  errors.value = {};
  if (!form.nama_sponsor) {
      errors.value.nama_sponsor = "Nama Sponsor is required.";
  }
  if (!form.logo_sponsor) {
      errors.value.logo_sponsor = "Logo Sponsor is required.";
  }
  return Object.keys(errors.value).length === 0;
};

const submit = () => {
    if (validateForm()) {
        showAlert.value = false;
        form.post(route("sponsor.store"), {
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
};
</script>
