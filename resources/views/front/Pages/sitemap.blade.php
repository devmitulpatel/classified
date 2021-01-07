@extends("layouts.root",['title'=>$title,'header'=>2])

@section('content')

    <div v-cloak id="site-wrapper" class="site-wrapper" >

        <div class="card">
            <div class="card-header">
                Sitemap
            </div>
            <div class="card-body">

                @php
                $sitemap=[
                'Home'=>route('home'),
                'About us'=>route('aboutusForFrontEnd'),
                'Contact us'=>route('contactusForFrontEnd')
                            ];

                @endphp

            <div class="row justify-content-center">

                <ul class="list-group col-6">

                    @foreach($sitemap as $n=>$r)
                       <a href="{{$r}}"> <li class="list-group-item">{{$n}}</li></a>
                    @endforeach

                </ul>

            </div>


            </div>

        </div>


    </div>

@endsection

@section('js')

@endsection
