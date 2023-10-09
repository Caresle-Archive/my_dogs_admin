<script setup>
import {
    Button,
} from 'flowbite-vue';

defineProps({
    text: String,
});
</script>

<template>
    <Button class="w-full scale-95 hover:scale-100 transition-all">
        {{ text }}
    </Button>
</template>
