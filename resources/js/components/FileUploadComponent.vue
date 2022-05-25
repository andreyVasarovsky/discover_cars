<template>
    <div class="row">
        <div class="col-12 file-upload text-center">
            <el-upload
                class="upload-demo"
                action="/api/file/store"
                :file-list="fileList"
                :on-success="handleSuccess"
                :on-error="handleError"
                :show-file-list="false"
                :before-remove="handleRemove">
                <el-button type="primary">Click to upload new file</el-button>
                <template #tip>
                    <div class="el-upload__tip">
                        .txt files required.
                    </div>
                </template>
            </el-upload>
        </div>
    </div>
</template>

<script>

import {ElMessage} from 'element-plus'

export default {
    name: "UploadFileComponent",
    emits: ["uploaded"],
    data() {
        return {
            fileList: [],
        }
    },
    methods: {
        handleError() {
            ElMessage.error('Oops, failed upload.')
            return false;
        },
        handleSuccess(response) {
            if (typeof response.status === "undefined" || !response.status)
                return this.handleError()
            ElMessage({
                message: 'Uploaded.',
                type: 'success',
            })
            this.$emit('uploaded')
            return true;
        },
        handleRemove() {
            ElMessage.error('Oops, you cant remove anything.')
            return false;
        }
    }
}
</script>

<style scoped>

</style>
