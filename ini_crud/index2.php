<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQLi - WWW.MALASNGODING.COM</title>
</head>
<body>

	<h2>CRUD DATA MAHASISWA - WWW.MALASNGODING.COM</h2>
	<br/>
	<a href="input.html">+ TAMBAH MAHASISWA</a>
	<br/>
	<br/>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>NPM</th>
			<th>Nama</th>
			<th>Jurusan</th>
			<th>Kelas</th>
		</tr>
		<?php 
		include "koneksi.php";
		$no = 1;
		$data = mysqli_query($koneksi,"select * from mhs");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['npm']; ?></td>
				<td><?php echo $d['nama_mhs']; ?></td>
				<td><?php echo $d['jurusan']; ?></td>
                <td><?php echo $d['kelas']; ?></td>
				<td>
					<a href="ubah.php?npm=<?php echo $d['npm']; ?>">EDIT</a>
					<a href="hapus.php?npm=<?php echo $d['id']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
</body>
</html>