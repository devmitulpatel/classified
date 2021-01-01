

import Editor from '@tinymce/tinymce-vue'
Vue.component('add-listing',
    {
        components: {
            'editor': Editor
        },

        data() {
            return {
            current_input_for_open_timing: {
                day:'Monday',
                open:'09:00',
                close:'22:00',
                hr_24:false
            },


            current_open_timing:[
                {
                    day:'Monday',
                    open:'09:00',
                    close:'22:00',
                    hr_24:false
                },

                {
                    day:'Tuesday',
                    open:'09:00',
                    close:'22:00',
                    hr_24:true
                }
            ],
                openTimings:[],
                closeTimings:[],
                days:[
                    'Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                    'Saturday',
                    'Sunday',
                ]


        }},
        created() {

            for (var x=7 ;x<=15;x++){
                var time = [(x>9)?x:['0',x].join(''),'00'].join(':');
                this.openTimings.push({ text:time,value:time});
            }

            for (var x=16 ;x<=24;x++){
                var time = [(x>9)?x:['0',x].join(''),'00'].join(':');
                this.closeTimings.push({ text:time,value:time});
            }

        },
        methods:{

            click(url){
                window.MainViewApp.click(url);
            },

            file_browsercallback(field_name, url, type, win){

                console.log(field_name)
            },
            add_timings(){
                let data=this.current_input_for_open_timing;
                this.current_input_for_open_timing={day:null,
                    open:'09:00',
                    close:'22:00',
                    hr_24:false}
                this.current_open_timing.push(data)
            },

        }


    }

)
