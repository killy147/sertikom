<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "lsp";

$kon = mysqli_connect($host,$user,$password,$database);
if (!$kon){
	die("Koneksi gagal:".mysqli_connect_error());
}
?>

