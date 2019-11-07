require('./bootstrap');

window.Vue = require('vue');

Vue.component('home', require('./components/Home.vue').default);

const app = new Vue({
    el: '#app'
});