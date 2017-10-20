
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',

    data: function () {
        return {
            currentPage: 'contact',

            selected: {
                name: 'Josh Williams',
                theme: null,
            },

            themes: [
                'cerulean',
                'cosmo',
                'cyborg',
                'darkly',
                'flatly',
                'journal',
                'lumen',
                'paper',
                'readable',
                'sandstone',
                'simplex',
                'slate',
                'spacelab',
                'superhero',
                'united',
                'yeti'
            ]
        }
    },
    

    methods: {
        showPage: function (pageName) {
            this.currentPage = pageName;
        },

        selectTheme: function (theme) {
            this.selected.theme = theme;
            this.showPage('confirm');
        },

        submit: function () {
            alert('Here is where we would submit to the backend');
            this.showPage('done');            
        }
    },

    mounted: function() {
    },
    
});
