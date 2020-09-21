@extends('layouts.main')

@section('content')

<div class="taman-detail">
	<div class="col-12">
		<div class="clear"></div>
		
		<form action="{{ route('partisipasi-masyarakat.post') }}" method="post">
			@csrf
			<div style="margin-bottom: 17px">
				<label>Lokasi</label>
				<input type="text" name="lokasi" class="form-control" placeholder="Lokasi" required>
			</div>

			<div style="margin-bottom: 17px">
				<label>Keterangan</label>
				<textarea name="desc-lengkap" placeholder="Keterangan" id="desc-lengkap" required></textarea>
			</div>

			<div>
				<label>Koordinat latitude, longitude (opsional)</label>
				<input type="text" name="koordinat" class="form-control" placeholder="-1.6195246, 103.5888595">
			</div>

			<button style="margin-top: 20px" class="btn btn-primary" type="submit">Simpan</button>
		</form>

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