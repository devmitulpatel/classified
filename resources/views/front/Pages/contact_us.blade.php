@extends("layouts.root",['title'=>$title,'header'=>2])

@section('content')

    <div v-cloak id="site-wrapper" class="site-wrapper page-contact" >
            @include('front.Pages.partials.contact_us_content')
    </div>

@endsection

@section('js')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfR0QSTNojJL__jixILjsZen-Cba8e-LA&amp;callback=initMap"></script>

    <script>
        var map;

        function initMap() {

            const myLatLng = {
                lat: 21.1702,
                lng: 72.8311
            };
            var latlng = new google.maps.LatLng(-122.0841,37.4221  );
            var mapProp = {
                center: myLatLng,
                zoom: 8,
                mapTypeId: 'roadmap',
                disableDefaultUI: true,
                styles: [
                    {
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#f2f2f2"
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#808080"
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.province",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "color": "#000000"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#f6934a"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway.controlled_access",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#f6934a"
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "transit.line",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            }
                        ]
                    },
                    {
                        "featureType": "transit.station.rail",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#a4c4c7"
                            }
                        ]
                    }
                ]
            };
            map = new google.maps.Map(document.getElementById('map'), mapProp);

            new google.maps.Marker({
                position: myLatLng,
                map,

            });
        }
    </script>
@endsection
