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

                <p>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link mr-2 pr-4 pl-4 btn-outline-primary active" id="global-section-tab" data-toggle="pill" href="#global-section" role="tab" aria-controls="global-section" aria-selected="true">Ranking Global</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link mr-2 pr-4 pl-4 btn-outline-primary" id="univ-section-tab" data-toggle="pill" href="#univ-section" role="tab" aria-controls="univ-section" aria-selected="true">Ranking Per Universitas</a>
                        </li>
                    </ul>
                </p>

                <div class="mt-3">
                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade active show" id="global-section" role="tabpanel" aria-labelledby="global-section-tab">
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
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
                                            {data: 'nama_lengkap', name: 'nama_lengkap'},
                                            {data: 'skor', name: 'skor'},
                                            ]
                                        });
                                    });
                                </script>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="univ-section" role="tabpanel" aria-labelledby="univ-section-tab">
                            <div class="table-responsive">
                                <table id="dataTableExamples" class="table table-striped w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
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
                                        var table = $('#dataTableExamples').DataTable({
                                            processing: true,
                                            serverSide: true,
                                            paging: true,
                                            ajax: "{{ route('user.event-tryout.hasiluniv', $slugs) }}",
                                            columns: [
                                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                            {data: 'nama_lengkap', name: 'nama_lengkap'},
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
        </div>
    </div>
</div>

@endsection