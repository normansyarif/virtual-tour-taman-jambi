@extends('layouts.main')

@section('content')


<h4>Tambah Event</h4>
<form style="margin-top: 20px;" action="{{ route('admin.event.post') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-item">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" placeholder="Nama" required>
    </div>
    <div class="form-item">
        <label>Taman</label>
        <select name="taman_id" class="form-control" required>
            
            @foreach($tamans as $taman)
            <option value="{{ $taman->id }}">{{ $taman->nama }}</option>
            @endforeach
        
        </select>
    </div>
    <div class="form-item">
        <label>Waktu Mulai</label>
        <input type="datetime-local" name="waktu_mulai" class="form-control" placeholder="Waktu Mulai" required>
    </div>
    <div class="form-item">
        <label>Waktu Selesai</label>
        <input type="datetime-local" name="waktu_selesai" class="form-control" placeholder="Waktu Selesai" required>
    </div>
    <div class="form-item">
        <label>Deskripsi</label>
        <textarea name="deskripsi" placeholder="Deskripsi" id="desc-lengkap" required></textarea>
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