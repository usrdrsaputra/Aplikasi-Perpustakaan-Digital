<?php
// Koneksi ke database
include "../inc/koneksi.php";

// Query untuk mengambil jumlah data dari masing-masing tabel
$query_buku = mysqli_query($koneksi, "SELECT COUNT(*) as total_buku FROM buku");
$query_user = mysqli_query($koneksi, "SELECT COUNT(*) as total_user FROM user");
// Perbaikan query untuk menghitung jumlah peminjaman
$query_peminjaman = mysqli_query($koneksi, "SELECT COUNT(*) as total_peminjaman FROM peminjaman WHERE StatusPeminjaman = 'Di Pinjam'");
$query_kategori = mysqli_query($koneksi, "SELECT COUNT(*) as total_kategori FROM kategoribuku");

// Mengambil hasil query
$data_buku = mysqli_fetch_assoc($query_buku);
$data_user = mysqli_fetch_assoc($query_user);
$data_peminjaman = mysqli_fetch_assoc($query_peminjaman);
$data_kategori = mysqli_fetch_assoc($query_kategori);
?>

        <div class="row">
            <!-- Statistik -->
            <div class="col-md-6">
                <canvas id="myChart"></canvas>
            </div>
            <!-- Jumlah Data -->
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card text-white bg-danger mb-3">
                            <div class="card-header">Jumlah Buku</div>
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $data_buku['total_buku']; ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">Jumlah User</div>
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $data_user['total_user']; ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-header">Jumlah Peminjaman</div>
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $data_peminjaman['total_peminjaman']; ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-header">Jumlah Kategori Buku</div>
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $data_kategori['total_kategori']; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script>
        // Data untuk grafik
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Buku', 'User', 'Peminjaman', 'Kategori Buku'],
                datasets: [{
                    label: 'Jumlah Data',
                    data: [<?php echo $data_buku['total_buku']; ?>, <?php echo $data_user['total_user']; ?>, <?php echo $data_peminjaman['total_peminjaman']; ?>, <?php echo $data_kategori['total_kategori']; ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
