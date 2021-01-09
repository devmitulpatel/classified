
import { v4 as uuidv4 } from 'uuid';
Vue.component('file-uploader', {
    props:['collection','model','maxFile','perFileLimit','allowedFiles','url','updateModelMethod','updateModelName'],
    data() {
        return {

            files_array: {},
            files_processed_array: [],
            files_added: [],
            multiple: true,
            file_type_allowed: ['*'],
            file_limit: 2,
            per_file_limit: 1,
            chunk_size: 1024 * 1024 * 0.1,
            listViewOn: false,
            uploading: false,
            findished_upload: [],
        }


    },
    mounted() {
        this.file_limit=this.maxFile??1;
        this.file_type_allowed=this.allowedFiles??['*'];
        this.per_file_limit=(this.perFileLimit ??5)*1024*1024;
        this.chunk_size=1024 *20;
    },
    computed:{
        alluploadFinish(){
            var result=this.files_processed_array.length == this.findished_upload.length;
            if(result)  this.updateToRoot();
            return result;
        },
    },
    methods:{
        updateToRoot(){
            var method=this.updateModelMethod??'updateFromOther';
            var k=this.updateModelName??"uplodbox";
            var data =this.findished_upload.map(x=>{
                var dt={
                        collection:x.collection,
                        file_ext:x.file_ext,
                        file_id:x.file_id,
                        file_name:x.file_name,
                        file_size:x.file_size,
                        final_path:x.final_path,
                        model:x.model,
                        upload_finish:x.upload_finish
                };
                return dt;
            })
            this.$parent[method](k,data);
        },
        async uploadStart(){
            this.uploading=true;
            this.listViewOn=true;

            for (var x in this.files_processed_array){

                await this.uploadFile(x,this.files_processed_array[x]);
            }
            this.updateProcessFilesArray();
        },
        getWidth(p){
            return [p,"%"].join('');
        },
        async uploadFile(k,f){
            var url= this.url.uploadUrl;
            this.files_processed_array[k].uploading=true;
            this.files_processed_array[k].uploading_status=1;
            this.files_processed_array[k].uploaded_chunk=[];
            this.files_processed_array[k].failed_chunk=[];
            var totalPart=f.file_chunk_data.length;
            var th=this;
            var fileId='new';
            for (var x in f.file_chunk_data){
                var DataToUpload={
                    collection:this.collection,
                    model:this.model,
                    file_name:f.file_name,
                    file_ext:f.file_ext,
                    file_size:f.file_size,
                    current_part:x,
                    //current_part_data:f.file_chunk_data[x],
                    total_part:totalPart
                };

                DataToUpload.file_id=fileId;

                var dataFinal = new FormData();
                for( var dt in DataToUpload){
                    dataFinal.append(dt,DataToUpload[dt]);
                }
                dataFinal.append('current_part_data',f.file_chunk_data[x]);

                await  axios.post(url,dataFinal).then(res=>{

                    th.files_processed_array[k].uploaded_chunk.push(res.data.ResponseData);
                    th.files_processed_array[k].uploading_status= (th.files_processed_array[k].uploaded_chunk.length *100 )/totalPart;
                    th.files_processed_array[k].file_id= res.data.ResponseData.file_id;
                    fileId=res.data.ResponseData.file_id;
                    if(res.data.ResponseData.hasOwnProperty('upload_finish')) {
                        th. findished_upload.push( res.data.ResponseData);
                        th.files_processed_array[k].upload_finish = res.data.ResponseData.upload_finish;
                    }
                }).catch(er=>{

                    th.files_processed_array[k].failed_chunk.push(DataToUpload);
                }).finally(()=>{

                    if(th.files_processed_array[k].failed_chunk.length<1){
                        th.updateProcessFilesArray();
                    }else{
                        for (var i in th.files_processed_array[k].failed_chunk){
                            var DataToUpload={
                                collection:this.collection,
                                model:this.model,
                                file_name:f.file_name,
                                file_ext:f.file_ext,
                                file_size:f.file_size,
                                current_part:i,
                                current_part_data:f.failed_chunk[i],
                                total_part:totalPart
                            };
                            axios.post(url,DataToUpload).then(res=>{
                                th.files_processed_array[k].uploaded_chunk.push(res.data.ResponseData);
                                th.files_processed_array[k].uploading_status= (th.files_processed_array[k].uploaded_chunk.length *100 )/totalPart;
                                th.files_processed_array[k].file_id= res.data.ResponseData.file_id;
                                if(res.data.ResponseData.hasOwnProperty('upload_finish')) {
                                    th. findished_upload.push( res.data.ResponseData);
                                    th.files_processed_array[k].upload_finish = res.data.ResponseData.upload_finish;
                                }
                            }).catch(er=>{
                                th.files_processed_array[k].failed_chunk.push(DataToUpload);
                            }).finally(()=>{ th.updateProcessFilesArray();    })
                        }
                    }


                });
              //  console.log( th.files_processed_array[k].failed_chunk.length);

            }
           // console.log(url);
        },



        updateProcessFilesArray(){
            var old=this.files_processed_array;
            this.files_processed_array=null;
            this.files_processed_array=old;
        },
        uploadAbort(){
            this.uploading=false;
            this.findished_upload={};
        },
        toggleListView(){
            this.listViewOn=(this.listViewOn)?false:true;
        },

        getSizeToDisplay(v){
            var unit="MB";
            v=(v/(1024*1024)).toFixed(2);
            if(v<1){
                v=(v *(1024)).toFixed(2);
                unit="KB";
            }
            if(v>999){
                v=(v/(1024)).toFixed(2);
                unit="GB";
            }
            return [v,unit].join(' ');
        },
        deleteAllSelectedFile(){

            this.files_added=[];

            this.notify('All Selected Files are removed from upload queue','success');
        },
        totalFileSize(){
            var total=0;
            var unit="MB"

            for (var x in this.files_added){
                total=total+this.files_added[x].file_size;
            }
            total=(total/(1024*1024)).toFixed(2);
            if(total<1){
                total=(total *(1024)).toFixed(2);
                unit="KB";
            }
            if(total>999){
                total=(total/(1024)).toFixed(2);
                unit="GB";
            }


            if(total===0)total= total.toFixed(2);
            return [total,unit].join(' ');
        },
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
            this.files_processed_array.splice(k,1);
            this.notify('Selected File is removed from upload queue','success');
        },
        file_changed(e){

            var th=this;
            this.files_array=e.target.files ?? e.dataTransfer.files;




            if(typeof this.files_array == "object"){

                for (var x in [...this.files_array]){

                    if(this.maxFile>=(this.files_added.length+1)) {
                        let file = this.files_array[x];
                        if (typeof file == "object" && x != "item" && file.size < this.per_file_limit) {

                            var reader = new FileReader();

                            let k = x;
                            let fileData = file;

                            th.handleFileRawDataFeed(null, k, 'files_processed_array', fileData)

                            // reader.addEventListener('load', (event) => {
                            //     th.handleFileRawDataFeed(event, k, 'files_processed_array', fileData)
                            // });
                            // reader.addEventListener('loadend', th.fileReadSuccefully(k, 'files_processed_array'));
                            // reader.readAsText(file);
                            // th.$notify({
                            //     group: 'ms-notfy',
                            //     clean: true
                            // });
                            th.notify('Selected Files are added in upload queue', 'success')

                        } else {
                            var file_processed = {
                                file_name: file.name.split('\\').pop().split('.')[0],
                                file_ext: file.name.split('.').pop().toLowerCase(),
                                file_size: file.size
                            };
                            th.notify([[file_processed.file_name, file_processed.file_ext].join(''), "'s size should be less than", (this.per_file_limit / (1024 * 1024)).toFixed(2), 'MB'], 'error')


                        }
                    }
                    else{
                        this.notify(['You are allowed to upload max ',this.maxFile,'files'],'error');
                    }


                }



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
        handleFileRawDataFeed(e,k,varName,file){

            if(this[varName][k] === undefined)this[varName][k]={};
            this[varName][k].file_size=file.size;

            //var rawData=e.target.result;
            var rawData=file;
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
