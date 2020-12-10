<body>

	<div id="site-wrapper" class="site-wrapper page-contact">


		<div id="wrapper-content" class="wrapper-content pt-0 pb-13">
			<div id="map" class="map" style="width:100%;height:645px;"></div>
			<div class="container">
				<div class="pt-12">
					<div class="heading text-center mb-10">
						<h3 class="mb-0 lh-12">Contact us for any further questions, possible projects
							and business partnerships</h3>
					</div>
					<div class="row mb-10">
						<div class="col-md-4 mb-5 mb-md-0">
							<div class="text-center">
								<h5 class="font-weight-normal text-uppercase mb-5">Contact Directly</h5>
								<div class="d-flex flex-column">
									<span>hello@thedir.com</span>
									<span>(+0084) 912-3548-073</span>
								</div>
							</div>
						</div>
						<div class="col-md-4 mb-5 mb-md-0">
							<div class="text-center">
								<h5 class="font-weight-normal text-uppercase mb-5">Visit our office</h5>
								<div class="d-flex flex-column">
									<span>17 Princess Road, London</span>
									<span>Greater London, NW1 8JR, UK</span>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-info-item text-center">
								<h5 class="font-weight-normal text-uppercase mb-5">work with us</h5>
								<div class="d-flex flex-column">
									<span>Send your CV to our email:</span>
									<span>career@thedir.com</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-contact">
					<div class="form-wrapper px-3 px-sm-12 pt-11 pb-12">
						<h3 class="mb-9 text-center">Get In Touch</h3>
						<form>
							<div class="row mb-4">
								<div class="form-group col-md-4">
									<label for="name" class="sr-only">Name</label>
									<input type="text"
										class="form-control bg-transparent text-dark rounded-0 pl-0 font-size-md"
										placeholder="Name" id="name">
								</div>
								<div class="form-group col-md-4">
									<label for="email" class="sr-only">Name</label>
									<input type="email"
										class="form-control bg-transparent text-dark rounded-0 pl-0 font-size-md"
										placeholder="Email Address" id="email">
								</div>
								<div class="form-group col-md-4">
									<label for="subject" class="sr-only">Name</label>
									<input type="text"
										class="form-control bg-transparent text-dark rounded-0 pl-0 font-size-md"
										placeholder="Subjects" id="subject">
								</div>
							</div>
							<div class="form-group">
								<label for="message" class="text-dark font-size-md">
									Message
								</label>
								<textarea class="form-control bg-transparent text-dark rounded-0 pl-0"
									id="message"></textarea>
							</div>
							<div class="text-center pt-10">
								<button
									class="btn btn-link text-decoration-underline text-dark text-uppercase font-size-md font-weight-semibold text-decoration-underline"
									type="button">post comment
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>



	</div>

	<script>
		var map;

		function initMap() {
			var latlng = new google.maps.LatLng(-37.832254, 144.959675);
			var mapProp = {
				center: latlng,
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
		}
	</script>
</body>

</html>