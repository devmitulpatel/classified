<!doctype html>
<html lang="en">

<!-- Mirrored from templates.g5plus.net/thedir/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Dec 2020 17:20:02 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    @include('layouts/partials/head',['title'=>$title??"Home main | TheDir"])
</head>
<body>

<div id="app">

    <file-uploader  >

    </file-uploader>

    <div id="site-wrapper" class="site-wrapper home-main">

        @if(isset($header)&& $header==2)
            @include('layouts/partials/header_2')
        @else
            @include('layouts/partials/header')
        @endif
        @yield('content')

        @include('layouts/partials/footer')

    </div>
    @include('layouts/partials/login')
    @include('layouts/partials/register')
</div>

@include('layouts/partials/js')
@include('layouts/partials/icons')


</body>
</html>
