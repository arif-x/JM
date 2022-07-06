@extends('layouts.user')

@section('content')

<div class="page-content">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div>
                    <h3>Hasil Event Tryout {{ $label }}</h3>
                    <p>Berikut hasil ranking event tryout.</p>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tryout</th>
                                <th>Skor</th>
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
                                ajax: "{{ route('user.event-tryout.hasil', $slugs) }}",
                                columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: 'nama_label', name: 'nama_label'},
                                {data: 'skor', name: 'skor'},
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