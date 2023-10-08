<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import routes from '@/Helpers/routes';
import { router } from '@inertiajs/vue3';
import {
    TheCard,
} from 'flowbite-vue';
import NewItem from '@/Components/General/NewItem.vue';
import RolTable from '@/Components/Rol/RolTable.vue';

defineProps({
    roles: Array,
});

</script>

<template>
    <DashboardLayout :selected="routes.rol">
        <div class="max-w-5xl mx-auto">
            <NewItem title="New Role" @open="router.visit(route('rol.create'))" />

            <RolTable :roles="roles" />
        </div>
    </DashboardLayout>
</template>
