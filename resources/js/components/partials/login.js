
Vue.component('login-section',
    {

        data() {
            return {

                input: {
                    username: "",
                    password: ""
                },
                form:{

                }
            }
        },

        methods:{
            submitForm(url){


                axios
                    .post(url,this.input)
                    .then(function (res){})
                    .catch((function (er){}));

                console.log('ok')

            }
        }


    }
)
