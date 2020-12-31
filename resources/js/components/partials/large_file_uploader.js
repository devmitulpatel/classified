

Vue.component('file-uploader', {
    props:['collection','model','maxFile','perFileLimit','allowedFiles'],
    data() {
        return {

            files_array:{},
            files_processed_array:[],
            files_added:[],
            multiple:true,
            file_type_allowed:['*'],
            file_limit:2,
            per_file_limit:1,
            chunk_size:1024 * 1024 * 1,

        };
    },
    mounted() {
        this.file_limit=this.maxFile??1;
        this.file_type_allowed=this.allowedFiles??['*'];
        this.per_file_limit=(this.perFileLimit ??5)*1024*1024;

    },
    methods:{
        getFileSize(f){
            var size=0;
            var unit="MB"

            size=(f.file_size/(1024*1024)).toFixed(2);

            if(size<1){
                size=(f.file_size/(1024)).toFixed(2);
                unit="KB";
            }
            if(size>999){
                size=(f.file_size/(1024*1024*1024)).toFixed(2);
                unit="GB";
            }

            return [size,unit].join(' ');


        },
        getIcon(f){
            var icon="fas fa-file-upload";
            var icons={
                image:"fas fa-file-image",
                video:"fas fa-file-video",
                pdf:"fas fa-file-pdf",
                excel:"fas fa-file-excel",
                document:"fas fa-file",
                compressed:"fas fa-file-archive",

            };

            switch (f.file_ext) {
                case 'png':
                    icon=icons.image;
                    break;
                case 'jpg':
                    icon=icons.image;
                    break;
                case 'jpeg':
                    icon=icons.image;
                    break;
                case 'svg':
                    icon=icons.image;
                    break;
                case 'mp4':
                    icon=icons.video;
                    break;
                case '3gp':
                    icon=icons.video;
                    break;
                case 'pdf':
                    icon=icons.pdf;
                    break;
                case 'txt':
                    icon=icons.document;
                    break;
                case 'zip':
                    icon=icons.compressed;
                    break;

            }

            return  icon;
        },
        deleteImage(k){
            this.files_added.splice(k,1);

        },
        file_changed(e){
            var th=this;
            this.files_array=e.target.files ?? e.dataTransfer.files;




            if(typeof this.files_array == "object" ){

                for (var x in [...this.files_array]){
                    let  file =this.files_array[x];


                    if( typeof  file == "object"  && x !="item" && file.size < this.per_file_limit){

                        var reader = new FileReader();

                        let k=x;
                        let fileData=file;

                        reader.addEventListener('load',(event)=>{th.handleFileRawDataFeed(event,k,'files_processed_array',fileData)} );
                        reader.addEventListener('loadend',th.fileReadSuccefully(k,'files_processed_array'));
                        reader.readAsBinaryString(file);

                        // var file_processed={
                        //     file_name: file.name.split('\\').pop().split('.')[0],
                        //     file_ext: file.name.split('.').pop().toLowerCase(),
                        //     file_size:file.size
                        // };

                      //  if(this.files_processed_array[x] ===undefined)this.files_processed_array[x]={};

                      //  for (var i in file_processed)this.files_processed_array[x][i]=file_processed[i];



                    }
                    else{
                        var file_processed={
                            file_name: file.name.split('\\').pop().split('.')[0],
                            file_ext: file.name.split('.').pop().toLowerCase(),
                            file_size:file.size
                        };
                        th.$notify({
                            group: 'ms-notfy',
                            title: 'Opps',
                            text: [[file_processed.file_name,file_processed.file_ext].join('') ,"'s size should be less than",this.per_file_limit/ (1024*1024),'MB'].join(' '),
                            type:'error'
                        });



                    }


                }



            }




        },
        handleFileRawDataFeed(e,k,varName,file){

            if(this[varName][k] === undefined)this[varName][k]={};
            this[varName][k].file_size=file.size;

            var rawData=e.target.result;
            this[varName][k].file_raw_data=rawData;

            var fileSize   = this[varName][k].file_size-1;
            var chunkSize  =  this.chunk_size;
            var start = 0;

            var part=Math.ceil(fileSize/chunkSize);

            var chunkData=[];
            for (var i = 0; i < part; i++){
                chunkData.push(rawData.slice(start,start+chunkSize));
                start = (start+chunkSize)+1;
            }
            this[varName][k].file_chunk_data=chunkData;

            var file_processed={
                file_name: file.name.split('\\').pop().split('.')[0],
                file_ext: file.name.split('.').pop().toLowerCase(),
                file_size:file.size
            };

            for (var i in file_processed)this.files_processed_array[k][i]=file_processed[i];



            var objetaD={};

            for (var i in this.files_processed_array[k])objetaD[i]=this.files_processed_array[k][i];
            this.files_added.push(objetaD);
            ///console.log(objetaD);
        },
        fileReadSuccefully(k,varName,updateName="files_processed_array"){
            //
            // var th=this;
            // let keyq =k;
            // th.$nextTick(() => {
            //     console.log( th.files_added);
            //     th.files_added.push(th.files_processed_array[keyq]);
            // });

        },



    },


});
