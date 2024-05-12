<?php
include '../asset/config/koneksi.php';
date_default_timezone_set('Asia/Jakarta');
session_start();
$id = $_SESSION['id'];
$qry = mysqli_query($konek, "SELECT * FROM user WHERE id = '$id'");
$dataadmin = mysqli_fetch_array($qry);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dasboard</title>
	<link rel="stylesheet" type="text/css" href="../asset/css/dasboard.css">
	<link rel="shortcut icon" href="">
</head>
<body>
	<div class="nav-kiri">
		<p>Selamat Datang Admin, <?php echo $dataadmin['username'];?></p>
		<label>Menu Yang Tersedia</label>
		<div class="menu">
			<a href="dasboard.php" style="background-color: white; color: #1c1c83; font-style: italic; font-weight: bold; margin-left: 0px;">Dasboard</a>
			<a href="absen.php">Absen</a>
			<a href="modul.php">Modul</a>
			<a href="soal.php">Soal</a>
			<a href="user.php">User</a>
			<a href="keluar.php">keluar</a>
		</div>
	</div>
	<div class="judul">
			<p>Halaman Dasboard</p>
		</div>
	<div class="atas">
		<div class="tiga-menu">
			<table border="1px">
				<thead>
					<tr>
						<!-- SISWA LOGIN -->
						<th>
							<?php
							$siswalogin = mysqli_query($konek, "SELECT * FROM user WHERE status = 'siswa' AND aktif = 'aktif'");
							$jumlogin = mysqli_num_rows($siswalogin);
							?>
							<p style="background-color: green; color: white; font-size: 1.2em;">Siswa Login</p>
							<div class="gambar">
								<img src="../asset/img/pria.png">
								<p style="color: green;"><?php echo $jumlogin;?></p>
							</div>
							<?php
							$datajumsiswa = mysqli_query($konek, "SELECT * FROM user WHERE status = 'siswa'");
							$jumsiswa = mysqli_num_rows($datajumsiswa);
							$belumlogin = $jumsiswa - $jumlogin;
							?>
							<div class="jumsiswa">
								<button></button><p>Jumlah Siswa : <?php echo $jumsiswa;?></p>
								<button style="background-color: red;"></button><p>Belum Login : <?php echo $belumlogin;?></p>
							</div>
						</th>
						<!-- SISWA ABSEN -->
						<th>
							<?php
							$tanggal = date('y-m-d');
							$siswaabsen = mysqli_query($konek, "SELECT * FROM notifikasi_login WHERE aktifitas = 'melakukan absen' AND tanggal = '$tanggal'");
							$jumabsen = mysqli_num_rows($siswaabsen);
							?>
							<p style="background-color: blue; color: white; font-size: 1.2em;">Siswa Absen</p>
							<div class="gambar">
								<img src="../asset/img/absent1.png">
								<p style="color: blue;"><?php echo $jumabsen;?></p>
							</div>
							<?php
							$datajumsiswa = mysqli_query($konek, "SELECT * FROM user WHERE status = 'siswa'");
							$jumsiswa = mysqli_num_rows($datajumsiswa);
							$belumabsen = $jumsiswa - $jumabsen;
							?>
							<div class="jumsiswa">
								<button></button><p>Jumlah Siswa : <?php echo $jumsiswa;?></p>
								<button style="background-color: red;"></button><p>Belum Absen : <?php echo $belumabsen;?></p>
							</div>
						</th>
						<!-- SISWA MENGERJAKAN SOAL -->
						<th>
							<?php
							$tanggal = date('y-m-d');
							$siswamengerjakan = mysqli_query($konek, "SELECT * FROM notifikasi_login WHERE aktifitas = 'mengerjakan soal' AND tanggal = '$tanggal'");
							$jummengerjakan = mysqli_num_rows($siswamengerjakan);
							?>
							<p style="background-color: #ffc107; color: white; font-size: 1.2em;">Siswa Mengerjakan Soal</p>
							<div class="gambar">
								<img src="../asset/img/kuis.png">
								<p style="color: #ffc107;"><?php echo $jummengerjakan;?></p>
							</div>
							<?php
							$belummengerjakan = $jumlogin - $jummengerjakan;
							?>
							<div class="jumsiswa">
								<button style="background-color: green;"></button><p>Siswa Hadir : <?php echo $jumlogin;?></p>
								<button style="background-color: red;"></button><p>Belum Mengerjakan : <?php echo $belummengerjakan;?></p>
							</div>
						</th>
					</tr>
				</thead>
			</table>
		</div>
		<!-- AKTIFITAS -->
		<div class="aktifitas">
			<div class="judul-aktifitas">
				<p>Aktifitas Terbaru</p>
			</div>
			<table border="1px">
				<thead>
					<tr>
						<th>No</th>
						<th>Username</th>
						<th>Tanggal</th>
						<th>Waktu</th>
						<th>Aktifitas</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$tanggal = date('y-m-d');
					$quer = mysqli_query($konek, "SELECT * FROM notifikasi_login WHERE tanggal = '$tanggal' ORDER BY id DESC");
					$no = 1;
					while ($notif = mysqli_fetch_array($quer)) { ?>
					<tr>
						<td width="2%"><?php echo $no++;?></td>
						<td><?php echo $notif['username'];?></td>
						<td><?php echo $notif['tanggal'];?></td>
						<td><?php echo $notif['waktu'];?></td>
						<td><?php echo $notif['aktifitas'];?></td>
					</tr>
					<?php 
					} 
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>