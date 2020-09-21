@extends('layouts.main')

@section('content')


<h4>Tambah Taman</h4>
<form style="margin-top: 20px;" action="{{ route('admin.taman.post') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-item">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" placeholder="Nama" required>
    </div>
    <div class="form-item">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
    </div>
    <div class="form-item">
        <label>Koordinat (lat, lng)</label>
        <input type="text" name="latlng" class="form-control" placeholder="0.703107,101.207669" required>
    </div>
    <div class="form-item">
        <label>Deskripsi Pendek</label>
        <input type="text" name="desc-pendek" class="form-control" placeholder="Deskripsi pendek" >
    </div>
    <div class="form-item">
        <label>Deskripsi Lengkap</label>
        <textarea name="desc-lengkap" placeholder="Deskripsi Lengkap" id="desc-lengkap" required></textarea>
    </div>
    <div class="form-item">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control" placeholder="foto" required>
    </div>
    <button class="btn btn-primary" type="submit">Simpan</button>
</form>

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