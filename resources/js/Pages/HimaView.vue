<template>
  <LayoutAuthenticated>
      <Head title="Form" />
      <SectionMain>
          <SectionTitleLineWithButton
              :icon="mdiBallotOutline"
              title="Hima Form"
              main
          >
          </SectionTitleLineWithButton>
          <FormHima />
          <div class="text-center">
              <SectionTitleLineWithButton
                  class="mt-5"
                  :icon="mdiBallotOutline"
                  title="Table Data"
                  main
              ></SectionTitleLineWithButton>
          </div>
          <TableHima :data="data" />
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
import FormHima from "@/Components/Hima/FormHima.vue";
import TableHima from "@/Components/Hima/TableHima.vue";

defineProps({
  data: {
      type: Array,
      required: true,
  },
});
</script>
