<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import routes from '@/Helpers/routes';
import HeadingForm from '@/Components/General/HeadingForm.vue';
import CreateButton from '@/Components/General/CreateButton.vue';
import ErrorMessage from '@/Components/General/ErrorMessage.vue';
import {
    TheCard,
    Input,
    Heading,
} from 'flowbite-vue';
import { useForm } from '@inertiajs/vue3';
import CustomCheckBox from '@/Components/Input/CustomCheckBox.vue';

const { permissions, isEdit, role } = defineProps({
    isEdit: {
        type: Boolean,
        default: false,
    },
    permissions: Array,
    role: Object,
});

const permissionList = permissions.map(e => {
    const element = { ...e };

    element.name = element.name.replaceAll('get_', 'Show ');
    element.name = element.name.replaceAll('post_', 'Create ');
    element.name = element.name.replaceAll('put_', 'Update ');
    element.name = element.name.replaceAll('delete_', 'Delete ');
    return element;
});

const permissionSections = new Set();

permissions.forEach(element => {
    const permission = { ...element };

    permission.name = permission.name.replaceAll('get_', '');
    permission.name = permission.name.replaceAll('post_', '');
    permission.name = permission.name.replaceAll('put_', '');
    permission.name = permission.name.replaceAll('delete_', '');

    permissionSections.add(permission.name);
});

const form = useForm({
    name: '',
    permission: [],
    permissions: new Set(),
});

const handleAddPermission = (id) => {
    if (form.permissions.has(id)) {
        form.permissions.delete(id);
        return;
    }

    form.permissions.add(id);
};

const submit = () => {
    form.permission = Array.from(form.permissions);
    form.post(route('role.store'));
};

const permissionIsSelected = (permission) => {
    if (
        permission?.permission_selected === undefined ||
        permission?.permission_selected === null ||
        permission?.permission_selected === ''
    ) return false;
    return permission?.permissionIsSelected;
};

if (isEdit) {
    form.name = role.name;
    role.permissions?.forEach(e => {
        form.permissions.add(e.permission_id);
    });
    console.log(role);
    console.log(form);
}

</script>

<template>
    <DashboardLayout :selected="routes.role">
        <div class="max-w-5xl mx-auto">
            <TheCard class="!max-w-full" variant="image">
                <HeadingForm :text="isEdit ? 'Update Role' : 'Create Role'"
                    :route-name="route('role.index')"
                />
                <form @submit.prevent="submit">
                    <div class="mb-2">
                        <Input placeholder="Name" label="Name" v-model="form.name" />
                        <ErrorMessage :title="form.errors.name" />
                    </div>

                    <!-- Permission sections -->
                    <ErrorMessage :title="form.errors.permission" />
                    <div class="grid grid-cols-3">
                        <div v-for="(sectionName, ind) in permissionSections" :key="`sectionPermission-${ind}`">
                            <Heading tag="h4">{{ sectionName }}</Heading>
                            <div v-for="(permission, ind) in permissionList" :key="ind">
                                <div v-if="permission.name.includes(sectionName)" class="mb-2">
                                    <CustomCheckBox :label="permission.name" @click="() => handleAddPermission(permission.id)"
                                        :checked="form.permissions.has(permission.id)"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-2 flex justify-end">
                        <CreateButton class="max-w-sm" :text="isEdit ? 'Update Role' : 'Create Role'" />
                    </div>
                </form>
            </TheCard>
        </div>
    </DashboardLayout>
</template>
