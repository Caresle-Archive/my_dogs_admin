<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import routes from '@/Helpers/routes';
import { router } from '@inertiajs/vue3';
import {
    TheCard,
} from 'flowbite-vue';
import NewItem from '@/Components/General/NewItem.vue';
</script>

<template>
    <DashboardLayout :selected="routes.rol">
        <div class="max-w-5xl mx-auto">
            <TheCard class="!max-w-full" variant="image">
                <NewItem title="New Role" @open="router.visit(route('rol.create'))" />
            </TheCard>
        </div>
    </DashboardLayout>
</template>
