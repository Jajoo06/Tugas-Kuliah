  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Sahabat Warga - Sistem Pelaporan</title>
      <link rel="stylesheet" href="css/coba1.css">
      <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
      <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
  </head>

  <body>
      <div class="container">
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
            <li class="nav-item active">
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

              <div class="report-form">
                  <div class="profile-icon">
                      <img src="assets/logo.jpg" alt="Profile">
                  </div>
                  <h2>Sistem Pelaporan Masalah Warga</h2>
                  
                  <form id="form-laporan">
                      <div class="form-group">
                          <span class="icon"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-users"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg></span>
                          <input type="text" placeholder="Nama">
                      </div>

                      <div class="form-group">
                          <span class="icon"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mail-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 19h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v5.5" /><path d="M16 19h6" /><path d="M19 16v6" /><path d="M3 7l9 6l9 -6" /></svg></span>
                          <input type="email" placeholder="Email">
                      </div>

                      <div class="form-group">
                          <span class="icon"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-device-landline-phone"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 3h-2a2 2 0 0 0 -2 2v14a2 2 0 0 0 2 2h2a2 2 0 0 0 2 -2v-14a2 2 0 0 0 -2 -2z" /><path d="M16 4h-11a3 3 0 0 0 -3 3v10a3 3 0 0 0 3 3h11" /><path d="M12 8h-6v3h6z" /><path d="M12 14v.01" /><path d="M9 14v.01" /><path d="M6 14v.01" /><path d="M12 17v.01" /><path d="M9 17v.01" /><path d="M6 17v.01" /></svg></span>
                          <input type="number" placeholder="+62">
                      </div>

                      <div class="form-group">
                          <span class="icon"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-week"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M7 14h.013" /><path d="M10.01 14h.005" /><path d="M13.01 14h.005" /><path d="M16.015 14h.005" /><path d="M13.015 17h.005" /><path d="M7.01 17h.005" /><path d="M10.01 17h.005" /></svg></span>
                          <input type="date" placeholder="Tanggal Kejadian">
                      </div>

                      <div class="form-group">
                          <span class="icon"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-stopwatch"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 13a7 7 0 1 0 14 0a7 7 0 0 0 -14 0z" /><path d="M14.5 10.5l-2.5 2.5" /><path d="M17 8l1 -1" /><path d="M14 3h-4" /></svg></span>
                          <input type="time" placeholder="Waktu Kejadian">
                      </div>

                      <div class="form-group">
                          <span class="icon"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-camera"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" /><path d="M9 13a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /></svg></span>
                          <input type="file" placeholder="Foto/Video">
                      </div>

                      <div class="form-group">
                          <span class="icon_"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-bubble-text"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10h10" /><path d="M9 14h5" /><path d="M12.4 3a5.34 5.34 0 0 1 4.906 3.239a5.333 5.333 0 0 1 -1.195 10.6a4.26 4.26 0 0 1 -5.28 1.863l-3.831 2.298v-3.134a2.668 2.668 0 0 1 -1.795 -3.773a4.8 4.8 0 0 1 2.908 -8.933a5.33 5.33 0 0 1 4.287 -2.16" /></svg></span>
                          <textarea placeholder="Deskripsi Kejadian"></textarea>
                      </div>
                      <div class="button-container">
                          <button type="submit" class="submit-button">Kirim Laporan</button>
                      </div>

                  </form>
              </div>
          </div>
      </div>
            <script>
              document.getElementById('form-laporan').addEventListener('submit', function (e) {
                  e.preventDefault(); //mencegah reload halaman

                  const jenis_masalah = "Umum";
                  const deskripsi = document.querySelector('textarea').value;
                  const jalan = "-";
                  const kota = "Palembang";
                  const tanggal = document.querySelector('input[type="date"]').value;
                  const waktu = document.querySelector('input[type="time"]').value; 

                  fetch('backend/laporan/create.php', { //mengirim data ke backend
                      method: 'POST',
                      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                      body: `jenis_masalah=${encodeURIComponent(jenis_masalah)}&deskripsi=${encodeURIComponent(deskripsi)}&jalan=${encodeURIComponent(jalan)}&kota=${encodeURIComponent(kota)}&tanggal=${tanggal}&waktu=${waktu}`
                  })
                  .then(response => response.json())
                  .then(data => {
                      if (data.message) {
                          alert("Laporan berhasil dikirim!"); //menampilkan pesan berhasil
                          window.location.href = "laporansaya.html"; //mengarahkan ke halaman laporan saya
                      } else {
                          alert(data.error || "Gagal mengirim laporan"); //menampilkan pesan gagal
                      }
                  });
              });
              </script>
              <script> //ini update baru
                    document.getElementById("formLaporan").addEventListener("submit", function(e) {
                      e.preventDefault();

                      const data = {
                        judul: document.getElementById("judul").value,
                        deskripsi: document.getElementById("deskripsi").value
                      };

                      fetch("backend/laporan/create.php", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify(data)
                      })
                      .then(res => res.json())
                      .then(res => {
                        alert("Laporan berhasil dikirim!");
                        window.location.href = "datalaporan.html";
                      })
                      .catch(err => alert("Terjadi kesalahan saat mengirim laporan."));
                    });
              </script>
  </body>
  </html>