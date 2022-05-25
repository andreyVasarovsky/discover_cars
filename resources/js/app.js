require('./bootstrap');
import { createApp } from 'vue'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'

import FileComponent from "./components/FileComponent";

const app = createApp({
    components: {  FileComponent }
});

app.use(ElementPlus).mount('#app');
