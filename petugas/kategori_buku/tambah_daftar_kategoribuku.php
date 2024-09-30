<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah kategori</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST">
                    <div class="form-group">
                        <label for="basicInput">Nama kategori</label>
                        <input type="text" class="form-control" id="NamaKategori" placeholder="Masukan kategori buku" required="Sesuai SOP Kerja Harus Di isi" name="NamaKategori">
                    </div>

                    <button type="submit" name="simpan" class="btn btn-primary mt-4">Simpan Data</button>
                    <a href="?page=daftar_kategoribuku" class="btn btn-danger mt-4">batal</a>
                    </form>
                </div>



                </div>
            </div>
        </div>
    </div>
</section>


<?php
if (isset($_POST['simpan'])) {
  $NamaKategori = $_POST['NamaKategori'];

  $sql = mysqli_query($koneksi,"INSERT INTO kategoribuku VALUES ('','$NamaKategori')");
  if ($sql) {
    ?>
    <script type="text/javascript">
      alert("Data kategori buku berhasil ditambahkan!");
      window.location = "index.php?page=daftar_kategoribuku";
    </script>
    <?php
  }

}
?>