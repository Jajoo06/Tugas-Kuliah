<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi</title>
    <link rel="stylesheet" href="css/Notif.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
</head>
<body>
    <header>
         <!-- Sidebar Navigation -->
    <div class="sidebar">
      <div class="sidebar-header">
        <div class="logo-container">
          <img src="assets/logo.jpg" alt="Sahabat Warga Logo" class="logo">
          <h3 class="site-title">Sahabat Warga</h3>
        </div>
        <label for="sidebar-toggle" class="sidebar-toggle-label">
          <!-- < i class='bx  bx-home-alt'  ></i>  -->
        </label>
      </div>
      
      <div class="sidebar-content">
        <ul class="nav-menu">
          <li class="nav-item">
            <a href="home.html" class="nav-link">
                <i class='bx  bx-home-alt'  ></i> 
              <span>Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="buatlaporan.html" class="nav-link">
              <i class='bx  bx-edit'  ></i> 
              <span>Buat Laporan</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="laporansaya.html" class="nav-link">
              <i class='bx  bx-clipboard-detail'  ></i> 
              <span>Laporan Saya</span>
            </a>
          </li>
          <li class="nav-item active">
            <a href="Notifikasi.html" class="nav-link">
              <i class='bx  bx-bell'  ></i> 
              <span>Notifikasi</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="Kotaktinjauan.html" class="nav-link">
              <i class='bx  bx-contact-book'  ></i> 
              <span>Kotak Tinjauan</span>
            </a>
          </li>
        </ul>
      </div>
      
      <div class="sidebar-footer">
        <p>© 2023 Sahabat Warga</p>
      </div>
    </div>
        
    </header>

    <main>
        <div class="notification-container" id="notif-list">
        <!-- Notifikasi dari backend akan dimasukkan ke sini -->
        </div>
    </main>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        
        const user_id = user.User_ID;
        
        fetch(`backend/notifikasi/read.php?user_id=${user_id}`) //mengambil data dari backend
        .then(response => response.json())
        .then(data => {
          const container = document.getElementById("notif-list");
          container.innerHTML = "";
          
          if (data.length === 0) {
            container.innerHTML = "<p>Tidak ada notifikasi.</p>";
            return;
          }
          
          data.forEach(n => {
            const div = document.createElement("div");
            div.className = "notification";
            div.innerHTML = `
            <h5>${n.Pesan}</h5>
            <small>${n.Tanggal_kirim} - Status: ${n.Status}</small>
            `;
            container.appendChild(div);
          });
        });
      });
      </script>
    <script src="js/Notif.js"></script>
</body>
</html>