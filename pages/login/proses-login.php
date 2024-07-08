<?php
include ("../connection/conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) && empty($password)) {
    echo "<script>alert('Gagal Login! Username dan Password Kosong'); window.location = '../../index.php'</script>";
	
} else if (empty($username)) {
    echo "<script>alert('Gagal Login! Username Kosong'); window.location = '../../index.php'</script>";

} else if (empty($password)) {
    echo "<script>alert('Gagal Login! Password Kosong'); window.location = '../../index.php'</script>";	

}

$sql = "SELECT password, id, username, fullname, kantor, level,upload FROM user WHERE username = '$username'";
$result = mysqli_query($koneksi, $sql);
$user = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) == 1) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['id']         = $user['id'];
        $_SESSION['username']   = $user['username'];
        $_SESSION['fullname']   = $user['fullname'];
        $_SESSION['kantor']     = $user['kantor'];
        $_SESSION['level']      = $user['level'];
        $_SESSION['upload']     = $user['upload'];

        if ($_SESSION['level'] == 'Admin' ) {
            echo "<script>alert('Selamat Datang Admin'); window.location = '../inventaris/view/dashboard.php'</script>";

        } else if ($_SESSION['level'] == 'User') {
            echo "<script>alert('Selamat Datang $username'); window.location = '../inventaris/dashboard.php'</script>";	
        } else{
            echo "<script>alert('Mau Ke Mana? Balik!'); window.location = '../../index.php'</script>";	
        }
    } 
}  
?>
echo "<script>alert('Username Atau Password Yang Anda Masukkan Salah!'); window.location = '../../index.php'</script>";	
