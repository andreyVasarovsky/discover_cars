<template>
    <div class="row file-content-wrapper" v-loading="loading">
        <div class="col-12">
            <file-upload-component @uploaded="loadFilesList"></file-upload-component>
            <file-list-view-component :file-list="fileList" @selected="fileSelected"></file-list-view-component>
        </div>
        <div class="col-12 col-md-6 mt-4">
            <top-words-table-component :top="top"></top-words-table-component>
        </div>
        <div class="col-12 col-md-6 mt-4">
            <top-words-chart-component :top="top"></top-words-chart-component>
        </div>
    </div>
</template>

<script>

import {ElMessage} from 'element-plus'
import FileUploadComponent from "./FileUploadComponent";
import FileListViewComponent from "./FileListViewComponent";
import TopWordsTableComponent from "./Top/TopWordsTableComponent";
import TopWordsChartComponent from "./Top/TopWordsChartComponent";

export default {
    name: "FileComponent",
    components: {
        FileUploadComponent, FileListViewComponent, TopWordsTableComponent, TopWordsChartComponent
    },
    data() {
        return {
            fileList: [],
            top: {},
            loading: false,
        }
    },
    async created() {
        await this.loadFilesList();
    },
    methods: {
        fileSelected(filename) {
            this.loading = true;
            axios.get(`/api/file/${filename}`).then(response => {
                this.top = response.data.data;
            }).catch((error) => {
                ElMessage.error(error.message);
                this.top = {};
            }).finally(() => {
                this.loading = false;
            });
        },
        loadFilesList() {
            axios.get(`/api/file`).then(response => {
                this.fileList = response.data;
            }).catch((error) => {
                ElMessage.error(error.message);
            });
        }
    }
}
</script>

<style scoped>

</style>
