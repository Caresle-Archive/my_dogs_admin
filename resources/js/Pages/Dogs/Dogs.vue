<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import NewItem from '@/Components/General/NewItem.vue';
import routes from '@/Helpers/routes';
import { router } from '@inertiajs/vue3';

</script>

<template>
    <DashboardLayout :selected="routes.dogs">
        <div class="max-w-5xl mx-auto">
            <NewItem title="New Dog Type" @open="router.visit(route('dogs.create'))" />
        </div>
    </DashboardLayout>
</template>
