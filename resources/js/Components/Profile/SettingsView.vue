<script setup>
import {
    Heading,
    TheCard,
    Input,
    Button,
    P,
} from 'flowbite-vue';
</script>

<template>
    <Heading tag="h2">Settings</Heading>

    <TheCard variant="image" class="!max-w-full mt-4">
        <Heading tag="h4">Profile</Heading>
        <div>
            <form>
                <Input label="Username" placeholder="Username" />
                <div class="flex w-full">
                    <Input class="w-full mr-1" label="Password" placeholder="Password"
                        type="password"
                    />
                    <Input class="w-full ml-1" label="Confrim Password"
                        placeholder="Confirm Password" type="password"
                    />
                </div>
                <div class="flex justify-center">
                    <Button class="mt-2 w-1/3">Update</Button>
                </div>
            </form>
        </div>
    </TheCard>

    <TheCard class="!max-w-full mt-4" variant="image">
        <Heading tag="h4">Data</Heading>
        <div>
            <P>
                Clear Data,

            </P>
        </div>
    </TheCard>
</template>
