<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import {
    Heading,
    TheCard,
    Button,
    P,
} from 'flowbite-vue';
import svgIcon from '@jamescoyle/vue-icon';
import {
    mdiAccountGroup,
    mdiAccountKey,
    mdiDog,
    mdiDogSide,
} from '@mdi/js';
import { router } from '@inertiajs/vue3';

const goTo = name => {
    router.visit(name);
};

</script>

<template>
    <DashboardLayout>
        <Heading class="text-center" tag="h1">Welcome To My Dogs Admin</Heading>
        <div class="grid grid-cols-2 max-w-4xl mx-auto">
            <TheCard class="m-2 !max-w-full scale-95 transition-all hover:scale-100">
                <div class="flex items-center justify-between">
                    <svgIcon type="mdi" :path="mdiDog" class="dark:text-white w-full"
                        size="64"
                    />
                    <Heading tag="h2" class="text-center">Dogs</Heading>
                </div>
                <P class="text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Ipsa, velit. Cum quo consectetur voluptatem ducimus nesciunt
                    illum magnam deserunt rerum quae, quos quibusdam vero incidunt porro,
                </P>
                <Button class="mt-5 w-full"
                    @click="() => goTo(route('dogs.index'))"
                >
                    Go to Dogs
                </Button>
            </TheCard>
            <TheCard class="m-2 !max-w-full scale-95 transition-all hover:scale-100">
                <div class="flex items-center justify-between">
                    <svgIcon type="mdi" :path="mdiDogSide" class="dark:text-white w-full"
                        size="64"
                    />
                    <Heading tag="h2" class="text-center">Dogs Breed</Heading>
                </div>
                <P class="text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Ipsa, velit. Cum quo consectetur voluptatem ducimus nesciunt
                    illum magnam deserunt rerum quae, quos quibusdam vero incidunt porro,
                </P>
                <Button class="mt-5 w-full"
                    @click="() => goTo(route('dogs_breed.index'))"
                >
                    Go to Dogs Type
                </Button>
            </TheCard>
            <TheCard class="m-2 !max-w-full scale-95 transition-all hover:scale-100">
                <div class="flex items-center justify-between">
                    <svgIcon type="mdi" :path="mdiAccountGroup" class="dark:text-white w-full"
                        size="64"
                    />
                    <Heading tag="h2" class="text-center">Users</Heading>
                </div>
                <P class="text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Ipsa, velit. Cum quo consectetur voluptatem ducimus nesciunt
                    illum magnam deserunt rerum quae, quos quibusdam vero incidunt porro,
                </P>
                <Button class="mt-5 w-full"
                    @click="() => goTo(route('users.index'))"
                >
                    Go to Users
                </Button>
            </TheCard>
            <TheCard class="m-2 !max-w-full scale-95 transition-all hover:scale-100">
                <div class="flex items-center justify-between">
                    <svgIcon type="mdi" :path="mdiAccountKey" class="dark:text-white w-full"
                        size="64"
                    />
                    <Heading tag="h2" class="text-center">Roles</Heading>
                </div>
                <P class="text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Ipsa, velit. Cum quo consectetur voluptatem ducimus nesciunt
                    illum magnam deserunt rerum quae, quos quibusdam vero incidunt porro,
                </P>
                <Button class="mt-5 w-full"
                    @click="() => goTo(route('rol.index'))"
                >
                    Go to Roles
                </Button>
            </TheCard>
        </div>
    </DashboardLayout>
</template>
