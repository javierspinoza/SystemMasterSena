/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: Axios } = require('axios');

require('./bootstrap');

window.$ = window.jQuery = require('jquery');

window.Vue = require('vue');



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('libro', require('./components/Libro.vue'));
Vue.component('notification', require('./components/Notification.vue'));
Vue.component('areas', require('./components/Area.vue'));
Vue.component('arl', require('./components/Arl.vue'));
Vue.component('banco', require('./components/Banco.vue'));
Vue.component('pension', require('./components/Pension.vue'));
Vue.component('salud', require('./components/Salud.vue'));
Vue.component('supervisor', require('./components/Supervisor.vue'));
Vue.component('datoscompletos', require('./components/Datoscompletos.vue'));
Vue.component('oficina', require('./components/Oficina.vue'));
Vue.component('recurso', require('./components/Recurso.vue'));
Vue.component('contratista', require('./components/Contratista.vue'));
Vue.component('aprendiz', require('./components/Aprendiz.vue'));
Vue.component('contrato', require('./components/Contrato.vue'));
Vue.component('ficha', require('./components/Ficha.vue'));
Vue.component('detfichaaprendiz', require('./components/DetFichaAprendiz.vue'));


const app = new Vue({
    el: '#app',
    // props: ["ruta"],

    data: {
        menu: 0,
        notifications: [],
        ruta: "http://localhost/SystemMasterSena/public/",
    },
    created(){
        let me = this;
        axios.post(this.ruta + 'notification/get').then(function(response){
            // console.log(response.data);
            me.notifications=response.data;
        }).catch(function(error){
            console.log(error);
        });

        var userId = $('meta[name="userId"]').attr('content');

        Echo.private('App.User.' + userId).notification((notification) => {
            // console.log(notification);
            me.notifications.unshift(notification);
        });
    }
});