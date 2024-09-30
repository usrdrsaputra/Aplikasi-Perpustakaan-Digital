<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mt-2 mb-2">
                <h3>Perpustakaan Digital</h3>
            </div>
            <!-- <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Buku</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Buku</li>
                    </ol>
                </nav>
            </div> -->
        </div>
    </div>
    <section class="section">
    <div class="card">
        <div class="card-header">
            Daftar Buku-Buku
        </div>
        <div class="card-body">
            <form action="" method="post">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Cover Buku</th>
                            <th>Kategori Buku</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th class="text-center">Aksi</th>
                            <th class="text-center">Pilih Buku</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT *
                            FROM buku
                            INNER JOIN kategoribuku_relasi ON buku.BukuID = kategoribuku_relasi.BukuID
                            INNER JOIN kategoribuku ON kategoribuku_relasi.KategoriID = kategoribuku.KategoriID") or die(mysql_error());
                        $nomor = 1;
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $nomor++; ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($data['Foto'] == "") {
                                    ?>
                                        <img src="../foto/foto_kosong.webp" width="100" class="img-fluid rounded" alt="">
                                    <?php
                                    } else {
                                    ?>
                                        <img src="../foto/<?php echo $data['Foto']; ?>" width="50" class="img-fluid rounded" alt="foto">
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td><?php echo $data['NamaKategori'] ?></td>
                                <td><?php echo $data['Judul'] ?></td>
                                <td><?php echo $data['Penulis'] ?></td>
                                <td><?php echo $data['Penerbit'] ?></td>
                                <td class="d-flex flex-column flex-md-row">
                                    <a href="?page=ulasan&BukuID=<?php echo $data['BukuID'] ?>" class="btn btn-success me-2 btn-sm" title="detail"><i class="ti-eye menu-icon"></i></a>
                                    <form action="" method="post" class="me-2">
                                        <input type="hidden" name="BukuID" value="<?php echo $data['BukuID']; ?>">
                                        <button type="submit" name="tambah_koleksi" class="btn btn-secondary btn-sm" title="koleksi"><i class="ti-heart menu-icon"></i></button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <div class="form-check form-check-lg">
                                        <input class="form-check-input ms-4" type="checkbox" name="selected_books[]" value="<?php echo $data['BukuID']; ?>">
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary mt-2" name="pinjam" title="pinjam">Pinjam</button>
        </div>
    </div>
    
    </form>
</section>

</div>





<!-- menambah koleksi start -->
<?php
// Pastikan Anda telah melakukan koneksi ke database sebelumnya

// Cek apakah ada data yang dikirimkan melalui form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tambah_koleksi'])) {
    $BukuID = $_POST['BukuID'];
    // Anda perlu mendapatkan UserID dari sesi atau dari data pengguna yang saat ini login.
    // Sebagai contoh, kita asumsikan bahwa UserID disimpan dalam variabel $UserID
    
    // Lakukan validasi data di sini jika diperlukan
    
    // Query SQL untuk memeriksa apakah buku sudah ada dalam koleksi pribadi
    $check_query = "SELECT * FROM koleksipribadi WHERE UserID = '$UserID' AND BukuID = '$BukuID'";
    $check_result = mysqli_query($koneksi, $check_query);
    
    // Jika buku belum ada dalam koleksi pribadi, tambahkan buku ke dalam koleksi
    if (mysqli_num_rows($check_result) == 0) {
        $sql = "INSERT INTO koleksipribadi (UserID, BukuID) VALUES ('$UserID', '$BukuID')";
    
        // Jalankan query
        if (mysqli_query($koneksi, $sql)) {
            // Jika berhasil tambahkan, tampilkan notifikasi dan alihkan pengguna ke halaman daftar buku
            echo "<script type='text/javascript'>
                    alert('Koleksi buku berhasil ditambahkan!');
                    window.location = 'index.php?page=koleksi_buku';
                  </script>";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "<script type='text/javascript'>
                alert('Buku sudah ada dalam koleksi pribadi!');
                window.location = 'index.php?page=daftar_buku';
              </script>";
        exit();
    }
    
    // Tutup koneksi ke database jika diperlukan
    mysqli_close($koneksi);
}
?>



<?php
// Pastikan telah memulai sesi sebelumnya

include "../inc/koneksi.php";

if (isset($_POST['pinjam'])) {
    // Pastikan ada buku yang dipilih untuk dipinjam
    if (isset($_POST['selected_books']) && !empty($_POST['selected_books'])) {
        // Periksa apakah sesi UserID telah ditetapkan
        if (isset($_SESSION['UserID'])) {
            // Dapatkan UserID dari sesi
            $UserID = $_SESSION['UserID'];

            // Inisialisasi variabel untuk melacak keberhasilan peminjaman
            $pinjam_success = true;

            // Loop melalui buku yang dipilih untuk dipinjam
            foreach ($_POST['selected_books'] as $BukuID) {
                $BukuID = intval($BukuID); // Pastikan $BukuID adalah integer

                // Periksa apakah buku tersebut sudah pernah dipinjam oleh pengguna dan belum dikembalikan
                $query_cek_pinjam = "SELECT * FROM peminjaman WHERE UserID = '$UserID' AND BukuID = '$BukuID' AND StatusPeminjaman = 'Di Pinjam'";
                $result_cek_pinjam = mysqli_query($koneksi, $query_cek_pinjam);

                // Jika buku sudah pernah dipinjam dan belum dikembalikan
                if (mysqli_num_rows($result_cek_pinjam) > 0) {
                    // Tampilkan alert bahwa buku sudah pernah dipinjam dan belum dikembalikan
                    ?>
                    <script type="text/javascript">
                        alert("Gagal meminjam buku karena buku sedang kamu pinjam dan belum dikembalikan!");
                        window.history.back(); // Kembali ke halaman sebelumnya
                    </script>
                    <?php
                    exit(); // Hentikan proses lebih lanjut
                } else {
                    // Query untuk meminjamkan buku 
                    $query_pinjam = "INSERT INTO peminjaman (UserID, BukuID, TanggalPeminjaman, TanggalPengembalian, StatusPeminjaman) VALUES ('$UserID', '$BukuID', NOW(), DATE_ADD(NOW(), INTERVAL 7 DAY), 'Di Pinjam')";
                    $result_pinjam = mysqli_query($koneksi, $query_pinjam);

                    // Jika salah satu proses peminjaman gagal, atur pinjam_success menjadi false
                    if (!$result_pinjam) {
                        $pinjam_success = false;
                        break; // Keluar dari loop
                    }
                }
            }

            // Jika berhasil meminjam semua buku
            if ($pinjam_success) {
                ?>
                <script type="text/javascript">
                    alert("Buku berhasil dipinjam!");
                    window.location = "index.php?page=pengembalian";
                </script>
                <?php
            }
        }
    } else {
        // Jika tidak ada buku yang dipilih
        ?>
        <script type="text/javascript">
            alert("Anda belum memilih buku untuk dipinjam!");
            window.history.back(); // Kembali ke halaman sebelumnya
        </script>
        <?php
    }
}
?>
