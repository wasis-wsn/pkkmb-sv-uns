<script setup>
import { computed } from 'vue'

const props = defineProps({
  useremail: {
    type: String,
    required: true
  },
  avatar: {
    type: String,
    default: null
  },
  api: {
    type: String,
    default: 'avataaars'
  }
})

const avatar = computed(
  () =>
    props.avatar ??
    `https://api.dicebear.com/7.x/${props.api}/svg?seed=${props.useremail.replace(
      /[^a-z0-9]+/gi,
      '-'
    )}.svg`
)

const useremail = computed(() => props.useremail)
</script>

<template>
  <div>
    <img
      :src="avatar"
      :alt="useremail"
      class="rounded-full block h-auto w-full max-w-full bg-gray-100 dark:bg-slate-800"
    />
    <slot />
  </div>
</template>
