// import vuejs_paginate from "vuejs-paginate";
import Vue from "vue";
import axios from "axios";

window.axios = axios;

Vue.component('search-form', require('./components/SearchFormComponent.vue').default);
// Vue.component('search-result', require('./components/SearchResultComponent.vue'));
// Vue.component('paginate', vuejs_paginate);

const app = new Vue({
    el: '#app'
});
