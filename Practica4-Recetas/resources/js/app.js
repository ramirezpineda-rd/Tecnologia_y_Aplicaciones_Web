/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import 'owl.carousel';//Para cargar el archivo de carousel de javascript


import VueSweetalert2 from 'vue-sweetalert2';

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.use(VueSweetalert2);//Para que se pueda usar el ueSweetalert2
Vue.config.ignoredElements = ['trix-editor','trix-toolbar'];//Trix-editor no es un componente, por lo tanto se debe ignorar.
Vue.component('fecha-receta', require('./components/FechaReceta.vue').default)//Componente para la fecha de creación de la receta.
Vue.component('eliminar-receta', require('./components/EliminarReceta.vue').default)//Componente para la eliminación de la receta.
Vue.component('like-button', require('./components/LikeButton.vue').default)//Componente para la eliminación de la receta.

console.log(Vue.prototype);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

//Carousel

jQuery$(document).ready(function(){
    jQuery$('.owl-carousel').owlCarousel({
        margin:10,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        responsive:{// Esto para acomodar al tamaño hacia los dispositivos, 
            //celular, computadora o tablet
            0 : { // A los 0 pixeles muestra un objeto.
                items: 1
            },
            600: {
                items: 2

            },
            1000:{
                items: 3
            }
        }
    });
});



