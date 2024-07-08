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
        echo "<p>Gambar yang dapat diupload hanya extensi jpg, jpeg, x-png. Gunakan extensi yang sesuai</p>";
        exit;
    }

    // Validate the file size
    $max_size = 10 * 1024 * 1024; // 10MB
    if ($_FILES['nama_file']['size'] > $max_size) {
        echo "<p>Maksimal ukuran gambar adalah 10 MB</p>";
        exit;
    }

    // Get the posted data
    $kode       = $_POST['kode'];
    $nama_brg   = $_POST['nama_brg'];
   
    $km_saatini = $_POST['km_saatini'];
    $ket_servis = $_POST['ket_servis'];
    $nominal    = $_POST['nominal'];
    $tgl_servis = $_POST['tgl_servis'];
    $pengguna   = $_POST['pengguna'];
    $tgl_sys = date("d-m-Y H:i:s", strtotime("now"));
    $user       = $_SESSION['username'];

    // Prepare the query
    $stmt = $koneksi->prepare("INSERT INTO riwayat (kode, nama_brg, km_saatini, ket_servis, nominal, gambar, tgl_servis, pengguna, tgl_sys, user) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssss", $kode, $nama_brg, $km_saatini, $ket_servis, $nominal, $gambar,$tgl_servis, $pengguna, $tgl_sys, $user);


    // Upload the file
    $gambar = $namafolder . basename($_FILES['nama_file']['name']);
    if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
        // Execute the query
        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil dimasukkan!'); window.location = '../view-kendaraan.php'</script>";
        } else {
            echo "<p>Gagal memasukkan data karena: " . $koneksi->error . "</p>";
        }
    } else {
        echo "<p>Gagal mengunggah file! File yang diunggah tidak ditemukan</p>";
    }
}
?>
