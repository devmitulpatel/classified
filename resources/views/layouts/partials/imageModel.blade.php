<div  class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" :class="{'modal-xl':fullscreen}">
        <div class="modal-content">
            <div v-if="!fullscreen" class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">@{{currentImage.title}}</h5>
                <button type="button" class="close btn-outline-danger" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center p-0">


                        <img :src="currentImage.url" width="100%" />


                <div v-on:click="fsToggle" class="btn btn-primary" style="position: absolute;
                            bottom: 10px;
                            right: 10px;">
                    <i class="fa" :class="{'fa-expand':!fullscreen,'fa-compress':fullscreen  }"></i>

                </div>
                <div v-if="fullscreen" class="btn btn-danger" style="position: absolute;
                            top: 10px;
                            right: 10px;" data-dismiss="modal">
                    <i class="fa fa-times" ></i>
                </div>

            </div>
            <div class="modal-footer" v-if="!fullscreen">
                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



