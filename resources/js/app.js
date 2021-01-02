/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
Vue.config.productionTip = false;
import './bootstrap'
import './components/partials/index';
import Notifications from 'vue-notification';
import velocity      from 'velocity-animate'
Vue.use(Notifications,{ velocity })
import firebase from 'firebase/app';
window.FB=firebase;
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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

window.MainViewApp = new Vue({
    el: '#app',
    data(){
        return {
            userLoggedIn:false,
            user:{},
            sessionStarted:false
        };
    },
    mounted() {
        this.triggerLoading();
   //     console.log()
    },
    methods:{

        openLoginModel(){

        },
        signOutUser(){
            this.$refs['login-model'].signOutUser();
        },

        userAuthStateChage(v,user){
            this.sessionStarted=true;

            this.userLoggedIn=v;
            if(!this.userLoggedIn && (window.location.pathname=='/user'||window.location.pathname=='/vendor'))this.clickLoginBtn();
            this.user=user;
        },

        clickLoginBtn(){
            var th=this;

                th.$refs.loginBtn.click();


            return true;
        },

        click(url){
            window.location.href=url;
        },
        triggerLoading(){

        }
    }
});
