@php

    $cancelIcon='<i class="fal fa-times-circle"></i>';
    @endphp

<file-uploader inline-template collection="{{$collection}}" model="{{$model}}" max-file="2" :per-file-limit="5"
               :allowed-files="['jpg']">
    <div v-cloak class="border">
        <input type="file" name="largeFile" ref="file_input" v-on:change="file_changed " :multiple="multiple"
               class="d-none">

        <div class="border bg-primary p-2 text-center py-10" ref="drop_box" @drop.prevent="file_changed"
             @dragover.prevent style="cursor: pointer" v-on:click="()=>{ this.$refs.file_input.click() }">
            <p class="text-white">

                <i class="fas fa-upload fa-4x mb-2"></i><br>Click Here to Select Files <br> or <br> Just Drag Files and
                Drop here<br>
                <small>
                    <i>
                        max no. of File : <strong>@{{ file_limit }}</strong>, max size of per file: <strong>@{{
                            getSizeToDisplay(per_file_limit) }}</strong>, allowed file: <strong><span
                                v-for="ext in file_type_allowed">.@{{ ext }}</span></strong>
                    </i>
                </small>

            </p>

        </div>

        <div :class="{'py-2':files_added.length>0}" v-if="files_added.length>0">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-default border ">View</button>
                        <button type="button" class="btn btn-default border-top border-bottom "
                                :class="{'btn-primary active':!listViewOn}" v-on:click="toggleListView">Gallery <i
                                class="fas fa-th-large"></i></button>
                        <button type="button" class="btn btn-default border-right border-top border-bottom "
                                :class="{'btn-primary active':listViewOn}" v-on:click="toggleListView">List <i
                                class="fas fa-th-list"></i></button>
                    </div>
                </div>


                <div class="py-2">
                    <ul class="list-group">
                        <li class="list-group-item">Total File Selected :  @{{ files_added.length }} (@{{ totalFileSize() }})</li>
                    </ul>
                    <div class="btn-group btn-block btn-group-xs" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-danger  " v-on:click="deleteAllSelectedFile"><i class="far fa-layer-minus mr-2"></i> Delete All Selected File</button>
                        <button type="button" class="btn btn-success  "><i class="fas fa-upload mr-2"></i> Upload All Selected File</button>
                    </div>
                </div>


                <div v-if="listViewOn" class="d-flex d-flex-wrap pt-2">

                    <div class="w-100">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center py-1"
                                v-for="(f,k) in files_added">

                            <span class="badge badge-secondary badge-pill mr-2"> <i class="fa-2x"
                                                                                    :class="{
                                   [getIcon(f)]:true
                                   }"

                                ></i></span>

                                <h5>
                                    <small>name: </small>@{{f.file_name.substring(0, 5)}}<abbr
                                        v-if="f.file_name.length>10" :title="f.file_name"> ... </abbr>.@{{f.file_ext.toLowerCase()}}
                                    <br><small>size: <span>@{{getFileSize(f)}}</span></small>
                                </h5>

                                <span class="badge badge-danger badge-pill ml-2" v-on:click="deleteImage(k)"
                                      style="cursor: pointer">{!! $cancelIcon !!}</span>
                            </li>
                        </ul>
                    </div>


                </div>

                <div v-if="!listViewOn" class="d-flex flex-wrap">
                    <div v-for="(f,k) in files_added" class="" :title="f.file_name">
                        <div class="px-1 py-2">
                            <div class="card">
                                <div class="card-header text-center">
                                    <i class="fa-3x"
                                       :class="{
                                   [getIcon(f)]:true
                                   }"

                                    ></i>

                                </div>
                                <div class="card-footer px-1">
                                    <div class="d-flex flex-row justify-content-between">
                                        <div>
                                            @{{f.file_name.substring(0, 5)}}<abbr v-if="f.file_name.length>10"
                                                                                  :title="f.file_name"> ... </abbr>.@{{f.file_ext.toLowerCase()}}
                                            <br><small>size: <strong>@{{getFileSize(f)}}</strong></small>
                                        </div>
                                        <div><span class="btn btn-sm btn-danger ml-2"
                                                   v-on:click="deleteImage(k)">{!! $cancelIcon !!}</span></div>

                                    </div>


                                </div>
                            </div>


                        </div>


                    </div>

                </div>


            </div>

        </div>
    </div>
</file-uploader>
