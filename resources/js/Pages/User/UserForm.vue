<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import {
    TheCard,
    Input,
    Select,
    Heading,
} from 'flowbite-vue';
import CreateButton from '@/Components/General/CreateButton.vue';
import routes from '@/Helpers/routes';
import { useForm } from '@inertiajs/vue3';
import ErrorMessage from '@/Components/General/ErrorMessage.vue';

const { roles, isEdit } = defineProps({
    roles: Array,
    isEdit: {
        type: Boolean,
        default: false,
    },
});

const form = useForm({
    username: '',
    password: '',
    rol: 0,
})

const rolesSelectElement = roles.map(e => ({ value: e.id, name: e.name }));

const handleForm = () => {
    if (isEdit) return;

    form.post(route('users.store'));
};

</script>

<template>
    <DashboardLayout :selected="routes.users">
        <div class="w-1/2 mx-auto">
            <TheCard class="!max-w-full" variant="image">
                <form @submit.prevent="handleForm">
                    <Heading tag="h3" class="text-center">Create User</Heading>
                    <div class="mb-2">
                        <Input label="Username" placeholder="Username" v-model="form.username" />
                        <ErrorMessage :title="form.errors.username" />
                    </div>
                    <div class="mb-2">
                        <Input label="Password" placeholder="Password"
                            type="password" v-model="form.password"
                        />
                        <ErrorMessage :title="form.errors.password" />
                    </div>
                    <div class="mb-2">
                        <Select :options="rolesSelectElement" title="Role" label="Role"
                            placeholder="Please select the user Role"
                            v-model:model-value="form.rol"
                        />
                        <ErrorMessage :title="form.errors.rol" />
                    </div>
                    <div class="mb-2">
                        <CreateButton text="Create User" />
                    </div>
                </form>
            </TheCard>
        </div>
    </DashboardLayout>
</template>
