<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelaporan Warga</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/styles3.css">
</head>
<body>
   <header>
        <nav>
            <div class="eca">
                <img src="assets/logo.jpg" alt="Logo">
                <h5 style="color: white;">Sahabat Warga</h5>
            </div>
            <div id="menu-icon" class="menu-icon">
                <i class="ph ph-list"></i>
            </div>
            <ul id="menu-list">
                <li><a href="datalaporan.html">Data Laporan</a></li>
                <li><a style="color: black;" href="rasiopelaporan.html">Rasio Pelaporan</a></li>
            </ul>
        </nav>
    </header>


    <div id="chart-container">
        <h2>Rasio Pelaporan Masalah Warga</h2>
        <canvas id="reportChart"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('reportChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Begal Payudara', 'Tawuran', 'Begal Motor', 'Pungli'],
                datasets: [
                    {
                        label: '2023',
                        data: [120, 80, 160, 250],
                        backgroundColor: 'rgba(72, 202, 228, 0.8)'
                    },
                    {
                        label: '2024',
                        data: [140, 60, 190, 280],
                        backgroundColor: 'rgba(51, 153, 255, 0.8)'
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: { color: 'white' }
                    }
                },
                scales: {
                    x: {
                        ticks: { color: 'white' },
                        grid: { color: 'rgba(255, 255, 255, 0.2)' }
                    },
                    y: {
                        ticks: { color: 'white' },
                        grid: { color: 'rgba(255, 255, 255, 0.2)' }
                    }
                }
            }
        });
    </script>
</body>
</html>

