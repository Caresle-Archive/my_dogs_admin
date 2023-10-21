<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import routes from '@/Helpers/routes';
import { router } from '@inertiajs/vue3';
import NewItem from '@/Components/General/NewItem.vue';
import RolTable from '@/Components/Rol/RolTable.vue';
import GeneralAlert from '@/Components/Alerts/GeneralAlert.vue';

defineProps({
    roles: Array,
});

</script>

<template>
    <DashboardLayout :selected="routes.rol">
        <div class="max-w-5xl mx-auto">
            <!-- Alerts -->
            <GeneralAlert :title="$page.props.flash.message"
                v-if="$page.props.flash?.message"
            />
            <GeneralAlert :title="$page.props.flash.message_info"
                v-if="$page.props.flash?.message_info" type="info"
            />

            <NewItem title="New Role" @open="router.visit(route('rol.create'))" />

            <RolTable :roles="roles" />
        </div>
    </DashboardLayout>
</template>
