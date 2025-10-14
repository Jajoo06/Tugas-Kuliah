<?php
// session_start();
// require_once '../Final_Presentasi/backend/db/db.php'; // Pastikan path benar

// $pesan = '';
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $nama = $_POST['nama'] ?? '';
//     $email = $_POST['email'] ?? '';
//     $password = $_POST['password'] ?? '';
//     $password2 = $_POST['password2'] ?? '';

//     if (empty($nama) || empty($email) || empty($password) || empty($password2)) {
//         $pesan = "Semua kolom wajib diisi.";
//     } elseif ($password !== $password2) {
//         $pesan = "Password tidak cocok.";
//     } else {
//         $cek = $conn->prepare("SELECT Email FROM Pengguna WHERE Email = ?");
//         $cek->bind_param("s", $email);
//         $cek->execute();
//         $cek->store_result();

//         if ($cek->num_rows > 0) {
//             $pesan = "Email sudah terdaftar.";
//         } else {
//             $hashed_password = password_hash($password, PASSWORD_BCRYPT);
//             $stmt = $conn->prepare("INSERT INTO Pengguna (Nama, Email, Password) VALUES (?, ?, ?)");
//             $stmt->bind_param("sss", $nama, $email, $hashed_password);
//             if ($stmt->execute()) {
//                 header("Location: login.php");
//                 exit;
//             } else {
//                 $pesan = "Registrasi gagal: " . $stmt->error;
//             }
//         }
//     }
// }
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registrasi</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/register.css">
</head>
<body>
  <div class="container">

    <div class="card">
      <h2>Registrasi Akun</h2>
      
    
        
        <form method="POST" action="">
          <div class="input-group">
            <input type="text" name="nama" placeholder="Nama Lengkap" value="" required />
            <i class="fa fa-user"></i>
          </div>
          
          <div class="input-group">
            <input type="email" name="email" placeholder="Email" value="" required />
            <i class="fa fa-envelope"></i>
          </div>
          
          <div class="input-group">
            <input type="password" id="password" name="password" placeholder="Password" required />
            <i class="bx bx-eye mata"></i>
          </div>

      <div class="input-group">
        <input type="password" id="password2" name="password2" placeholder="Ulangi Password" required />
        <i class="bx bx-eye mata2"></i>
      </div>
      
      <button type="submit">Daftar</button>
    </form>
    
    <div class="login-link">
      Sudah punya akun? <a href="login.php">Login di sini</a>
    </div>
  </div>
</div>
  
  <script>
    // Toggle show/hide password
    const togglePassword = (inputId, iconClass) => {
      const input = document.getElementById(inputId);
      const icon = document.querySelector(iconClass);
      icon.addEventListener('click', () => {
        if (input.type === "password") {
          input.type = "text";
          icon.classList.remove("bx-eye");
          icon.classList.add("bx-hide");
        } else {
          input.type = "password";
          icon.classList.remove("bx-hide");
          icon.classList.add("bx-eye");
        }
      });
    };
    togglePassword('password', '.mata');
    togglePassword('password2', '.mata2');
  </script>
</body>
</html>
