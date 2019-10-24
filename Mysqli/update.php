<?php
	include 'koneksi.php'; 
	$npm = $_POST["npm"];
	$nama_mhs = $_POST["nama_mhs"];
	$jurusan = $_POST["jurusan"];
	$kelas = $_POST["kelas"];
	// query sql
	$sql = "UPDATE mhs 
			SET nama_mhs='$nama_mhs',
				jurusan='$jurusan',
				kelas='$kelas'
			WHERE npm='$npm'";
	$query = mysqli_query($koneksi, $sql) or die (mysqli_error());
 
	if($query){
		echo "Data berhasil dirubah!";
	} else {
		echo "Error".$sql."<br>".mysqli_error($koneksi);
	}
	mysqli_close($koneksi);
?><br><a href="index3.php">Lihat data di Tabel</a><?php
?>