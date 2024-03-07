<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "hotel");

// Ambil data dari form
$NIK = $_POST['NIK'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$role = 'user';

// Query untuk menyimpan data ke database
$query = "INSERT INTO user (NIK, nama, username, password, email, alamat, role) VALUES ('$NIK','$nama','$username', '$password', '$email', '$alamat', '$role')";
$result = mysqli_query($conn, $query);

// Cek apakah query berhasil
if ($result) {
    // Registrasi berhasil, notif ke user
    echo "Registrasi berhasil! Silakan Login!";
    // otomatis refresh setelah 3 detik, 
    header("refresh:3; url=login.php");
} else {
    echo "Registrasi gagal!";
}

// Menutup koneksi database
mysqli_close($conn);
?>