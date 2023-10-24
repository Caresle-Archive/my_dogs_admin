<script setup>
import { ref } from 'vue';
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
    mdiEye,
} from '@mdi/js';
import ModalNormal from '@/Components/Modal/ModalNormal.vue';
import ModalUser from './ModalUser.vue';
import { router } from '@inertiajs/vue3';

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

const goToEdit = (user) => {
    router.visit(route('users.edit', user.id));
};

const openModalUser = (user) => {
    rolesToShow.value = user.roles;
    showModalRoles.value = true;
};

const closeModalUser = () => {
    rolesToShow.value = {};
    showModalRoles.value = false;
}

const userToDelete = ref(0);
const rolesToShow = ref({});
const showModal = ref(false);
const showModalRoles = ref(false);

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
        <ModalUser title="User Roles" :show="showModalRoles" @cancel="closeModalUser" @ok="closeModalUser"
            :roles="rolesToShow"
        />
        <Table striped class="max-w-5xl">
            <TableHead>
                <TableHeadCell class="text-center">Username</TableHeadCell>
                <TableHeadCell class="text-center">Role</TableHeadCell>
                <TableHeadCell class="text-center">Actions</TableHeadCell>
            </TableHead>
            <TableBody>
                <TableRow v-for="(user, ind) in users" :key="ind"
                >
                    <TableCell class="text-center">
                        <Button color="" @click="() => handleShow(user)"
                            class="dark:hover:bg-gray-500 hover:bg-gray-200 rounded-md"
                        >
                            {{ user.username }}
                        </Button>
                    </TableCell>
                    <TableCell class="text-center">
                        <Button outline @click="() => openModalUser(user)">
                            <svgIcon type="mdi" :path="mdiEye" />
                        </Button>
                    </TableCell>
                    <TableCell class="flex justify-center">
                        <Button color="alternative" @click="() => goToEdit(user)">
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
