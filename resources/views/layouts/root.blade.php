<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    @include('layouts.partials.head',['title'=>$title??"Home main | TheDir"])
</head>
<body>

<div id="app">
    <div class="col-12">
        @include('layouts.partials.uploader' , [ 'collection'=>'images','model'=>\App\Models\ProductForVendor::class,'rootUpdateFunction'=>'updateFormFromImageCollection' ] )
    </div>


    <div id="site-wrapper" class="site-wrapper home-main">

        @if(isset($header)&& $header==2)
            @include('layouts.partials.header_2')
        @else
            @include('layouts.partials.header')
        @endif
        @yield('content')

        @include('layouts.partials.footer')

    </div>
    @include('layouts.partials.login')
    @include('layouts.partials.register')
    @include('layouts.partials.notify_for_front')
</div>

@include('layouts.partials.js')
@include('layouts.partials.icons')


</body>
</html>
