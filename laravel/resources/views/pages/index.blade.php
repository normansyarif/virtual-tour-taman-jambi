@extends('layouts.main')


@section('content')

<div class="home-images">
	<div class="scanner-div col-lg-5 col-md-5 col-sm-5">
		<div class="scanner">
			<div class="text-div">
				<p>Sistem Informasi Geografis dan Virtual Tour Ruang Terbuka Hijau sebagai media informasi dan promosi wisata kepada masyarakat.</p>
				<a href="{{ route('taman.list') }}"><button class="main-button little-margin-bottom">Jelajahi Taman</button></a>
			</div>
		</div>
	</div>
	<div class="slideshow-div col-lg-7 col-md-7 col-sm-7">

		<div id="myCarousel" class="carousel slide" data-ride="carousel">

			<ol class="carousel-indicators">
			    @if(count($tamanSlides) > 0)
				@foreach($tamanSlides as $key => $slide)
				<li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? " active" : "" }}"></li>
				@endforeach
				@endif
			</ol>

			<div class="carousel-inner">

				@if(count($tamanSlides) > 0)
				@foreach($tamanSlides as $key => $slide)
				<div class="item{{ $key == 0 ? " active" : "" }}">
					<a href="{{ route('taman', $slide->id) }}">
						<img class="ss-im" src="{{ url('uploads/taman/' . $slide->foto) }}" alt="a">
						<div class="carousel-caption">
							<h3><em>{{ $slide->nama }}</em></h3>
						</div>	
					</a>
				</div>
				@endforeach
				@endif

			</div>

			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
			
		</div>

	</div>
</div>

<div class="clear"></div>

<div class="home-text">
	<p>Ruang terbuka hijau (RTH) adalah salah satu elemen perkotaan yang sangat penting karena dapat menunjang kehidupan dan aktivitas manusia. RTH memiliki fungsi sebagai paru-paru kota, penyimpan karbon yang berperan dalam penurunan emisi gas rumah kaca, selain itu juga berfungsi sebagai sarana berinteraksi sosial seperti rekreasi, bermain, dan olahraga.</p>
	<p>Sejak kepemimpinan Walikota Bapak H. Syarif Fasha, SE, MM, pembangunan taman kota menjadi perhatian pemerintah Kota Jambi yang kini gencar mempercantik wajah kota. Selain diisi dengan  tanaman, RTH ini juga dilengkapi dengan sarana rekreasi dan olahraga, wifi corner, kadang ada mobil perpustakaan keliling sehingga masyarakat dapat membaca sekaligus bersantai menghirup udara segar.</p>
	<p>Dinas Lingkungan Hidup Kota Jambi bersama tim pengabdian Fakultas Sains dan Teknologi Universitas Jambi membangun Sistem Informasi Geografis dan Virtual Tour Ruang Terbuka Hijau sebagai media informasi dan promosi wisata kepada masyarakat. Masyarakat dapat mengakses informasi mengenai persebaran RTH di Kota Jambi dan fasilitas yang tersedia pada RTH. Virtual tour merupakan suatu inovasi media promosi yang menyajikan simulasi panorama lokasi yang atraktif.</p>
</div>

<div class="map-div">
	<div id="map" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div> 
	{{-- <div id="address" class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
		<p>Lokasi Anda saat ini</p>
		<h4>Jl. M. Yamin, Simpang Pulai<br />Kota Jambi</h4><br />
		<a href="#"><button class="main-button">Jelajahi taman</button></a>
	</div> --}}
</div>


{{-- Modals --}}
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="name"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p id="content"></p>
			</div>
			<div class="modal-footer">
				<button id="more" data="" type="button" class="btn btn-sm btn-primary">Selengkapnya</button>
				<a id="latlang" href="#" class="btn btn-sm btn-success">Navigasi</a>
				<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

@endsection


@section('script')

<script type="text/javascript">


	$(document).ready(function() {
		/* Make all the images inside the carousel to fit their parent */

		var carousel = $('.carousel-inner');
		var carouselRatio = carousel.width() / carousel.height();

		$('.ss-im').each(function() {
			var imageSize = getImageSize($(this));
			var imageRatio = imageSize.width / imageSize.height;
			var imgClass = (carouselRatio > imageRatio) ? 'tall' : 'wide';
			$(this).addClass(imgClass);
		});


		/* Re-arrange the elements based on the screen resolution */
		if ($(window).width() < 768) {
			$(".slideshow-div").insertBefore(".scanner-div");
			$('.slideshow-div').css("margin-bottom", "20px");

			var address = $("#address");
			var map = $("#map");

			address.insertBefore("#map");
			address.css("padding", "0");
			address.css("margin-bottom", "20px");
		}

		if ($(window).width() < 311) {
			$(".mobile-brand").html("RTH");
			$(".mobile-brand").css("font-size", "18px");
		}
	});


	function getImageSize($mainImage) {
		var mainImage = $mainImage[0],
		d = {};

		if (mainImage.naturalWidth === undefined) {
			var i = new Image();
			i.src = mainImage.src;
			d.width = i.width;
			d.height = i.height;
		} else {
			d.width = mainImage.naturalWidth;
			d.height = mainImage.naturalHeight;
		}
		return d;
	}


</script>

<script type="text/javascript">
	function CustomMarker(id, name, latlng, map, imageSrc, contentString) {
		this.id = id;
		this.name = name;
		this.latlng_ = latlng;
		this.imageSrc = imageSrc;
		this.contentString = contentString;
		this.setMap(map);
	}

	function initMap() {

		CustomMarker.prototype = new google.maps.OverlayView();

		CustomMarker.prototype.draw = function () {
			var div = this.div_;
			if (!div) {
				div = this.div_ = document.createElement('div');
				div.className = "customMarker"


				var img = document.createElement("img");
				var name = this.name;
				var id = this.id;
				var contentString = this.contentString;
				img.src = this.imageSrc;
				var latlang = this.latlng_;
				div.appendChild(img);
				var me = this;

				google.maps.event.addDomListener(div, "click", function (event) {
					google.maps.event.trigger(me, "click");
					$('#more').attr('data', id);
					$('#content').html(contentString);
					$('#name').html(name);
					$('#modal').modal('show');

					var url = "https://www.google.com/maps/search/" + latlang.toString().slice(1,-1);
					$('#latlang').attr('onclick', "navapp('" + url + "')");
				});

				var panes = this.getPanes();
				panes.overlayImage.appendChild(div);
			}

			var point = this.getProjection().fromLatLngToDivPixel(this.latlng_);
			if (point) {
				div.style.left = point.x + 'px';
				div.style.top = point.y + 'px';
			}
		};

		CustomMarker.prototype.remove = function () {
			if (this.div_) {
				this.div_.parentNode.removeChild(this.div_);
				this.div_ = null;
			}
		};

		CustomMarker.prototype.getPosition = function () {
			return this.latlng_;
		};

		var map = new google.maps.Map(document.getElementById("map"), {
			zoom: 13,
			center: new google.maps.LatLng(-1.620772, 103.607856),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});

		var data = {!! $mapData !!};

		for(var i=0;i<data.length;i++){
			new CustomMarker(data[i].id, data[i].name, new google.maps.LatLng(data[i].pos[0],data[i].pos[1]), map,  data[i].profileImage, data[i].contentString)
		}
	}

	function navapp(url){
		window.location.href = url;
	}

	$('#more').click(function() {
		let id = $(this).attr('data');
		window.location.href = "taman/" + id;
	});

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHzEtuVlr36M5MJwT7EtHna7cLFTzDTWs&callback=initMap"></script>

@endsection