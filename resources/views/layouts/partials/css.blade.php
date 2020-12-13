<link href="https://fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">


@php
$css=[
    'vendors/font-awesome/css/fontawesome.css',
    'vendors/magnific-popup/magnific-popup.css',
    'vendors/slick/slick.css',
    'vendors/animate.css',
    'css/vendor.css'

];

@endphp

@foreach($css as $url)
    <link rel="stylesheet" href="{{asset($url)}}">
@endforeach
