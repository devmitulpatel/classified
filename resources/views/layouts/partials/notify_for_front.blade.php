<notifications group="ms-notfy" animation-type="velocity" >
    <template slot="body" slot-scope="props">
        <div>


            <div class="alert "
                 :class="{
                  'alert-success':props.item.type=='success',
                  'alert-warning':props.item.type=='warn',
                  'alert-danger':props.item.type=='error',

}"

                 role="alert">
                <a class="title">
                    <div v-html="props.item.title"></div>

                </a>
                <b>
                    @{{ props.item.text  }}
                </b>
            </div>





        </div>
    </template>
</notifications>
