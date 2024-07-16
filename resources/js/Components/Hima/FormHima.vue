<script setup>
import { reactive, ref } from "vue";
import CardBox from "@/Components/CardBox.vue";
import FormFilePicker from "@/Components/FormFilePicker.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseButton from "@/Components/BaseButton.vue";
import BaseButtons from "@/Components/BaseButtons.vue";

const selectOptions = [
  { id: 1, label: "Business development" },
  { id: 2, label: "Marketing" },
  { id: 3, label: "Sales" },
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

const formStatusCurrent = ref(0);

const formStatusOptions = ["info", "success", "danger", "warning"];

const formStatusSubmit = () => {
  formStatusCurrent.value = formStatusOptions[formStatusCurrent.value + 1]
    ? formStatusCurrent.value + 1
    : 0;
};
</script>

<template>
  <CardBox form @submit.prevent="submit">
    <FormField label="Masukkan Nama Hima" help="">
      <FormControl v-model="form.phone" type="tel" placeholder="Masukkan disini" />
    </FormField>

    <FormField label="Upload Logo Hima" help="">
      <FormFilePicker v-model="customElementsForm.file" label="Upload" />
    </FormField>

    <template #footer>
      <BaseButtons>
        <BaseButton type="submit" color="success" label="Submit" />
      </BaseButtons>
    </template>
  </CardBox>
</template>
