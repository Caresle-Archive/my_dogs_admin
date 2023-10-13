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
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';
import ModalNormal from '@/Components/Modal/ModalNormal.vue';

defineProps({
    dogs: Array,
});

const goToEdit = (id) => {
    router.visit(route('dogs.edit', id));
}

const openModal = (id) => {
    dogToDelete.value = id;
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};

const handleOk = () => {
    router.delete(route('dogs.destroy', dogToDelete.value), {
        onFinish: () => showModal.value = false,
    });
};

const dogToDelete = ref(0);
const showModal = ref(false);
</script>

<template>
    <div class="max-w-5xl mx-auto grid grid-cols-3 p-2">
        <ModalNormal @cancel="closeModal" title="Delete Dog"
            text="Are you sure to delete the dog?" :show="showModal"
            @ok="handleOk"
        />
        <TheCard v-for="(dog, ind) in dogs" :key="ind"
            class="mx-2 my-3"
        >
            <div class="flex items-center mb-2">
                <Heading tag="h3">{{ dog.name }}</Heading>
                <Dropdown text="Bottom">
                    <template #trigger>
                        <svgIcon :path="mdiDotsHorizontal" type="mdi"
                            class="dark:text-white"
                        />
                    </template>
                    <template #default>
                        <ListGroup>
                            <ListGroupItem class="text-gray-400"
                                @click="() => goToEdit(dog.id)"
                            >
                                <svgIcon :path="mdiPencil" type="mdi" />
                                <span class="ml-4">Edit</span>
                            </ListGroupItem>
                            <ListGroupItem class="text-red-500"
                                @click="() => openModal(dog.id)"
                            >
                                <svgIcon :path="mdiTrashCan" type="mdi" />
                                <span class="ml-4">Delete</span>
                            </ListGroupItem>
                        </ListGroup>
                    </template>
                </Dropdown>
            </div>
            <div>
                <div class="w-32 mx-auto mb-5">
                    <img src="https://placehold.co/1200x1200/fc03ba/FFFFFF/png" alt=""
                        class="rounded-full"
                    />
                </div>
                <div>
                    <P>
                        <strong>Type:</strong> {{ dog.dog_type.name }}
                    </P>
                    <P>
                        <strong>Height:</strong> {{ dog.height }}
                    </P>
                    <P>
                        <strong>Weight:</strong> {{ dog.weight }}
                    </P>
                </div>
            </div>
        </TheCard>
    </div>
</template>
