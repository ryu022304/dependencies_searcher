import Vue from 'vue';
import App from './App.vue';
import BootstrapVue from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import store from './store.js';

Vue.use(BootstrapVue);

new Vue({
    el: '#app',
    store,
    render: h => h(App),
});

