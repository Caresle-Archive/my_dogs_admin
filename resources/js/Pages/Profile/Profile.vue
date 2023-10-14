<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import routes from '@/Helpers/routes';
import {
    TheCard,
    Heading,
    P,
} from 'flowbite-vue';
</script>

<template>
    <DashboardLayout :selected="routes.profile">
        <div class="max-w-4xl mx-auto">
            <TheCard class="!max-w-full mb-4" variant="image">
                <Heading tag="h2">Profile</Heading>
                <P class="max-w-xl my-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Perferendis magni voluptatem quos esse illo. Necessitatibus
                    doloremque qui consectetur suscipit harum enim iure.
                    Placeat ut consequatur dolore dolorem labore non alias!
                </P>
            </TheCard>
            <TheCard class="!max-w-full" variant="image">
                <Heading tag="h2">Profile</Heading>
            </TheCard>
        </div>
    </DashboardLayout>
</template>
