import {createApp} from 'vue';
import router from './router/router';
import App from './App.vue'
import axios from 'axios'
 
const app = createApp(App);

app
// .use(axios)
.use(router)
.mount('#app');

