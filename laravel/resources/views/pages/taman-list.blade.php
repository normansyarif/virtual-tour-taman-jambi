@extends('layouts.main')

@section('content')

<div class="taman-list">
	<div class="row" style="margin-bottom: 30px">
		<form method="get" action="{{ route('taman.search') }}">
			@csrf
			<div class="input-group">
				<input type="search" value="{{ request()->q }}" name="q" class="form-control" placeholder="Search">
				<div class="input-group-btn">
					<button class="btn btn-default" type="submit">
						<i class="glyphicon glyphicon-search"></i>
					</button>
				</div>
			</div>
		</form>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div id="map"></div> 
		</div>
	</div>
	<div class="row" style="margin-top: 20px">
		@foreach(json_decode($tamanList) as $taman)
		<div class="col-md-3 col-sm-12 col-xs-12">

			<a class="taman-item" style="display: block" href="{{ route('taman', $taman->id) }}">
				<img style="width: 100%; border-radius: 10px" src="{{ $taman->profileImage }}">
				<h4>{{ $taman->name }}</h4>
				<p>{{ $taman->alamat }}</p>
			</a>
		</div>
		@endforeach
	</div>
</div>

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

		var data = {!! $tamanList !!};

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