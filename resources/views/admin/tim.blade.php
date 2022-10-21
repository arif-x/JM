@extends('layouts.admin')

@section('content')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h6 class="card-title">Tim</h6>
                <div class="card-description">
                    <button class="btn btn-primary" id="tambah">Tambah</button>
                </div>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Lulusan</th>
                                <th>Jabatan</th>
                                <th>Foto</th>
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
                                        <input type="hidden" name="id_tim" id="id_tim">

                                        <div class="form-group">
                                            <label for="nama" class="control-label">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" required="">
                                        </div>

                                        <div class="form-group">
                                            <label for="lulusan" class="control-label">Lulusan</label>
                                            <input type="lulusan" class="form-control" id="lulusan" name="lulusan" required="">
                                        </div>

                                        <div class="form-group">
                                            <label for="jabatan" class="control-label">Jabatan</label>
                                            <input type="text" class="form-control" id="jabatan" name="jabatan" required="">
                                        </div>

                                        <div class="form-group">
                                            <label for="foto" class="control-label">Foto</label>
                                            <input type="file" class="form-control" id="foto" name="foto">
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
                                    <input type="hidden" name="id_tim" id="id_tim_delete">
                                    <h4>Ingin Menghapus Data Ini?</h4>
                                    <button type="submit" class="btn btn-danger w-100" id="saveDeteleBtn" value="delete">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                ajax: "{{ route('admin.tim.index') }}",
                                columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: 'nama', name: 'nama'},
                                {data: 'lulusan', name: 'lulusan'},
                                {data: 'jabatan', name: 'jabatan'},
                                {data: 'image', name: 'image'},
                                {data: 'action', name: 'action'},
                                ]
                            });

                            $('#tambah').click(function () {
                                $('#saveBtn').val("save");
                                $('#id_tim').val('');
                                $('#theForm').trigger("reset");
                                $('#theModalHeading').html("Tambah Data");
                                $('#theModal').modal('show');
                            });

                            $('body').on('click', '.edit-data', function () {
                                var id_tim = $(this).data('id');
                                $.get("{{ route('admin.tim.index') }}" +'/' + id_tim + '', function (data) {
                                    $('#theModalHeading').html("Edit");
                                    $('#saveBtn').val("save");
                                    $('#id_tim').val(data.id_tim);
                                    $('#nama').val(data.nama);
                                    $('#lulusan').val(data.lulusan);
                                    $('#jabatan').val(data.jabatan);
                                    $('#theModal').modal('show');
                                })
                            });

                            $('body').on('click', '.delete-data', function () {
                                var id_tim = $(this).data('id');
                                $.get("{{ route('admin.tim.index') }}" +'/' + id_tim + '', function (data) {
                                    $('#theModalDeleteHeading').html("Hapus");
                                    $('#saveDeteleBtn').val("delete");
                                    $('#id_tim_delete').val(data.id_tim);
                                    $('#theDeleteModal').modal('show');
                                })
                            });

                            $('#saveBtn').click(function (e) {
                                e.preventDefault();
                                let formData = new FormData(document.getElementById("theForm"));

                                $.ajax({
                                    data: formData,
                                    url: "{{ route('admin.tim.store') }}",
                                    type: "POST",
                                    dataType: 'json',
                                    contentType: false,
                                    processData: false,
                                    success: function (data) {
                                        $('#theForm').trigger("reset");
                                        $('#theModal').modal('hide');
                                        table.draw();
                                    },
                                    error: function (data) {
                                        console.log('Error:', data);
                                        $('#saveBtn').html('Simpan');
                                    }
                                });
                            });

                            $('#saveDeteleBtn').click(function (e) {
                                var id_tim = $('#id_tim_delete').val();
                                $.ajax({
                                    type: "DELETE",
                                    url: "{{ route('admin.tim.store') }}"+'/'+id_tim,
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
                </div>
            </div>
        </div>
    </div>

</div>

@endsection