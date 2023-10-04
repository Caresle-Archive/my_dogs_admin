<script setup>
import {
    Button,
} from 'flowbite-vue';
import svgIcon from '@jamescoyle/vue-icon';
import { mdiRefresh } from '@mdi/js';

const emit = defineEmits(['refresh']);

</script>

<template>
    <Button @click="() => emit('refresh')" class="mx-2 scale-90 hover:scale-100 transition-all"
        outline
    >
        <svgIcon type="mdi" :path="mdiRefresh" />
    </Button>
</template>
