<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import routes from '@/Helpers/routes';
import HeadingForm from '@/Components/General/HeadingForm.vue';
import CreateButton from '@/Components/General/CreateButton.vue';
import ErrorMessage from '@/Components/General/ErrorMessage.vue';
import {
    TheCard,
    Input,
} from 'flowbite-vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
});

const { isEdit} = defineProps({
    isEdit: {
        type: Boolean,
        default: false,
    },
});


const submit = () => {
    if (!isEdit) {
        form.post(route('dogs_type.store'));
        return;
    }
};
</script>

<template>
    <DashboardLayout :selected="routes.dogsType">
        <div class="max-w-md mx-auto">
            <TheCard class="!max-w-full" variant="image">
                <HeadingForm :text="isEdit ? 'Update Dog type' : 'Create Dog Type'"
                    :route-name="route('dogs_type.index')"
                />
                <form @submit.prevent="submit">
                    <div class="mb-2">
                        <Input label="Name" placeholder="Name" v-model="form.name" />
                        <ErrorMessage :title="form.errors.name" />
                    </div>
                    <div class="mb-2 flex justify-end">
                        <CreateButton :text="isEdit ? 'Update Dog type' : 'Create Dog Type'" />
                    </div>
                </form>
            </TheCard>
        </div>
    </DashboardLayout>
</template>
