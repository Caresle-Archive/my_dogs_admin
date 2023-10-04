<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import routes from '@/Helpers/routes';

</script>

<template>
    <DashboardLayout :selected="routes.rol">
        <h1 class="dark:text-white">Rol view</h1>
    </DashboardLayout>
</template>
