import Vue from 'vue'
import App from './App.vue'
import posts from "./components/posts.vue";
import axios from "axios";
import VueAxios from 'vue-axios'
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(VueAxios, axios)

Vue.prototype.$axios = axios;

Vue.component('posts', posts);

Vue.config.productionTip = false
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

Vue.component(
    'importer',
    require('./components/importer/importer.vue')
);

Vue.component(
    'fieldset-default-values',
    require('./components/forms/asset-models/fieldset-default-values.vue')
);


// Commented out currently to avoid trying to load vue everywhere.
// const app = new Vue({
//     el: '#app'
// });
