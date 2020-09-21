@extends('layouts.main')

@section('content')


<div class="taman-detail">
	<div class="col-12">
		<a href="{{ route('partisipasi-masyarakat.add') }}" class="btn btn-primary pull-right" style="margin-bottom: 10px">Beri usulan</a>
		<div class="clear"></div>
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>Waktu</th>
						<th>Nama</th>
						<th>Lokasi</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					
					@foreach($data as $item)
					<tr>
						<td>{{ date('d/m/Y H:i', strtotime($item->created_at)) }}</td>
						<td>{{ $item->user->name }}</td>
						<td>{{ $item->lokasi }}</td>
						<td>
							@if($item->tanggapan == null)
							<span style="font-size: .85em;" class="text-danger">Belum ditanggapi</span>
							@else
							<span style="font-size: .85em;" class="text-success">Sudah ditanggapi</span>
							@endif
						</td>
						<td>
							<a href="{{ route('partisipasi-masyarakat.detail', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                            @auth
							@if(auth()->user()->role == 1)
							<button onclick="
							if(confirm('Anda yakin akan menghapus usulan?')) {
								$(this).find('form').submit();
							}
							" class="btn btn-danger btn-sm">Hapus
								<form method="post" action="{{ route('partisipasi-masyarakat.delete', $item->id) }}">
									@csrf
								</form>
							</button>
							@endif
							@endauth
							
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="clear"></div>


@endsection


@section('script')
<script type="text/javascript">
</script>

@endsection