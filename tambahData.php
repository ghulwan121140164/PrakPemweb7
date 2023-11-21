<?php
$koneksi = mysqli_connect("localhost", "root", "", "mahasiswa");

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$prodi = $_POST['prodi'];
$kode = $_POST['kode'];

$query_tambah = "INSERT INTO datamahasiswa (nim, nama, prodi, kode) VALUES ('$nim', '$nama', '$prodi', '$kode')";
$result_tambah = mysqli_query($koneksi, $query_tambah);

header("Location: index.php");

mysqli_close($koneksi);
?>