<template>
  <CardBox @submit.prevent="submit" enctype="multipart/form-data">
      <FormField label="Nama Hima">
          <FormControl v-model="form.nama_hima" />
          <p v-if="errors.nama_hima" class="text-red-500 text-sm mt-1">
              {{ errors.nama_hima }}
          </p>
      </FormField>
      <BaseDivider />
      <FormField label="Upload File (image max 10 MB)">
          <FormFilePicker
              v-model="form.logo_hima"
              label="Upload"
              name="logo_hima"
          />
          <p v-if="errors.logo_hima" class="text-red-500 text-sm mt-1">
              {{ errors.logo_hima }}
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
      Data berhasil ditambahkan
  </div>
  <div v-if="showAlert" class="mt-4 p-4 bg-red-100 text-red-700 rounded">
      Harus isi data di formnya
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

const selectOptions = [{ label: "Hima" }];

const form = useForm({
  nama_hima: "",
  logo_hima: null,
});

const errors = ref({});
const showAlert = ref(false);

const isFormValid = computed(() => {
  return form.nama_hima && form.logo_hima;
});

const validateForm = () => {
  errors.value = {};
  if (!form.nama_hima) {
      errors.value.nama_hima = "Nama Hima harus di isi.";
  }
  if (!form.logo_hima) {
      errors.value.logo_hima = "Logo Hima harus di isi.";
  }
  return Object.keys(errors.value).length === 0;
};

const submit = () => {
    if (validateForm()) {
        showAlert.value = false;
        form.post(route("hima.store"), {
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
