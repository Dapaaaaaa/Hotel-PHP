<?php
// Lakukan pemeriksaan apakah pengguna sudah login atau belum
session_start();
if(!isset($_SESSION['id_user'])) {
    // Jika belum login, arahkan pengguna ke halaman login
    header("Location: login.php");
    exit; // Hentikan eksekusi lebih lanjut
}

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "hotel");

// Query untuk mengambil data kamar yang statusnya tersedia
$query = "SELECT id, nomor_kamar, harga FROM kamar WHERE status = 'Tersedia'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hotel Booking Form</title>
</head>
<body>
    <h2>Hotel Booking Form</h2>
    <form action="pemesanan_process.php" method="post" id="bookingForm">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama"><br>
        <label for="NIK">NIK:</label><br>
        <input type="NIK" id="NIK" name="NIK"><br>
        <label for="nomor_kamar">Nomor Kamar:</label><br>
        <select id="nomor_kamar" name="nomor_kamar" onchange="showRoomInfo()">
            <?php
            // Loop untuk menampilkan opsi nomor kamar yang tersedia
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id'] . "' data-harga='" . $row['harga'] . "'>" . $row['nomor_kamar'] . "</option>";
            }
            ?>
        </select><br>
        <label for="harga">Harga:</label><br>
        <input type="text" id="harga" name="harga" readonly><br>
        <label for="tanggal_checkin">Tanggal Check-in:</label><br>
        <input type="date" id="tanggal_checkin" name="tanggal_checkin"><br>
        <label for="tanggal_checkout">Tanggal Check-out:</label><br>
        <input type="date" id="tanggal_checkout" name="tanggal_checkout"><br>
        <input type="submit" value="Pesan!">
    </form>

    <script>
        // Inisialisasi harga dengan harga kamar pertama
        document.getElementById("harga").value = document.getElementById("nomor_kamar").selectedOptions[0].getAttribute("data-harga");

        function showRoomInfo() {
            // Mendapatkan nilai nomor kamar yang dipilih
            var nomorKamar = document.getElementById("nomor_kamar").value;
            // Mendapatkan data harga kamar dari atribut data-harga
            var hargaKamar = document.getElementById("nomor_kamar").selectedOptions[0].getAttribute("data-harga");
            // Memasukkan harga kamar ke dalam input harga
            document.getElementById("harga").value = hargaKamar;
        }
    </script>
</body>
</html>

<?php
// Menutup koneksi database
mysqli_close($conn);
?>
