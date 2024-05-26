<?php
include 'databaru.sql';
$konek = mysqli_connect('databaru.sql');
if (!$konek) {
	echo "koneski ke database gagal".mysqli_connect_error();
}
?>
