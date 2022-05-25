<template>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Word</th>
            <th scope="col">Percent</th>
        </tr>
        </thead>
        <tbody v-if="topExist">
        <tr v-for="(percent, word) in top">
            <td>{{ word }}</td>
            <td>{{ percent.toFixed(2) }}%</td>
        </tr>
        </tbody>
        <tbody v-else>
        <tr>
            <td colspan="3">Empty</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "TopWordsTableComponent",
    props: {
        top: {
            type: Object,
            required: true,
        }
    },
    computed: {
        topExist() {
            return Object.keys(this.top).length > 0;
        }
    }
}
</script>

<style scoped>

</style>
