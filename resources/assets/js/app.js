
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Velocity from 'velocity-animate'

// window.Vue.use(Velocity);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 // This is a global mixin, it is applied to every vue instance
Vue.mixin({
    data: function() {
      return {
        default_duration : 300,
        model : {
            users: {
                'no' : 'No',
                'name' : 'Nama',
                'email' : 'Email',
                'role' : 'Role'
            },
            role: [
                'Role',
                'Permission'
            ],
            permission: [
                'Permission'
            ]
        },
      }
    }
})

Vue.component('scale-loader', require('vue-spinner/src/ScaleLoader.vue'));
Vue.component('fade-transition', require('./components/partials/FadeTransition.vue'));
Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Register Component
Vue.component('bootstrap-table', require('./components/partials/BootstrapTable.vue'));

const app = new Vue({
    el: '#app',
});
