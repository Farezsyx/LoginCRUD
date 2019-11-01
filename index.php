<?php
  session_start();
  if(!$_SESSION['user']) {
    header('location:login.php');
  } else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Mahasiswa</title>
</head>
<body>
	<h1>Selamat datang <?php echo $_SESSION['user']; ?></h1>
	<h2>DATA MAHASISWA</h2>
	<p size='15px'><a href="tambah.php">TAMBAH DATA</a>|| <a href="logout.php">LOGOUT</a></p>
	<table border="2">
		<tr>
			<td>NIM</td>
			<td>NAMA</td>
			<td>USERNAME</td>
			<td>PASSWORD</td>
			<td colspan="2">AKSI</td>
		</tr>
		<?php 
            include 'db.php';
            $data = mysqli_query($conn, "SELECT * FROM mahasiswa");
            $cek = mysqli_num_rows($data);
            if($cek > 0) {
            while($row = mysqli_fetch_assoc($data)) {
        ?>
		<tr>
			<td><?php echo $row['nim']; ?></td>
			<td><?php echo $row['nama']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td><a href="edit.php?nim=<?php echo $row['nim'] ?>">EDIT</a></td>
			<td><a href="hapus.php?nim=<?php echo $row['nim'] ?>">HAPUS</a></td>
		</tr>
		<?php }} else { ?>
			<tr>
				<td colspan="4">TIDAK ADA DATA</td>
			</tr>
		<?php } ?>
	</table>
</body>
</html>
<?php } ?>