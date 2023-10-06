<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import {
    TheCard,
    Input,
    Select,
    Heading,
} from 'flowbite-vue';
import CreateButton from '@/Components/General/CreateButton.vue';


const { roles } = defineProps({
    roles: Array,
});

const rolesSelectElement = roles.map(e => ({ value: e.id, name: e.name }));
</script>

<template>
    <DashboardLayout>
        <div class="w-1/2 mx-auto">
            <TheCard class="!max-w-full">
                <form>
                    <Heading tag="h3" class="text-center">Create User</Heading>
                    <div class="mb-2">
                        <Input label="Username" placeholder="Username" />
                    </div>
                    <div class="mb-2">
                        <Input label="Password" placeholder="Password"
                            type="password"
                        />
                    </div>
                    <div class="mb-2">
                        <Select :options="rolesSelectElement" title="Role" label="Role"
                            placeholder="Please select the user Role"
                        />
                    </div>
                    <div class="mb-2">
                        <CreateButton text="Create User" />
                    </div>
                </form>
            </TheCard>
        </div>
    </DashboardLayout>
</template>
