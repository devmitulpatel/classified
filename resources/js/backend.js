
import './bootstrap';
import './components/partials/index_back';
import Notifications from 'vue-notification';
import videojs from 'video.js';
require('!style-loader!css-loader!video.js/dist/video-js.css')
Vue.use(Notifications)
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

            currentVideo:{
                url:null,
                title:null
            },

            currentVideoConfig:{
                autoplay: 'muted',
                autoSetup:true,
                fluid: true,
                liveui:true,
                controls:true,
                responsive:true
            },
            videoPlayer:null,
            currentImage:{
                url:null,
                title:null,
            },
            fullscreen:false

        };

    },
    mounted(){
        this.videoPlayer =videojs(this.$refs.currentVideo, this.currentVideoConfig, function onPlayerReady() {
            console.log('onPlayerReady', this);
        })
    },

    beforeDestroy() {
        if (this.videoPlayer) {
            this.videoPlayer.dispose()
        }
    },
    methods:{
        fsToggle(){
            this.fullscreen=!this.fullscreen;
        },
        viewImage(url,filename){
            this.currentImage.url=url;
            this.currentImage.title=filename;
        },
        viewVideo(type,url,filename){
            this.currentVideo.url=url;
            this.currentVideo.title=['Video File :',filename].join(' ');


            this.videoPlayer.src({type: type, src: url})

            this.currentVideoConfig={

            };





        },
        apiCallOnClick(u="",dataRefresh=false){
           // console.log(u);
            var th= this;
            axios.get(u).then(res=>{
               var data=res.data;
               var notificationDisplay=false;

                if(data.hasOwnProperty('ResponseMessage')) {
                var msg=data.ResponseMessage;

                if(typeof msg =="object"|| typeof msg =="array"){
                    notificationDisplay=true;
                    for(var x in msg){
                        th.$notify({
                            group: 'ms-notfy',
                            title: 'Done',
                            text: msg[x],
                            type:'success'
                        });
                    }

                }

                }
            if(!notificationDisplay){
                th.$notify({
                    group: 'ms-notfy',
                    title: 'Done',
                    text: 'Successfully action taken.',
                    type:'success'
                });
            }

            //    location.reload();
            }).catch(res=>{
                var notificationDisplay=false;


                if(!notificationDisplay) {
                    th.$notify({
                        group: 'ms-notfy',
                        title: 'Opps',
                        text: 'we are facing some error,please try again.',
                        type: 'danger'
                    });
                }
            }).finally(()=>{
                location.reload();

            });


        },
        gotToUrl(url){
            window.location.href=url;
        }
    }

});


