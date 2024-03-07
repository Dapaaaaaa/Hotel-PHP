<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
</head>
<body>
<h2>Register</h2>
    <form action="register_process.php" method="post">
        <label for="NIK">NIK:</label><br>
        <input type="text" id="NIK" name="NIK"><br>
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama"><br>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="alamat">Alamat:</label><br>
        <textarea id="alamat" name="alamat"></textarea><br>
        <input type="submit" value="Register">
    </form>
    <p>Already have an account? <a href="login.php">Login Here!</a></p>
</body>
</html>