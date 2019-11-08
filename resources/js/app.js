require('./bootstrap');

window.Vue = require('vue');
import Home from './components/Home.vue';
//let home = require('./components/Home.vue').default;
new Vue({
    el: '#app',
    components:{
        'home': Home
    }
});