@extends('layouts.main')

@section('content')

<div class="taman-detail">
	<div class="col-12">
		<div class="clear"></div>
		
		<div>
			<div style="margin-bottom: 17px">
				<label>Pengaju</label>
				<p>{{ $data->user->name }}</p>
			</div>

			<div style="margin-bottom: 17px">
				<label>Lokasi</label>
				<p>{{ $data->lokasi }}</p>
			</div>

			<div style="margin-bottom: 17px">
				<label>Keterangan</label>
				{!! $data->keterangan !!}
			</div>

			<div style="margin-bottom: 17px">
				<label>Tanggapan</label>
				@if($data->tanggapan == null)
				
				    <p class="text-danger">Belum ada tanggapan</p>
                    
                    @auth
    				@if(auth()->user()->role == 1)
    				
    				<form action="{{ route('partisipasi-masyarakat.tanggapan', $data->id) }}" method="post">
    					@csrf
    					<textarea name="desc-lengkap" placeholder="Keterangan" id="desc-lengkap" required></textarea>
    					<button style="margin-top: 20px" class="btn btn-primary" type="submit">Simpan</button>
    				</form>
    
    				@endif
    				@endauth

				@else
				{!! $data->tanggapan !!}
				@endif
			</div>

			<div style="margin-bottom: 17px">
				@if($data->koordinat != null)
				<p><a href="https://www.google.com/maps/search/{{ $data->koordinat }}" class="btn btn-primary">Navigasi</a></p>
				@endif
			</div>

		</div>

	</div>
</div>

<div class="clear"></div>


@endsection


@section('script')

<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<script type="text/javascript">
    CKEDITOR.replace( 'desc-lengkap', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

@endsection