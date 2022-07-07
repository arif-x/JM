@extends('layouts.user')

@section('content')

<div class="page-content">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between flex-row align-items-center mb-3">
                    <div><h3>Hasil & Pembahasan Tryout Soal {{ $label }}</h3></div>
                    <div><h3 class="timer"></h3></div>    
                </div>
                
                <hr>
                <p>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link mr-2 pr-4 pl-4 btn-outline-primary active" id="pembahasan-section-tab" data-toggle="pill" href="#pembahasan-section" role="tab" aria-controls="pembahasan-section" aria-selected="true">Pembahasan</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link mr-2 pr-4 pl-4 btn-outline-primary" id="statistik-section-tab" data-toggle="pill" href="#statistik-section" role="tab" aria-controls="statistik-section" aria-selected="true">Statistik</a>
                        </li>
                    </ul>
                </p>
                <hr>
                <div class="mt-3">
                    <div data-v-1c5fc7a0="" class="alert alert-primary">
                        <p data-v-1c5fc7a0="">
                            <i data-v-1c5fc7a0="" class="mdi mdi-information text-facebook mr-0"></i><strong data-v-1c5fc7a0="" class="d-inline-block ml-1">INFORMASI</strong>
                        </p>
                        Kelas Program Khusus Pemantapan Bimbel Intensif SKD telah dibuka. Menerapkan konsep belajar Learn, Do &amp; Teach untuk memaksimalkan pemahaman materi dan progres belajar. <a data-v-1c5fc7a0="" href="/belajar/paket/bimbel-pemantapan-skd" class="font-weight-bold underline"><u data-v-1c5fc7a0="">Daftar Sekarang!</u></a>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pembahasan-section" role="tabpanel" aria-labelledby="pembahasan-section-tab">
                            <div class="row">
                                <div class="col-md-9 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between flex-row align-items-center mb-3">
                                                <div><h4 id="nomor_soal"></h4></div>
                                                <div><button id="report-soal" class="btn btn-inverse-danger btn-fw ml-0 ml-sm-1 font-weight-bold"><i class="fas fa-info-circle mr-1" aria-hidden="true"></i>Laporkan Soal</button></div>
                                            </div>
                                            <hr>
                                            <input id="no_soal" type="hidden"></input>
                                            <input id="no_soals" type="hidden"></input>
                                            <p id="soal" class="mb-3"></p>
                                            <div class="container">
                                                <p class="mb-3" id="jawaban_a_text"><strong id="jawaban_a"></strong></p>
                                                <p class="mb-3" id="jawaban_b_text"><strong id="jawaban_b"></strong></p>
                                                <p class="mb-3" id="jawaban_c_text"><strong id="jawaban_c"></strong></p>
                                                <p class="mb-3" id="jawaban_d_text"><strong id="jawaban_d"></strong></p>
                                                <p class="mb-3" id="jawaban_e_text"><strong id="jawaban_e"></strong></p>
                                            </div>
                                        </div>
                                        <div class="container mt-2 mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5>Jawaban Anda : <strong class="text-capitalize" id="jawaban_user"></strong></h5>
                                                    <h5>Poin Jawaban : </h5>
                                                    <p><strong class="text-capitalize" id="kunci_jawaban"></strong></p>
                                                    <hr>
                                                    <h4>Pembahasan</h4>
                                                    <hr>
                                                    <p id="pembahasan"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="d-flex flex-wrap justify-content-center mb-3">
                                                <button id="previous" class="btn btn-inverse-danger btn-fw mr-1 font-weight-bold" onclick="getSoal(this);">← Sebelumnya</button>
                                                <button id="next" class="btn btn-inverse-primary btn-fw ml-1 font-weight-bold" onclick="getSoal(this);">Selanjutnya →</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="reportModal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="reportModalHeading">Laporkan Soal</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="kategori_report">Pilih Kategori Laporan</label>
                                                    <select class="form-control" id="kategori_report" name="kategori_report">
                                                        <option value="" disabled selected>Pilih</option>
                                                        <option value="Soal Tidak Tepat">Soal Tidak Tepat</option>
                                                        <option value="Salah Ketik Pada Soal">Salah Ketik Pada Soal</option>
                                                        <option value="Pilihan Jawaban Tidak Sesuai">Pilihan Jawaban Tidak Sesuai</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="pesan" class="control-label">Pesan</label>
                                                    <textarea class="form-control" id="pesan" rows="3"></textarea>
                                                </div>
                                            </div>

                                            <div class="modal-footer">

                                                <button type="submit" class="btn btn-inverse-primary btn-fw ml-0 ml-sm-1 font-weight-bold" id="reportBtn" value="create">Laporkan</button>
                                                <button class="btn btn-inverse-primary btn-fw ml-0 ml-sm-1 font-weight-bold" data-dismiss="modal">Nggak Jadi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5>Keterangan:</h5>
                                            <table>
                                                <tr>
                                                    <td><span class="badge bg-success text-success" style="width: 100px; max-width:32px; height:32px; margin: 4px; padding:0;">x</span></td>
                                                    <td> = Dijawab</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="badge bg-secondary text-secondary" style="width: 100px; max-width:32px; height:32px; margin: 4px; padding:0;">x</span></td>
                                                    <td> = Tidak Dijawab</td>
                                                </tr>
                                            </table>
                                            <hr>
                                            <div class="d-flex flex-wrap justify-content-between mb-3">
                                                @foreach($soals as $key => $soal)
                                                <button id="mini_map_{{ $loop->iteration }}" class="btn mb-3 p-1 btn-secondary" style="width: 100px; max-width:32px; height:32px; margin: 4px; padding:0;" data-no="{{ $loop->iteration }}" data-id="{{ $soal['slug'] }}" onclick="getSoal(this);">{{ $loop->iteration }}</button>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="statistik-section" role="tabpanel" aria-labelledby="statistik-section-tab">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="card hasil-chart">
                                        <div class="card-body text-center">
                                            <h4 class="mb-2">Skor Akhir</h4>
                                            <p class="text-left"><strong>{!! $skor !!}</strong></p>
                                            <h6>Dari 15</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card hasil-chart">
                                        <div class="card-body text-center">
                                            <h4 class="mb-2">Hasil</h4>
                                            <h5>Dijawab = <strong>{{ $dijawab }}</strong></h5>
                                            <h5>Tidak Dijawab = <strong>{{ $kosong }}</strong></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card ">
                                        <div class="card-body">
                                            <h6 class="card-title">Statistik</h6>
                                            <canvas id="chartjsBar" style="display: block;"  class="chartjs-render-monitor hasil-charts"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .hasil-chart {
        min-height: 200px !important;
    }
    .hasil-charts {
        width: 100% !important;
        max-height: 200px !important;
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if($('#chartjsBar').length) {
            new Chart($("#chartjsBar"), {
                type: 'bar',
                data: {
                    labels: [ "Dijawab", "Kosong"],
                    datasets: [
                    {
                        label: "Jumlah",
                        backgroundColor: ["#b1cfec","#7ee5e5","#66d1d1"],
                        data: [{{$dijawab}},{{$kosong}}]
                    }
                    ]
                },
                options: {
                    legend: { display: false },
                }
            });
        }

        $('#previous').prop("disabled", true);
        $('#next').data('no', 2);
        $('#next').data('id', $('#mini_map_2').data('id'));

        $("#next").click(function () {
            $("html, body").animate({scrollTop: 0}, 500);
        });

        $("#previous").click(function () {
            $("html, body").animate({scrollTop: 0}, 500);
        });

        var slug = '{{$slugs}}';
        var no = $('#mini_map_1').data('no');
        $.getJSON("/user/tryout/pembahasan/soal/" + slug + "", function(data){
            $("#soal").html(data[0].soal_tryout);
            $("#nomor_soal").text("Soal Nomor " + $('#mini_map_1').data('no'));
            $("#no_soal").val($('#mini_map_1').data('no'));
            $("#jawaban_user").html(data[0].jawaban);
            if(data[0].jawaban == '-'){
                $("#jawaban_user").html('Tidak Dijawab');
            }
            $("#jawaban_user").addClass('text-primary');
            $("#kunci_jawaban").html(data[0].kunci);
            $("#no_soals").html(data[0].id_soal);
            $("#pembahasan").html(data[0].pembahasan);
            $("#jawaban_a_text").html(data[0].a);
            $("#jawaban_b_text").html(data[0].b);
            $("#jawaban_c_text").html(data[0].c);
            $("#jawaban_d_text").html(data[0].d);
            $("#jawaban_e_text").html(data[0].e);
            $("#jawaban_a_text").removeClass('text-primary');
            $("#jawaban_b_text").removeClass('text-primary');
            $("#jawaban_c_text").removeClass('text-primary');
            $("#jawaban_d_text").removeClass('text-primary');
            $("#jawaban_e_text").removeClass('text-primary');
            $("#jawaban_a_text").removeClass('text-danger');
            $("#jawaban_b_text").removeClass('text-danger');
            $("#jawaban_c_text").removeClass('text-danger');
            $("#jawaban_d_text").removeClass('text-danger');
            $("#jawaban_e_text").removeClass('text-danger');
            if(data[0]['jawaban'] == 'a') {
                $('#jawaban_a_text').addClass('text-primary');
            } else if(data[0]['jawaban'] == 'b') {
                $('#jawaban_b_text').addClass('text-primary');
            } else if(data[0]['jawaban'] == 'c') {
                $('#jawaban_c_text').addClass('text-primary');
            } else if(data[0]['jawaban'] == 'd') {
                $('#jawaban_d_text').addClass('text-primary');
            } else if(data[0]['jawaban'] == 'e') {
                $('#jawaban_e_text').addClass('text-primary');
            }

            all = data.length+1
            $('#mini_map_1[data-no=1]').prop('disabled', true);
            $('#mini_map_1[data-no=1]').removeClass('btn-secondary');
            $('#mini_map_1[data-no=1]').removeClass('btn-success');
            $('#mini_map_1[data-no=1]').addClass('btn-warning');
            for (var i=0; i < data.length; i++) {
                $('#mini_map_'+index_view+'[data-no='+index_view+']').click(function(){
                    $("html, body").animate({scrollTop: 0}, 500);
                });
                var index_view=i+1;
                if(data[i].jawaban != '-'){
                    $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-danger');
                    $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-secondary');
                    $('#mini_map_'+index_view+'[data-no='+index_view+']').addClass('btn-success');
                } else if(data[i].jawaban == '-'){
                    $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-secondary');
                    $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-success');
                    $('#mini_map_'+index_view+'[data-no='+index_view+']').addClass('btn-secondary');
                }
            }        
        });
    });

$('#report-soal').on('click', function(){
    $('#reportModal').modal('show');
});

$('#reportBtn').on('click', function(){
    $.ajax({
        type: "POST",
        url: "/user/tryout/report-pembahasan",
        data: {
            no: $('#no_soals').val(),
            kategori: $('#kategori_report').val(),
            pesan: $('#pesan').val(),
        },
        cache: false,
        success: function(data) {
            $('#reportModal').modal('hide');
        },
        error: function(xhr, status, error) {
            console.error(xhr);
            $('#reportModal').modal('hide');
        }
    });
})

function getSoal(obj){
    var slug = '{{$slugs}}';
    var no = $(obj).data('no');
    var actual_no = $(obj).data('no');

    $.getJSON("/user/tryout/pembahasan/soal/"+slug, function(data){  
        no_plus_1 = no + 1;
        no_min_1 = no - 1;
        length = data.length - 1;
        minimap_plus_1 = '#mini_map_' + no_plus_1;
        minimap_min_1 = '#mini_map_' + no_min_1; 
        minimap_length_min_1 = '#mini_map_' + length; 
        if(actual_no == 1){
            $('#previous').data('no', '-');
            $('#previous').prop("disabled", true);
            $('#next').prop("disabled", false);
        } else if(actual_no == data.length){
            $('#next').data('no', '-');
            $('#next').prop("disabled", true);
            $('#previous').data('no', data.length - 1);
            $('#previous').data('id', $(minimap_length_min_1).data('id'));
            $('#previous').prop("disabled", false);
        } else {
            $('#next').data('no', no + 1);
            $('#next').data('id', $(minimap_plus_1).data('id'));
            $('#next').prop("disabled", false);
            $('#previous').data('no', no_min_1);
            $('#previous').data('id', $(minimap_min_1).data('id'));
            $('#previous').prop("disabled", false);
        }

        all = data.length+1
        for (var i=0; i < data.length; i++) {
            console.log(data[i].nomor);
            $("#soal").html(data[no_min_1].soal_tryout);
            $("#nomor_soal").text("Soal Nomor " + actual_no);
            $("#no_soal").val(actual_no);
            $("#jawaban_user").html(data[no_min_1].jawaban);
            if(data[no_min_1].jawaban == '-'){
                $("#jawaban_user").html('Tidak Dijawab');
            }
            $("#jawaban_user").addClass('text-primary');
            $("#no_soals").html(data[no_min_1].id_soal);
            $("#kunci_jawaban").html(data[no_min_1].kunci);
            $("#pembahasan").html(data[no_min_1].pembahasan);
            $("#jawaban_a_text").html(data[no_min_1].a);
            $("#jawaban_b_text").html(data[no_min_1].b);
            $("#jawaban_c_text").html(data[no_min_1].c);
            $("#jawaban_d_text").html(data[no_min_1].d);
            $("#jawaban_e_text").html(data[no_min_1].e);
            $("#jawaban_a_text").removeClass('text-primary');
            $("#jawaban_b_text").removeClass('text-primary');
            $("#jawaban_c_text").removeClass('text-primary');
            $("#jawaban_d_text").removeClass('text-primary');
            $("#jawaban_e_text").removeClass('text-primary');
            $("#jawaban_a_text").removeClass('text-danger');
            $("#jawaban_b_text").removeClass('text-danger');
            $("#jawaban_c_text").removeClass('text-danger');
            $("#jawaban_d_text").removeClass('text-danger');
            $("#jawaban_e_text").removeClass('text-danger');
            if(data[no_min_1]['jawaban'] == 'a') {
                $('#jawaban_a_text').addClass('text-primary');
            } else if(data[no_min_1]['jawaban'] == 'b') {
                $('#jawaban_b_text').addClass('text-primary');
            } else if(data[no_min_1]['jawaban'] == 'c') {
                $('#jawaban_c_text').addClass('text-primary');
            } else if(data[no_min_1]['jawaban'] == 'd') {
                $('#jawaban_d_text').addClass('text-primary');
            } else if(data[no_min_1]['jawaban'] == 'e') {
                $('#jawaban_e_text').addClass('text-primary');
            }

            var index_view=i+1;
            $('#mini_map_'+index_view+'[data-no='+index_view+']').prop('disabled', false);
            if(index_view == no){
                $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-secondary');
                $('#mini_map_'+index_view+'[data-no='+index_view+']').addClass('btn-warning');
                $('#mini_map_'+index_view+'[data-no='+index_view+']').prop('disabled', true);
            } else if(index_view != no && data[i].jawaban == '-'){
                $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-warning');
                $('#mini_map_'+index_view+'[data-no='+index_view+']').addClass('btn-secondary');
                $('#mini_map_'+index_view+'[data-no='+index_view+']').prop('disabled', false);
            } else if(index_view != no && data[i].jawaban != '-'){
                $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-warning');
                $('#mini_map_'+index_view+'[data-no='+index_view+']').addClass('btn-success');
                $('#mini_map_'+index_view+'[data-no='+index_view+']').prop('disabled', false);
            }
        }       
    });
}


</script>

@endsection
