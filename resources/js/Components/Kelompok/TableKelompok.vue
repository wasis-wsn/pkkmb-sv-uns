<script setup>
import { computed, ref } from 'vue'
import { useMainStore } from '@/Stores/main'
import { mdiEye } from '@mdi/js'
import CardBoxModal from '@/Components/CardBoxModal.vue'
import BaseLevel from '@/Components/BaseLevel.vue'
import BaseButtons from '@/Components/BaseButtons.vue'
import BaseButton from '@/Components/BaseButton.vue'

const mainStore = useMainStore()

const items = computed(() => mainStore.clients)

const isModalActive = ref(false)
const selectedClient = ref(null)

const perPage = ref(5)
const currentPage = ref(0)

const itemsPaginated = computed(() =>
  items.value.slice(perPage.value * currentPage.value, perPage.value * (currentPage.value + 1))
)

const numPages = computed(() => Math.ceil(items.value.length / perPage.value))

const currentPageHuman = computed(() => currentPage.value + 1)

const pagesList = computed(() => {
  const pagesList = []
  for (let i = 0; i < numPages.value; i++) {
    pagesList.push(i)
  }
  return pagesList
})
</script>

<template>
  <CardBoxModal v-model="isModalActive" title="Detail Kelompok">
    <p>{{ selectedClient?.content }}</p>
  </CardBoxModal>

  <table>
    <thead>
      <tr class="flex">
        <th class="flex-auto text-center">Kelompok</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="client in itemsPaginated" :key="client.id">
        <td data-label="Kelompok">
          {{ client.title }}
        </td>
        <td class="before:hidden lg:w-1 whitespace-nowrap">
          <BaseButtons type="justify-start lg:justify-end" no-wrap>
            <BaseButton color="info" :icon="mdiEye" small @click="() => { selectedClient.value = client; isModalActive.value = true; }" />
          </BaseButtons>
        </td>
      </tr>
    </tbody>
  </table>

  <div class="p-3 lg:px-6 border-t border-gray-100 dark:border-slate-800">
    <BaseLevel>
      <BaseButtons>
        <BaseButton
          v-for="page in pagesList"
          :key="page"
          :active="page === currentPage"
          :label="page + 1"
          :color="page === currentPage ? 'lightDark' : 'whiteDark'"
          small
          @click="currentPage.value = page"
        />
      </BaseButtons>
      <small class="ml-auto">Halaman {{ currentPageHuman }} dari {{ numPages }}</small>
    </BaseLevel>
  </div>
</template>

<style scoped>
.center-title {
  text-align: center;
}
</style>
