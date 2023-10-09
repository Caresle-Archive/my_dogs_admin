<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import routes from '@/Helpers/routes';
import NewItem from '@/Components/General/NewItem.vue';
import { router } from '@inertiajs/vue3';

</script>

<template>
    <DashboardLayout :selected="routes.dogsType">
        <div class="max-w-5xl mx-auto">
            <NewItem title="New Dog Type" @open="router.visit(route('dogs_type.create'))" />

        </div>
    </DashboardLayout>
</template>
