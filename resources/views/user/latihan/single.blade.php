@extends('layouts.user')

@section('content')

<div class="page-content">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between flex-row align-items-center mb-3">
                    <div><h3>Latihan Soal {{ $label }}</h3></div>
                    <div><h3 class="timer"></h3></div>    
                </div>
                
                <hr>
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
                                <p id="soal" class="mb-3"></p>
                                <div class="container">
                                    <form id="jawaban_form">
                                        <div class="form-check">
                                            <input class="form-check-input big" type="radio" data-id="a" onclick="jawab(this)" name="jawaban" id="jawaban_a" value="a">
                                            <label class="form-check-label" for="jawaban_a" id="jawaban_a_text"></label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input big" type="radio" data-id="b" onclick="jawab(this)" name="jawaban" id="jawaban_b" value="b">
                                            <label class="form-check-label" for="jawaban_b" id="jawaban_b_text"></label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input big" type="radio" data-id="c" onclick="jawab(this)" name="jawaban" id="jawaban_c" value="c">
                                            <label class="form-check-label" for="jawaban_c" id="jawaban_c_text"></label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input big" type="radio" data-id="d" onclick="jawab(this)" name="jawaban" id="jawaban_d" value="d">
                                            <label class="form-check-label" for="jawaban_d" id="jawaban_d_text"></label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input big" type="radio" data-id="e" onclick="jawab(this)" name="jawaban" id="jawaban_e" value="e">
                                            <label class="form-check-label" for="jawaban_e" id="jawaban_e_text"></label>
                                        </div>
                                    </form>
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

                    <div class="modal fade" id="selesaiModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <i class="mdi mdi-information-outline" style="font-size: 75px;"></i>
                                    <p class="modal-title" id="selesaiModalHeading">Submit Jawaban</p>
                                    <p class="mb-3">Ingin Submit Jawaban?</p>                                
                                    <button type="submit" class="btn btn-inverse-success btn-fw ml-0 ml-sm-1 font-weight-bold" id="selesaiBtn" value="create">Submit</button>
                                    <button type="submit" class="btn btn-inverse-primary btn-fw ml-0 ml-sm-1 font-weight-bold" data-dismiss="modal">Nggak Dulu</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="batalModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <i class="mdi mdi-information-outline" style="font-size: 75px;"></i>
                                    <p class="modal-title">Ingin Batalkan Latihan?</p>
                                    <p class="mb-3">Jawaban Tidak Akan Disimpan</p>
                                    <button type="submit" class="btn btn-inverse-danger btn-fw ml-0 ml-sm-1 font-weight-bold" id="batalBtn" value="create">Batalkan Saja</button>
                                    <button type="submit" class="btn btn-inverse-primary btn-fw ml-0 ml-sm-1 font-weight-bold" data-dismiss="modal">Nggak Dulu</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-wrap justify-content-between mb-3">
                                    @for($i=0; $i < count($soals); $i++)
                                    <button id="mini_map_{{ $soals[$i]['nomor'] }}" class="btn mb-3 p-1 btn-light mini_maps_c" style="width: 100px; max-width:32px; height:32px; margin: 4px; padding:0;" data-no="{{ $soals[$i]['nomor'] }}" data-id="{{ $soals[$i]['slug'] }}" onclick="getSoal(this);">{{ $soals[$i]['nomor'] }}</button>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between mb-3">
                            <button id="batal" class="btn btn-inverse-danger btn-fw ml-0 ml-sm-1 font-weight-bold">Batalkan</button>
                            <button id="selesai" class="btn btn-inverse-success btn-fw ml-0 ml-sm-1 font-weight-bold">Selesai</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#next").click(function () {
            $("html, body").animate({scrollTop: 0}, 500);
        });

        $("#previous").click(function () {
            $("html, body").animate({scrollTop: 0}, 500);
        });

        $(".mini_maps_c").click(function () {
            $("html, body").animate({scrollTop: 0}, 500);
        });

        var countDownDate = new Date("{{ $end }}").getTime();

        var myfunc = setInterval(function() {
            var now = new Date().getTime();
            var timeleft = countDownDate - now;
            var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
            var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
            $(".timer").html(minutes + ":" + seconds);
            if (timeleft < 0) {
                $.ajax({
                    type: "POST",
                    url: "/user/latihan/finish",
                    data: {},
                    cache: false,
                    success: function(data) {
                        window.location = "/user/latihan/pembahasan/"+data+"";
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
            }
        }, 1000);

        $('#previous').prop("disabled", true);
        $('#next').data('no', 2);
        $('#next').data('id', $('#mini_map_2').data('id'));

        slug = $('#mini_map_1').data('id');
        var no = $('#mini_map_1').data('no');
        $.getJSON("/user/latihan/first-soal/" + slug + "", function(data){
            $("#soal").html(data[0].soal);
            $("#nomor_soal").text("Soal Nomor " + $('#mini_map_1').data('no'));
            $("#no_soal").val($('#mini_map_1').data('no'));
            $("#jawaban_a_text").html(data[0].a);
            $("#jawaban_b_text").html(data[0].b);
            $("#jawaban_c_text").html(data[0].c);
            $("#jawaban_d_text").html(data[0].d);
            $("#jawaban_e_text").html(data[0].e);
        });
        $.getJSON("/user/latihan/get-jawaban/" + no + "", function(data){
            if(data == ''){
                $('input[name="jawaban"]').prop('checked', false);
            } else if(data == 'a') {
                $('#jawaban_a').prop('checked', true);
            } else if(data == 'b') {
                $('#jawaban_b').prop('checked', true);
            } else if(data == 'c') {
                $('#jawaban_c').prop('checked', true);
            } else if(data == 'd') {
                $('#jawaban_d').prop('checked', true);
            } else if(data == 'e') {
                $('#jawaban_e').prop('checked', true);
            }
        });
        $.getJSON("/user/latihan/get-all-jawaban", function(data){   
            all = data.length+1
            for (var i=0; i < data.length; i++) {
                var index_view=i+1;
                if(index_view == no){
                    $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-light');
                    $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-success');
                    $('#mini_map_'+index_view+'[data-no='+index_view+']').addClass('btn-warning');
                } else{
                    if(data[i].jawaban != '-'){
                        $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-light');
                        $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-warning');
                        $('#mini_map_'+index_view+'[data-no='+index_view+']').addClass('btn-success');
                    } else if(data[i].jawaban == '-'){
                        $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-success');
                        $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-warning');
                        $('#mini_map_'+index_view+'[data-no='+index_view+']').addClass('btn-light');
                    }
                }
            }        
        });
    });


$('#batal').on('click', function(){
    $('#batalModal').modal('show');
});

$('#batalBtn').on('click', function(){
    $.ajax({
        type: "POST",
        url: "/user/latihan/cancel",
        data: {},
        cache: false,
        success: function(data) {
            window.location = "/user/latihan";
        },
        error: function(xhr, status, error) {
            console.error(xhr);
        }
    });
});

$('#selesai').on('click', function(){
    $('#selesaiModal').modal('show');
});

$('#selesaiBtn').on('click', function(){
    $.ajax({
        type: "POST",
        url: "/user/latihan/finish",
        data: {},
        cache: false,
        success: function(data) {
            window.location = "/user/latihan/pembahasan/"+data+"";
        },
        error: function(xhr, status, error) {
            console.error(xhr);
        }
    });
});

$('#report-soal').on('click', function(){
    $('#reportModal').modal('show');
});

$('#reportBtn').on('click', function(){
    $.ajax({
        type: "POST",
        url: "/user/latihan/report",
        data: {
            no: $('#no_soal').val(),
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

function getSoal(obj) {
    var slug = $(obj).data('id');
    var no = $(obj).data('no');
    var actual_no = $(obj).data('no');
    console.log(obj)
    $.getJSON("/user/latihan/get-all-jawaban", function(data){  
        no_plus_1 = no + 1;
        no_min_1 = no - 1;
        length = data.length - 1;
        minimap_plus_1 = '#mini_map_' + no_plus_1;
        minimap_min_1 = '#mini_map_' + no_min_1; 
        minimap_length_min_1 = '#mini_map_' + length; 
        if(actual_no == 1){
            $('#previous').data('no', '-');
            $('#previous').prop("disabled", true);
            $('#next').data('no', 2);
            $('#next').data('id', $('#mini_map_2').data('id'));
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
            var index_view=i+1;
            // $('#mini_map_'+index_view+'[data-no='+index_view+']').click(function(){
            //     $("html, body").animate({scrollTop: 0}, 500);
            // });
            if(index_view == no){
                $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-light');
                $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-success');
                $('#mini_map_'+index_view+'[data-no='+index_view+']').addClass('btn-warning');
            } else{
                if(data[i].jawaban != '-'){
                    $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-light');
                    $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-warning');
                    $('#mini_map_'+index_view+'[data-no='+index_view+']').addClass('btn-success');
                } else if(data[i].jawaban == '-'){
                    $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-success');
                    $('#mini_map_'+index_view+'[data-no='+index_view+']').removeClass('btn-warning');
                    $('#mini_map_'+index_view+'[data-no='+index_view+']').addClass('btn-light');
                }
            }
        }        
    });

    $.getJSON("/user/latihan/get-soal/" + slug + "", function(data){
        $("#soal").html(data[0].soal);
        $("#nomor_soal").text("Soal Nomor " + actual_no);
        $("#no_soal").val(actual_no);
        $("#jawaban_a_text").html(data[0].a);
        $("#jawaban_b_text").html(data[0].b);
        $("#jawaban_c_text").html(data[0].c);
        $("#jawaban_d_text").html(data[0].d);
        $("#jawaban_e_text").html(data[0].e);
    });

    $.getJSON("/user/latihan/get-jawaban/" + no + "", function(data){
        if(data == '-'){
            $('input[name="jawaban"]').prop('checked', false);
        } else if(data == 'a') {
            $('#jawaban_a').prop('checked', true);
        } else if(data == 'b') {
            $('#jawaban_b').prop('checked', true);
        } else if(data == 'c') {
            $('#jawaban_c').prop('checked', true);
        } else if(data == 'd') {
            $('#jawaban_d').prop('checked', true);
        } else if(data == 'e') {
            $('#jawaban_e').prop('checked', true);
        }
    });
}

function jawab(obj) {
    $.ajax({
        type: "POST",
        url: "/user/latihan/store",
        data: {
            no: $('#no_soal').val(),
            jawaban: $(obj).data('id')
        },
        cache: false,
        success: function(data) {

        },
        error: function(xhr, status, error) {
            console.error(xhr);
        }
    });
}

</script>

@endsection
