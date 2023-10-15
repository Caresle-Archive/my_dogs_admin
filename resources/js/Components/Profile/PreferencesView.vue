<script setup>
import {
    Heading,
    Toggle,
    Button,
    P,
    TheCard,
} from 'flowbite-vue';
</script>

<template>
    <!-- Title -->
    <Heading tag="h2">Preferences</Heading>

    <!-- Content -->
    <TheCard variant="image" class="!max-w-full mt-4">
        <!-- Switch theme -->
        <div class="flex p-2 items-center">
            <Heading tag="h4">Dark Theme</Heading>
            <div>
                <Toggle />
            </div>
        </div>

        <!-- Delete Account -->
        <div class="flex p-2 border-red-500 border rounded-md flex-col">
            <Heading tag="h4" color="text-red-500">Danger Zone</Heading>
            <div class="mt-4">
                <div class="flex items-center">
                    <P color="text-yellow-500">
                        Disable your account untill you login again
                    </P>
                    <Button color="yellow" class="ml-2">Disable Account</Button>
                </div>
                <div class="flex items-center">
                    <P color="text-red-500">
                        This wil delete all the data of your account and can't be undone
                    </P>
                    <Button color="red" class="ml-2">Delete Account</Button>
                </div>
            </div>
        </div>
    </TheCard>
</template>
