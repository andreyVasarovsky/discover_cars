<template>
    <div class="row">
        <div class="col-12 file-list">
            <a href="#" @click.prevent="show = !show">
                <template v-if="show">
                    <i class="fa-solid fa-eye"></i> Hide file list
                </template>
                <template v-else>
                    <i class="fa-solid fa-eye-slash"></i> Show file list
                </template>
            </a>
            <div v-show="show" class="list-group mt-2">
                <template v-if="filesExists">
                    <button v-for="file in fileList" type="button" @click="setActiveFile(file)"
                            class="list-group-item list-group-item-action"
                            :class="{'active': file === activeFile}">
                        {{ file }}
                    </button>
                </template>
                <template v-else>
                    <button type="button" class="list-group-item list-group-item-action">Empty</button>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "FileListViewComponent",
    emits: ["selected"],
    props: {
        fileList: {
            type: Array,
            required: false,
            default: [],
        }
    },
    data() {
        return {
            activeFile: '',
            show: true,
        }
    },
    computed: {
        filesExists() {
            return this.fileList.length > 0;
        }
    },
    methods: {
        setActiveFile(file) {
            this.activeFile = file;
            this.$emit('selected', file);
        }
    }
}
</script>

<style scoped>

</style>
