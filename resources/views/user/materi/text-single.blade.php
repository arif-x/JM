@extends('layouts.user')

@section('content')

<div class="page-content">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            	@foreach($materis as $materi)
                <h3 class="mb-3">{{ $materi->jenis }} - {{ $materi->judul_materi }}</h3>
                <hr>
                {!! $materi->materi !!}
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection