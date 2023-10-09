<script setup>
import {
    Table,
    TableHead,
    TableHeadCell,
    TableBody,
    TableRow,
    TableCell,
    TheCard,
} from 'flowbite-vue';
import ActionsTable from '@/Components/General/ActionsTable.vue';
import ModalNormal from '@/Components/Modal/ModalNormal.vue';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const openModal = (id) => {
    roleToDelete.value = id;
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};

const goToEdit = (id) => {
    router.visit(route('rol.edit', id));
};

const handleOk = () => {
    router.delete(route('rol.destroy', roleToDelete.value), {
        onFinish: () => showModal.value = false,
    });
};

const roleToDelete = ref(0);
const showModal = ref(false);

defineProps({
    roles: Array,
});

</script>

<template>
    <TheCard class="!max-w-full mt-4" variant="image">
        <ModalNormal @cancel="closeModal" title="Delete role"
            text="Are you sure to delete the role?" :show="showModal"
            @ok="handleOk"
        />
        <Table striped class="max-w-5xl">
            <TableHead class="text-center">
                <TableHeadCell>Name</TableHeadCell>
                <TableHeadCell>Actions</TableHeadCell>
            </TableHead>
            <TableBody>
                <TableRow v-for="(role, ind) in roles" :key="ind" class="text-center">
                    <TableCell>{{ role.name }}</TableCell>
                    <ActionsTable @delete="() => openModal(role.id)"
                        @edit="() => goToEdit(role.id)"
                    />
                </TableRow>
            </TableBody>
        </Table>
    </TheCard>
</template>
