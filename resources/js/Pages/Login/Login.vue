<script setup>
import {
    TheCard,
    Heading,
    Input,
    Button,
} from 'flowbite-vue';
import { useForm } from '@inertiajs/vue3';
import SwitchTheme from '@/Components/Theme/SwitchTheme.vue';

const form = useForm({
    username: '',
    password: '',
});

const submit = () => {
    form.post(route('login', {
        onFinish: () => form.reset('password')
    }));
};

</script>

<template>
    <div class="flex justify-center align-middle my-14 w-full">
        <TheCard class="w-full" variant="image">
            <form @submit.prevent="submit">
                <div class="text-center">
                    <Heading tag="h1">Login</Heading>
                </div>
                <div class="w-[128px] mx-auto mt-2">
                    <img src="/logo.png" />
                </div>
                <div class="my-6">
                    <Input placeholder="Username" label="Username" class="mb-4"
                        v-model="form.username"
                    />
                    <Input class="mb-4" v-model="form.password"
                        placeholder="Password" label="Password" type="password"
                    />
                    <Button class="w-full scale-95 hover:scale-100 transition-all">
                        Login
                    </Button>
                </div>
            </form>
            <SwitchTheme />
        </TheCard>
    </div>
</template>
