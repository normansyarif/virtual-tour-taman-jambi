@extends('layouts.main')

@section('content')

<div class="table-responsive">
	<div>
		<a href="{{ route('admin.taman.add') }}" class="btn btn-primary pull-right">Tambah</a>
	</div>
	
	<div class="clear" style="margin-bottom: 20px;"></div>

	<table class="table" id="dt-table">
		<thead>
			<th>No.</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Koordinat</th>
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
        	url: '{{ route('json.admin.taman.index') }}'
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
            data: 'alamat', 
            name: 'alamat' 
        },
        { 
            data: 'latlng', 
            name: 'latlng' 
        },
        { 
            data: 'action', 
            name: 'action' 
        }
        ]
    });
</script>

@endsection