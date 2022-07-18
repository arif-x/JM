@extends('layouts.admin')

@section('content')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h6 class="card-title">Referral</h6>
                <div class="card-description">
                    <!-- <button class="btn btn-primary" id="tambah">Tambah</button> -->
                </div>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Transaksi</th>
                                <th>Email Eeferrer</th>
                                <th>Email Referee</th>
                                <th>Referrer</th>
                                <th>Referee</th>
                            </tr>
                        </thead>  
                    </table>

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
                                ajax: "{{ route('admin.referral.index') }}",
                                columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: 'kode', name: 'kode'},
                                {data: 'email_referrer', name: 'email_referrer'},
                                {data: 'email_referee', name: 'email_referee'},
                                {data: 'referrer', name: 'referrer'},
                                {data: 'referee', name: 'referee'},
                                ]
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection