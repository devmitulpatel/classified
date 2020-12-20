@extends("layouts.root",['title'=>$title,'header'=>2])

@section('content')

    <div v-cloak id="site-wrapper" class="site-wrapper panel dashboards" >


    <div v-if="sessionStarted">

        <div v-cloak v-if="userLoggedIn">

            @include('front.Pages.partials.vendor_dashboard_content')

        </div>
        <div v-cloak v-if="!userLoggedIn">
          <div style="min-height: 100%" v-if="clickLoginBtn">

             <h1 style="text-align: center;padding:30px 0px;margin: 10vw;"class="text-muted ">Please Login to Your Account to acces this Page<br>
             <small v-on:click="clickLoginBtn" style="cursor: pointer" class="btn btn-block btn-outline-success mt-4"> Click Here to login</small>
             </h1>


          </div>
        </div>



    </div>



    <div v-if="!sessionStarted" >

        <div  id="wrapper-content" class="wrapper-content pt-0 pb-0">
            <div class="container">
                <div class="page-container text-center">
                    <div class="mb-7">
                        <svg class="icon icon-map-marker-crossed">
                            <use xlink:href="#icon-map-marker-crossed"></use>
                        </svg>
                    </div>
                    <div class="my-7 loading-text-box" >
                        <h3 class="mb-7 loading-text" data-text="It's Loading ..."  >It's Loading ...</h3>

                    </div>

                </div>
            </div>
        </div>

    </div>

    </div>
@endsection

