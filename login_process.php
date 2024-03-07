<?php
// Mulai session
session_start();

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "hotel");

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mencari user dengan username dan password yang sesuai
$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

// Periksa apakah hasil query menghasilkan baris data atau tidak
if (mysqli_num_rows($result) == 1) {
    // Jika user ditemukan, arahkan ke halaman beranda atau dashboard
    $_SESSION['id_user'] = $username; // Simpan informasi pengguna dalam sesi
    header("Location: home.php");
    exit;
} else {
    // Jika user tidak ditemukan, beri pesan kesalahan
    echo "Username or password is incorrect. Please try again.";
}

// Menutup koneksi database
mysqli_close($conn);
?>