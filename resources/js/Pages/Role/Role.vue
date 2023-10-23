<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import routes from '@/Helpers/routes';
import { router } from '@inertiajs/vue3';
import NewItem from '@/Components/General/NewItem.vue';
import RoleTable from '@/Components/Role/RoleTable.vue';
import GeneralAlert from '@/Components/Alerts/GeneralAlert.vue';

defineProps({
    roles: Array,
});

</script>

<template>
    <DashboardLayout :selected="routes.role">
        <div class="max-w-5xl mx-auto">
            <!-- Alerts -->
            <GeneralAlert :title="$page.props.flash.message"
                v-if="$page.props.flash?.message"
            />
            <GeneralAlert :title="$page.props.flash.message_info"
                v-if="$page.props.flash?.message_info" type="info"
            />

            <NewItem title="New Role" @open="router.visit(route('role.create'))" />

            <RoleTable :roles="roles" />
        </div>
    </DashboardLayout>
</template>
