<script setup>
import { mdiBallotOutline, mdiTableBorder } from "@mdi/js";
import SectionMain from "@/Components/SectionMain.vue";
import CardBox from "@/Components/CardBox.vue";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import { Head } from "@inertiajs/vue3";
import TableHima from "@/Components/Hima/TableHima.vue";
import FormHima from "@/Components/Hima/FormHima.vue";
</script>

<template>
  <LayoutAuthenticated>
    <Head title="hima" />
    <SectionMain>
      <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Form Hima" main>
      </SectionTitleLineWithButton>
      <FormHima />
    </SectionMain>
    <SectionMain>
      <SectionTitleLineWithButton :icon="mdiTableBorder" title="Daftar Hima" main>
      </SectionTitleLineWithButton>
      <CardBox>
        <TableHima />
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>
