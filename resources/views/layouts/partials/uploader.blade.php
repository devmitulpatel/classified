
@php


@endphp

<file-uploader inline-template collection="{{$collection}}" model="{{$model}}" max-file="2" :per-file-limit="1*(1024*1024*1024)" :allowed-files="['jpg']">
    <div v-cloak>
        <input type="file" name="largeFile"   ref="file_input" v-on:change="file_changed " :multiple="multiple" class="d-none">

        <div class="border bg-info my-2 p-2 text-center py-10" ref="drop_box" @drop.prevent="file_changed" @dragover.prevent style="cursor: pointer" v-on:click="()=>{ this.$refs.file_input.click() }">
            <p class="text-white">

                <i class="fas fa-upload fa-4x"></i><br>Click Here to Select Files <br> or <br> Just Drag Files and Drop here

            </p>

        </div>

        <div class="row py-2 px-2">
            <div v-for="(f,k) in files_added" class="flex" :title="f.file_name">
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
                                <div >
                                    @{{f.file_name.substring(0, 5)}}<abbr v-if="f.file_name.length>10" :title="f.file_name"> ... </abbr>.@{{f.file_ext.toLowerCase()}}
                                    <br><small>size: <strong>@{{getFileSize(f)}}</strong></small>
                                </div>
                                <div ><span class="btn btn-sm btn-danger ml-2" v-on:click="deleteImage(k)">x</span></div>

                            </div>




                        </div>
                    </div>


                </div>


            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">

                <span>Total File Selected :  @{{ files_added.length }}</span>
            </div>

        </div>

    </div>
</file-uploader>
