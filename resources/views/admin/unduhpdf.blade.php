<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pemeriksaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #f4f4f4;
            padding: 15px;
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #ddd;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 14px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .no-data {
            text-align: center;
            color: #666;
            font-style: italic;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Laporan Pemeriksaan</h1>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Pasien</th>
                    <th>Nama Pasien</th>
                    <th>Nama Dokter</th>
                    <th>Jenis Tes</th>
                    <th>Waktu dan Tanggal Pemeriksaan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @if ($data->isEmpty())
                    <tr>
                        <td colspan="7" class="no-data">Tidak ada data</td>
                    </tr>
                @else
                    @foreach ($data as $pemeriksaan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pemeriksaan->pasien->kode_pasien }}</td>
                            <td>{{ $pemeriksaan->pasien->nama_pasien }}</td>
                            <td>{{ $pemeriksaan->dokter->nama_dokter }}</td>
                            <td>{{ $pemeriksaan->jenisTes->nama_tes }}</td>
                            <td>{{ $pemeriksaan->waktu_pemeriksaan }}</td>
                            <td>{{ $pemeriksaan->status_pemeriksaan }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="footer">
            <p>Semua data yang tertera adalah informasi pada tanggal {{ $tgl }}.</p>
        </div>
    </div>
</body>

</html>
