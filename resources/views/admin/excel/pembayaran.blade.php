<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        table, th, td {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Dikonfirmasi</th>
                <th>Kode</th>
                <th>Nama Paket</th>
                <th>Nama Kategori</th>
                <th>Jenis Kampus</th>
                <th>Bukti Bayar</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1 @endphp
            @foreach($datas as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->tgl_dikonfirmasi }}</td>
                <td>{{ $data->kode }}</td>
                <td>{{ $data->nama_paket }}</td>
                <td>{{ $data->nama_kategori }}</td>
                <td>{{ $data->nama_jenis_kampus }}</td>
                <td>{{ $data->bukti_pembayaran }}</td>
                <td>{{ $data->jumlah }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="7">Jumlah</td>
                <td>{{ $sum }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>