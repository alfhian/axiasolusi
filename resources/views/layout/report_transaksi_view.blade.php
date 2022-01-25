<html>
<head>
    <title>Axia Solusi - POS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        h5 {
            font-family: 'Arial', sans-serif;
        }
        .table-data {
            font-family: 'Arial', sans-serif;
            font-size: 10px;
        }
        .table-data>thead {
            border: solid 1px gray;
        }
        .table-data>thead>tr>th {
            text-align: center;
        }
        .table-data>tbody>tr>td {
            padding: 5px 5px;
            border: solid 1px gray;
        }
        .table-filter {
            font-family: 'Arial', sans-serif;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <body>

        <div class="home">
            <div class="home-container">
                <div>
                    <div class="container-fluid">
                        <center>
                            <h5>Report Transaksi Per Periode</h5>
                        </center>
                        <table class="table-filter">
                            <tr>
                                <td>Tanggal Awal</td>
                                <td>:</td>
                                <td>{{ $tanggal_awal }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Akhir</td>
                                <td>:</td>
                                <td>{{ $tanggal_akhir }}</td>
                            </tr>
                        </table>
                        <div class="mt-2 table-menu-container">
                            <table class="w-100 table-data stripe" id="table-data">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="10%">ID</th>
                                        <th width="25%">Tanggal</th>
                                        <th width="15%">Jumlah Item</th>
                                        <th width="25%">Total</th>
                                        <th width="20%">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $index => $dt)
                                    <tr>
                                        <td align="center">{{ $index+1 }}</td>
                                        <td align="center">{{ $dt->id }}</td>
                                        <td align="left">{{ $dt->tanggal }}</td>
                                        <td align="center">{{ $dt->jumlah }}</td>
                                        <td align="right">{{ $dt->total }}</td>
                                        <td align="center" @if($dt->status == 2) style="color: blue" @endif>{{ $dt->stat }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>