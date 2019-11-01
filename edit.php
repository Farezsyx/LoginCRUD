<!DOCTYPE html>
<html>
<head>
	<title>Edit Mahasiswa</title>
</head>
<body>
	<h1>EDIT MAHASISWA</h1>
	<?php 
		include 'db.php';
		$nim = $_GET['nim'];

		$edit = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
        $row = mysqli_fetch_array($edit);
	 ?>
	<form method="POST" action="">
		<table>
			<tr>
				<td><input type="hidden" name="nim" value="<?php echo $row['nim'] ?>"></td>
			</tr>
			<tr>
				<td>NAMA</td>
				<td><input type="text" name="nama" value="<?php echo $row['nama'] ?>" placeholder="Masukkan nama"></td>
			</tr>
			<tr>
				<td>USERNAME</td>
				<td><input type="text" name="username" value="<?php echo $row['username'] ?>" placeholder="Masukkan username"></td>
			</tr>
			<tr>
				<td>PASSWORD</td>
				<td><input type="text" name="password" value="<?php echo $row['password'] ?>" placeholder="Masukkan password"></td>
			</tr>
			<tr>
				<td align="right"><button><a href="index.php">Kembali</a></button></td>
				<td><input type="submit" name="edit" value="Edit"></td>
			</tr>
		</table>
	</form>
	<?php 
		if(isset($_POST['edit'])) {
			include "db.php";
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$user = $_POST['username'];
			$pass = $_POST['password'];
			$edit = mysqli_query($conn, "UPDATE mahasiswa SET nama = '$nama', username = '$user', password = '$pass' WHERE nim = '$nim'");

			// Versi 2 $edit
			// $tambah = mysqli_query($conn, "UPDATE mahasiswa SET nama = '".$_POST['nama']."', username = '".$_POST['username']."', password = '".$_POST['password']."' WHERE nim = '$nim'");

			if ($edit) {
				echo "<script language='javascript'>alert('Berhasil Mengedit Data'); document.location.href='index.php'; </script>";
			} else {
				echo "<script language='javascript'>alert('Gagal Mengedit Data'); document.location.href='tambah.php'; </script>";
			}
 		}
	 ?>
</body>
</html>
