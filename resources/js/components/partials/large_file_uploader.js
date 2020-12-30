
var template='<div>' +
    '<input type="file" name="largeFile" ref="file_input" v-on:change="file_changed">' +
    '</div>' ;


Vue.component('file-uploader', {
    data() {
        return {
            current_file_fake_path:null,
            current_file_ext:null,
            current_file_name:null,
            current_raw_file_data:null,
            current_file_size:null,
            current_raw_file_data_debug:null,
        };
    },
    template: template,
    watch:{
        current_file(newVal){

        }
    },
    methods:{
        file_changed(e){
            this.current_file_fake_path=this.$refs.file_input.value;
            this.current_file_name=this.$refs.file_input.value.split('\\').pop().split('.')[0];
            this.current_file_ext=  this.$refs.file_input.value.split('.').pop();
            var files = e.target.files; // FileList object

            // use the 1st file from the list
            f = files[0];
            var reader = new FileReader();
            var th = this ;
            reader.onload = this.handleFileRawDataFeed;
            this.current_file_size=e.target.files[0].size
            reader.readAsText(e.target.files[0]);

        },
        handleFileRawDataFeed(e,file){
            // var next_slice = start + slice_size + 1;
            // var blob = file.slice( start, next_slice );

            var loaded = 0;
            var step = (1024*1024)*10;
            var total =this.current_file_size;
            var start = 0;

            this.current_raw_file_data_debug = e.target.result.slice(start,step);




            this.current_raw_file_data=e.target.result;


        }
    },


});
