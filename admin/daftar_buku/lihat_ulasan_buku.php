<?php
include "../inc/koneksi.php";

// Periksa apakah BukuID tersedia dalam URL
if (isset($_GET['BukuID'])) {
    $BukuID = $_GET['BukuID'];

    // Lakukan kueri SQL untuk mendapatkan data buku berdasarkan BukuID
    $query_buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE BukuID='$BukuID'");
    $data = mysqli_fetch_array($query_buku);

    // Periksa apakah pengguna sudah login dan dapatkan UserID dari sesi
    if (isset($_SESSION['UserID'])) {
        $UserID = $_SESSION['UserID'];

        // Lakukan kueri SQL untuk mendapatkan ulasan buku oleh pengguna yang sedang login
        $query_ulasan = mysqli_query($koneksi, "SELECT * FROM ulasanbuku WHERE BukuID='$BukuID' AND UserID='$UserID'");
?>
  
  
  <div class="page-heading mb-4">
    <div class="page-title">
        <div class="row">
            <div class="col-md-6">
                <h3>Ulasan Buku</h3>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 mb-4">
            <!-- Card 1 -->
            <div class="card card-primary card-outline">
                <div class="d-flex justify-content-center">
                    <img src="../foto/<?php echo $data['Foto'];?>" width="100" class="img-fluid rounded mx-auto mt-2" alt="foto">
                </div>
                <div class="card-body">
                    <?php if ($data !== null): ?>
                        <h4 class="text-center"><?php echo $data['Judul'] ?></h4>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="font-weight-bold">Nama Penulis :</label>
                            <input type="text" value="<?php echo $data['Penulis'] ?>" class="form-control" id="nama_pegawai" required="Sesuai SOP Kerja Harus Di isi" name="nama_ruang" disabled>
                        </div>
                        <div class="col-sm-6">
                            <label class="font-weight-bold">Nama Penerbit :</label>
                            <input type="text" value="<?php echo $data['Penerbit'] ?>" class="form-control mt-1" id="kode_ruang" name="kode_ruang" disabled>
                        </div>
                        <div class="col-sm-6">
                            <label class="font-weight-bold mt-2">TahunTerbit :</label>
                            <input type="text" value="<?php echo $data['TahunTerbit'] ?>" class="form-control" id="kode_ruang" name="kode_ruang" disabled>
                        </div>
                    </div>
                </div>
                <a href="?page=daftar_buku" class="btn btn-outline btn-danger mx-3 my-1 mb-4">Kembali</a>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->



        <div class="col-md-6">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h4>Ulasan</h4>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Ulasan</th>
                    <th>Rating</th>
                    <th>Pemberi Ulasan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Pastikan BukuID sudah didefinisikan sebelum menggunakan kueri SQL
                if(isset($_GET['BukuID'])) {
                    $BukuID = $_GET['BukuID'];

                    // Lakukan kueri SQL untuk mengambil semua ulasan yang terkait dengan BukuID yang diberikan
                    $query = mysqli_query($koneksi, "SELECT *
                                                    FROM ulasanbuku
                                                    INNER JOIN buku ON ulasanbuku.BukuID = buku.BukuID
                                                    INNER JOIN user ON ulasanbuku.UserID = user.UserID
                                                    WHERE buku.BukuID = $BukuID") or die(mysqli_error($koneksi));
                    
                    // Loop melalui hasil kueri dan tampilkan ulasan buku
                    while($data = mysqli_fetch_array($query)) {
                ?>
                        <tr>
                            <td><?php echo $data['Ulasan'] ?></td>
                            <td><?php echo $data['Rating'] ?></td>
                            <td><?php echo $data['NamaLengkap'] ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

        

<?php
    } else {
        // Jika pengguna belum login, Anda dapat menampilkan pesan atau melakukan tindakan lainnya
        echo "Anda harus login untuk melihat ulasan.";
    }
}
?>
