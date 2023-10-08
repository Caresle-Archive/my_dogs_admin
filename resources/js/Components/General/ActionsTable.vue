<script setup>
import {
    TableCell,
    Button,
} from 'flowbite-vue';
import svgIcon from '@jamescoyle/vue-icon';
import { mdiTrashCan, mdiPencil } from '@mdi/js';

const emit = defineEmits(['delete', 'edit']);
</script>

<template>
    <TableCell class="flex justify-center">
        <Button color="alternative" @click="emit('edit')">
            <svgIcon type="mdi" :path="mdiPencil" />
        </Button>
        <Button color="red" class="ml-4" @click="emit('delete')">
            <svgIcon type="mdi" :path="mdiTrashCan" />
        </Button>
    </TableCell>
</template>
