<script setup>
import { mdiBallotOutline, mdiTableBorder } from "@mdi/js";
import SectionMain from "@/Components/SectionMain.vue";
import CardBox from "@/Components/CardBox.vue";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import { Head } from "@inertiajs/vue3";
import TableSponsor from "@/Components/Sponsor/TableSponsor.vue";
import FormSponsor from "@/Components/Sponsor/FormSponsor.vue";
</script>

<template>
  <LayoutAuthenticated>
    <Head title="sponsor" />
    <SectionMain>
      <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Form Sponsor" main>
      </SectionTitleLineWithButton>
      <FormSponsor />
    </SectionMain>
    <SectionMain>
      <SectionTitleLineWithButton :icon="mdiTableBorder" title="Daftar Sponsor" main>
      </SectionTitleLineWithButton>
      <CardBox>
        <TableSponsor />
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>
