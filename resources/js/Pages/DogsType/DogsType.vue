<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import routes from '@/Helpers/routes';
import NewItem from '@/Components/General/NewItem.vue';
import DogsTypeTable from '@/Components/DogsType/DogsTypeTable.vue';
import GeneralAlert from '@/Components/Alerts/GeneralAlert.vue';
import { router } from '@inertiajs/vue3';
import {
    Pagination,
} from 'flowbite-vue';
import { ref } from 'vue';

const { data } = defineProps({
    data: Object,
});

const page = ref(data.current_page);
const previous = ref(data.current_page);
const total = data.total;
const dogsType = data.data;
const perPage = data.per_page;

const handlePage = () => {
    if (page.value > previous.value) {
        router.visit(data.next_page_url);
        return;
    }
    router.visit(data.prev_page_url);
};

</script>

<template>
    <DashboardLayout :selected="routes.dogsType">
        <div class="max-w-5xl mx-auto">
            <!-- Alerts -->
            <GeneralAlert :title="$page.props.flash.message"
                v-if="$page.props.flash?.message"
            />
            <GeneralAlert :title="$page.props.flash.message_info"
                v-if="$page.props.flash?.message_info" type="info"
            />

            <NewItem title="New Dog Type" @open="router.visit(route('dogs_type.create'))" />
            <div class="flex justify-end">
                <Pagination v-model="page" :total-items="total" layout="table"
                    :per-page="perPage" @page-changed="handlePage"
                />
            </div>
            <DogsTypeTable :dogs-type="dogsType" />
        </div>
    </DashboardLayout>
</template>
