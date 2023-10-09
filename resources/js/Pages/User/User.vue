<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import NewItem from '../../Components/General/NewItem.vue';
import UserTable from '../../Components/User/UserTable.vue';
import RefreshData from '@/Components/General/RefreshData.vue';
import GeneralAlert from '@/Components/Alerts/GeneralAlert.vue';
import routes from '@/Helpers/routes';
import { provide } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    users: Array,
    roles: Array,
    message: String,
    errors: Object,
});

const handleRefresh = () => {
    console.log('Refresh');
};

provide('users', {
    roles: props.roles,
    errors: props.errors,
});
</script>

<template>
    <DashboardLayout :selected="routes.users">
        <div class="max-w-5xl mx-auto">
            <GeneralAlert :title="message" v-if="message" type="success" />
            <!-- Actions -->
            <NewItem @open="() => router.visit(route('users.create'))" title="New User" />
            <RefreshData @refresh="handleRefresh" />

            <!-- User Table -->
            <UserTable :users="users" />
        </div>
    </DashboardLayout>
</template>
