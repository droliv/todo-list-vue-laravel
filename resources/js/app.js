require('./bootstrap');

window.Vue = require('vue');

let home = require('./components/Home.vue').default;
let container = require('./components/TasksContainer.vue').default;

const app = new Vue({
    el: '#app',
    components:{
        'home-component':home,
        'tasks-container':container
    }
});