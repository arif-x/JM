@extends('layouts.user')

@section('content')
<link rel="stylesheet" href="https://cdn.plyr.io/3.7.2/plyr.css" />
<div class="page-content">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            	@foreach($materis as $materi)
                <h3 class="mb-3">{{ $materi->jenis }} - {{ $materi->judul_materi }}</h3>
                <hr>
                <div class="plyr__video-embed player_video">
                    <iframe src="{{ $materi->materi }}?autoplay=0&amp;controls=0&amp;disablekb=1&amp;playsinline=1&amp;cc_load_policy=0&amp;cc_lang_pref=auto" allowfullscreen allowtransparency
                        allow="autoplay">
                    </iframe>
                </div>
                <hr>
                <p><strong>Deskripsi</strong>{{ $materi->deskripsi }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.plyr.io/3.7.2/plyr.polyfilled.js"></script>
<script>
  const player = new Plyr('.player_video', {
    controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'fullscreen'],
    youtube: { noCookie: true, rel: 0, showinfo: 0, iv_load_policy: 0, modestbranding: 1 },
    disableContextMenu: false

});
</script>
@endsection