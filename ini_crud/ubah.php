<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQLi - WWW.MALASNGODING.COM</title>
</head>
<body>

	<h2>CRUD DATA MAHASISWA - WWW.MALASNGODING.COM</h2>
	<br/>
	<a href="index2.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA MAHASISWA</h3>

	<?php
	include 'koneksi.php';
	$npm = $_GET['npm'];
	$data = mysqli_query($koneksi,"select * from mhs where npm='$npm'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="update.php">
			<table>
				<tr>
					<td>NPM</td>
                    <td>
                    <input type="text" value="<?php echo $d['npm']; ?>" class="field left" placeholder="<?php echo $d['npm']; ?>" readonly>
                    </td>
                </tr>
                <tr>			
					<td>Nama</td>
					<td>
						<input type="text" name="nama_mhs" value="<?php echo $d['nama_mhs']; ?>">
					</td>
				</tr>
				<tr>
					<td>Jurusan</td>
					<td><input type="text" name="jurusan" value="<?php echo $d['jurusan']; ?>"></td>
                </tr>
                <tr>
					<td>Kelas</td>
					<td><input type="text" name="kelas" value="<?php echo $d['kelas']; ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="SIMPAN"></td>
				</tr>		
			</table>
		</form>
		<?php 
	}
	?>

</body>
</html>