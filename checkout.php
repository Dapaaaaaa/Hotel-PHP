<?php
session_start();
if(!isset($_SESSION['id_user'])) {
    //jika belum login arahkan ke login
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <ti tle>Hotel Check-out Form</ti>
</head>
<body>
    <h2>Hotel Check-out Form</h2>
    <form action="checkout_process.php" method="post">
        <label for="nomor_kamar">Nomor Kamar:</label><br>
        <select id="nomor_kamar" name="nomor_kamar">
            <?php
            //mulai koneksi
            $conn = mysqli_connect("localhost", "root", "", "hotel");
            
            //query untuk mengambil nomor kamar yang di tidak tersedia
            $query = "SELECT id, nomor_kamar FROM kamar WHERE status = 'Tidak Tersedia'";
            $result = mysqli_query($conn, $query);

            //tampilkan nomor kamar yang sedang di pesan
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value'" . $row['nomor_kamar'] . "'>" . $row['nomor_kamar'] . "</option>";
            }

            //tutup koneksi
            mysqli_close($conn);
            ?>

        </select>
        <input type="submit" value="Check-out">
    </form>
</body>
</html>