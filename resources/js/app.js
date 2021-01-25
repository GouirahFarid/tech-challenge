/*require('./bootstrap');*/
import Vue from 'vue';
import  VueRouter from 'vue-router'
import routes from "./routes";
import vSelect from 'vue-select'
import store from "./store/store";
import VueConfirmDialog from 'vue-confirm-dialog'
import 'vue-select/dist/vue-select.css';
import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)
Vue.component('v-select', vSelect)
Vue.use(VueRouter)
Vue.use(VueRouter);
Vue.use(VueConfirmDialog)
Vue.component('vue-confirm-dialog', VueConfirmDialog.default)
let app=new Vue({
    el:'#app',
    router:new VueRouter(routes),
    store
})
