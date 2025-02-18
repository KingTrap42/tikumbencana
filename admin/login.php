<?php
include_once "../koneksi/koneksi.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .login-container {
            display: block;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
            <a href="../admin/?halaman=beranda" class="btn btn-danger">Cancel</a>
        </form>
        <?php
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Validate user credentials
        
            // Kembali button
            //echo '<a href="index.php" class="btn btn-secondary">Kembali</a>';
        
            $query = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE username='$username'");
            if (mysqli_num_rows($query) > 0) {
                $user = mysqli_fetch_assoc($query);
                // Verify the password
                if ($password === $user['password']) {

                    session_start();
                    $_SESSION['username'] = $username;
                    header("Location: ../admin/?halaman=evakuasi");
                    exit();
                } else {
                    echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Error !</strong> Invalid username or password.
</div>';
                }
            } else {
                ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        onclick="window.location.href='index.php'"></button>
                    <strong>Error !</strong> Invalid username or password.
                </div>'<?php
            }
        }
        ?>
    </div>
</body>

</html>