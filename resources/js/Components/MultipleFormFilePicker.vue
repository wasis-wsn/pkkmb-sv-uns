<script setup>
import { mdiUpload } from "@mdi/js";
import { computed, ref, watch } from "vue";
import BaseButton from "@/Components/BaseButton.vue";

const props = defineProps({
    modelValue: {
        type: [Object, File, Array],
        default: () => [],
    },
    label: {
        type: String,
        default: null,
    },
    icon: {
        type: String,
        default: mdiUpload,
    },
    accept: {
        type: String,
        default: null,
    },
    color: {
        type: String,
        default: "info",
    },
    isRoundIcon: Boolean,
});

const emit = defineEmits(["update:modelValue"]);

const root = ref(null);

const files = ref(props.modelValue);

const showFilenames = computed(
    () => !props.isRoundIcon && files.value.length > 0
);

watch(
    () => props.modelValue,
    (value) => {
        files.value = value;

        if (!value.length && root.value && root.value.input) {
            root.value.input.value = null;
        }
    },
    { deep: true }
);

const upload = (event) => {
    const value = Array.from(event.target.files || event.dataTransfer.files);

    files.value = value;

    emit("update:modelValue", files.value);
};
</script>

<template>
    <div class="flex items-stretch justify-start relative">
        <label class="inline-flex">
            <BaseButton
                as="a"
                :class="{
                    'w-12 h-12': isRoundIcon,
                    'rounded-r-none': showFilenames,
                }"
                :icon-size="isRoundIcon ? 24 : undefined"
                :label="isRoundIcon ? null : label"
                :icon="icon"
                :color="color"
                :rounded-full="isRoundIcon"
            />
            <input
                ref="root"
                type="file"
                class="absolute top-0 left-0 w-full h-full opacity-0 outline-none cursor-pointer -z-1"
                :accept="accept"
                multiple
                @input="upload"
            />
        </label>
        <div
            v-if="showFilenames"
            class="px-4 py-2 bg-gray-100 dark:bg-slate-800 border-gray-200 dark:border-slate-700 border rounded-r"
        >
            <span
                class="text-ellipsis line-clamp-1"
                v-for="file in files"
                :key="file.name"
            >
                {{ file.name }}
            </span>
        </div>
    </div>
</template>
