<script setup>
import SvgIcon from '@jamescoyle/vue-icon';
import { mdiThemeLightDark } from '@mdi/js';
import {
    Button,
} from 'flowbite-vue';
import { changeTheme } from './theme';
</script>

<template>
    <Button color="alternative" pill @click="changeTheme">
        <svg-icon type="mdi" :path="mdiThemeLightDark" />
    </Button>
</template>
