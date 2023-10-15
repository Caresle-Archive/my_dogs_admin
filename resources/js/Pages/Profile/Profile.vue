<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import routes from '@/Helpers/routes';
import {
    TheCard,
    Heading,
    P,
    Tabs,
    Tab,
} from 'flowbite-vue';
import PreferencesView from '@/Components/Profile/PreferencesView.vue';
import SettingsView from '@/Components/Profile/SettingsView.vue';
import { ref } from 'vue';

const activeTab = ref("0");
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
                <Tabs v-model="activeTab" variant="underline" class="p-5">
                    <Tab name="0" title="Preferences">
                        <PreferencesView />
                    </Tab>
                    <Tab name="1" title="Settings">
                        <SettingsView />
                    </Tab>
                </Tabs>
            </TheCard>
        </div>
    </DashboardLayout>
</template>
