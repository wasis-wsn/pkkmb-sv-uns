<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
import { useMainStore } from '@/Stores/main'
import UserAvatar from '@/Components/UserAvatar.vue'

const pageProps = usePage().props
const userEmail = computed(() => pageProps.auth.user.email )

const mainStore = useMainStore()
</script>

<template>
  <UserAvatar :username="userEmail" api="initials">
    <slot />
  </UserAvatar>
</template>
