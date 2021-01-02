
@php
    $js=[

        'vendors/jquery.min.js',
        'vendors/popper/popper.js',
        'vendors/bootstrap/js/bootstrap.js',
        'vendors/hc-sticky/hc-sticky.js',
        'vendors/isotope/isotope.pkgd.js',
        'vendors/magnific-popup/jquery.magnific-popup.js',
        'vendors/slick/slick.js',
        'vendors/waypoints/jquery.waypoints.js',
       // 'js/tinymce.js',
        'js/vendor.js',
        'js/app.js',


    ];

@endphp



@foreach($js as $url)
    <script src="{{asset($url)}}"></script>

@endforeach
