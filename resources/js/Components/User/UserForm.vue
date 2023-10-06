<script setup>
import svgIcon from '@jamescoyle/vue-icon';
import {
    mdiClose,
    mdiContentSave,
} from '@mdi/js';
import {
    Modal,
    Heading,
    Input,
    Select,
    Button,
} from 'flowbite-vue';
import { inject } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ErrorMessage from '../General/ErrorMessage.vue';

const props = defineProps({
    showModal: Boolean,
    edit: {
        type: Boolean,
        default: false,
    },
    title: String,
});

const emits = defineEmits(['closeModal', 'update', 'create']);

const { roles, errors } = inject('users');
const rolesMap = roles.map(e => ({value: e.id, name: e.name}));

const form = useForm({
    username: '',
    password: '',
    rol: 0,
});

const handleClick = () => {
    if (props.edit) {
        emits('update');
        return;
    }
    form.post(route('users.create', {
        onFinish: () => {
            console.log('finish form');
        },
    }));
    // emits('create');
};

</script>

<template>
    <Modal v-if="showModal"
        @close="() => emits('closeModal')"
        @click:outside="() => emits('closeModal')"
    >
        <template #header>
            <Heading tag="h4" class="text-center">{{ title }}</Heading>
        </template>
        <template #body>
            <div class="mb-2">
                <Input placeholder="Username" label="Username"
                    v-model="form.username"
                />
            </div>
            <div class="mb-2">
                <Input placeholder="Password" label="Password"
                    type="password" v-model="form.password"
                />
            </div>
            <div class="mb-2">
                <Select v-model="form.rol" :options="rolesMap" label="Rol" />
                <ErrorMessage :title="errors.rol" />
            </div>
            <div class="flex justify-end">
                <Button color="alternative" class="mr-2" @click="() => emits('closeModal')">
                    <template #prefix>
                        <svgIcon type="mdi" :path="mdiClose" />
                    </template>
                    Cancel
                </Button>
                <Button @click="handleClick">
                    <template #prefix>
                        <svgIcon type="mdi" :path="mdiContentSave" />
                    </template>
                    {{ edit ? 'Update User' : 'Create User' }}
                </Button>
            </div>
        </template>
    </Modal>
</template>
