@extends('layouts.user')

@section('content')

<div class="page-content">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Event Tryout</h3>
                <p>Tryout dapat dikerjakan sesuai dengan waktu pelaksanaan dan kode akses yang valid.</p>
                <hr>
                <div data-v-69d2682d="" class="alert alert-warning"><strong data-v-69d2682d=""><i data-v-69d2682d="" class="mdi mdi-information mr-0"></i> Perhatian!</strong> Gunakan browser Google Chrome versi terbaru supaya website dapat diakses dengan lancar tanpa masalah. </div>
                <hr>
                <div class="row">

                    @foreach($tps as $soal)
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4 class="text-primary"><strong>{{ $soal->nama_label }} ({{ $soal->nama_paket }})</strong></h4>
                                Informasi lebih lengkap untuk berpartisipasi dalam event try out ini kunjungi ..... 
                            </div>
                            <div class="card-body">
                                <p class="mb-0 card-text">
                                    Tgl. Mulai: {{ Carbon\Carbon::parse($soal->tgl_mulai)->locale('id')->dayName }}, {{ date('d', strtotime($soal->tgl_mulai)) }} {{ Carbon\Carbon::parse($soal->tgl_mulai)->locale('id')->monthName }} {{ date('Y', strtotime($soal->tgl_mulai)) }} Pukul 00:00
                                </p>
                                <p class="mt-2 mb-0 card-text">
                                    Tgl. Selesai: {{ Carbon\Carbon::parse($soal->tgl_end)->locale('id')->dayName }}, {{ date('d', strtotime($soal->tgl_end)) }} {{ Carbon\Carbon::parse($soal->tgl_end)->locale('id')->monthName }} {{ date('Y', strtotime($soal->tgl_end)) }} Pukul 00:00
                                </p>
                                <hr>
                                <div class="row">
                                    @if(Carbon\Carbon::now() < $soal->tgl_mulai)
                                    <button class="btn btn-secondary ml-2 font-weight-bold mt-3" disabled>Event Belum Dimulai</button>
                                    @elseif(Carbon\Carbon::now() > $soal->tgl_end)
                                    <button class="btn btn-secondary ml-2 font-weight-bold mt-3" disabled>Event Telah Berakhir</button>
                                    @elseif(Carbon\Carbon::now()->between($soal->tgl_mulai, $soal->tgl_end))
                                    <button class="btn btn-inverse-primary ml-2 font-weight-bold mt-3" data-slug="{{ $soal->slug }}" onclick="tryoutEvent(this);" id="kerjakan">Kerjakan</button>
                                    @endif
                                    <a href="{{ route('user.event-tryout.hasil', $soal->slug) }}" class="btn btn-inverse-primary ml-2 font-weight-bold mt-3">Ranking</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                @php echo $modal; @endphp
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function tryoutEvent(obj){
        $('#warningModal').modal('show');
        $('#kerjakanBtn').attr('href', '/user/event-tryout/persiapan/'+$(obj).data('slug'))
        $('#kerjakanInput').val($(obj).data('slug'))
        $('#kerjakanInput').hide()
        $('#formId').attr('action', '/user/event-tryout/persiapan/'+$(obj).data('slug'));
    }
</script>

@endsection
