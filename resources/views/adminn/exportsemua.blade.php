<!DOCTYPE html>
<html>
<head>
	<title>Laporan Kompetisi Mahasiswa</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Kompetisi Mahasiswa</h4>
		<h6>www.poliwang.ac.id</a></h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>ID</th>
                <th>Nama Kompetisi</th>
                <th>Nama Ketua</th>
                <th>Nama Kelompok</th>
                <th>Dosen Pembimbing</th>
                <th>Tingkatan</th>
                <th>Status</th>
			</tr>
		</thead>
		<tbody>
			  <?php $number = 1;?>
                            @foreach($review as $nm)
                            <tr>
                                <td>{{$number}}</td>
                                <td class="text-center">{{$nm->nama_kompetisi}}</td>
                                <td class="text-center">{{$nm->nama_ketua}}</td>
                                <td class="text-center">{{$nm->dosen_pembimbing}}</td>
                                <td class="text-center">{{$nm->nama_kelompok}}</td>
                                <td class="text-center">{{$nm->tingkatan}}</td>
                                <td class="text-center">{{$nm->status}}</td>
                            </tr>
                            <?php $number++;?>  
                            @endforeach
			</tr>
		</tbody>
	</table>
 
</body>
</html>