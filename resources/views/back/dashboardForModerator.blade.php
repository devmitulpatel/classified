<dashboard-row-1  inline-template>
    <div class="">

        <div class="">

            <div class="row justify-content-center">
                <div class="col">
                    <div class="card" >

                        <div class="card-body">
                            <h5 class="card-title">Product to Approve</h5>

                            <table class="table">

                                @php

                                    use App\Models\ProductForVendor;
                                    $data = ProductForVendor::with(['category', 'sub_category', 'tags', 'approved_by', 'created_by', 'media'])->whereNull('approved_by_id')->orWhere('approved_by_id',auth()->id())->get()->take(10);


                                @endphp
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Sub Category
                                    </th>
                                </tr>

                                @foreach($data as $d)

                                    <tr>
                                        <td>
                                            {{$d->name}}
                                        </td>
                                    </tr>

                                @endforeach

                            </table>

                            <a href="{{route('admin.p-to-approve-for-moderators.index')}}" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                </div>

                <div class="col" >
                    <div class="card" >

                        <div class="card-body">
                            <h5 class="card-title">Service to Approve</h5>


                            <input type="text" v-model="Input1" >

                            @{{ Input1 }}


                            <span v-for=" (opt,key) in  optionData ">
                                <input type="checkbox" v-model="checkBox[opt.name]"  :value="opt.value">
                                <label>  @{{ opt.name }}</label>
                            </span>


                                @{{checkBox}}

                            <select v-model="selectOption">
                                <option v-for=" opt in  optionData " :value="opt.value">
                                    @{{ opt.name }}

                                </option>


                            </select>


                            @{{ selectOption }}

                            <a href="{{route('admin.s-to-approve-for-moderators.index')}}" class="btn btn-primary">View All</a>

                        </div>
                    </div>
                </div>


            </div>


        </div>



    </div>

</dashboard-row-1>
