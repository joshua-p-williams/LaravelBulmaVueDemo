
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
            signup_id: null,

            selected: {
                name: null,
                email: null,
                theme: null,
            },

            currentPage: 'contact',

            errorMessage: null,
            errorDetails: null,
            submitting: false,

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
            ],

            lastImageName: null,
            images: [

            ],
        }
    },
    

    methods: {
        showPage: function (pageName) {
            this.currentPage = pageName;
        },

        resetErrors: function () {
            this.submitting = false;
            this.errorMessage = null;
            this.errorDetails = null;
        },

        selectTheme: function (theme) {
            this.selected.theme = theme;
            this.showPage('confirm');
        },

        handleError: function (error) {
            this.errorMessage = error.message;
            this.errorDetails = null;
            if (error.errors) {
                this.errorDetails = [];
                for (var property in error.errors) {
                    if (error.errors.hasOwnProperty(property)) {
                        this.errorDetails.push(property + ' - ' + error.errors[property][0]);
                    }
                }
            }            
        },

        submit: function () {
            this.resetErrors();
            this.submitting = true;

            axios.post('/api/signup/submit', this.selected)
            .then((response) => {
                this.submitting = false;
                this.resetErrors();
                this.signup_id = response.data.id;
                this.showPage('images');
            })
            .catch((error) => {
                this.submitting = false;
                this.handleError(error.response.data);
            });
        },

        uploadImage: function () {
            var image = null;
            var imageInput = document.getElementById('imageToUpload');
            if (imageInput && imageInput.files && imageInput.files[0]) {
                image = imageInput.files[0];

                this.lastImageName = image.name;

                var formData = new FormData();
                formData.append('image', image);
                formData.append('type', 'default'); // This can be customized
                formData.append('signup_id', this.signup_id);
                formData.append('email', this.selected.email); // Use the email address as a sort of api security key
                
                axios({
                    method: 'post',
                    url: '/api/signup/uploadImage',
                    data: formData
                })
                .then((response) => {
                    this.submitting = false;
                    this.resetErrors();
                    this.images.push(response.data);
                })
                .catch((error) => {
                    this.submitting = false;
                    this.handleError(error.response.data);
                });
                    
            }
        }
    },

    mounted: function() {
    },
    
});
