<?php
include 'databaru.sql';
$konek = mysqli_connect("localhost","root","","databaru");
if (!$konek) {
	echo "koneski ke database gagal".mysqli_connect_error();
}
?>
