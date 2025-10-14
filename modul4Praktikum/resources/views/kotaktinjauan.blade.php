<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <link rel="stylesheet" href="css/kontak.css">
  <script src="js/kontak.js"></script>
  <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
  <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
  <title>Document</title>
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
          <li class="nav-item">
            <a href="Notifikasi.html" class="nav-link">
              <i class='bx  bx-bell'  ></i> 
              <span>Notifikasi</span>
            </a>
          </li>
          <li class="nav-item active">
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

  <div class="kontak-container">

    <form id="form-kontak" class="isikonten">
      <h2>Polsek kemuning</h2>
      <label for="Orang melapor">Nama:</label>
      <input type="text" id="reporter-name" placeholder="Nama" name="Orang melapor" required>

      <label for="Masuk email">Email:</label>
      <input type="email" id="reporter-email" placeholder="Email" name="Masuk Email" required>

      <label for="report-type">No Telpon:</label>
      <input type="number" placeholder="+62" id="report-type" name="report-type" required>

      <label for="report-description">Deskripsi Masukan:</label>
      <textarea id="report-description" placeholder="Deskripsi" name="report-description" rows="4" required></textarea>

      <button type="submit" id="btn">Kirim</button>
      <button type="reset"> Reset</button>
    </form>
    
  </div>
<script>
document.querySelectorAll("form").forEach(form => {
    form.addEventListener("submit", function(e) {
        e.preventDefault();

        const user = JSON.parse(localStorage.getItem("user"));
        if (!user) {
            alert("Silakan login terlebih dahulu");
            window.location.href = "login.html";
            return;
        }

        const deskripsi = form.querySelector('textarea[name="report-description"]').value;

        fetch("backend/masukan/create.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `user_id=${user.User_ID}&deskripsi=${encodeURIComponent(deskripsi)}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                alert("Terima kasih atas masukan Anda!");
                form.reset();
            } else {
                alert(data.error || "Gagal mengirim masukan");
            }
        });
    });
});
document.addEventListener("DOMContentLoaded", () => { //ini baru untuk butuh data user
  if (!localStorage.getItem("user")) {
    fetch("backend/session_user.php")
      .then(res => res.json())
      .then(data => {
        if (data.logged_in) {
          localStorage.setItem("user", JSON.stringify(data.user));
        } else {
          window.location.href = "login.php";
        }
      });
  }
});

</script>

</body>

</html>