@extends('layouts.user')

@section('content')

<div class="page-content">
	<div class="col-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				@foreach($soals as $soal)
				<h3>Persiapan Event Tryout {{ $soal->nama_label }}</h3>
				<hr class="my-4">
				@if ($message = Session::get('success'))
				<div class="alert alert-primary alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button> 
					<strong>{{ $message }}</strong>
				</div>
				@endif
				<form method="POST" action="{{ route('user.event-tryout.kerjakan', $soal->slug) }}">
					@csrf
					<div class="row">
						<div class="col-md-12">
							<table class="table table-hover">
								<tr>
									<th class="w-25">Tryout </th>
									<td class="fs-15">{{ $soal->nama_label }}</td>
								</tr>
								<tr>
									<th class="w-25">Jumlah Soal</th>
									<td class="fs-15">{{ $soal->counts }} soal</td>
								</tr>
								<tr>
									<th class="w-25">Waktu Mengerjakan</th>
									<td class="fs-15">{{ $soal->counts }} menit</td>
								</tr>
								<tr>
									<th class="w-25">Kode Kupon</th>
									<td class="fs-15">
										<input type="tetx" name="kupon" class="form-control" required>
									</td>
								</tr>
							</table>
							<div class="alert alert-warning">
								<strong><i class="mdi mdi-information mr-0"></i> Perhatian!</strong>
								<ol>
									<li> Gunakan browser Google Chrome versi terbaru supaya website dapat diakses dengan lancar tanpa masalah. </li>
									<li> Pastikan tidak ada aktivitas login ke akun anda (pada perangkat lain) saat sedang mengerjakan tryout. </li>
								</ol>
							</div>
							<div class="mt-4 d-flex flex-column flex-sm-row">
								<button type="submit" class="btn btn-inverse-primary btn-fw mr-0 mr-sm-1 font-weight-bold mb-2 mb-sm-0"><i class="mdi mdi-file-document-edit-outline icon-md"></i> Kerjakan Sekarang </button>
								<button class="btn btn-inverse-danger btn-fw ml-0 ml-sm-1 font-weight-bold"><i class="mdi mdi-cancel icon-md"></i> Batal </button>
							</div>
						</div>
					</div>

				</form>
				@endforeach
			</div>
		</div>
	</div>
</div>

@endsection