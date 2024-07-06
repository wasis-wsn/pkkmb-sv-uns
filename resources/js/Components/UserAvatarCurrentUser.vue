<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
import { useMainStore } from '@/Stores/main'
import UserAvatar from '@/Components/UserAvatar.vue'

const pageProps = usePage().props
const userName = computed(() => pageProps.auth.user ? pageProps.auth.user.name : '')

const mainStore = useMainStore()
</script>

<template>
  <UserAvatar :username="userName" api="initials">
    <slot />
  </UserAvatar>
</template>
