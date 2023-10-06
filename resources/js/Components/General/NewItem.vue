<script setup>
import {
    Button,
} from 'flowbite-vue';
import svgIcon from '@jamescoyle/vue-icon';

import {
    mdiPlusCircle,
} from '@mdi/js';

defineProps({
    title: {
        type: String,
        default: '',
    },
});

const emit = defineEmits(['open']);
const emitOpen = () => emit('open');
</script>

<template>
    <Button color="green" @click="emitOpen">
        <template #prefix>
            <svgIcon type="mdi" :path="mdiPlusCircle"/>
        </template>
        {{ title }}
    </Button>
</template>
