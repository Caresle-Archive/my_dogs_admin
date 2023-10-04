<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import routes from '@/Helpers/routes';

</script>

<template>
    <DashboardLayout :selected="routes.dogsType">
        <h1 class="dark:text-white">Dogs type</h1>
    </DashboardLayout>
</template>
