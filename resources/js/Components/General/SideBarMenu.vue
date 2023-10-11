<script setup>
import { ref } from 'vue';
import routes from '@/Helpers/routes';
import SideBarItem from './SideBarItem.vue';
import {
    mdiAccountGroup,
    mdiAccountKey,
    mdiDog,
    mdiDogSide,
    mdiHome,
} from '@mdi/js';

const icons = [
    mdiAccountGroup,
    mdiAccountKey,
    mdiDog,
    mdiDogSide,
    mdiHome,
];

</script>

<template>
    <nav class="
        w-3/12 p-3 bg-gray-50 dark:bg-gray-800 shadow-none border-none
    ">
        <div class="h-16"></div>
        <SideBarItem :icon="mdiHome">{{ routes.dashboard }}</SideBarItem>
        <SideBarItem :icon="mdiDog">{{ routes.dogs }}</SideBarItem>
        <SideBarItem :icon="mdiDogSide">{{ routes.dogsType }}</SideBarItem>
        <SideBarItem :icon="mdiAccountGroup">{{ routes.users }}</SideBarItem>
        <SideBarItem :icon="mdiAccountKey">{{ routes.rol }}</SideBarItem>
    </nav>
</template>
