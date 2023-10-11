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
import SideBarMenu from '@/Components/General/SideBarMenu.vue';
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
import routes from '../Helpers/routes';

defineProps({
    selected: {
        type: String,
        default: routes.dashboard,
    },
});
</script>

<template>

    <div class="flex">
        <SideBarMenu />
        <main class="w-full h-[100vh]">
            <Navbar solid>
                <!-- Navigation Menu -->
                <template #default="{isShowMenu}">
                    <NavbarCollapse :is-show-menu="isShowMenu">
                        <CustomLink :href="route('dashboard')" :icon="mdiHome" title="Home"
                            :selected="selected == routes.dashboard"
                        />
                        <CustomLink :href="route('dogs.index')" :icon="mdiDog" title="Dogs"
                            :selected="selected == routes.dogs"
                        />
                        <CustomLink :href="route('dogs_type.index')" :icon="mdiDogSide" title="Dogs Type"
                            :selected="selected == routes.dogsType"
                        />
                        <CustomLink :href="route('users.index')" :icon="mdiAccountGroup" title="Users"
                            :selected="selected == routes.users"
                        />
                        <CustomLink :href="route('rol.index')" :icon="mdiAccountKey" title="Rol"
                            :selected="selected == routes.rol"
                        />
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
    </div>

</template>
