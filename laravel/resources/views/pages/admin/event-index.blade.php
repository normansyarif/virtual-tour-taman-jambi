@extends('layouts.main')

@section('content')

<div class="table-responsive">
	<div>
		<a href="{{ route('admin.event.add') }}" class="btn btn-primary pull-right">Tambah</a>
	</div>
	
	<div class="clear" style="margin-bottom: 20px;"></div>

	<table class="table" id="dt-table">
		<thead>
			<th>No.</th>
			<th>Nama</th>
			<th>Lokasi</th>
			<th>Waktu</th>
			<th>Aksi</th>
		</thead>
	</table>
</div>

@endsection

@section('script')

<script type="text/javascript">
	let table = $('#dt-table').DataTable({
        pageLength: 100,
        processing: true,
        serverSide: false,
        order: [[ 1, "asc" ]],
        ajax: {
        	type: 'get',
        	url: '{{ route('json.admin.event.index') }}'
        },
        columns: [
        { 
            data: 'DT_RowIndex', 
            name: 'DT_RowIndex' 
        },
        { 
            data: 'nama', 
            name: 'nama' 
        },
        { 
            data: 'lokasi', 
            name: 'lokasi' 
        },
        { 
            data: 'waktu', 
            name: 'waktu' 
        },
        { 
            data: 'action', 
            name: 'action' 
        }
        ]
    });
</script>

@endsection