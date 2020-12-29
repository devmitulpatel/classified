


Vue.component('dashboard-row-1',
    {

       data(){
           return{
               Input1:null,
               selectOption:null,
               checkBox: {},
               optionData:[
                   {
                       name:'yes',
                       value:1
                   },
                   {
                       name:'no',
                       value:0
                   }

               ],
           }
       },

       methods: {

           clickMe(){
               console.log('clicke here');
           },
           apiCallOnClick(u=""){
               window.MainViewApp.apiCallOnClick(u);
           }
       }
    });
