<script setup>
import {
    TheCard,
    Heading,
    Input,
} from 'flowbite-vue';
import { useForm } from '@inertiajs/vue3';
import SwitchTheme from '@/Components/Theme/SwitchTheme.vue';
import GeneralAlert from '@/Components/Alerts/GeneralAlert.vue';
import AuthButton from '@/Components/General/AuthButton.vue';

const form = useForm({
    username: '',
    password: '',
});

const submit = () => {
    form.post(route('login', {
        onFinish: () => form.reset('password')
    }));
};

defineProps({
    errors: Object,
});
</script>

<template>
    <div class="flex justify-center align-middle my-14 w-full">
        <TheCard class="w-full" variant="image">
            <GeneralAlert type="danger" :title="errors.general" v-if="errors.general" />
            <form @submit.prevent="submit">
                <div class="text-center">
                    <Heading tag="h1">Login</Heading>
                </div>
                <div class="w-[128px] mx-auto mt-2">
                    <img src="/logo.png" />
                </div>
                <div class="my-6">
                    <!-- Username -->
                    <div class="mb-4">
                        <Input placeholder="Username" label="Username"
                        v-model="form.username"
                        />
                        <!-- USername errors -->
                        <div class="text-red-500">
                            {{ errors.username }}
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <Input v-model="form.password"
                        placeholder="Password" label="Password" type="password"
                        />
                        <!-- Password errors -->
                        <div class="text-red-500">
                            {{errors.password}}
                        </div>
                    </div>
                    <AuthButton title="Login" />
                </div>
            </form>
            <SwitchTheme />
        </TheCard>
    </div>
</template>
