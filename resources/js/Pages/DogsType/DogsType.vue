<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import routes from '@/Helpers/routes';
import NewItem from '@/Components/General/NewItem.vue';
import DogsTypeTable from '@/Components/DogsType/DogsTypeTable.vue';
import { router } from '@inertiajs/vue3';

defineProps({
    dogsType: Array,
});

</script>

<template>
    <DashboardLayout :selected="routes.dogsType">
        <div class="max-w-5xl mx-auto">
            <NewItem title="New Dog Type" @open="router.visit(route('dogs_type.create'))" />
            <DogsTypeTable :dogs-type="dogsType" />
        </div>
    </DashboardLayout>
</template>
