<?php
include '../asset/config/koneksi.php';
date_default_timezone_set('Asia/Jakarta');
$hariini = date('y-m-d');
$nama_bulan = array( 
	1 => 'Januari', 
	2 => 'Febuari', 
	3 => 'Maret', 
	4 => 'April', 
	5 => 'Mei', 
	6 => 'Juni', 
	7 => 'Juli', 
	8 => 'Agustus', 
	9 => 'September', 
	10 => 'Oktober', 
	11 => 'November', 
	12 => 'Desember' 
);
$bulan = date('n');
$bulan_now = $nama_bulan[$bulan];
$nama_hari = array(
	'Sunday' => 'Minggu',
	'Monday' => 'Senin',
	'Tuesday' => 'Selasa',
	'Wednesday' => 'Rabu',
	'Thursday' => 'Kamis',
	'Friday' => 'Jumat',
	'Saturday' => 'Sabtu'
);
$hari = date('l');
$hari_now = $nama_hari[$hari];
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
	<title>Absen</title>
	<link rel="stylesheet" type="text/css" href="../asset/css/absen.css">
	<link rel="shortcut icon" href="">
</head>
<body>
	<!-- NAVBAR KIRI -->
	<div class="nav-kiri">
		<p>Selamat Datang Admin, <?php echo $dataadmin['username'];?></p>
		<label>Menu Yang Tersedia</label>
		<div class="menu">
			<a href="dasboard.php">Dasboard</a>
			<a href="absen.php" style="background-color: white; color: #1c1c83; font-style: italic; font-weight: bold; margin-left: 0px;">Absen</a>
			<a href="modul.php">Modul</a>
			<a href="soal.php">Soal</a>
			<a href="user.php">User</a>
			<a href="keluar.php">keluar</a>
		</div>
	</div>
	<!-- JUDUL ATAS HALAMAN -->
	<div class="judul">
		<p>Halaman Absen</p>
	</div>
	<!-- KONTEN TENGAH -->
	<div class="atas">
		<!-- MENU ATAS -->
		<div class="menu-atas">
			<a href="absen_siswa.php">Absen Siswa</a>
			<a href="riwayat_absen.php">Riwayat Absen</a>
		</div>
		<!-- HALAMAN ABSEN -->
		<div class="absen-siswa">
			<div class="cari">
				<form class="cari-data" method="POST">
					<input class="kelas" type="text" name="kelas" placeholder="Masukan Kelas * 10 TKJ" required>
					<input type="text" name="token" placeholder="Masukan Token Absen" required>
					<button name="absen">Mulai Absen</button>
				</form>
				<?php
					if (isset($_POST['absen'])) {
						$token = $_POST['token'];
						$tanggal = date('y-m-d');
						$kelas = $_POST['kelas'];
						$cek_token = mysqli_query($konek, "SELECT * FROM token_absen WHERE token = '$token'");
						if (mysqli_num_rows($cek_token) != 0) {
								echo "<script type ='text/javascript'>
										alert('Token Sudah Pernah Digunakan');
										window.location=(absen.php);
										</script>";
						}else {
							mysqli_query($konek, "INSERT INTO token_absen (token, tanggal) VALUES ('$token', '$tanggal')");
							header("location:absen_siswa.php?token=$token&kelas=$kelas");
						}
					}
					?>


			<!-- ABSEN KEMARIN -->
			<div class="absen-kemarin">
				<table border="1px">
					<thead>
						<tr>
							<th style="width: 3%; text-align: center;">No</th>
							<th>Nama</th>
							<th>Kelas</th>
							<th>Tanggal</th>
							<th>Keterangan</th>
							<th>Edit Absen</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$absen_kemarin = mysqli_query($konek, "SELECT * FROM token_absen ORDER BY tanggal DESC ");
							$data_kemarin = mysqli_fetch_array($absen_kemarin);
							$token_kemarin = $data_kemarin['token'];
							$dt_siswa = mysqli_query($konek, "SELECT * FROM user WHERE kelas = '10 tkj'");
							$no = 1;
							while ($data_siswa = mysqli_fetch_array($dt_siswa)) { 
								$id_siswa = $data_siswa['id'];
								$data_absen = mysqli_query($konek, "SELECT * FROM absen WHERE token = '$token_kemarin' AND id = '$id_siswa'");
								$dt_absen = mysqli_fetch_array($data_absen);
								if (mysqli_num_rows($data_absen) == 0) {
									$tgl = ' ';
									$ktr = 'Belum Absen';
								}else {
									$tgl = $dt_absen['tanggal'];
									$ktr = $dt_absen['keterangan'];
								}
								?>
						<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $data_siswa['username'];?></td>
							<td><?php echo $data_siswa['kelas'];?></td>
							<td><?php echo $tgl;?></td>
							<td><?php echo $ktr;?></td>
							<td></td>
						</tr>

						<?php
							}

						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>