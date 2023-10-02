<script setup>
import {
    Navbar,
    NavbarCollapse,
    Avatar,
    Dropdown,
    ListGroup,
    ListGroupItem,
} from 'flowbite-vue';
import CustomLink from '@/Components/General/CustomLink.vue';
import SwitchTheme from '@/Components/Theme/SwitchTheme.vue';
import {
    mdiAccountGroup,
    mdiAccountKey,
    mdiDog,
    mdiDogSide,
    mdiHome,
    mdiAccount,
    mdiLogout,
} from '@mdi/js';
</script>

<template>
    <main>
        <Navbar solid>
            <!-- Navigation Menu -->
            <template #default="{isShowMenu}">
                <NavbarCollapse :is-show-menu="isShowMenu">
                    <CustomLink :href="route('dashboard')" :icon="mdiHome" title="Home" />
                    <CustomLink :href="route('dogs')" :icon="mdiDog" title="Dogs" />
                    <CustomLink :href="route('dogs_type')" :icon="mdiDogSide" title="Dogs Type" />
                    <CustomLink :href="route('users')" :icon="mdiAccountGroup" title="Users" />
                    <CustomLink :href="route('rol')" :icon="mdiAccountKey" title="Rol" />
                </NavbarCollapse>
            </template>

            <!-- Profile menu -->
            <template #right-side>
                <div class="mr-4 w-full">
                    <Dropdown placement="left">
                        <template #trigger>
                            <Avatar bordered rounded img="https://placehold.co/600x600/1eb387/FFFFFF/png" />
                        </template>
                        <ListGroup>
                            <ListGroupItem>
                                <CustomLink :icon="mdiAccount" title="Profile" />
                            </ListGroupItem>
                            <ListGroupItem>
                                <CustomLink title="Log Out" :icon="mdiLogout" />
                            </ListGroupItem>
                        </ListGroup>
                    </Dropdown>
                </div>
                <SwitchTheme />
            </template>
        </Navbar>
        <div class="p-4">
            <slot />
        </div>
    </main>
</template>
