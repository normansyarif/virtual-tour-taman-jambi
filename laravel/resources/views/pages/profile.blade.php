@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top: 50px">
        <div class="col-md-8 col-md-offset-1">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right" >Nama</label>

                    <div class="col-md-6">
                        <input value="{{ auth()->user()->name }}" id="name" type="text" class="form-control" name="name" value="" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                    <div class="col-md-6">
                        <input value="{{ auth()->user()->email }}" id="email" type="email" class="form-control" name="email" value="" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                           Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
