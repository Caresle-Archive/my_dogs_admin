<script setup>
import { router } from '@inertiajs/vue3';
import svgIcon from '@jamescoyle/vue-icon'
import { mdiArrowLeft } from '@mdi/js';
import {
    Heading,
    Button,
} from 'flowbite-vue';

defineProps({
    text: String,
    routeName: String,
});

</script>

<template>
    <div class="flex justify-evenly w-full mb-3">
        <div>
            <Button pill size="sm" color="alternative"
                @click="router.visit(routeName)"
            >
                <svgIcon type="mdi" :path="mdiArrowLeft" />
            </Button>
        </div>
        <div class="mx-auto">
            <Heading tag="h3">{{ text }}</Heading>
        </div>
    </div>
</template>
