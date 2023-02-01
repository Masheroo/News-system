import {createApp} from 'vue';
import router from './router/router';
import App from './App.vue'
import store from './vuex/store';
 
const app = createApp(App);

app
.use(store)
.use(router)
.mount('#app');

