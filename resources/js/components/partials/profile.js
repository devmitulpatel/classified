Vue.component('profile-section',{

    props:['user','userFromServer'],

    data(){
        return{
            currentUser:{}
        }
    },
    mounted() {
        this.currentUser=this.userFromServer;

    }

});
