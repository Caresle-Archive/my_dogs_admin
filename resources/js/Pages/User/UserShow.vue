<script setup>
import routes from '@/Helpers/routes';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import {
    TheCard,
    Heading,
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
                <Heading tag="h1" class="text-center">
                    {{ user.username }}
                </Heading>
                <div class="mb-2">
                    <Input label="Rol" v-model="user.rol.name" disabled />
                </div>
            </TheCard>
        </div>
    </DashboardLayout>
</template>
