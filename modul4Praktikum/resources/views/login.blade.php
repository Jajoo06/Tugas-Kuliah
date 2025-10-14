<?php
// session_start();
// require_once '../Final_Presentasi/backend/db/db.php';

// $pesan = '';
// $email = '';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $email = trim($_POST['email'] ?? '');
//     $password = trim($_POST['password'] ?? '');

//     if ($email === '' || $password === '') {
//         $pesan = "Email dan Password wajib diisi.";
//     } else {
//         $sql = "SELECT * FROM pengguna WHERE email = ?";
//         $stmt = $conn->prepare($sql);

//         if ($stmt) {
//             $stmt->bind_param("s", $email);
//             $stmt->execute();
//             $result = $stmt->get_result();

//             if ($result->num_rows === 1) {
//                 $user = $result->fetch_assoc();

//                 if (password_verify($password, $user['Password'])) {
//                     $_SESSION['nama'] = $user['Nama'];
//                     $_SESSION['role'] = $user['Role'];
//                     $_SESSION['User_ID'] = $user['User_ID'];

//                     // Redirect sesuai role
//                     if ($user['Role'] === 'admin') {
//                         header("Location: ../Final_Presentasi/datalaporan.html");
//                     } else {
//                         header("Location: home.html");
//                     }
//                     exit;
//                 } else {
//                     $pesan = "Password salah.";
//                 }
//             } else {
//                 $pesan = "Email tidak ditemukan.";
//             }

//             $stmt->close();
//         } else {
//             $pesan = "Terjadi kesalahan pada server.";
//         }
//     }

//     $conn->close();
// }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahabat Warga Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div class="login-box">
            

            <form method="post" id="loginForm">
                <div class="avatar">
                    <img src="assets/logo.jpg" alt="User Icon">
                </div>

                <h2>Masukkan Email</h2>
                <input type="email" name="email" placeholder="Email" value="" required>

                <h2>Masukkan Password</h2>
                <input type="password" name="password" placeholder="Password" required>

                <div class="button-group">
                    <button type="submit" style='cursor:pointer;' class="login">Login</button>
                    <button type='button' style='cursor:pointer;'><a href="register.php" style='text-decoration:none; color:white;' class="daftar">Daftar</a></button>
                </div>

                <p class="footer">www.sahabatwarga.com</p>
            </form>
        </div>
    </div>
</body>
</html>
