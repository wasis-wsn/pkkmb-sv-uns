<template>
  <LayoutAuthenticated>
      <Head title="Form" />
      <SectionMain>
          <SectionTitleLineWithButton
              :icon="mdiBallotOutline"
              title="Sponsor Form"
              main
          >
          </SectionTitleLineWithButton>
          <FormSponsor />
          <div class="text-center">
              <SectionTitleLineWithButton
                  class="mt-5"
                  :icon="mdiBallotOutline"
                  title="Table Data"
                  main
              ></SectionTitleLineWithButton>
          </div>
          <TableSponsor :data="data" />
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
import FormSponsor from "@/Components/Sponsor/FormSponsor.vue";
import TableSponsor from "@/Components/Sponsor/TableSponsor.vue";

defineProps({
  data: {
      type: Array,
      required: true,
  },
});
</script>
