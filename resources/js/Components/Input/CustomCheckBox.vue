<!-- Extend version of the Checkbox component of flowbite -->
<script setup>
defineProps({
    label: String,
    disabled: {
        type: Boolean,
        default: false,
    },
    checked: {
        type: Boolean,
        default: false,
    },
})
</script>

<template>
    <label class="flex gap-3 items-center justify-start">
        <input type="checkbox" :disabled="disabled" class="w-4 h-4 rounded bg-gray-100 border-gray-300 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
            :checked="checked"
        />
        <span v-if="label" class="block text-sm font-medium text-gray-900 dark:text-gray-300">
            {{ label }}
        </span>
        <slot />
    </label>
</template>
