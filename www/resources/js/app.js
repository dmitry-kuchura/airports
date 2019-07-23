/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

import Vue from "vue";

import DatePicker from 'vue2-datepicker'
import Select2 from 'v-select2-component';

Vue.component('search', require('./components/SearchComponent.vue').default);

Vue.component('date-picker', DatePicker);
Vue.component('vue-select', Select2);

new Vue({
    el: '#app',
});
