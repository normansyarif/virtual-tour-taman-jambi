@extends('layouts.main')

@section('content')


<div class="taman-detail">
	<div class="col-md-6 col-sm-12 col-xs-12">
		<img style="width: 100%; border-radius: 10px;" src="{{ url('uploads/taman/' . $taman->foto) }}">
	</div>
	<div class="col-md-6 col-sm-12 col-xs-12">
		<h3>{{ $taman->nama }}</h3>
		<p>{{ $taman->deskripsi_pendek }}</p>
		<p>{{ $taman->alamat }}</p>
		<a href="https://www.google.com/maps/search/{{ $taman->latlng }}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-map-marker"></span> Navigasi</a>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12 desc" style="margin-top: 30px; margin-bottom: 0px; text-align: justify;">
		{!! $taman->deskripsi_panjang !!}
	</div>
	<div style="margin-bottom: 30px">
    
		@if($taman->vt_media != null)
		<iframe style="width: 100%; height: 450px; border: none; border-radius: 10px" src="{{ url('virtual-tour/index.htm?media=' . $taman->vt_media) }}"></iframe>
		<p style="margin-top: 10px"><a target="__blank" href="{{ url('virtual-tour/index.htm?media=' . $taman->vt_media) }}">Klik untuk melihat virtual tour dalam layar penuh</a></p>
		@endif
        
	</div>
</div>

<div class="clear"></div>

<div class="comment_block">

	<button onclick="showModal()" class="btn btn-primary" style="margin-bottom: 20px; margin-top: 50px;"><span class="glyphicon glyphicon-pencil"></span> Tulis review</button>

	@if($count > 0)
	<p><span style="font-weight: bold">{{ $sum/$count }}/5</span> dari <span style="font-weight: bold">{{ $count }}</span> ulasan</p>
	@endif

	<!-- new comment -->
	

	@forelse($reviews as $review)
	<!-- new comment -->
	<div class="new_comment">
		<!-- build comment -->
		<ul class="user_comment">
			<!-- current #{user} avatar -->
			<div class="user_avatar">
				<img src="{{ asset('images/default-avatar.jpg') }}">
				<p style="text-align: center; margin-top: 10px"><strong>{{ $review->skor }}/5</strong></p>
			</div><!-- the comment body --><div class="comment_body">
				<p>{{ $review->komentar }}</p>
			</div>
			<!-- comments toolbar -->
			<div class="comment_toolbar">
				<!-- inc. date and time -->
				<div class="comment_details">
					<ul>
						<li><i class="fa fa-clock-o"></i> {{ date('H:i', strtotime($review->created_at)) }}</li>
						<li><i class="fa fa-calendar"></i> {{ date('d-m-Y', strtotime($review->created_at)) }}</li>
						<li><i class="fa fa-pencil"></i> <span class="user">{{ $review->user->name }}</span></li>
					</ul>
				</div>
			</div>
		</ul>
	</div>

	@empty
	<p>Tidak ada ulasan</p>

	@endforelse

</div>


<!-- Modal -->
<div id="rating-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<form method="post" action="{{ route('post.review') }}">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Buat ulasan</h4>
				</div>
				<div class="modal-body">

					@csrf
					<div>
						<textarea name="ulasan" style="height: 100px; margin-bottom: 30px" class="form-control" required placeholder="Ulasan anda..."> </textarea>
					</div>
					<div class="rating" >
						<label>
							<input type="radio" name="stars" value="1" />
							<span class="icon">★</span>
						</label>
						<label>
							<input type="radio" name="stars" value="2" />
							<span class="icon">★</span>
							<span class="icon">★</span>
						</label>
						<label>
							<input type="radio" name="stars" value="3" />
							<span class="icon">★</span>
							<span class="icon">★</span>
							<span class="icon">★</span>   
						</label>
						<label>
							<input type="radio" name="stars" value="4" />
							<span class="icon">★</span>
							<span class="icon">★</span>
							<span class="icon">★</span>
							<span class="icon">★</span>
						</label>
						<label>
							<input type="radio" name="stars" value="5" />
							<span class="icon">★</span>
							<span class="icon">★</span>
							<span class="icon">★</span>
							<span class="icon">★</span>
							<span class="icon">★</span>
						</label>

					</div>
					<input type="hidden" id="skor" name="skor" value="1" required>
					<input type="hidden" name="taman_id" required value="{{ $taman->id }}">

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" >Kirim</button>
				</div>
			</form>
		</div>

	</div>
</div>


@endsection


@section('script')
<script type="text/javascript">
	function showModal() {
		$('#rating-modal').modal('show');
	}

	$(':radio').change(function() {
		$('#skor').val(this.value);
	});
</script>

@endsection
