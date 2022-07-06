@extends('layouts.admin')

@section('content')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h6 class="card-title">Materi</h6>
                <div class="card-description">
                    <button class="btn btn-primary" id="tambah">Tambah</button>
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
                                <th>Label Materi</th>
                                <th>Materi</th>
                                <th>Action</th>
                            </tr>
                        </thead>  
                    </table>

                    <div class="modal fade" id="theModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="theModalHeading"></h4>
                                </div>
                                <div class="modal-body">
                                    <form id="theForm" name="theForm" class="form-horizontal">
                                        <input type="hidden" name="id_materi" id="id_materi">

                                        <div class="form-group">
                                            <label for="id_label_materi" class="control-label">Label Materi</label>
                                            <select name="id_label_materi" id="id_label_materi" class="form-control">
                                                <option value="" disabled selected>Pilih</option>
                                                @foreach ($label_materi as $key => $value)
                                                <option value="{{ $value }}">{{ $key }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="judul_materi" class="control-label">Judul Materi</label>
                                            <input type="text" name="judul_materi" id="judul_materi" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="deskripsi" class="control-label">Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="5"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="materi" class="control-label">Materi</label>
                                            <textarea name="materi" class="form-control" id="materi" cols="30" rows="60"></textarea>
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
                                    <input type="hidden" name="id_materi" id="id_materi_delete">
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
                                ajax: "{{ route('admin.materi.materi.index') }}",
                                columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: 'nama_label', name: 'nama_label'},
                                {data: 'materis', name:'materis'},
                                {data: 'action', name: 'action'},
                                ],
                            });

                            $('#tambah').click(function () {
                                $('#saveBtn').val("save");
                                $('#id_materi').val('');
                                $('#theForm').trigger("reset");
                                $('#theModalHeading').html("Tambah Data");
                                $('#label_materi').val();
                                $('#judul_materi').val();
                                $('#deskripsi').val();
                                tinymce.get("materi").setContent('');
                                $('#theModal').modal('show');
                            });

                            $('body').on('click', '.edit-data', function () {
                                var id_materi = $(this).data('id');
                                $.get("{{ route('admin.materi.materi.index') }}" +'/' + id_materi + '', function (data) {
                                    $('#theModalHeading').html("Edit");
                                    $('#saveBtn').val("save");
                                    $('#id_materi').val(data.id_materi);
                                    $('#id_label_materi').val(data.id_label_materi);
                                    $('#judul_materi').val(data.judul_materi);
                                    $('#deskripsi').val(data.deskripsi);
                                    tinymce.get("materi").setContent(data.materi);
                                    $('#theModal').modal('show');
                                })
                            });

                            $('body').on('click', '.delete-data', function () {
                                var id_materi = $(this).data('id');
                                $.get("{{ route('admin.materi.materi.index') }}" +'/' + id_materi + '', function (data) {
                                    $('#theModalDeleteHeading').html("Hapus");
                                    $('#saveDeteleBtn').val("delete");
                                    $('#id_materi_delete').val(data.id_materi);
                                    $('#theDeleteModal').modal('show');
                                })
                            });

                            $('#saveBtn').click(function (e) {
                                e.preventDefault();
                                $(this).html('Simpan');

                                $.ajax({
                                    data: {
                                        id_materi: $('#id_materi').val(),
                                        id_label_materi: $('#id_label_materi').val(),
                                        judul_materi: $('#judul_materi').val(),
                                        deskripsi: $('#deskripsi').val(),
                                        materi: tinymce.get('materi').getContent(),
                                    },
                                    url: "{{ route('admin.materi.materi.store') }}",
                                    type: "POST",
                                    dataType: 'json',
                                    success: function (data) {
                                        $('#theForm').trigger("reset");
                                        $('#theModal').modal('hide');
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
                                var id_materi = $('#id_materi_delete').val();
                                $.ajax({
                                    type: "DELETE",
                                    url: "{{ route('admin.materi.materi.store') }}"+'/'+id_materi,
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
                        var materi = {
                            path_absolute : "/",
                            selector: '#materi',
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
                                var cmsURL = materi.path_absolute + 'admin/filemanager?editor=' + meta.fieldname;
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
                        tinymce.init(materi);
                    </script>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection