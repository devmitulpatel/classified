<dashboard-row-1  inline-template>
    <div class="">

        <div class="">

            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card" >

                        <div class="card-body">
                            <h5 class="card-title">Product to Approve</h5>
                            <div class="table-responsive">
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
                                        Vendor
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Sub Category
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>

                                @foreach($data as $d)

                                    <tr>
                                        <td title=" {{$d->description}}">
                                            {{$d->name}}
                                        </td>
                                        <td title="{{$d->created_by->email}}">
                                            {{$d->created_by->name}}
                                        </td>
                                        <td>
                                            {{$d->category->name}}
                                        </td>
                                        <td>
                                            {{$d->sub_category->name}}
                                        </td>
                                        <td>


                                            @if(auth()->user()->roles->contains(3))

                                                @if (auth()->id()==$d->approved_by_id)



                                                    @if($d->rejected==0)
                                                        <a class="btn btn-xs btn-success text-white"  >
                                                            Approved
                                                        </a>


                                                    @else

                                                        <a class="btn btn-xs btn-danger text-white"  >
                                                            Rejected
                                                        </a>
                                                    @endif


                                                @else

                                                    <a class="btn btn-xs btn-info text-white" v-on:click="apiCallOnClick('{{route('admin.p-to-approve-for-moderators.approve',['pid'=>$d->id,'a'=>true])}}')"  >
                                                        Approve
                                                    </a>
                                                    <a class="btn btn-xs btn-danger text-white" v-on:click="apiCallOnClick('{{route('admin.p-to-approve-for-moderators.approve',['pid'=>$d->id,'a'=>false])}}')"  >
                                                        Reject
                                                    </a>

                                                @endif

                                            @endif
                                                @can('product_for_vendor_show')
                                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.product-for-vendors.show', $d->id) }}">
                                                        {{ trans('global.view') }}
                                                    </a>
                                                @endcan

                                        </td>
                                    </tr>

                                @endforeach

                            </table>
                            </div>


                        </div>

                        <div class="card-footer">
                            <a href="{{route('admin.p-to-approve-for-moderators.index')}}" class="btn btn-primary btn-block float-right">View All</a>
                        </div>
                    </div>
                </div>

                <div class="col-12" >
                    <div class="card" >

                        <div class="card-body">
                            <h5 class="card-title">Service to Approve</h5>

                            <div class="table-responsive">

                            <table class="table">

                                @php


                                    $data = \App\Models\ServiceForVendor::with(['category', 'sub_category', 'tags', 'approved_by', 'created_by', 'media'])->whereNull('approved_by_id')->orWhere('approved_by_id',auth()->id())->get()->take(10);


                                @endphp
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Vendor
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Sub Category
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>

                                @foreach($data as $d)

                                    <tr>
                                        <td title=" {{$d->description}}">
                                            {{$d->name}}
                                        </td>
                                        <td title="{{$d->created_by->email}}">
                                            {{$d->created_by->name}}
                                        </td>
                                        <td>
                                            {{$d->category->name}}
                                        </td>
                                        <td>
                                            {{$d->sub_category->name}}
                                        </td>
                                        <td>


                                            @if(auth()->user()->roles->contains(3))

                                                @if (auth()->id()==$d->approved_by_id)



                                                    @if($d->rejected==0)
                                                        <a class="btn btn-xs btn-success text-white"  >
                                                            Approved
                                                        </a>


                                                    @else

                                                        <a class="btn btn-xs btn-danger text-white"  >
                                                            Rejected
                                                        </a>
                                                    @endif


                                                @else

                                                    <a class="btn btn-xs btn-info text-white" v-on:click="apiCallOnClick('{{route('admin.s-to-approve-for-moderators.approve',['pid'=>$d->id,'a'=>true])}}')"  >
                                                        Approve
                                                    </a>
                                                    <a class="btn btn-xs btn-danger text-white" v-on:click="apiCallOnClick('{{route('admin.s-to-approve-for-moderators.approve',['pid'=>$d->id,'a'=>false])}}')"  >
                                                        Reject
                                                    </a>

                                                @endif

                                            @endif
                                                @can('service_for_vendor_show')
                                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.service-for-vendors.show', $d->id) }}">
                                                        {{ trans('global.view') }}
                                                    </a>
                                                @endcan

                                        </td>
                                    </tr>

                                @endforeach

                            </table>

                            </div>

                        </div>
                        <div class="card-footer">
                            <a href="{{route('admin.s-to-approve-for-moderators.index')}}" class="btn btn-primary btn-block float-right">View All</a>
                        </div>
                    </div>
                </div>





                <div class="col-12" >
                    <div class="card" >

                        <div class="card-body">
                            <h5 class="card-title">Your Recent Actions</h5>


                            <div class="table-responsive">
                            <table class="table">

                                @php


                                    $data = \App\Models\LogForModerators::where('action_taken_by_id',auth()->id())->get()->take(10);


                                @endphp
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Vendor
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Sub Category
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>

                                @foreach($data as $d)

                                    <tr>
                                        <td title=" {{$d->action_taken_on->description}}">
                                            {{$d->action_taken_on->name}}
                                        </td>
                                        <td title="{{$d->action_taken_on->created_by->email}}">
                                            {{$d->action_taken_on->created_by->name}}
                                        </td>
                                        <td>
                                            {{$d->action_taken_on->category->name}}
                                        </td>
                                        <td>
                                            {{$d->action_taken_on->sub_category->name}}
                                        </td>
                                        <td>


                                            @if(auth()->user()->roles->contains(3))

                                                    @if($d->action_taken_on->rejected==0)
                                                        <a class="btn btn-xs btn-success text-white"  >
                                                            Approved
                                                        </a>


                                                    @else

                                                        <a class="btn btn-xs btn-danger text-white"  >
                                                            Rejected
                                                        </a>
                                                    @endif




                                            @endif

                                        </td>
                                    </tr>

                                @endforeach

                            </table>

                            </div>


                        </div>
                    </div>
                </div>


            </div>


        </div>



    </div>

</dashboard-row-1>
