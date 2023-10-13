<script setup>
import { Input } from 'flowbite-vue';
import svgIcon from '@jamescoyle/vue-icon';
import {
    mdiMagnify,
} from '@mdi/js';

defineProps({
    placeholder: String,
})

</script>

<template>
    <Input :placeholder="placeholder">
        <template #prefix>
            <svgIcon :path="mdiMagnify" type="mdi"
                class="dark:text-white"
            />
        </template>
    </Input>
</template>
