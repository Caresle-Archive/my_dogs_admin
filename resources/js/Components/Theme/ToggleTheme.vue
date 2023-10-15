<script setup>
import {
    Toggle,
} from 'flowbite-vue';
import { changeTheme, isDarkTheme } from './theme';
import { ref } from 'vue';

const darkSelected = isDarkTheme();
const isDark = ref(darkSelected);
</script>

<template>
    <div>
        <Toggle @change="changeTheme" v-model="isDark" />
    </div>
</template>
