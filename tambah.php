<!DOCTYPE html>
<html>
<head>
	<title>Tambah Mahasiswa</title>
</head>
<body>
	<h1>TAMBAH MAHASISWA</h1>
	<form method="POST" action="">
		<table>
			<tr>
				<td>NIM</td>
				<td><input type="text" name="nim" placeholder="Masukkan NIM"></td>
			</tr>
			<tr>
				<td>NAMA</td>
				<td><input type="text" name="nama" placeholder="Masukkan nama"></td>
			</tr>
			<tr>
				<td>USERNAME</td>
				<td><input type="text" name="username" placeholder="Masukkan username"></td>
			</tr>
			<tr>
				<td>PASSWORD</td>
				<td><input type="text" name="password" placeholder="Masukkan password"></td>
			</tr>
			<tr>
				<td align="right"><button><a href="index.php">Kembali</a></button></td>
				<td><input type="submit" name="tambah" value="Tambah"></td>
			</tr>
		</table>
	</form>
	<?php 
		if(isset($_POST['tambah'])) {
			include "db.php";
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$user = $_POST['username'];
			$pass = $_POST['password'];
			$tambah = mysqli_query($conn, "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$user', '$pass')");

			// Versi 2 $tambah
			// $tambah = mysqli_query($conn, "INSERT INTO mahasiswa VALUES ('".$_POST['nim']."', '".$_POST['nama']."', '".$_POST['username']."', '".$_POST['password']."')");

			if ($tambah) {
				echo "<script language='javascript'>alert('Berhasil Menambah Data'); document.location.href='index.php'; </script>";
			} else {
				echo "<script language='javascript'>alert('Gagal Menambah Data'); document.location.href='tambah.php'; </script>";
			}
 		}
	 ?>
</body>
</html>
