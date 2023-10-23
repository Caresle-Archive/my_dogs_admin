<script setup>
import routes from '@/Helpers/routes';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import HeadingForm from '@/Components/General/HeadingForm.vue';
import {
    TheCard,
    Input,
} from 'flowbite-vue';

defineProps({
    user: Object,
});

</script>

<template>
    <DashboardLayout :selected="routes.users">
        <div class="w-1/2 mx-auto">
            <TheCard class="!max-w-full" variant="image">
                <HeadingForm :route-name="route('users.index')"
                    :text="user.username"
                />
                <div class="mb-2">
                    <Input label="Rol" v-model="user.role.name" disabled />
                </div>
            </TheCard>
        </div>
    </DashboardLayout>
</template>
