/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

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

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data:{
        currentForm: null,
        postid: null,
        houseid: null,
    },
    methods: {
  
        openModal(e,id){
                e.preventDefault();
                //console.log(id);
                this.postid = id;
                
                //console.log(e.currentTarget);
                this.currentForm = e.currentTarget.parentNode;
                //console.log(this.currentForm);
                //$('#deleteModal-body').html(`sei sicuro di voler eliminare l' elemento con con id: ${this.itemid}`);
                $('#deleteModal').modal('show');
            },
            // previewImage(){
            //     var oFReader = new FileReader();
            //     oFReader.readAsDataURL(document.getElementById('image').files[0]);
    
            //     oFReader.onload = function(oFREvent){
            //         document.getElementById("uploadPreview").src = oFREvent.target.result;
            //     }
            // },
            submitForm(){
                this.currentForm.submit();
            },

            openModalShow(e,id){
                e.preventDefault();
                //console.log(id);
                this.houseid = id;
                
                //console.log(e.currentTarget);
                this.currentForm = e.currentTarget.parentNode;
                //console.log(this.currentForm);
                //$('#deleteModal-body').html(`sei sicuro di voler eliminare l' elemento con con id: ${this.itemid}`);
                $('#deleteModalShow').modal('show');
            },
            // previewImage(){
            //     var oFReader = new FileReader();
            //     oFReader.readAsDataURL(document.getElementById('image').files[0]);
    
            //     oFReader.onload = function(oFREvent){
            //         document.getElementById("uploadPreview").src = oFREvent.target.result;
            //     }
            // },
            submitForm(){
                this.currentForm.submit();
            }
    
    }
});
