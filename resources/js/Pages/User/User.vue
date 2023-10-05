<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import NewItem from '../../Components/General/NewItem.vue';
import UserTable from '../../Components/User/UserTable.vue';
import UserForm from '@/Components/User/UserForm.vue';
import RefreshData from '@/Components/General/RefreshData.vue';
import GeneralAlert from '@/Components/Alerts/GeneralAlert.vue';
import routes from '@/Helpers/routes';
import { openModal, closeModal } from '../../Helpers/modal';
import { reactive, provide } from 'vue';

const showModalReactive = reactive({ show: false });

const props = defineProps({
    users: Array,
    roles: Array,
    message: String,
    errors: Object,
});

const handleRefresh = () => {
    console.log('Refresh');
};

const handleCreate = () => {
    console.log('Create');
    closeModal(showModalReactive);
};

const handleUpdate = () => {
    console.log('Update');
};

provide('users', {
    users: props.users,
    roles: props.roles,
    errors: props.errors,
});
</script>

<template>
    <DashboardLayout :selected="routes.users">
        <GeneralAlert :title="message" v-if="message" type="success" />
        <!-- Actions -->
        <NewItem @open="() => openModal(showModalReactive)" title="New User" />
        <RefreshData @refresh="handleRefresh" />

        <!-- New User Modal -->
        <UserForm :showModal="showModalReactive.show" title="New User"
            @closeModal="() => closeModal(showModalReactive)"
            @create="handleCreate"
        />

        <!-- User Table -->
        <UserTable />
    </DashboardLayout>
</template>
