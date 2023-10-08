<script setup>
import {
    Modal,
    Heading,
    P,
    Button,
} from 'flowbite-vue';
import svgIcon from '@jamescoyle/vue-icon';
import {
    mdiClose,
    mdiCheck,
} from '@mdi/js';

defineProps({
    title: String,
    text: String,
    show: {
        type: Boolean,
        default: false,
    }
});

const emits = defineEmits(['ok', 'cancel']);
</script>

<template>
    <Modal v-if="show" @click:outside="emits('cancel')"
        @close="emits('cancel')"
    >
        <template #header>
            <Heading tag="h2" class="text-center">{{ title }}</Heading>
        </template>
        <template #body>
            <P>{{ text }}</P>
        </template>
        <template #footer>
            <div class="flex justify-end">
                <Button @click="emits('cancel')" color="alternative">
                    <template #prefix>
                        <svgIcon type="mdi" :path="mdiClose" />
                    </template>
                    Cancel
                </Button>
                <Button @click="emits('ok')" class="ml-2">
                    <template #prefix>
                        <svgIcon type="mdi" :path="mdiCheck" />
                    </template>
                    Ok
                </Button>
            </div>
        </template>
    </Modal>
</template>
