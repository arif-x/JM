@extends('layouts.admin-soal')

@section('content')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h6 class="card-title">Soal Latihan</h6>
                <div class="card-description">
                    <button class="btn btn-primary" id="tambah">Tambah</button>
                    <button class="btn btn-primary" id="import">Import Excel</button>
                </div>
                <div class="alert alert-success alert-block" style="display: none">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong id="pesan"></strong>
                </div>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Label Soal</th>
                                <th>Soal</th>
                                <th>Action</th>
                            </tr>
                        </thead>  
                    </table>

                    <div class="modal fade" id="importModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="importModalHeading"></h4>
                                </div>
                                <div class="modal-body">
                                    <form id="importForm" method="POST" name="importForm" class="form-horizontal" action="{{ route('admin-soal.latihan.import') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="file" class="control-label">File Excel</label>
                                            <input type="file" class="form-control" id="file" name="file" required="">
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100">Import</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="theModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="theModalHeading"></h4>
                                </div>
                                <div class="modal-body">
                                    <form id="theForm" name="theForm" class="form-horizontal">
                                        <input type="hidden" name="id_soal" id="id_soal">

                                        <div class="form-group">
                                            <label for="id_label_soal" class="control-label">Label Soal</label>
                                            <select name="id_label_soal" id="id_label_soal" class="form-control">
                                                <option value="" disabled selected>Pilih</option>
                                                @foreach ($label_soal as $key => $value)
                                                <option value="{{ $value }}">{{ $key }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="soal" class="control-label">Soal</label>
                                            <textarea name="soal" class="soal form-control" id="soal" cols="30" rows="60"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="jawaban_a" class="control-label">Jawaban A</label>
                                            <textarea name="jawaban_a" class="jawaban_a form-control" id="jawaban_a" cols="30" rows="60"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="jawaban_b" class="control-label">Jawaban B</label>
                                            <textarea name="jawaban_b" class="jawaban_b form-control" id="jawaban_b" cols="30" rows="60"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="jawaban_c" class="control-label">Jawaban C</label>
                                            <textarea name="jawaban_c" class="jawaban_c form-control" id="jawaban_c" cols="30" rows="60"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="jawaban_d" class="control-label">Jawaban D</label>
                                            <textarea name="jawaban_d" class="jawaban_d form-control" id="jawaban_d" cols="30" rows="60"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="jawaban_e" class="control-label">Jawaban E</label>
                                            <textarea name="jawaban_e" class="jawaban_e form-control" id="jawaban_e" cols="30" rows="60"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="kunci" class="control-label">Kunci Jawaban</label>
                                            <select class="form-control" id="kunci" name="kunci">
                                                <option value="" disabled selected>Pilih</option>
                                                <option value="a">A</option>
                                                <option value="b">B</option>
                                                <option value="c">C</option>
                                                <option value="d">D</option>
                                                <option value="e">E</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="pembahasan" class="control-label">Pembahasan</label>
                                            <textarea name="pembahasan" class="pembahasan form-control" id="pembahasan" cols="30" rows="60"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100" id="saveBtn" value="create">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="theDeleteModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="theModalDeleteHeading"></h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id_soal" id="id_soal_delete">
                                    <h4>Ingin Menghapus Data Ini?</h4>
                                    <button type="submit" class="btn btn-danger w-100" id="saveDeteleBtn" value="delete">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script src="https://cdn.tiny.cloud/1/m1nz6lkq0ki8c21mhmdrhi8pfa5sjru7d79jblmku8iu0e3u/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                    <script type="text/javascript">
                        $(function () {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            var table = $('#dataTableExample').DataTable({
                                processing: true,
                                serverSide: true,
                                paging: true,
                                ajax: "{{ route('admin-soal.latihan.soal.index') }}",
                                columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: 'nama_label', name: 'nama_label'},
                                {data: 'soals', name:'soals'},
                                {data: 'action', name: 'action'},
                                ],
                            });

                            $('#import').click(function () {
                                $('#importForm').trigger("reset");
                                $('#importModalHeading').html("Import Data");
                                $('#importModal').modal('show');
                            });

                            $('#tambah').click(function () {
                                $('#saveBtn').val("save");
                                $('#id_soal').val('');
                                $('#theForm').trigger("reset");
                                $('#theModalHeading').html("Tambah Data");
                                $('#label_soal').val();
                                tinymce.get("soal").setContent('');
                                tinymce.get("jawaban_a").setContent('');
                                tinymce.get("jawaban_b").setContent('');
                                tinymce.get("jawaban_c").setContent('');
                                tinymce.get("jawaban_d").setContent('');
                                tinymce.get("jawaban_e").setContent('');
                                tinymce.get("pembahasan").setContent('');
                                $('#theModal').modal('show');
                            });

                            $('body').on('click', '.edit-data', function () {
                                var id_soal = $(this).data('id');
                                $.get("{{ route('admin-soal.latihan.soal.index') }}" +'/' + id_soal + '', function (data) {
                                    $('#theModalHeading').html("Edit");
                                    $('#saveBtn').val("save");
                                    $('#id_soal').val(data.id_soal);
                                    $('#id_label_soal').val(data.id_label_soal);
                                    tinymce.get("soal").setContent(data.soal);
                                    tinymce.get("jawaban_a").setContent(data.a);
                                    tinymce.get("jawaban_b").setContent(data.b);
                                    tinymce.get("jawaban_c").setContent(data.c);
                                    tinymce.get("jawaban_d").setContent(data.d);
                                    tinymce.get("jawaban_e").setContent(data.e);
                                    $('#kunci').val(data.kunci);
                                    tinymce.get("pembahasan").setContent(data.pembahasan);
                                    $('#theModal').modal('show');
                                })
                            });

                            $('body').on('click', '.delete-data', function () {
                                var id_soal = $(this).data('id');
                                $.get("{{ route('admin-soal.latihan.soal.index') }}" +'/' + id_soal + '', function (data) {
                                    $('#theModalDeleteHeading').html("Hapus");
                                    $('#saveDeteleBtn').val("delete");
                                    $('#id_soal_delete').val(data.id_soal);
                                    $('#theDeleteModal').modal('show');
                                })
                            });

                            $('#saveBtn').click(function (e) {
                                e.preventDefault();
                                $(this).html('Simpan');

                                $.ajax({
                                    data: {
                                        id_soal: $('#id_soal').val(),
                                        id_label_soal: $('#id_label_soal').val(),
                                        soal: tinymce.get('soal').getContent(),
                                        a: tinymce.get('jawaban_a').getContent(),
                                        b: tinymce.get('jawaban_b').getContent(),
                                        c: tinymce.get('jawaban_c').getContent(),
                                        d: tinymce.get('jawaban_d').getContent(),
                                        e: tinymce.get('jawaban_e').getContent(),
                                        kunci: $('#kunci').val(),
                                        pembahasan: tinymce.get('pembahasan').getContent(),
                                    },
                                    url: "{{ route('admin-soal.latihan.soal.store') }}",
                                    type: "POST",
                                    dataType: 'json',
                                    success: function (data) {
                                        $('#theForm').trigger("reset");
                                        $('#theModal').modal('hide');
                                        $('.alert').show();
                                        $('#pesan').html(data);
                                        table.draw();
                                    },
                                    error: function (data) {
                                        console.log('Error:', data);
                                        $('#saveBtn').html('Simpan');
                                    }
                                });
                            });

                            $('#saveDeteleBtn').click(function (e) {
                                var id_soal = $('#id_soal_delete').val();
                                $.ajax({
                                    type: "DELETE",
                                    url: "{{ route('admin-soal.latihan.soal.store') }}"+'/'+id_soal,
                                    success: function (data) {
                                        table.draw();
                                        $('#theDeleteModal').modal('hide');
                                    },
                                    error: function (data) {
                                        console.log('Error:', data);
                                    }
                                });
                            });

                        });
                    </script>
                    <script>
                        var soal_config = {
                            path_absolute : "/",
                            selector: '#soal',
                            relative_urls: false,
                            plugins: [
                            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                            "searchreplace wordcount visualblocks visualchars code fullscreen",
                            "insertdatetime media nonbreaking save table directionality",
                            "emoticons template paste textpattern autoresize"
                            ],
                            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                            file_picker_callback : function(callback, value, meta) {
                                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                                var cmsURL = soal_config.path_absolute + 'slameho/filemanager?editor=' + meta.fieldname;
                                if (meta.filetype == 'image') {
                                    cmsURL = cmsURL + "&type=Images";
                                } else {
                                    cmsURL = cmsURL + "&type=Files";
                                }
                                tinyMCE.activeEditor.windowManager.openUrl({
                                    url : cmsURL,
                                    title : 'Filemanager',
                                    width : x * 0.8,
                                    height : y * 0.8,
                                    resizable : "yes",
                                    close_previous : "no",
                                    onMessage: (api, message) => {
                                        callback(message.content);
                                    }
                                });
                            }
                        };
                        tinymce.init(soal_config);
                    </script>
                    <script>
                        var jawaban_a = {
                            path_absolute : "/",
                            selector: '#jawaban_a',
                            relative_urls: false,
                            plugins: [
                            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                            "searchreplace wordcount visualblocks visualchars code fullscreen",
                            "insertdatetime media nonbreaking save table directionality",
                            "emoticons template paste textpattern autoresize"
                            ],
                            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                            file_picker_callback : function(callback, value, meta) {
                                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                                var cmsURL = jawaban_a.path_absolute + 'slameho/filemanager?editor=' + meta.fieldname;
                                if (meta.filetype == 'image') {
                                    cmsURL = cmsURL + "&type=Images";
                                } else {
                                    cmsURL = cmsURL + "&type=Files";
                                }
                                tinyMCE.activeEditor.windowManager.openUrl({
                                    url : cmsURL,
                                    title : 'Filemanager',
                                    width : x * 0.8,
                                    height : y * 0.8,
                                    resizable : "yes",
                                    close_previous : "no",
                                    onMessage: (api, message) => {
                                        callback(message.content);
                                    }
                                });
                            }
                        };
                        tinymce.init(jawaban_a);
                    </script>
                    <script>
                        var jawaban_b = {
                            path_absolute : "/",
                            selector: '#jawaban_b',
                            relative_urls: false,
                            plugins: [
                            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                            "searchreplace wordcount visualblocks visualchars code fullscreen",
                            "insertdatetime media nonbreaking save table directionality",
                            "emoticons template paste textpattern autoresize"
                            ],
                            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                            file_picker_callback : function(callback, value, meta) {
                                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                                var cmsURL = jawaban_b.path_absolute + 'slameho/filemanager?editor=' + meta.fieldname;
                                if (meta.filetype == 'image') {
                                    cmsURL = cmsURL + "&type=Images";
                                } else {
                                    cmsURL = cmsURL + "&type=Files";
                                }
                                tinyMCE.activeEditor.windowManager.openUrl({
                                    url : cmsURL,
                                    title : 'Filemanager',
                                    width : x * 0.8,
                                    height : y * 0.8,
                                    resizable : "yes",
                                    close_previous : "no",
                                    onMessage: (api, message) => {
                                        callback(message.content);
                                    }
                                });
                            }
                        };
                        tinymce.init(jawaban_b);
                    </script>
                    <script>
                        var jawaban_c = {
                            path_absolute : "/",
                            selector: '#jawaban_c',
                            relative_urls: false,
                            plugins: [
                            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                            "searchreplace wordcount visualblocks visualchars code fullscreen",
                            "insertdatetime media nonbreaking save table directionality",
                            "emoticons template paste textpattern autoresize"
                            ],
                            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                            file_picker_callback : function(callback, value, meta) {
                                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                                var cmsURL = jawaban_c.path_absolute + 'slameho/filemanager?editor=' + meta.fieldname;
                                if (meta.filetype == 'image') {
                                    cmsURL = cmsURL + "&type=Images";
                                } else {
                                    cmsURL = cmsURL + "&type=Files";
                                }
                                tinyMCE.activeEditor.windowManager.openUrl({
                                    url : cmsURL,
                                    title : 'Filemanager',
                                    width : x * 0.8,
                                    height : y * 0.8,
                                    resizable : "yes",
                                    close_previous : "no",
                                    onMessage: (api, message) => {
                                        callback(message.content);
                                    }
                                });
                            }
                        };
                        tinymce.init(jawaban_c);
                    </script>
                    <script>
                        var jawaban_d = {
                            path_absolute : "/",
                            selector: '#jawaban_d',
                            relative_urls: false,
                            plugins: [
                            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                            "searchreplace wordcount visualblocks visualchars code fullscreen",
                            "insertdatetime media nonbreaking save table directionality",
                            "emoticons template paste textpattern autoresize"
                            ],
                            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                            file_picker_callback : function(callback, value, meta) {
                                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                                var cmsURL = jawaban_d.path_absolute + 'slameho/filemanager?editor=' + meta.fieldname;
                                if (meta.filetype == 'image') {
                                    cmsURL = cmsURL + "&type=Images";
                                } else {
                                    cmsURL = cmsURL + "&type=Files";
                                }
                                tinyMCE.activeEditor.windowManager.openUrl({
                                    url : cmsURL,
                                    title : 'Filemanager',
                                    width : x * 0.8,
                                    height : y * 0.8,
                                    resizable : "yes",
                                    close_previous : "no",
                                    onMessage: (api, message) => {
                                        callback(message.content);
                                    }
                                });
                            }
                        };
                        tinymce.init(jawaban_d);
                    </script>
                    <script>
                        var jawaban_e = {
                            path_absolute : "/",
                            selector: '#jawaban_e',
                            relative_urls: false,
                            plugins: [
                            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                            "searchreplace wordcount visualblocks visualchars code fullscreen",
                            "insertdatetime media nonbreaking save table directionality",
                            "emoticons template paste textpattern autoresize"
                            ],
                            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                            file_picker_callback : function(callback, value, meta) {
                                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                                var cmsURL = jawaban_e.path_absolute + 'slameho/filemanager?editor=' + meta.fieldname;
                                if (meta.filetype == 'image') {
                                    cmsURL = cmsURL + "&type=Images";
                                } else {
                                    cmsURL = cmsURL + "&type=Files";
                                }
                                tinyMCE.activeEditor.windowManager.openUrl({
                                    url : cmsURL,
                                    title : 'Filemanager',
                                    width : x * 0.8,
                                    height : y * 0.8,
                                    resizable : "yes",
                                    close_previous : "no",
                                    onMessage: (api, message) => {
                                        callback(message.content);
                                    }
                                });
                            }
                        };
                        tinymce.init(jawaban_e);
                    </script>
                    <script>
                        var pembahasan = {
                            path_absolute : "/",
                            selector: '#pembahasan',
                            relative_urls: false,
                            plugins: [
                            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                            "searchreplace wordcount visualblocks visualchars code fullscreen",
                            "insertdatetime media nonbreaking save table directionality",
                            "emoticons template paste textpattern autoresize"
                            ],
                            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                            file_picker_callback : function(callback, value, meta) {
                                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                                var cmsURL = pembahasan.path_absolute + 'slameho/filemanager?editor=' + meta.fieldname;
                                if (meta.filetype == 'image') {
                                    cmsURL = cmsURL + "&type=Images";
                                } else {
                                    cmsURL = cmsURL + "&type=Files";
                                }
                                tinyMCE.activeEditor.windowManager.openUrl({
                                    url : cmsURL,
                                    title : 'Filemanager',
                                    width : x * 0.8,
                                    height : y * 0.8,
                                    resizable : "yes",
                                    close_previous : "no",
                                    onMessage: (api, message) => {
                                        callback(message.content);
                                    }
                                });
                            }
                        };
                        tinymce.init(pembahasan);
                    </script>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection