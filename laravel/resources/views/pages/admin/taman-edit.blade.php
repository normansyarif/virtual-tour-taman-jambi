@extends('layouts.main')

@section('content')


<h4>Tambah Taman</h4>
<form style="margin-top: 20px;" action="{{ route('admin.taman.update', $taman->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-item">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $taman->nama }}" required>
    </div>
    <div class="form-item">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ $taman->alamat }}" required>
    </div>
    <div class="form-item">
        <label>Koordinat (lat, lng)</label>
        <input type="text" name="latlng" class="form-control" placeholder="0.703107,101.207669" value="{{ $taman->latlng }}" required>
    </div>
    <div class="form-item">
        <label>Deskripsi Pendek</label>
        <input type="text" name="desc-pendek" class="form-control" placeholder="Deskripsi pendek" value="{{ $taman->deskripsi_pendek }}" required>
    </div>
    <div class="form-item">
        <label>Deskripsi Lengkap</label>
        <textarea name="desc-lengkap" placeholder="Deskripsi Lengkap" id="desc-lengkap" required>{!! $taman->deskripsi_panjang !!}</textarea>
    </div>
    <div class="form-item">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control" placeholder="foto">
        <img style="width: 200px; height: auto; margin-top: 10px;" src="{{ url('uploads/taman/'. $taman->foto) }}">
    </div>
    <div class="form-item">
        <label>Virtual Tour Media (opsional)</label>
        <input type="text" name="vt_media" class="form-control" placeholder="sipin25" value="{{ $taman->vt_media }}">
    </div>
    <button class="btn btn-primary" type="submit">Ubah</button>
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
