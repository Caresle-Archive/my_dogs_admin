<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import routes from '@/Helpers/routes';
import HeadingForm from '@/Components/General/HeadingForm.vue';
import CreateButton from '@/Components/General/CreateButton.vue';
import {
    TheCard,
    Input,
} from 'flowbite-vue';

const { permissions, isEdit } = defineProps({
    isEdit: {
        type: Boolean,
        default: false,
    },
    permissions: Array,
});

console.log(permissions);

</script>

<template>
    <DashboardLayout :selected="routes.rol">
        <div class="w-1/2 max-w-xl mx-auto">
            <TheCard class="!max-w-full" variant="image">
                <HeadingForm :text="isEdit ? 'Update Role' : 'Create Role'"
                    :route-name="route('rol.index')"
                />
                <form>
                    <div class="mb-2">
                        <Input placeholder="Name" label="Name" />
                    </div>
                    <div class="mb-2">
                        <CreateButton :text="isEdit ? 'Update Role' : 'Create Role'" />
                    </div>
                </form>
            </TheCard>
        </div>
    </DashboardLayout>
</template>
