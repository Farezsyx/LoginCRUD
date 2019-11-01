<?php 
	include 'db.php';
	$nim = $_GET['nim'];

	$hapus = mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim = '$nim'");

	if($hapus) {
		echo "<script language='javascript'>alert('Berhasil Menghapus Data'); document.location.href='index.php'; </script>";
	} else {
		echo "<script language='javascript'>alert('Gagal Menghapus Data'); document.location.href='index.php'; </script>";
	}

?>