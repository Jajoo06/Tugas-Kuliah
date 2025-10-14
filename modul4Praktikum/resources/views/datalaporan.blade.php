<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Data Laporan Warga</title>
    <link rel="stylesheet" href="css/datalaporan.css">
</head>
<body>
    <div class="container">
        <nav>
            <div class="eca">
                <img src="assets/logo.jpg" alt="Logo">
                <h5 style="color: white;">Sahabat Warga</h5>
            </div>
            <ul id="menu-list">
                <li><a style="color: black;" href="datalaporan.html">Data Laporan</a></li>
                <li><a href="rasiopelaporan.html">Rasio Pelaporan</a></li>
            </ul>
        </nav>

        <div class="content">
            <header>
                <div class="logo">
                    <img src="assets/logo.jpg" alt="Logo">
                    <span>Sahabat Warga</span>
                </div>
                <div class="search-bar">
                    <input type="search" placeholder="Cari laporan...">
                </div>
            </header>

            <main>
                <h2 style="margin-bottom: 20px;">Data Laporan Pengguna</h2>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jenis Masalah</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="laporan-admin-body"></tbody>
                </table>
            </main>
        </div>    
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", () => {
      fetch("backend/admin/get_all_laporan.php") //ambil data dari backend
        .then(res => res.json()) //mengubah data menjadi json
        .then(data => { 
          const tbody = document.getElementById("laporan-admin-body"); //ambil id dari table body
          tbody.innerHTML = ""; 
          data.forEach((laporan, index) => { //mengambil data dari json
            const tr = document.createElement("tr"); 
            tr.innerHTML = `
              <td>${index + 1}</td>
              <td>${laporan.Nama}</td>
              <td>${laporan.Email}</td>
              <td>${laporan.Jenis_masalah}</td>
              <td>${laporan.Deskripsi}</td>
              <td>${laporan.Tanggal_kejadian}</td>
              <td>${laporan.Waktu_kejadian}</td>
              <td>
                <select data-id="${laporan.Laporan_ID}"> 
                  <option value="Menunggu" ${laporan.Status_laporan === "Menunggu" ? "selected" : ""}>Menunggu</option>
                  <option value="Diproses" ${laporan.Status_laporan === "Diproses" ? "selected" : ""}>Diproses</option>
                  <option value="Selesai" ${laporan.Status_laporan === "Selesai" ? "selected" : ""}>Selesai</option>
                </select>
              </td>
            `; //loop semua laporan
            tbody.appendChild(tr);

            const select = tr.querySelector("select"); //untuk ganti status laporan
            select.addEventListener("change", function () {
              const newStatus = this.value;
              const laporanId = this.dataset.id;

              fetch("backend/admin/update_status.php", { //kirim perubahan ke server
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `laporan_id=${laporanId}&status=${encodeURIComponent(newStatus)}`
              })
                .then(res => res.json())
                .then(result => {
                  alert(result.message || "Status berhasil diperbarui.");
                })
                .catch(err => { 
                  alert("Gagal memperbarui status.");
                });
            });
          });


        })
        .catch(err => { // kalo error saat ambil data laporan
          console.error("Gagal memuat data laporan:", err);
        });
    });
    </script>
</body>
</html>
