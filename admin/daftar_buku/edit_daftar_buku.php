<?php
$BukuID = $_GET['BukuID'];
$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE BukuID='$BukuID'");
$data = mysqli_fetch_array($query);
?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit daftar buku</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST">

                        <div class="form-group">
                            <label class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" value="<?php echo $data['Judul'] ?>" placeholder="Masukan judul buku" required name="Judul">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama penulis</label>
                            <input type="text" class="form-control" value="<?php echo $data['Penulis'] ?>" placeholder="Masukan Penulis buku" required name="Penulis">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Penerbit</label>
                            <input type="text" class="form-control" value="<?php echo $data['Penerbit'] ?>" placeholder="Masukan Penerbit buku" required name="Penerbit">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tahun Terbit</label>
                            <input type="date" class="form-control" value="<?php echo $data['TahunTerbit'] ?>" placeholder="Masukan Tahun Terbit buku" required name="TahunTerbit">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Deskripsi Buku</label>
                            <textarea class="form-control" rows="5" placeholder="Masukan Deskripsi Buku" required name="DeskripsiBuku"><?php echo $data['DeskripsiBuku'] ?></textarea>
                        </div>


                        <button type="submit" name="edit" class="btn btn-primary mt-4">Simpan Data</button>
                        <a href="?page=daftar_buku" class="btn btn-danger mt-4">Batal</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
if (isset($_POST['edit'])) {
    $Judul = $_POST['Judul'];
    $Penulis = $_POST['Penulis'];
    $Penerbit = $_POST['Penerbit'];
    $TahunTerbit = $_POST['TahunTerbit'];
    $DeskripsiBuku = $_POST['DeskripsiBuku'];

    // Prepared statement untuk mencegah SQL injection
    $stmt = mysqli_prepare($koneksi, "UPDATE buku SET Judul=?, Penulis=?, Penerbit=?, TahunTerbit=?, DeskripsiBuku=? WHERE BukuID=?");
    mysqli_stmt_bind_param($stmt, "sssssi", $Judul, $Penulis, $Penerbit, $TahunTerbit, $DeskripsiBuku, $BukuID); // Ubah "ssssis" menjadi "sssssi" sesuai dengan tipe data DeskripsiBuku (string) dan BukuID (integer)
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        ?>
        <script type="text/javascript">
            alert("Data daftar buku berhasil diubah!");
            window.location = "index.php?page=daftar_buku";
        </script>
        <?php
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}


