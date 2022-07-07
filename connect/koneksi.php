<?php
$hostname = "localhost"; // host
$database = "travel"; // database
$username = "root"; // username db
$password = ""; // password db

define("BASE_URL","/travel"); // setting url utama
define("BASE_ADMIN","/travel/admin"); // setting url admin

$koneksi = mysqli_connect($hostname,$username,$password,$database); // menghubungkan ke DB

if(!$koneksi){
	// jika tidak konek
	echo "can't connect";
}

?>
