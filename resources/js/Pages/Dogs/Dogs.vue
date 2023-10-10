<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import NewItem from '@/Components/General/NewItem.vue';
import DogTable from '@/Components/Dog/DogTable.vue';
import routes from '@/Helpers/routes';
import { router } from '@inertiajs/vue3';

defineProps({
    dogs: Array,
});

</script>

<template>
    <DashboardLayout :selected="routes.dogs">
        <div class="max-w-5xl mx-auto">
            <NewItem title="New Dog" @open="router.visit(route('dogs.create'))" />

            <DogTable :dogs="dogs" />
        </div>
    </DashboardLayout>
</template>
