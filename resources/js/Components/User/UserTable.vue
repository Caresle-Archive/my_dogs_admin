<script setup>
import { inject } from 'vue';
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

const { users } = inject('users');
</script>

<template>
    <TheCard class="!max-w-full mt-4" variant="image">
        <Table striped>
            <TableHead>
                <TableHeadCell>Username</TableHeadCell>
                <TableHeadCell>Rol</TableHeadCell>
                <TableHeadCell>Actions</TableHeadCell>
            </TableHead>
            <TableBody>
                <TableRow v-for="(user, ind) in users" :key="ind"
                >
                    <TableCell>{{ user.username }}</TableCell>
                    <TableCell>{{ user.rol }}</TableCell>
                    <TableCell >
                        <Button color="alternative">
                            <svgIcon type="mdi" :path="mdiPencil" />
                        </Button>
                        <Button color="red" class="ml-4">
                            <svgIcon type="mdi" :path="mdiTrashCan" />
                        </Button>
                    </TableCell>
                </TableRow>
            </TableBody>
        </Table>
    </TheCard>
</template>
