import './bootstrap';

import { createApp } from 'vue'
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';

import ViewTree from './components/ViewTree.vue'
import ViewFamily from './components/ViewFamily.vue'
import AddMember from './components/AddMember.vue'
import ShowMember from './components/ShowMember.vue'

const app = createApp({});
app.component('VueDatePicker', VueDatePicker)
app
    .component('ViewTree', ViewTree)
    .component('ViewFamily', ViewFamily)
    .component('AddMember', AddMember)
    .component('ShowMember', ShowMember)
;

app.mount('#app')
