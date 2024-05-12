<?php 
date_default_timezone_set('Asia/Jakarta');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="shortcut icon" href="asset/img/icon.png">
	<link rel="stylesheet" type="text/css" href="asset/css/index.css">
</head>
<body>
	<div class="login">
		<p>Login</p>
		<form class="form" method="POST">
			<label for="username">Username</label>
			<input type="text" name="username">
			<label for="password">Password</label>
			<input type="password" name="password">
			<div class="forgot">
				<a href="lupa.php">Lupa Password!</a>
			</div>
			<div class="but">
				<button name="login">Masuk</button><button name="daftar">Daftar</button>
			</div>
			<p class="fot">@SMK AL-ANSHOR 2024</p>
			<input type="hidden" name="tanggal" value="<?php echo date('y-m-d');?>">
			<input type="hidden" name="waktu" value="<?php echo date('h:i:sa');?>">
			<input type="hidden" name="aktifitas" value="melakukan login">			
		</form>
		<?php
		include 'asset/config/koneksi.php';
		if (isset($_POST['login'])) {
			$username = strtolower(stripcslashes($_POST['username']));
			$password = strtolower(stripcslashes(md5($_POST['password'])));
			$tanggal = $_POST['tanggal'];
			$waktu = $_POST['waktu'];
			$aktifitas = $_POST['aktifitas'];
			$data = mysqli_query($konek, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
			if (mysqli_num_rows($data) != 0) {
				$pecah = mysqli_fetch_array($data);
				if ($pecah['status'] == 'siswa') {
					mysqli_query($konek, "INSERT INTO notifikasi_login (username, tanggal, waktu, aktifitas) VALUES ('$username', '$tanggal', '$waktu', '$aktifitas')");
					$_SESSION['id'] = $pecah['id'];
					header("location:dasboard_siswa/dasboard.php");
				} elseif ($pecah['status'] == 'guru') {
					$_SESSION['id'] = $pecah['id'];
					header("location:dasboard_admin/dasboard.php");
				}else {
					header("location:index.php");
				}
			}else {
				echo "<script type='text/javascript'>
					alert('Data Tidak Ditemukan');
					window.location=('index.php');
					</script>";
			}
		}elseif (isset($_POST['daftar'])) {
			header("location:daftar.php");
		}
		?>
	</div>
</body>
</html>