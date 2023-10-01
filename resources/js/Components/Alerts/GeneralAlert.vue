<script setup>
import {
    Alert,
} from 'flowbite-vue';

defineProps({
    title: String,
    type: {
        type: String,
        default: 'success',
    },
})
</script>

<template>
    <Alert :type="type" border icon closable
        class="flex my-2 transition-all"
    >
        {{ title }}
    </Alert>
</template>
