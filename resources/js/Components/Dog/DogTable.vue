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
    dogToDelete.value = id;
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};

const goToEdit = (id) => {
    router.visit(route('dogs.edit', id));
};

const handleOk = () => {
    router.delete(route('dogs.destroy', dogToDelete.value), {
        onFinish: () => showModal.value = false,
    });
};

const dogToDelete = ref(0);
const showModal = ref(false);

defineProps({
    dogs: Array,
});
</script>

<template>
    <TheCard class="!max-w-full mt-4" variant="image">
        <ModalNormal @cancel="closeModal" title="Delete Dog"
            text="Are you sure to delete the dog?" :show="showModal"
            @ok="handleOk"
        />
        <Table striped class="max-w-5xl">
            <TableHead class="text-center">
                <TableHeadCell>Name</TableHeadCell>
                <TableHeadCell>Weight</TableHeadCell>
                <TableHeadCell>Height</TableHeadCell>
                <TableHeadCell>Type</TableHeadCell>
                <TableHeadCell>Actions</TableHeadCell>
            </TableHead>
            <TableBody>
                <TableRow v-for="(dog, ind) in dogs" :key="ind" class="text-center">
                    <TableCell>{{ dog.name }}</TableCell>
                    <TableCell>{{ dog.weight }}</TableCell>
                    <TableCell>{{ dog.height }}</TableCell>
                    <TableCell>{{ dog.dog_type.name }}</TableCell>
                    <ActionsTable @delete="() => openModal(dog.id)"
                        @edit="() => goToEdit(dog.id)"
                    />
                </TableRow>
            </TableBody>
        </Table>
    </TheCard>
</template>
