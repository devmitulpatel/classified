    @php
        $cancelIcon='<i class="fal fa-times-circle"></i>';
$url=collect(
    [
        'uploadUrl'=>route('uploadUrl')
]
)->toJson();
    @endphp

<file-uploader inline-template collection="{{$collection}}" model="{{$model}}" max-file="2" :per-file-limit="5"
               :allowed-files="['jpg']" :url="{{$url}}">
    <div v-cloak class="border">
        <input type="file" name="largeFile" ref="file_input" v-on:change="file_changed " :multiple="multiple"
               class="d-none">

        <div class="border bg-gray-01 p-2 text-center py-2" ref="drop_box" @drop.prevent="file_changed"
             @dragover.prevent style="cursor: pointer" v-on:click="()=>{ this.$refs.file_input.click() }">
            <div class="">

                <div><i class="fas fa-upload fa-2x my-2 "></i></div>
                <div>Drag and Drop Files here</div>
                <div>or</div>
                <div class="btn btn-primary text-white" >Browse Files</div>


                <div>
                    <small>
                    <i>
                        max no. of File : <strong>@{{ file_limit }}</strong>, max size of per file: <strong>@{{
                            getSizeToDisplay(per_file_limit) }}</strong>, allowed file: <strong><span
                                v-for="ext in file_type_allowed">.@{{ ext }}</span></strong>
                    </i>
                </small>
                </div>

            </div>

        </div>

        <div :class="{'py-2':files_added.length>0}" v-if="files_added.length>0">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <div v-if="!uploading">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-default border btn-sm ">View</button>
                        <button type="button" class="btn btn-default border-top border-bottom btn-sm"
                                :class="{'btn-primary active':!listViewOn}" v-on:click="toggleListView">Gallery <i
                                class="fas fa-th-large"></i></button>
                        <button type="button" class="btn btn-default border-right border-top border-bottom btn-sm"
                                :class="{'btn-primary active':listViewOn}" v-on:click="toggleListView">List <i
                                class="fas fa-th-list"></i></button>
                    </div>
                </div>


                <div class="py-2">
                    <ul class="list-group">
                        <li class="list-group-item">Total File Selected :  @{{ files_added.length }} (@{{ totalFileSize() }})</li>
                    </ul>
                    <div class="btn-group btn-block btn-group-xs" role="group" aria-label="Basic example">
                        <button v-if="!alluploadFinish && !uploading" type="button" class="btn btn-danger  " v-on:click="deleteAllSelectedFile"><i class="far fa-layer-minus mr-2"></i> Delete All Selected File</button>
                        <button v-if="!alluploadFinish && !uploading" type="button" class="btn btn-success  " v-on:click="uploadStart"><i class="fas fa-upload mr-2"></i> Upload All Selected File</button>
                        <button v-if="!alluploadFinish && uploading" type="button" class="btn btn-danger" v-on:click="uploadAbort"><i class="fal fa-times-circle mr-2"></i>Cancel Upload</button>
                        <button v-if="alluploadFinish" type="button" class="btn btn-success" ><i class="fal fa-check-circle mr-2"></i>All File Uploaded</button>
                    </div>
                </div>


                <div v-if="listViewOn" class="d-flex d-flex-wrap pt-2">

                    <div class="w-100">
                        <ul class="list-group">
                            <li class="list-group-item py-1" :class="{'list-group-item-success':f.uploading_status>99 }"
                                v-for="(f,k) in (uploading)?files_processed_array:files_added">
                                <div class=" d-flex justify-content-between align-items-center">
                                    <div> <span class="  mr-2 " >
                                            <i class="fa-2x"
                                                                                                  :class="{
                                   [getIcon(f)]:true,
                                   'p-2':true
                                   }"

                                            ></i></span></div>
                                    <div class="px-2">
                                        <span v-if="( f.hasOwnProperty('uploading_status') && f.uploading_status<100 ) ||( !f.hasOwnProperty('uploading_status'))">
                                            <small>name: </small>@{{f.file_name.substring(0, 5)}}<abbr
                                                v-if="f.file_name.length>10" :title="f.file_name"> ... </abbr>.@{{f.file_ext.toLowerCase()}}
                                            <br><small>size: <span>@{{getFileSize(f)}}</span></small>
                                        </span>
                                        <small v-if="f.uploading_status>99">
                                            <small>name: </small>@{{f.file_name.substring(0, 5)}}<abbr
                                                v-if="f.file_name.length>10" :title="f.file_name"> ... </abbr>.@{{f.file_ext.toLowerCase()}}
                                            <br><small>size: <span>@{{getFileSize(f)}}</span></small>
                                        </small>
                                    </div>
                                    <div>
                                        <span class="btn btn-outline-danger  ml-2 p-2" v-on:click="deleteImage(k)"
                                               style="cursor: pointer" v-if="!uploading">{!! $cancelIcon !!}</span>
                                        <span class=" ml-2 p-2"
                                              style="cursor: pointer" v-if="f.uploading_status>99"><i class="fal fa-check-circle"></i></span>
                                    </div>

                                </div>

                                <div class="">
                                    <div v-if="!alluploadFinish && uploading && f.hasOwnProperty('uploading') && f.uploading && f.hasOwnProperty('uploading_status') && f.uploading_status>0 " class="progress">
                                        <div :class="{'bg-success':f.uploading_status>99}" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" :aria-valuenow="f.uploading_status" aria-valuemin="0" aria-valuemax="100" :style="
                                        {
                                        width: getWidth(f.uploading_status)
                                        }
                                        "></div>
                                    </div>
                                </div>

                            </li>
                        </ul>
                    </div>


                </div>

                <div v-if="!listViewOn" class="d-flex flex-wrap">
                    <div v-for="(f,k) in files_added" class="" :title="f.file_name">
                        <div class="px-1 py-2">
                            <div class="card">
                                <div class="card-header text-center">
                                    <i class="fa-2x"
                                       :class="{
                                   [getIcon(f)]:true,
                                   'p-2':true

                                   }"

                                    ></i>

                                </div>
                                <div class="card-footer px-1">
                                    <div class="d-flex flex-row justify-content-between">
                                        <div>
                                            @{{f.file_name.substring(0, 5)}}<abbr v-if="f.file_name.length>10"
                                                                                  :title="f.file_name"> ... </abbr>.@{{f.file_ext.toLowerCase()}}
                                            <br><small class="text-right">size: <strong>@{{getFileSize(f)}}</strong></small>
                                        </div>

                                    </div>
                                    <div class="w-100"><span class="btn btn-block btn-sm btn-outline-danger"
                                                             v-on:click="deleteImage(k)" v-if="!uploading">{!! $cancelIcon !!}</span></div>



                                </div>
                            </div>


                        </div>


                    </div>

                </div>


            </div>

        </div>

    </div>

</file-uploader>
