<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import {
    Modal,
    Heading,
    Input,
    Select,
    Button,
} from 'flowbite-vue';
import svgIcon from '@jamescoyle/vue-icon';
import {
    mdiClose,
    mdiContentSave,
} from '@mdi/js';
import NewItem from '../../Components/General/NewItem.vue';
import { openModal, closeModal } from '../../Helpers/modal';
import { ref, reactive } from 'vue';

const showModalReactive = reactive({ show: false });
const rolSelected = ref('');

const roles = [
    { value: 1, name: 'Test' },
    { value: 2, name: 'Test2'},
];
</script>

<template>
    <DashboardLayout>
        <h1 class="dark:text-white">Users</h1>
        <NewItem @open="() => openModal(showModalReactive)" title="New User" />
        <Modal v-if="showModalReactive.show"
            @close="() => closeModal(showModalReactive)"
            @click:outside="() => closeModal(showModalReactive)"
        >
            <template #header>
                <Heading tag="h4" class="text-center">New User</Heading>
            </template>
            <template #body>
                <div class="mb-2">
                    <Input placeholder="Username" label="Username" />
                </div>
                <div class="mb-2">
                    <Input placeholder="Password" label="Password" type="password" />
                </div>
                <div class="mb-2">
                    <Select v-model="rolSelected" :options="roles" label="Rol" />
                </div>
                <div class="flex justify-end">
                    <Button color="alternative" class="mr-2">
                        <template #prefix>
                            <svgIcon type="mdi" :path="mdiClose" />
                        </template>
                        Cancel
                    </Button>
                    <Button>
                        <template #prefix>
                            <svgIcon type="mdi" :path="mdiContentSave" />
                        </template>
                        Create User
                    </Button>
                </div>
            </template>
        </Modal>
    </DashboardLayout>
</template>
