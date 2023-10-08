<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import {
    TheCard,
    Input,
    Select,
} from 'flowbite-vue';
import CreateButton from '@/Components/General/CreateButton.vue';
import HeadingForm from '@/Components/General/HeadingForm.vue';
import routes from '@/Helpers/routes';
import { useForm } from '@inertiajs/vue3';
import ErrorMessage from '@/Components/General/ErrorMessage.vue';

const { roles, isEdit, user } = defineProps({
    roles: Array,
    isEdit: {
        type: Boolean,
        default: false,
    },
    user: Object,
});

const form = useForm({
    username: '',
    password: '',
    rol: 0,
})

const rolesSelectElement = roles.map(e => ({ value: e.id, name: e.name }));

const handleForm = () => {
    if (!isEdit) {
        form.post(route('users.store'));
        return;
    }

    form.put(route('users.update', user.id));

};

// Set the data for the edit form
if (isEdit) {
    form.username = user.username;
    form.rol = user.rol;
}

</script>

<template>
    <DashboardLayout :selected="routes.users">
        <div class="w-1/2 mx-auto max-w-lg">
            <TheCard class="!max-w-full" variant="image">
                <HeadingForm :text="isEdit ? 'Update User' : 'Create User'"
                    :route-name="route('users.index')"
                />
                <form @submit.prevent="handleForm">
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
                        <CreateButton :text="isEdit ? 'Update User' : 'Create User'" />
                    </div>
                </form>
            </TheCard>
        </div>
    </DashboardLayout>
</template>
