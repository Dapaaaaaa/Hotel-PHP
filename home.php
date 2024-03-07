<?php
// Lakukan pemeriksaan apakah pengguna sudah login atau belum
session_start();
if(!isset($_SESSION['id_user'])) {
    // Jika sudah login, arahkan pengguna ke halaman home atau dashboard
    header("Location:login.php");
    exit; // Hentikan eksekusi lebih lanjut
}

// Jika belum login, tampilkan halaman login
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>Welcome to Our Hotel</h2>
    
    <!-- Tombol untuk pemesanan -->
    <a href="pemesanan.php"><button>Make Reservation</button></a>

    <!-- Tombol untuk checkout -->
    <a href="checkout.php"><button>Check Out!</button></a>
    <!-- logout -->
    <a href="logout.php"><button>Logout</button></a>
    
    <h3>Available Rooms</h3>
    <!-- Tabel untuk menampilkan kamar yang kosong -->
    <table>
        <tr>
            <th>Type</th>
            <th>Room Number</th>
            <th>Price</th>
            <th>Availability</th>
        </tr>
        <?php
        // Koneksi ke database
        $conn = mysqli_connect("localhost", "root", "", "hotel");

        // Query untuk mengambil data kamar yang kosong dari database
        $query = "SELECT * FROM kamar";
        $result = mysqli_query($conn, $query);

        // Loop untuk menampilkan setiap baris data sebagai baris dalam tabel
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['nomor_kamar'] . "</td>";
            echo "<td>" . $row['tipe_kamar'] . "</td>";
            echo "<td>" . $row['harga'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }

        // Menutup koneksi database
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
