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
$namafolder = "../foto/";

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
    $nama_brg        = $_POST['nama_brg'];
    $merek           = $_POST['merek'];
    $type_barang     = $_POST['type_barang'];
    $pengguna        = $_POST['pengguna'];
    $keterangan      = $_POST['keterangan'];
    $status          = $_POST['status'];
    $tgl             = date("d-m-Y h:i:s");
    $user            = $_SESSION['username'];
    $jenis_barang    = "KENDARAAN";

    // Prepare the query
    $stmt = $koneksi->prepare("INSERT INTO barang (kode, nama_brg, merek, jenis_barang, type_barang, pengguna, keterangan, status, gambar, tgl, user) 
                    VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssssss", $kode, $nama_brg, $merek, $jenis_barang, $type_barang, $pengguna, $keterangan, $status, $gambar, $tgl, $user);

    // Upload the file
    $gambar = $namafolder. basename($_FILES['nama_file']['name']);
    if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
        // Execute the query
        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil dimasukan!'); window.location = '../form-add-kendaraan.php'</script>";
        } else {
            echo "<p>Gagal memasukan data karena koneksi: ". $koneksi->error. "</p>";
        }
    } else {
        echo "<p>Gagal upload file!, File yang di upload tidak di temukan</p>";
    }
}

?>