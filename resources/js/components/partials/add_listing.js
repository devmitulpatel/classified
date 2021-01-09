

import Editor from '@tinymce/tinymce-vue'
Vue.component('add-listing',
    {
        components: {
            'editor': Editor
        },
        props:['subCategory'],

        data() {
            return {
            current_input_for_open_timing: {
                day:null,
                open:'09:00',
                close:'22:00',
                hr_24:false,
                closed:false
            },

                form:{
                    images:[],
                },
            current_open_timing:[

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
                ],
                sub_cat:[]

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
            updateSubCat(){

                    this.form.sub_category=null;
                    var parent_category_id_toSearch=this.form.category.id;
                    var sub=this.subCategory;
                    this.sub_cat= sub.filter(x=>{ return x.parent_category_id==parent_category_id_toSearch})

            },
            removeDay(t){
                var index=this.current_open_timing.findIndex(x=>{ return x.day==t.day});
                this.current_open_timing.splice(index,1);

            },

            updateFromOther(k,value){
                this.form[k]=value;
            },

            click(url){
                window.MainViewApp.click(url);
            },

            file_browsercallback(field_name, url, type, win){

                console.log(field_name)
            },
            add_timings(){

                if(this.current_input_for_open_timing.day!=null) {
                    let data = this.current_input_for_open_timing;
                    this.current_open_timing.push(data);

                    this.current_input_for_open_timing = {
                        day: null,
                        open: '09:00',
                        close: '22:00',
                        hr_24: false,
                        closed:false
                    }

                    const sorter = {
                        // "sunday": 0, // << if sunday is first day of week
                        "monday": 1,
                        "tuesday": 2,
                        "wednesday": 3,
                        "thursday": 4,
                        "friday": 5,
                        "saturday": 6,
                        "sunday": 7
                    };

                    this.current_open_timing.sort(function sortByDay(a, b) {
                        let day1 = a.day.toLowerCase();
                        let day2 = b.day.toLowerCase();
                        return sorter[day1] - sorter[day2];
                    });

                }else{
                    this.notify('Please Select day','error');
                }
            },
            notify(text,type){
                var icon="";
                switch (type){
                    case "success":
                        icon="fas fa-check-circle";
                        break;
                    case "warn":
                        icon="fas fa-info-circle";
                        break;
                    case "error":
                        icon="fas fa-exclamation-circle";
                        break;
                }

                //  console.log(typeof text);

                this.$notify({
                    group: 'ms-notfy',
                    title:  " <i class='"+icon+"'></i>",
                    text: (typeof text=='object' )?[...text].join(' '):text,
                    type:type,
                    duration: 3000,

                    //  position:"bottom"
                });

            },
        }


    }

)
