<script>
import CardBox from '@/Components/CardBox.vue'
import { computed, ref } from 'vue'
import { useMainStore } from '@/Stores/main'
import { mdiEye, mdiTrashCan } from '@mdi/js'
import TableCheckboxCell from '@/Components/TableCheckboxCell.vue'
import BaseLevel from '@/Components/BaseLevel.vue'
import BaseButtons from '@/Components/BaseButtons.vue'
import BaseButton from '@/Components/BaseButton.vue'
import UserAvatar from '@/Components/UserAvatar.vue'

const mainStore = useMainStore()

const items = computed(() => mainStore.clients)

const isModalActive = ref(false)

const isModalDangerActive = ref(false)

const perPage = ref(5)

const currentPage = ref(0)

const checkedRows = ref([])

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

const remove = (arr, cb) => {
  const newArr = []

  arr.forEach((item) => {
    if (!cb(item)) {
      newArr.push(item)
    }
  })

  return newArr
}

const checked = (isChecked, client) => {
  if (isChecked) {
    checkedRows.value.push(client)
  } else {
    checkedRows.value = remove(checkedRows.value, (row) => row.id === client.id)
  }
}

</script>


<template>
    <CardBox class="mb-6" has-table>
        <table>
            <thead>
                <tr>
                    <th v-if="checkable" />
                    <th />
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Aksi</th>
                    <th />
                </tr>
            </thead>
            <tbody>
                <tr v-for="client in itemsPaginated" :key="client.id">
                    <TableCheckboxCell v-if="checkable" @checked="checked($event, client)" />
                    <td class="border-b-0 lg:w-6 before:hidden">
                        <UserAvatar :username="client.name" class="w-24 h-24 mx-auto lg:w-6 lg:h-6" />
                    </td>
                    <td data-label="Username">
                        {{ client.name }}
                    </td>
                    <td data-label="Password">
                        {{ client.company }}
                    </td>
                    <td data-label="Role">
                        {{ client.city }}
                    </td>
                    <td data-label="Progress" class="lg:w-32">
                        <progress class="flex w-2/5 self-center lg:w-full" max="100" :value="client.progress">
                            {{ client.progress }}
                        </progress>
                    </td>
                    <td data-label="Created" class="lg:w-1 whitespace-nowrap">
                        <small class="text-gray-500 dark:text-slate-400" :title="client.created">{{
            client.created
          }}</small>
                    </td>
                    <td class="before:hidden lg:w-1 whitespace-nowrap">
                        <BaseButtons type="justify-start lg:justify-end" no-wrap>
                            <BaseButton color="info" :icon="mdiEye" small @click="isModalActive = true" />
                            <BaseButton color="danger" :icon="mdiTrashCan" small @click="isModalDangerActive = true" />
                        </BaseButtons>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="p-3 lg:px-6 border-t border-gray-100 dark:border-slate-800">
            <BaseLevel>
                <BaseButtons>
                    <BaseButton v-for="page in pagesList" :key="page" :active="page === currentPage" :label="page + 1"
                        :color="page === currentPage ? 'lightDark' : 'whiteDark'" small @click="currentPage = page" />
                </BaseButtons>
                <small>Page {{ currentPageHuman }} of {{ numPages }}</small>
            </BaseLevel>
        </div>
    </CardBox>
</template>