@extends('layouts.main')

@section('content')


<h4>Edit Event</h4>
<form style="margin-top: 20px;" action="{{ route('admin.event.update', $event->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-item">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" placeholder="Nama" required value="{{ $event->nama }}">
    </div>
    <div class="form-item">
        <label>Taman</label>
        <select name="taman_id" class="form-control" required>
            
            @foreach($tamans as $taman)
            <option {{ ($taman->id == $event->taman_id) ? 'selected' : ''  }} value="{{ $taman->id }}">{{ $taman->nama }}</option>
            @endforeach
        
        </select>
    </div>
    <div class="form-item">
        <label>Waktu Mulai</label>
        <input type="datetime-local" name="waktu_mulai" class="form-control" placeholder="Waktu Mulai" required value="{{ date('Y-m-d\TH:i', strtotime($event->waktu_mulai)) }}">
    </div>
    <div class="form-item">
        <label>Waktu Selesai</label>
        <input type="datetime-local" name="waktu_selesai" class="form-control" placeholder="Waktu Selesai" required value="{{ date('Y-m-d\TH:i', strtotime($event->waktu_selesai)) }}">
    </div>
    <div class="form-item">
        <label>Deskripsi</label>
        <textarea name="deskripsi" placeholder="Deskripsi" id="desc-lengkap" required>{!! $event->deskripsi !!}</textarea>
    </div>
    <div class="form-item">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control" placeholder="foto">
        <img style="width: 200px; height: auto; margin-top: 10px;" src="{{ url('uploads/event/'. $event->foto) }}">
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