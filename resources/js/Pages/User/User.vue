<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import NewItem from '../../Components/General/NewItem.vue';
import UserTable from '../../Components/User/UserTable.vue';
import { openModal, closeModal } from '../../Helpers/modal';
import { reactive, provide } from 'vue';
import UserForm from '@/Components/User/UserForm.vue';
import routes from '@/Helpers/routes';

const showModalReactive = reactive({ show: false });

const props = defineProps({
    users: Array,
});

provide('users', props.users);
</script>

<template>
    <DashboardLayout :selected="routes.users">
        <!-- Actions -->
        <NewItem @open="() => openModal(showModalReactive)" title="New User" />

        <!-- New User Modal -->
        <UserForm :showModal="showModalReactive.show" title="New User"
            @closeModal="() => closeModal(showModalReactive)"
        />

        <!-- User Table -->
        <UserTable />
    </DashboardLayout>
</template>
