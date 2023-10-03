<script setup>
import { inject } from 'vue';
import {
    TheCard,
} from 'flowbite-vue';
const users = inject('users');

</script>

<template>
    <h1 class="text-white">
        {{ users }}
    </h1>
    <TheCard class="!max-w-full"></TheCard>
</template>
