<?php
include "../inc/koneksi.php";

// Pastikan pengguna sudah login dan UserID tersedia dalam sesi
if (!isset($_SESSION['UserID'])) {
    // Jika UserID tidak tersedia dalam sesi, lakukan redirect ke halaman login
    header("Location: login.php");
    exit();
}

$BukuID = isset($_GET['BukuID']) ? $_GET['BukuID'] : '';

$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE BukuID='$BukuID'");
$data = mysqli_fetch_array($query);
?>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Ulasan Buku Perpustakaan</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST">

                        <div class="form-group">
                            <label class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" value="<?php echo isset($data['Judul']) ? $data['Judul'] : ''; ?>" placeholder="Masukan judul buku" required name="Judul" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama penulis</label>
                            <input type="text" class="form-control" value="<?php echo isset($data['Penulis']) ? $data['Penulis'] : ''; ?>" placeholder="Masukan Penulis buku" required name="Penulis" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Ulasan</label>
                            <input type="text" class="form-control" placeholder="Masukan ulasan buku" required name="Ulasan">
                        </div>
                        
                        <div class="form-group">
                    <label class="form-label">Rating</label>
                    <select class="form-control" style="color: black;" required name="Rating">
                        <option value="" style="color: black;">Pilih Rating</option>
                        <?php
                        // Buat loop untuk membuat pilihan rating dari 1 hingga 5
                        for ($i = 1; $i <= 5; $i++) {
                            // Tampilkan opsi rating dengan ikon bintang
                            echo '<option value="' . $i . '" style="color: yellow;">' . str_repeat('&#9733;', $i) . '</option>';
                        }
                        ?>
                    </select>
                </div>


                        <button type="submit" name="simpan" class="btn btn-primary mt-4">Simpan Data</button>
                        <a href="?page=lihat_buku&BukuID=<?php echo isset($data['BukuID']) ? $data['BukuID'] : ''; ?>" class="btn btn-danger mt-4">Batal</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
if (isset($_POST['simpan'])) {
    $Ulasan = $_POST['Ulasan'];
    $Rating = $_POST['Rating'];

    // Mendapatkan UserID dari sesi
    $UserID = $_SESSION['UserID'];

    $koneksi->begin_transaction();

    $query_kategoribukurelasi = "INSERT INTO ulasanbuku (BukuID, UserID, Ulasan, Rating) VALUES ('$BukuID', '$UserID', '$Ulasan', '$Rating')";
    $result_kategoribukurelasi = $koneksi->query($query_kategoribukurelasi);

    if ($result_kategoribukurelasi) {
        $koneksi->commit();
?>
        <script type="text/javascript">
            alert("Data ulasan berhasil ditambahkan!");
            window.location = "index.php?page=daftar_buku";
        </script>
    <?php
    } else {
        $koneksi->rollback();
    ?>
        <script type="text/javascript">
            alert("Data ulasan tidak berhasil ditambahkan!");
            window.location = "index.php?page=tambah_ulasan_buku";
        </script>
<?php
    }
}
?>
