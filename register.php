<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
</head>
<body>
<h2>Register</h2>
    <form action="register_process.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <input type="submit" value="Register">
    </form>
    <p>Already have an account? <a href="login.php">Login Here!</a></p>
</body>
</html>