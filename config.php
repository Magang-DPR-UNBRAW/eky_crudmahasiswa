<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_mahasiswa";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

<!-- div untuk pengelompokkan perintah-->
 <!-- STMT itu statement -->
  <!-- sss itu string -->
   <!-- bind_param itu pernyataan sql untuk mengaitkan variabel -->
