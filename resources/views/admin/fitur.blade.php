@extends('layouts.admin')

@section('content')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h6 class="card-title">Fitur</h6>
                <!-- <div class="card-description">
                    <button class="btn btn-primary" id="tambah">Tambah</button>
                </div> -->
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Header</th>
                                <th>Deskripsi</th>
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
                                        <input type="hidden" name="id_fitur" id="id_fitur">

                                        <div class="form-group">
                                            <label for="header" class="control-label">Header</label>
                                            <input type="text" class="form-control" id="header" name="header" required="">
                                        </div>

                                        <div class="form-group">
                                            <label for="deskripsi" class="control-label">Deskripsi</label>
                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" required="">
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
                                    <input type="hidden" name="id_fitur" id="id_fitur_delete">
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
                                ajax: "{{ route('admin.fitur.index') }}",
                                columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: 'header', name: 'header'},
                                {data: 'deskripsi', name: 'deskripsi'},
                                {data: 'action', name: 'action'},
                                ]
                            });

                            $('#import').click(function () {
                                $('#importForm').trigger("reset");
                                $('#importModalHeading').html("Import Data");
                                $('#importModal').modal('show');
                            });

                            $('#tambah').click(function () {
                                $('#saveBtn').val("save");
                                $('#id_fitur').val('');
                                $('#theForm').trigger("reset");
                                $('#theModalHeading').html("Tambah Data");
                                $('#theModal').modal('show');
                            });

                            $('body').on('click', '.edit-data', function () {
                                var id_fitur = $(this).data('id');
                                $.get("{{ route('admin.fitur.index') }}" +'/' + id_fitur + '', function (data) {
                                    $('#theModalHeading').html("Edit");
                                    $('#saveBtn').val("save");
                                    $('#id_fitur').val(data.id_fitur);
                                    $('#header').val(data.header);
                                    $('#deskripsi').val(data.deskripsi);
                                    $('#theModal').modal('show');
                                })
                            });

                            $('body').on('click', '.delete-data', function () {
                                var id_fitur = $(this).data('id');
                                $.get("{{ route('admin.fitur.index') }}" +'/' + id_fitur + '', function (data) {
                                    $('#theModalDeleteHeading').html("Hapus");
                                    $('#saveDeteleBtn').val("delete");
                                    $('#id_fitur_delete').val(data.id_fitur);
                                    $('#theDeleteModal').modal('show');
                                })
                            });

                            $('#saveBtn').click(function (e) {
                                e.preventDefault();
                                $(this).html('Simpan');

                                $.ajax({
                                    data: $('#theForm').serialize(),
                                    url: "{{ route('admin.fitur.store') }}",
                                    type: "POST",
                                    dataType: 'json',
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
                                var id_fitur = $('#id_fitur_delete').val();
                                $.ajax({
                                    type: "DELETE",
                                    url: "{{ route('admin.fitur.store') }}"+'/'+id_fitur,
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