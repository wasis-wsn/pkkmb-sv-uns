<script setup>
import { Head } from "@inertiajs/vue3";
import { computed, ref, onMounted } from "vue";
import { useMainStore } from "@/Stores/main";
import {
    mdiAccountMultiple,
    mdiAccountGroup,
    mdiChartTimelineVariant,
    mdiMonitorCellphone,
    mdiReload,
    mdiChartPie,
    mdiSchool,
    mdiAccountMultipleOutline,
    mdiAccountSchool,
    mdiWeightLifter,
} from "@mdi/js";
import * as chartConfig from "@/Components/Charts/chart.config.js";
import LineChart from "@/Components/Charts/LineChart.vue";
import SectionMain from "@/Components/SectionMain.vue";
import CardBoxWidget from "@/Components/CardBoxWidget.vue";
import CardBox from "@/Components/CardBox.vue";
import NotificationBar from "@/Components/NotificationBar.vue";
import BaseButton from "@/Components/BaseButton.vue";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import TableSponsor from "@/Components/Sponsor/TableSponsor.vue";

const chartData = ref(null);

const fillChartData = () => {
    chartData.value = chartConfig.sampleChartData();
};

const props = defineProps({
    user: { type: Array, default: () => [] },
    mahasiswa: { type: Array, default: () => [] },
    prodi: { type: Array, default: () => [] },
    kelompok: { type: Array, default: () => [] },
    skills: { type: Array, default: () => [] },
});

onMounted(() => {
    fillChartData();
});
</script>

<template>
    <LayoutAuthenticated>
        <Head title="Dashboard" />
        <SectionMain>
            <SectionTitleLineWithButton
                :icon="mdiChartTimelineVariant"
                title="Overview"
                main
            >
            </SectionTitleLineWithButton>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 mb-6">
                <CardBoxWidget
                    trend="12%"
                    trend-type="up"
                    color="text-blue-500"
                    :icon="mdiAccountMultiple"
                    :number="user?.length || 0"
                    label="Users"
                />
                <CardBoxWidget
                    trend="12%"
                    trend-type="up"
                    color="text-orange-500"
                    :icon="mdiAccountSchool"
                    :number="mahasiswa?.length || 0"
                    label="Mahasiswa"
                />
                <CardBoxWidget
                    trend="Overflow"
                    trend-type="alert"
                    color="text-red-500"
                    :icon="mdiSchool"
                    :number="prodi?.length || 0"
                    label="Program Studi"
                />
                <CardBoxWidget
                    trend="Overflow"
                    trend-type="alert"
                    color="text-yellow-500"
                    :icon="mdiAccountGroup"
                    :number="kelompok?.length || 0"
                    label="Kelompok Mahasiswa"
                />
                <CardBoxWidget
                    trend="Overflow"
                    trend-type="alert"
                    color="text-green-500"
                    :icon="mdiWeightLifter"
                    :number="skills?.length || 0"
                    label="Skill Mahasiswa"
                />
            </div>

            <SectionTitleLineWithButton
                :icon="mdiChartPie"
                title="Trends overview"
            >
                <BaseButton
                    :icon="mdiReload"
                    color="whiteDark"
                    @click="fillChartData"
                />
            </SectionTitleLineWithButton>

            <CardBox class="mb-6">
                <div v-if="chartData">
                    <line-chart :data="chartData" class="h-96" />
                </div>
            </CardBox>

            <SectionTitleLineWithButton
                :icon="mdiAccountMultiple"
                title="Clients"
            />

            <NotificationBar color="info" :icon="mdiMonitorCellphone">
                <b>Responsive table.</b> Collapses on mobile
            </NotificationBar>

            <CardBox has-table>
                <TableSponsor />
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>
