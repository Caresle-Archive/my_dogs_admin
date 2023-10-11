<script setup>
import {
    Heading,
} from 'flowbite-vue';
import svgIcon from '@jamescoyle/vue-icon';

defineProps({
    icon: String,
});
</script>

<template>
    <Heading tag="h5" class="
        dark:hover:bg-gray-600 hover:cursor-pointer rounded-md my-2 p-1
        flex items-center
    ">
        <svgIcon :path="icon" type="mdi" class="mr-4" />
        <slot />
    </Heading>
</template>
