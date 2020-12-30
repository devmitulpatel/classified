


Vue.component('login-section',
    {

        data() {
            return {

                input: {
                    username: "",
                    password: ""
                },
                form:{

                },
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
            error:[],
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
            signInClick(){
                this.signinUser(this.input.username,this.input.password);
            },
            signOutUser(){
                var th=this;
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

                    })
                    .catch((error) => {

                        var errorCode = error.code;
                        var errorMessage = error.message;
                        th.error.push({code:errorCode,message:errorMessage})
                        if(th.autoSignUpNewUser)th.signupNewUser(email,password);
                       // if(!th.autoSignUpNewUser)alert(errorMessage);

                    });
            },
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

                console.log('ok')

            },
            click(url){
                window.MainViewApp.click(url);
            }
        }


    }
    
)
