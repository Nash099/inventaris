<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "nama_database";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: ". $conn->connect_error);
}

// Mendapatkan email user dari form lupa kata sandi
$email = $_POST['email'];

// Mengecek apakah email user ada di database
$sql = "SELECT * FROM users WHERE email =?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Jika email user ditemukan, mengirim email reset password
    $user = $result->fetch_assoc();
    $token = bin2hex(random_bytes(32));
    $expire = date("Y-m-d H:i:s", strtotime("+1 hour"));

    $sql = "INSERT INTO password_resets (email, token, expire) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $token, $expire);
    $stmt->execute();

    // Mengirim email reset password ke user
    $to = $user['email'];
    $subject = "Reset Password";
    $message = "
    <p>Halo,</p>
    <p>Anda telah meminta untuk mereset password Anda. Silakan klik tautan berikut untuk mereset password Anda:</p>
    <p><a href='http://localhost/reset_password.php?email=$email&token=$token'>Reset Password</a></p>
    <p>Tautan ini akan kedaluwarsa dalam 1 jam.</p>
    <p>Jika Anda tidak meminta untuk mereset password, silakan abaikan email ini.</p>
    <p>Terima kasih.</p>
    ";

    $headers = "From: no-reply@example.com\r\n";
    $headers.= "Reply-To: no-reply@example.com\r\n";
    $headers.= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    echo "Email reset password telah dikirim ke email Anda.";
} else {
    // Jika email user tidak ditemukan, menampilkan pesan kesalahan
    echo "Email tidak ditemukan.";
}

$conn->close();
?>