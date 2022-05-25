<template>
    <div class="chart">
        <bar v-if="topExist" :chart-data="chartData"></bar>
        <span v-else>
            Chart: Empty
        </span>
    </div>
</template>

<script>

import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'
ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
    name: "TopWordsChartComponent",
    components: { Bar },
    props: {
        top: {
            type: Object,
            required: true,
        }
    },
    computed: {
        chartData() {
            return {
                labels: Object.keys(this.top),
                datasets: [
                    {
                        label: 'Top words',
                        backgroundColor: '#f87979',
                        data: Object.values(this.top)
                    }
                ]
            };
        },
        topExist() {
            return Object.keys(this.top).length > 0;
        }
    }
}
</script>

<style scoped>

</style>
