<!DOCTYPE html>
<html>
<head>
	<title>Rubah Data</title>
</head>
<body>
	<h3>Rubah Data</h3>
 
	<?php
		include 'koneksi.php';
		$npm = $_GET["npm"];
		$sql = "SELECT * FROM mhs WHERE npm='$npm'";
		$query = mysqli_query($koneksi, $sql) or die (mysqli_error());
 
		if(mysqli_num_rows($query) > 0){
			$data = mysqli_fetch_array($query);
		}
	?>
 
	<form action="update.php" method="POST">
 
		<input type="hidden" name="id" value="<?php echo $data["id"];?>">
 
		<table>
			<tr>
				<td>NPM</td>
				<td>:</td>
				<td><input type="Number" name="npm" value="<?php echo $data["npm"];?>"></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td><input type="text" name="nama_mhs" value="<?php echo $data["nama_mhs"];?>"></td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td>:</td>
				<td><input type="text" name="jurusan" value="<?php echo $data["jurusan"];?>"></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td><input type="text" name="kelas" value="<?php echo $data["kelas"];?>"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<input type="submit" name="edit" value="RUBAH">
				</td>
			</tr>
		</table>
	</form>
 
</body>
</html>