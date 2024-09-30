<!-- detail_buku.php -->
<?php
include '../inc/koneksi.php';

if(isset($_GET['BukuID'])) {
    $BukuID = $_GET['BukuID'];
    $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE BukuID = $BukuID");
    $data = mysqli_fetch_array($query);
}
?>

<div class="row mb-4">
    <div class="col-md-5">
        <div class="card" style="background-color: white;">
            <!-- Gambar buku -->
            <div class="d-flex justify-content-center">
                <img src="../foto/<?php echo $data['Foto'];?>" width="100" class="img-fluid rounded mx-auto mt-4" alt="foto_buku">
            </div>
            <!-- Judul buku di tengah -->
            <h5 class="text-center mt-2"><?php echo $data['Judul']; ?></h5>
            <div class="card-body">
                <div class="d-flex flex-column justify-content-between h-100">
                    <div class="d-flex justify-content-between">
                        <!-- Tombol Baca/Beli -->
                        <?php if ($data['Status'] == 'Berbayar'): ?>
                            <a href="?page=beli&BukuID=<?php echo $data['BukuID']; ?>" class="btn btn-sm " style="background-color: green; border-radius: 10px; color: white; font-weight:bold; width: 100%;">Beli</a>
                        <?php else: ?>
                            <a href="?page=tampilan_membaca&url=<?php echo $data['berkas']; ?>" class="btn btn-sm " style="background-color: black; border-radius: 10px; color: white; font-weight:bold; width: 100%;">Baca</a>
                        <?php endif; ?>
                        <!-- Tombol Tambah Koleksi -->
                        <form action="" method="post" class="me-2">
                            <input type="hidden" name="BukuID" value="<?php echo $data['BukuID']; ?>">
                            <button type="submit" name="tambah_koleksi" class="btn btn-sm ms-2" style="border-radius: 10px; background-color: #dddce1;" title="Koleksi">
                                <i class="ti-plus menu-icon"></i>
                            </button>
                        </form>
                        <!-- Tombol Tambah Ulasan Buku -->
                        <a href="?page=tambah_ulasan_buku&BukuID=<?php echo $data['BukuID'] ?>" class="btn btn-sm sm-1" style="border-radius: 10px; background-color: #dddce1;" title="tambah_ulasan_buku" ><i class="ti-pencil-alt2 menu-icon"></i></a>
                    </div>
                    <!-- Tombol Kembali -->
                    <a href="?page=dashboard" class="btn btn-sm mt-3" style="background-color: red; border-radius: 10px; color: white; font-weight:bold; width: 100%;" >Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-7 ">
        <div class="card h-100" style="background-color: white;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $data['Judul']?></h5>
                <p class="card-text"><?php echo $data['DeskripsiBuku']?></p>
            </div>
        </div>
    </div>
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
                window.location = 'index.php?page=lihat_buku';
              </script>";
        exit();
    }
    
    // Tutup koneksi ke database jika diperlukan
    mysqli_close($koneksi);
}
?>
