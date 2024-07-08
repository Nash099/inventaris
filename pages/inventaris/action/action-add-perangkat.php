<?php

// Include the connection file
include "../../connection/conn.php";

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location:../samples/error-404.html");
    exit;
}

// Set the error reporting level
error_reporting(E_ALL ^ E_NOTICE);
$namafolder = "../perangkat/";

// Check if a file is uploaded
if (!empty($_FILES["nama_file"]["tmp_name"])) {
    // Validate the file type
    $allowed_types = array("image/jpeg", "image/jpg", "image/gif", "image/x-png");
    $jenis_gambar = $_FILES['nama_file']['type'];
    if (!in_array($jenis_gambar, $allowed_types)) {
        echo "<p>Gambar yang dapat di upload hanya extensi jpg ,jpeg, x-png, Gunakan extensi yang sesuai</p>";
        exit;
    }

    // Validate the file size
    $max_size = 10 * 1024 * 1024; // 10MB
    if ($_FILES['nama_file']['size'] > $max_size) {
        echo "<p>Maksimal gambar adalah 10 Mb</p>";
        exit;
    }

    // Get the posted data
    $kode            = $_POST['kode'];
    $jenis           =  "HARDWARE";
    $type            = $_POST['type'];
    $nama            = $_POST['nama'];
    $sts             = $_POST['sts'];
    $tgl_pembelian   = $_POST['tgl_pembelian'];
    $ket             = $_POST['ket'];
    $kantor          =$_POST['kantor'];
    $user            = $_SESSION['username'];
    $tgl             = date("d-m-Y h:i:s");
    

    // Prepare the query
    $stmt = $koneksi->prepare("INSERT INTO perangkat (kode, jenis, type, nama, sts, tgl_pembelian, ket, kantor, tgl, user,gambar) 
                    VALUES (?,?,?,?,?,?,?,?,?,?,?)");
  $stmt->bind_param("sssssssssss", $kode, $jenis, $type, $nama, $sts, $tgl_pembelian, $ket, $kantor, $tgl, $user, $gambar);


    // Upload the file
    $gambar = $namafolder. basename($_FILES['nama_file']['name']);
    if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
        // Execute the query
        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil dimasukan!'); window.location = '../form-add-hardware.php'</script>";
        } else {
            echo "<p>Gagal memasukan data karena koneksi: ". $koneksi->error. "</p>";
        }
    } else {
        echo "<p>Gagal upload file!, File yang di upload tidak di temukan</p>";
    }
}

?>