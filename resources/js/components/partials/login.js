import Multiselect from 'vue-multiselect'
Vue.component('multiselect', Multiselect)

Vue.component('login-section',
    {

        props:['urls'],
        components: {
            Multiselect
        },

        data() {
            return {

                input: {
                    username: "",
                    password: "",
                    password_confirmation: "",
                    city: "",


                },
                form:{

                },
                city:require('./city.json'),
                firebase:window.FB,
                user:{},
                loggedin:false,
                autoSignUpNewUser:false,
                 config:      {
                     apiKey: "AIzaSyDguswdX7KfLrJQilUcf3PIsvGM4hS9H2Q",
                     authDomain: "cl.ms",
                     projectId: "classified-b4116",
                     storageBucket: "classified-b4116.appspot.com",
                     messagingSenderId: "950553154359",
                     appId: "1:950553154359:web:afada0bc271bafad4840b2",
                     measurementId: "G-GKQ5QWFDF5"
            },
                errorFound:false,
                error:[],
                regError:{},
                selectedCountries: [],
                countries: [],
                isLoading: false,
                validation:{
                    username: {
                        presence: true, email: true
                    }
                },
                validate: window.validate

        }},
        created() {
            require("firebase/auth");
            this.firebase.initializeApp(this.config);
            var email="mitul.a.patel19@gmail.com";
            var password="123456";
            var th = this;

         //   this.signOutUser()
            this.firebase.auth().onAuthStateChanged((user) => {
                if (user) {
                    th.loggedin=true;
                    th.user={
                        uid:user.uid,
                        email:user.email,
                        refreshToken:user.refreshToken
                    };
                    window.MainViewApp.userAuthStateChage(th.loggedin,th.user);



                } else {
                    th.loggedin=false;
                    th.user={

                    };
                    window.MainViewApp.userAuthStateChage(th.loggedin,th.user);
                 //   th.signinUser(email,password)

                }
            });

        },
        methods:{


            validateMe(v,name){
                var toValidate =v.target.value;
                if(this.validation.hasOwnProperty(name) && toValidate.length > 0 ){


                    var vResult=this.validate.single(toValidate, this.validation[name]);
                    if(vResult!==undefined){
                            if(!this.regError.hasOwnProperty(name))this.regError[name]=[];
                            for (var x in vResult){
                                var key =x;
                                if(this.regError[name].find(x=>{return x==vResult[key]}) ===undefined)this.regError[name].push(vResult[x]);
                            }

                        }
                    if(vResult===undefined){
                        if(!this.errorFound) {

                            this.regError[name] = [];
                            delete this.regError[name];

                        }
                    }


                }


            },

            updateError(){
              var old =this.this.regError;
              this.this.regError=null;
              this.this.regError=old;

            },
            checkError(name){


               if(this.regError.hasOwnProperty(name)) {

                   var dt=[...this.regError[name]];
                   console.log(dt);

               }
                return (this.regError.hasOwnProperty(name) &&  typeof this.regError[name] == 'object' )
            },
            submitFormForRegistration(){
                var url =this.urls.registerPost;
                var th = this;
                let data = {...this.input};
                data.city={...this.selectedCountries};


                axios.post(url,data).catch(e=>{

                if(e.response.data.hasOwnProperty('ResponseMessage') && typeof e.response.data.ResponseMessage == "object") {
                    th.errorFound=true;
                    th.regError = e.response.data.ResponseMessage;
                    th.input.password="";
                    th.input.confirm_password="";
                }

                });

            },
            updateInput(){
              var old=this.input;
              this.input=null;
              this.input=old;

            },
            asyncFind (query) {
                this.isLoading = true;

                    var size=5;

                  this.countries = this.city.filter(ele=>ele.toLowerCase().includes(query.toLowerCase())).slice(0, size).map(i => {
                      return {
                          text:i,
                          value:i.toLowerCase()

                      }
                  });
                    this.isLoading = false

            },
            clearAll () {
                this.selectedCountries = []
            },

            signInClick(){
                this.signinUser(this.input.username,this.input.password);
            },
            signOutUser(){
                var th=this;
                th.logOutToServer();
             th.firebase.auth().signOut();
            },
            signinUser(email,password){
                var th=this;
                th.error=[];
                th.firebase.auth().signInWithEmailAndPassword(email, password)
                    .then((user) => {
                        console.log("loggedin");
                        console.log(user);
                        console.log(user.user.uid);
                        console.log(user.user.email);
                        console.log(user.user.refreshToken);
                        th.sendDatatoServer(user.user.refreshToken);
                    })
                    .catch((error) => {

                        var errorCode = error.code;
                        var errorMessage = error.message;
                        th.error.push({code:errorCode,message:errorMessage})
                        if(th.autoSignUpNewUser)th.signupNewUser(email,password);
                       // if(!th.autoSignUpNewUser)alert(errorMessage);

                    });
            },

            sendDatatoServer(token){
                var url =this.urls.loginPost;

                var data={token:token};
                var th = this;
                axios.post(url,data).then(res=>{


                }).catch(er=>{

                    th.signOutUser();

                })
                    .finally(()=>window.location.reload());
            },
        logOutToServer(){
            var url =this.urls.logoutPost;

            var data={};

            axios.post(url,data).then(res=>{

            }).catch(er=>{

            }).finally(()=>window.location.reload());
        }
        ,
            signupNewUser(email,password){
                this.firebase.auth().createUserWithEmailAndPassword(email, password)
                    .then((user) => {
                        console.log("loggedin");
                        console.log(user);
                    })
                    .catch((error) => {
                        console.log("error");
                        var errorCode = error.code;
                        var errorMessage = error.message;
                        console.log(errorMessage);
                        // ..
                    });
            },
            submitForm(url){
                this.signInClick();
                //
                // axios
                //     .post(url,this.input)
                //     .then(function (res){})
                //     .catch((function (er){}));



            },
            click(url){
                window.MainViewApp.click(url);
            }
        }


    }

)
