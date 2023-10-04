<script setup>
import svgIcon from '@jamescoyle/vue-icon';
import { Link } from '@inertiajs/vue3';

defineProps({
    title: {
        type: String,
        default: ''
    },
    href: {
        type: String,
        default: '#',
    },
    icon: {
        type: String,
        default: '',
    },
    selected: {
        type: Boolean,
        default: false,
    }
});

const selectedClass = `bg-sky-500 px-2 rounded-md`
</script>

<template>
    <div class="transition-all scale-95 hover:scale-100 px-2" :class="selected ? selectedClass : ''">
        <Link :href="href" class="dark:text-white flex items-center">
            <svgIcon type="mdi" :path="icon" />
            <span class="ml-3">
                {{ title }}
            </span>
        </Link>
    </div>
</template>
