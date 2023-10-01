<script setup>
import SvgIcon from '@jamescoyle/vue-icon';
import { mdiThemeLightDark } from '@mdi/js';
import {
    Button,
} from 'flowbite-vue';

const changeTheme = () => {
    const selectedTheme = localStorage.getItem('color-theme');
    if (selectedTheme === 'light') {
        document.documentElement.classList.add('dark');
        localStorage.setItem('color-theme', 'dark');
        return;
    }

    document.documentElement.classList.remove('dark');
    localStorage.setItem('color-theme', 'light');
};

</script>

<template>
    <Button color="default" outline @click="changeTheme">
        <svg-icon type="mdi" :path="mdiThemeLightDark" />
    </Button>
</template>
