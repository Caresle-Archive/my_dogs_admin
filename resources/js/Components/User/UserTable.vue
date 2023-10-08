<script setup>
import { inject, ref } from 'vue';
import {
    TheCard,
    Table,
    TableBody,
    TableHead,
    TableHeadCell,
    TableRow,
    TableCell,
    Button,
} from 'flowbite-vue';
import svgIcon from '@jamescoyle/vue-icon';
import {
    mdiPencil,
    mdiTrashCan,
} from '@mdi/js';
import ModalNormal from '@/Components/Modal/ModalNormal.vue';
import { router } from '@inertiajs/vue3';

// const { users } = inject('users');

const handleShow = (user) => {
    router.visit(route('users.show', user.id));
};

const openModal = (user) => {
    showModal.value = true;
    userToDelete.value = user.id
};

const closeModal = () => {
    showModal.value = false;
    userToDelete.value = 0;
}

const handleOk = () => {
    router.delete(
        route('users.destroy', userToDelete.value),
        {
            onFinish: () => {
                showModal.value = false;
            },
        },
    );

};

const userToDelete = ref(0);
const showModal = ref(false);

defineProps({
    users: Array,
});

</script>

<template>
    <TheCard class="!max-w-full mt-4" variant="image">
        <ModalNormal @cancel="closeModal" title="Delete User"
            text="Are you sure to delete the user?" :show="showModal"
            @ok="handleOk"
        />
        <Table striped>
            <TableHead>
                <TableHeadCell>Username</TableHeadCell>
                <TableHeadCell>Rol</TableHeadCell>
                <TableHeadCell>Actions</TableHeadCell>
            </TableHead>
            <TableBody>
                <TableRow v-for="(user, ind) in users" :key="ind"
                >
                    <TableCell>
                        <Button color="alternative" @click="() => handleShow(user)">
                            {{ user.username }}
                        </Button>
                    </TableCell>
                    <TableCell>{{ user.rol }}</TableCell>
                    <TableCell class="flex">
                        <Button color="alternative">
                            <svgIcon type="mdi" :path="mdiPencil" />
                        </Button>
                        <Button color="red" class="ml-4" @click="() => openModal(user)">
                            <svgIcon type="mdi" :path="mdiTrashCan" />
                        </Button>
                    </TableCell>
                </TableRow>
            </TableBody>
        </Table>
    </TheCard>
</template>
