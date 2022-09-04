<!DOCTYPE html>
<html>

<head>
    <title>Laporan Kompetisi Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Kompetisi Mahasiswa</h4>
            <h6>www.poliwang.ac.id</a>
        </h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Nama Kompetisi</th>
                <th class="text-center">Nama Ketua</th>
                <th class="text-center">Nama Kelompok</th>
                <th class="text-center">Dosen Pembimbing</th>
                <th class="text-center">Tingkatan</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $number = 1; ?>
            @foreach ($review as $nm)
                <tr>
                    <td>{{ $number }}</td>
                    <td class="text-center">{{ $nm->nama_kompetisi }}</td>
                    <td class="text-center">{{ $nm->nama_ketua }}</td>
                    <td class="text-center">{{ $nm->dosen_pembimbing }}</td>
                    <td class="text-center">{{ $nm->nama_kelompok }}</td>
                    <th class="text-center">
                    <td class="text-center">{{ $nm->tingkatan }}</td>
                    <td class="text-center">{{ $nm->status }}</td>
                </tr>
                <?php $number++; ?>
            @endforeach
            </tr>
        </tbody>
    </table>

</body>

</html>
