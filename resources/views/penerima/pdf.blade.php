<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laporan {{ $menu }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style type="text/css">
        @page {
            size: A4;
            size: landscape;
        }

        h1 {
            font-weight: bold;
            font-size: 20pt;
            text-align: center;
        }

        html {
            -webkit-font-smoothing: antialiased;
            font-size: 75%;

        }

        body {
            position: relative;
            font: 12pt Georgia, "Times New Roman", Times, serif;
            line-height: 1.3;
            padding-top: 30px;
            padding-bottom: 30px;
            padding-right: 30px;
            /* padding-left: 40px; */
            /* width: 1000px; */
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th {
            padding: 8px 8px;
            border: 1px solid #000000;
            text-align: center;
        }

        .table td {
            vertical-align: top;
            padding: 3px 3px;
            border: 1px solid #000000;
        }

        .text-center {
            text-align: center;
        }

        p {
            font-size: 12pt
        }

        .mt-05 {
            margin-top: 0.5cm;
        }

        .mt-1 {
            margin-top: 1cm;
        }

        .mt-2 {
            margin-top: 2cm;
        }

        .mt-5 {
            margin-top: 5cm;
        }

        .container {
            margin-left: 0.5cm;
            margin-top: 0cm;
            margin-right: 0.5cm;
            margin-bottom: 0.5cm;
        }

        .point {
            width: 1cm;
        }

        .justify {
            text-align: justify;
        }

        .text {
            font-size: 10pt;
            line-height: 25px;
        }

        .row {
            display: flex;
            align-items: center;
        }

        .col-2 {
            width: 20%;
        }

        .col-10 {
            width: 80%;
        }
    </style>
</head>

<body class="A4">
    <div class="container">
        <header>
            <table style="width:100%; border:none;">
                <tr>
                    <td style="text-align:center; width:20%; vertical-align:middle; border:none;">
                        {{-- <img src="{{ public_path('/image/Lambang_Kota_Madiun.png') }}" style="width:3cm;"> --}}
                        {{-- <img src="{{ url('public/image/Lambang_Kota_Madiun.png') }}" style="width:3cm;"> --}}
                    </td>
                    <td style="text-align:center; width:80%; border:none; padding-right:200px; margin-left:200px">
                        <p style="font-size:14pt;">
                            <span style="font-size:16pt; font-weight:bold;">
                                PEMERINTAH KOTA MADIUN <br>
                                SEKRETARIAT DAERAH
                            </span>
                        </p>
                        <p style="font-size:12pt;">
                            Jalan Pahlawan, Nomor 37, Madiun, Kode Pos : 63116, Jawa Timur
                        </p>
                        <p style="font-size:11pt;">
                            Telepon (0351) 462756, Faks (0351) 457331, <br>
                            Laman : https://www.madiunkota.go.id
                        </p>
                    </td>
                </tr>
            </table>
            <hr>
        </header>
        <div class="text-center">
            <div style="font-size: 16pt;">
                <b>Laporan {{ $menu }}</b><br>
            </div>
            {{-- <p style="font-size: 10pt;"> Tanggal  {{ request()->tglawal }} - {{ request()->tglakhir }} </p> --}}
        </div><br>
        <div class="table-responsive">
            @if ($menu == 'Penerima')
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Jabatan</th>
                            <th>Kelurahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penerima as $no => $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->jabatan }}</td>
                                <td>{{ $data->kelurahan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @elseif  ($menu == 'Bantuan')
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Penerima</th>
                            <th>Jabatan</th>
                            <th>Kelurahan</th>
                            <th>Tanggal</th>
                            <th>Jenis Bantuan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bantuan as $no => $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $data->penerima->nama ?? '' }}</td>
                                <td>{{ $data->penerima->jabatan ?? '' }}</td>
                                <td>{{ $data->penerima->kelurahan ?? '' }}</td>
                                <td class="text-center">{{ date('d-m-Y', strtotime($data->tanggal)) }}</td>
                                <td>{{ $data->jenisBantuan }}</td>
                                <td>Rp {{ number_format($data->jumlah, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</body>

</html>
