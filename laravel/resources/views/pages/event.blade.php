@extends('layouts.main')

@section('content')

<div class="taman-detail">
	<div class="col-md-6 col-sm-12 col-xs-12">
		<img style="width: 100%; border-radius: 10px;" src="{{ url('uploads/event/' . $event->foto) }}">
	</div>
	<div class="col-md-6 col-sm-12 col-xs-12">
		<h3>{{ $event->nama }}</h3>
		<p>{{ $event->taman->nama }}</p>
		<p>{{ date('Y-m-d H:i', strtotime($event->waktu_mulai)) . ' s/d ' . date('Y-m-d H:i', strtotime($event->waktu_selesai)) }}</p>
		<a href="https://www.google.com/maps/search/{{ $event->taman->latlng }}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-map-marker"></span> Navigasi</a>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12 desc" style="margin-top: 30px; margin-bottom: 30px; text-align: justify;">
		{!! $event->deskripsi !!}
	</div>
</div>

<div class="clear"></div>

@endsection