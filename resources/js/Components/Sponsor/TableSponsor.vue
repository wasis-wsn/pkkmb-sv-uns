<script setup>
import CardBox from "@/Components/CardBox.vue";
import TableCheckboxCell from "../TableCheckboxCell.vue";
import UserAvatar from "../UserAvatar.vue";
</script>

<template>
  <CardBox class="mb-3" has-table>
    <table>
      <thead>
        <tr>
          <th v-if="checkable" />
          <th />
          <th>Nama Sponsor</th>
          <th>Logo Sponsor</th>
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
          <td data-label="Nama Sponsor">
            {{ client.nama_sponsor }}
          </td>
          <td data-label="Logo Sponsor">
            {{ client.logo_sponsor }}
          </td>
          <td data-label="City">
            {{ client.city }}
          </td>
          <td data-label="Progress" class="lg:w-32">
            <progress
              class="flex w-2/5 self-center lg:w-full"
              max="100"
              :value="client.progress"
            >
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
              <BaseButton
                color="info"
                :icon="mdiEye"
                small
                @click="isModalActive = true"
              />
              <BaseButton
                color="danger"
                :icon="mdiTrashCan"
                small
                @click="isModalDangerActive = true"
              />
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
            @click="currentPage = page"
          />
        </BaseButtons>
        <small>Page {{ currentPageHuman }} of {{ numPages }}</small>
      </BaseLevel>
    </div>
  </CardBox>
</template>
