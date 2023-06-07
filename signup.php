<!DOCTYPE html>
<html>

<head>
    <title>Tambah Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="mt-4">Tambah Pengguna</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Pengguna</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

<?php
// Pastikan Anda telah mengatur koneksi database sebelumnya
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password menggunakan password_hash
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Query SQL untuk menambahkan pengguna ke tabel
    $query = "INSERT INTO user (username, password) VALUES ('$username', '$hashedPassword')";

    if (mysqli_query($con, $query)) {
        echo "Pengguna berhasil ditambahkan.";
    } else {
        echo "Terjadi kesalahan saat menambahkan pengguna: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>