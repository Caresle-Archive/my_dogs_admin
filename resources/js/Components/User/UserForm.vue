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
import { ref } from 'vue';
defineProps({
    showModal: Boolean,
    edit: {
        type: Boolean,
        default: false,
    },
    title: String,
});

const emits = defineEmits(['closeModal', 'update', 'create']);

const rolSelected = ref('');

const roles = [
    { value: 1, name: 'Test' },
    { value: 2, name: 'Test2'},
];
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
                <Input placeholder="Username" label="Username" />
            </div>
            <div class="mb-2">
                <Input placeholder="Password" label="Password" type="password" />
            </div>
            <div class="mb-2">
                <Select v-model="rolSelected" :options="roles" label="Rol" />
            </div>
            <div class="flex justify-end">
                <Button color="alternative" class="mr-2" @click="() => emits('closeModal')">
                    <template #prefix>
                        <svgIcon type="mdi" :path="mdiClose" />
                    </template>
                    Cancel
                </Button>
                <Button>
                    <template #prefix>
                        <svgIcon type="mdi" :path="mdiContentSave" />
                    </template>
                    {{ edit ? 'Update User' : 'Create User' }}
                </Button>
            </div>
        </template>
    </Modal>
</template>
