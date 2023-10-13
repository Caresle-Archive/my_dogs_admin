<script setup>
import {
    TheCard,
    Heading,
    P,
    Dropdown,
    ListGroup,
    ListGroupItem,
} from 'flowbite-vue';
import svgIcon from '@jamescoyle/vue-icon';
import {
    mdiDotsHorizontal,
    mdiPencil,
    mdiTrashCan,
} from '@mdi/js';

defineProps({
    dogs: Array,
});
</script>

<template>
    <div class="max-w-5xl mx-auto grid grid-cols-3 p-2">
        <TheCard v-for="(dog, ind) in dogs" :key="ind"
            class="mx-2 my-3"
        >
            <div class="flex items-center">
                <Heading tag="h3" class="mb-4">{{ dog.name }}</Heading>
                <Dropdown text="Bottom">
                    <template #trigger>
                        <svgIcon :path="mdiDotsHorizontal" type="mdi"
                            class="dark:text-white"
                        />
                    </template>
                    <template #default>
                        <ListGroup>
                            <ListGroupItem class="text-gray-400">
                                <svgIcon :path="mdiPencil" type="mdi" />
                                <span class="ml-4">Edit</span>
                            </ListGroupItem>
                            <ListGroupItem class="text-red-500">
                                <svgIcon :path="mdiTrashCan" type="mdi" />
                                <span class="ml-4">Delete</span>
                            </ListGroupItem>
                        </ListGroup>
                    </template>
                </Dropdown>
            </div>
            <div>
                <div>
                    <P>
                        Height: {{ dog.height }}
                    </P>
                    <P>
                        Weight: {{ dog.weight }}
                    </P>
                </div>
            </div>
        </TheCard>
    </div>
</template>
