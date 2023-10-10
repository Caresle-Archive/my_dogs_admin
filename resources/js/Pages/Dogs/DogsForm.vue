<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import routes from '@/Helpers/routes';
import HeadingForm from '@/Components/General/HeadingForm.vue';
import CreateButton from '@/Components/General/CreateButton.vue';
import ErrorMessage from '@/Components/General/ErrorMessage.vue';
import {
    TheCard,
    Input,
    Select,
} from 'flowbite-vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    dog_type: '',
    height: 0.0,
    weight: 0.0,
});

const { isEdit, dog, dogTypes } = defineProps({
    isEdit: {
        type: Boolean,
        default: false,
    },
    dog: Object,
    dogTypes: Array,
});

const submit = () => {
    if (!isEdit) {
        form.post(route('dogs.store'));
        return;
    }

    form.put(route('dogs.update', dog.id));
};

if (isEdit) {
    form.name = dog.name;
    form.height = dog.height;
    form.weight = dog.weight;
    form.dog_type = dog.dog_type;
}

const selectDogTypes = dogTypes.map(e => ({ value: e.id, name: e.name }));
</script>

<template>
    <DashboardLayout :selected="routes.dogs">
        <div class="max-w-md mx-auto">
            <TheCard class="!max-w-full" variant="image">
                <HeadingForm :text="isEdit ? 'Update Dog' : 'Create Dog'"
                    :route-name="route('dogs.index')"
                />
                <form @submit.prevent="submit">
                    <div class="mb-2">
                        <Input label="Name" placeholder="Name" v-model="form.name" />
                        <ErrorMessage :title="form.errors.name" />
                    </div>
                    <div class="flex">
                        <div class="mb-2 mr-1 w-full">
                            <Input label="Weight" placeholder="0.0" v-model="form.weight"
                                type="number"
                            />
                            <ErrorMessage :title="form.errors.weight" />
                        </div>
                        <div class="mb-2 ml-1 w-full">
                            <Input label="Height" placeholder="0.0" v-model="form.height"
                                type="number"
                            />
                            <ErrorMessage :title="form.errors.height" />
                        </div>
                    </div>
                    <div class="mb-2">
                        <Select label="Type" placeholder="Type" v-model="form.dog_type"
                            :options="selectDogTypes"
                        />
                        <ErrorMessage :title="form.errors.dog_type" />
                    </div>
                    <div class="mb-2 flex justify-end">
                        <CreateButton :text="isEdit ? 'Update Dog' : 'Create Dog'" />
                    </div>
                </form>
            </TheCard>
        </div>
    </DashboardLayout>
</template>
