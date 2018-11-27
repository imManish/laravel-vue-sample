require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import {routes} from './router/routes';
import StoreData from './storage/store';
import MainApp from './components/MainApp.vue';
import {initialize} from './helpers/general';
import vbclass from 'vue-body-class'
import ToggleButton from 'vue-js-toggle-button'
import Vuetify from 'vuetify'

//Defination to use Vuex, VueRouter
Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(ToggleButton);
Vue.use(Vuetify);

// Vue Store the Request
const store = new Vuex.Store(StoreData);
// Vue Router call
const router = new VueRouter({
    routes,
    mode: 'history'
});
Vue.use( vbclass, router );

initialize(store, router);

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        MainApp
    },

});
