<?php
  if(isset($_SESSION['user'])) {
    header('location:index.php');
  } else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN MAHASISWA</title>
</head>
<body>
	<h2>LOGIN</h2>
	<form action="" method="POST">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" placeholder="Masukkan username anda" size="25px" ></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" placeholder="Masukkan password anda" size="25px" ></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="login" value="LOGIN" ></td>
			</tr>
		</table>
	</form>
	<?php 
		if (isset($_POST['login'])) {
			include 'db.php';

			$username = $_POST['username'];
			$password = $_POST['password'];
			$login = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE username = '$username' AND password='$password'");
			$data = mysqli_fetch_array($login);
      		$cek = mysqli_num_rows($login);
      		$user = $data['nama'];

      		if($cek > 0) {
          session_start();
	        $_SESSION['user'] = $user;

	        echo "<script language='javascript'>alert('Selamat datang $user'); document.location.href='index.php'; </script>";
	      } else {
	        echo "<script language='javascript'>alert('Username atau Password Salah'); document.location.href='login.php'; </script>";
	      }
		}
	 ?>
</body>
</html>
<?php } ?>