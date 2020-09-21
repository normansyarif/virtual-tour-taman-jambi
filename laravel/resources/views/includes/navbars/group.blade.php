<div class="group shadow">
	<ul>
		<li class="nav-label"><a href="{{ route('home') }}">Beranda</a></li>

		@auth
			@if(auth()->user()->role == 1)
			<li><a href="{{ route('admin.taman.index') }}">Kelola<br />Taman</a></li>
			<li><a href="{{ route('admin.event.index') }}">Kelola<br />Event</a></li>
			@endif
		@endauth

		<li><a href="{{ route('taman.list') }}">Taman</a></li>
		<li><a href="{{ route('event.list') }}">Event</a></li>
		<li><a href="{{ url('virtual-tour/index.htm') }}">Virtual<br />Tour</a></li>
        <li><a href="{{ route('partisipasi-masyarakat') }}">Partisipasi<br />Masyarakat</a></li>
        
		@auth
		<li><a href="{{ route('profile') }}">Profil</a></li>
		@endauth
		
	</ul>
</div>