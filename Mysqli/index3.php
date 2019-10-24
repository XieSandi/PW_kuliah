<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQLi</title>
</head>
<body>
	<h1>CRUD DATA MAHASISWA</h1>
	<br/>
	<a href="tambah.php">+ TAMBAH DATA MAHASISWA</a>
	<br/>
	<br/>
	<table border="5">
		<tr>
			<th>NPM</th>
			<th>Nama</th>
			<th>Jurusan</th>
			<th>Kelas</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$data = mysqli_query($koneksi,"select * from mhs");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $d['npm']; ?></td>
				<td><?php echo $d['nama_mhs']; ?></td>
				<td><?php echo $d['jurusan']; ?></td>
				<td><?php echo $d['kelas']; ?></td>
				<td>
					<a href="rubahdata.php?id=<?php echo $d['npm']; ?>">EDIT</a>
					<a href="hapus.php?id=<?php echo $d['npm']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		mysqli_close($koneksi); // menutup koneksi ke database
		?>
	</table>
</body>
</html>