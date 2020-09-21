@extends('layouts.main')

@section('content')

<div class="taman-list">
	<div class="row" style="margin-bottom: 30px">
		<form method="get" action="{{ route('event.search') }}">
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
	<div class="row" style="margin-top: 20px">
		@foreach($events as $event)
		<div class="col-md-3 col-sm-12 col-xs-12">

			<a class="taman-item" style="display: block" href="{{ route('event', $event->id) }}">
				<img style="width: 100%; border-radius: 10px" src="{{ url('uploads/event/' . $event->foto) }}">
				<h4>{{ $event->nama }}</h4>
				<p>{{ $event->taman->nama }}</p>
				<p>{{ date('Y-m-d H:i', strtotime($event->waktu_mulai)) . ' s/d ' . date('Y-m-d H:i', strtotime($event->waktu_selesai)) }}</p>
			</a>
			<a href="https://www.google.com/maps/search/{{ $event->taman->latlng }}">Navigasi</a>
		</div>
		@endforeach
	</div>
</div>

@endsection

@section('script')

@endsection