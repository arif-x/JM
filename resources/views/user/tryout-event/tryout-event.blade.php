@extends('layouts.user')

@section('content')

<div class="page-content">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Event Tryout</h3>
                <p>Belajar manajemen waktu untuk mengerjakan soal sesuai kategori yang diinginkan.</p>
                <hr>
                <div data-v-69d2682d="" class="alert alert-warning"><strong data-v-69d2682d=""><i data-v-69d2682d="" class="mdi mdi-information mr-0"></i> Perhatian!</strong> Gunakan browser Google Chrome versi terbaru supaya website dapat diakses dengan lancar tanpa masalah. </div>
                <hr>
                <div class="row">

                    @foreach($tps as $soal)
                    <div class="col-md-3">
                        <div class="card mb-4">
                            <div class="card-header"><h4 class="text-primary"><strong>{{ $soal->nama_label }}</strong></h4></div>
                            <div class="card-body">
                                <button class="btn btn-primary col" disabled="">{{ $soal->nama_paket }}</button>
                                <!-- <p class="mt-2 mb-0 text-muted card-text">
                                    Jumlah Soal: {{ $soal->counts }} soal
                                </p>
                                <p class="mt-2 mb-0 text-muted card-text">
                                    Waktu: 15 menit
                                </p> -->
                                <p class="mt-2 mb-0 text-muted card-text">
                                    Tgl. Mulai: {{ date('d-m-Y', strtotime($soal->tgl_mulai)) }}
                                </p>
                                <p class="mt-2 mb-0 text-muted card-text">
                                    Tgl. Selesai: {{ date('d-m-Y', strtotime($soal->tgl_end)) }}
                                </p>
                                <button class="btn btn-inverse-primary btn-fw ml-0 font-weight-bold col mt-3" data-slug="{{ $soal->slug }}" onclick="tryoutEvent(this);" id="kerjakan">Kerjakan</button>
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
