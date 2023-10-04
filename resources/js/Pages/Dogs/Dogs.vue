<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import routes from '@/Helpers/routes';

</script>

<template>
    <DashboardLayout :selected="routes.dogs">
        <h1 class="dark:text-white">Dogs</h1>
    </DashboardLayout>
</template>
