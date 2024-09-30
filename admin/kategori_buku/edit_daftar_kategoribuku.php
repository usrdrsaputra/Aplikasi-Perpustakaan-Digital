<?php
$KategoriID = $_GET['KategoriID'];
$query = mysqli_query($koneksi, "SELECT * FROM kategoribuku WHERE KategoriID='$KategoriID'");
$data = mysqli_fetch_array($query);
?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Kategori Buku</h4>
        </div>

        <div class="card-body">
            <div class="row ">
                <div class="col-md-12 ">
                    <form method="POST">
                    <div class="form-group">
                        <label for="basicInput">Nama Kategori Buku</label>
                        <input type="text" value="<?php echo $data['NamaKategori'] ?>" class="form-control" id="NamaKategori" placeholder="edit kategori Buku" required="Sesuai SOP Kerja Harus Di isi" name="NamaKategori">
                    </div>

                    <button type="submit" name="edit" class="btn btn-primary mt-4">Simpan Perubahan Data</button>
                    <a href="?page=daftar_kategoribuku" type="submit" class="btn btn-danger mt-4">batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
if (isset($_POST['edit'])) {
  $NamaKategori = $_POST['NamaKategori'];

  // Prepared statement untuk mencegah SQL injection
  $stmt = mysqli_prepare($koneksi, "UPDATE kategoribuku SET NamaKategori=? WHERE KategoriID=?");
  mysqli_stmt_bind_param($stmt, "si", $NamaKategori, $KategoriID);
  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    ?>
    <script type="text/javascript">
      alert("Data kategori buku Berhasil Di edit!");
      window.location = "index.php?page=daftar_kategoribuku";
    </script>
    <?php
  } else {
    echo "Error: " . mysqli_error($koneksi);
  }
}
?>
