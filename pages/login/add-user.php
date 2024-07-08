<?php
include "../connection/conn.php";
$namafolder="../login/foto/";
if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	    $jenis_gambar=$_FILES['nama_file']['type'];
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $kantor = $_POST['kantor'];
        $password1 = $_POST['password'];
        $password_hash = password_hash($password1, PASSWORD_DEFAULT);
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
            $sql = "INSERT INTO user (username, fullname, kantor, password, level, upload) 
VALUES ('$username', '$fullname', '$kantor', '$password_hash', 'User', '$gambar')";

if (mysqli_query($koneksi, $sql)) {
    echo "<script>alert('Data berhasil dimasukan!'); window.location = '../../index.php'</script>";
} else {
    echo "<p>Gagal memasukan data: ". mysqli_error($koneksi). "</p>";
}}}}





/*
$lokasi_file = $_FILES['upload']['tmp_name'];
$nama_file   = $_FILES['upload']['name'];
// MEMBUAT NAMA + ANGKA RANDOM
date_default_timezone_set('Asia/Jakarta');
$file= $nama_file;
//SIMPAN PERMOHONAN DI FOLDER


$folder = "../foto/$file";

$username = $_POST['username'];
$fullname = $_POST['fullname'];
$kantor = $_POST['kantor'];

$password1 = $_POST['password'];
$password_hash = password_hash($password1, PASSWORD_DEFAULT);
$cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user WHERE fullname='$fullname'"));

if ($cek > 0) {
    echo "<script>window.alert('Duplikat Nomor Urut')
		window.location='opini-input.php'</script>";
} elseif (move_uploaded_file($lokasi_file, $folder)) {
    $query = mysqli_query($koneksi, "INSERT INTO user (id, username, fullname, kantor, password, level, upload) 
    VALUES ('', '$username', '$fullname', '$kantor', '$password_hash', 'User', 'foto/$file')");
    if ($query) {
        echo "<script>alert('Selamat Anda sudah terdaftar. Silahkan login menggunakan username dan password yang sudah Anda buat.'); window.location = '../../index.php'</script>";
    } else {
        echo "<script>alert('Data Admin Gagal dimasukan!'); window.location = '../../register.php'</script>";
    }
}*/
?>