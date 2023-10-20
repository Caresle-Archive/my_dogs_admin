<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import NewItem from '@/Components/General/NewItem.vue';
import SearchInput from '@/Components/Input/SearchInput.vue';
import DogTable from '@/Components/Dog/DogTable.vue';
import DogCardGrid from '@/Components/Dog/DogCardGrid.vue';
import GeneralAlert from '@/Components/Alerts/GeneralAlert.vue';
import routes from '@/Helpers/routes';
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';
import {
    Button,
    Select,
    Pagination,
} from 'flowbite-vue';

const { data, dogsTypes } = defineProps({
    data: Object,
    dogsTypes: Array,
});


const total = data.total;
const page = ref(data.current_page);
const previous = ref(data.current_page);
const perPage = data.per_page;
const dogs = data.data;

// 0 -> Card view / 1 -> Table view
const view = ref(0);

const handleChangeView = () => {
    if (view.value == 0) {
        view.value = 1;
        return;
    }

    view.value = 0;
}

const handlePage = () => {
    if (page.value > previous.value) {
        router.visit(data.next_page_url);
        return;
    }
    router.visit(data.prev_page_url);
};

const dogsOptions = dogsTypes.map(e => ({ value: e.id, name: e.name }));

</script>

<template>
    <DashboardLayout :selected="routes.dogs">
        <div class="max-w-5xl mx-auto">
            <GeneralAlert :title="$page.props.flash.message"
                v-if="$page.props.flash?.message"
            />
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <NewItem title="New Dog" @open="router.visit(route('dogs.create'))" />
                    <Button @click="handleChangeView" outline class="ml-5">
                        ChangeView
                    </Button>
                </div>

                <!-- Filter options -->
                <Select placeholder="Select Dog Type for search"
                    :options="dogsOptions"
                />
                <div class="w-1/3">
                    <SearchInput placeholder="Search" />
                </div>
            </div>
            <div>
                <Pagination :total-items="total" :per-page="perPage" layout="table"
                    v-model="page" @page-changed="handlePage"
                />
            </div>
            <Transition>
                <DogCardGrid :dogs="dogs" v-if="view == 0"/>
                <DogTable :dogs="dogs" v-else />
            </Transition>
        </div>
    </DashboardLayout>
</template>

<style scoped>
/* we will explain what these classes do next! */
.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
