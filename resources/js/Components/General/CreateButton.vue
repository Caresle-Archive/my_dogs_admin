<script setup>
import {
    Button,
} from 'flowbite-vue';
import svgIcon from '@jamescoyle/vue-icon';
import { mdiContentSave } from '@mdi/js';

defineProps({
    text: String,
});

</script>

<template>
    <Button class="w-full flex justify-center mt-2">
        <template #prefix>
            <svgIcon :path="mdiContentSave" type="mdi"></svgIcon>
        </template>
        {{ text }}
    </Button>
</template>
