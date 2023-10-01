<script setup>
import {
    Navbar,
    NavbarCollapse,
} from 'flowbite-vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <main>
        <Navbar>
            <template #default="{isShowMenu}">
                <NavbarCollapse :is-show-menu="isShowMenu">
                    <Link :href="route('dashboard')" class="dark:text-white">Home</Link>
                    <Link :href="route('dogs')" class="dark:text-white">Dogs</Link>
                    <Link :href="route('dogs_type')" class="dark:text-white">Dogs Type</Link>
                    <Link :href="route('users')" class="dark:text-white">Users</Link>
                    <Link :href="route('rol')" class="dark:text-white">Rol</Link>
                </NavbarCollapse>
            </template>
        </Navbar>
        <slot />
    </main>
</template>
