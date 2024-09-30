<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah daftar buku</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="form-label">Nama Kategori Buku</label>
                            <?php
                            $query = "SELECT * FROM kategoribuku ";
                            $result = mysqli_query($koneksi, $query);
                            ?>
                            <select name="NamaKategori" class="form-control" required>
                                <option value="">Pilih Nama Kategori Buku</option>
                                <?php while ($row = mysqli_fetch_array($result)) { ?>
                                    <option value="<?php echo $row['KategoriID'] ?>"><?php echo $row['NamaKategori'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" placeholder="Masukan judul buku" required name="Judul">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama penulis</label>
                            <input type="text" class="form-control" placeholder="Masukan Penulis buku" required name="Penulis">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Penerbit</label>
                            <input type="text" class="form-control" placeholder="Masukan Penerbit buku" required name="Penerbit">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tahun Terbit</label>
                            <input type="date" class="form-control" placeholder="Masukan Tahun Terbit buku" required name="TahunTerbit">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Upload File Buku</label>
                            <input type="file" class="form-control" placeholder="Masukan File Buku" required name="berkas" accept="application/pdf">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Upload File Foto</label>
                            <input type="file" class="form-control" placeholder="Masukan File Foto" required name="Foto" >
                        </div>
                        <div class="form-group">
                            <label class="form-label">Deskripsi Buku</label>
                            <textarea class="form-control" rows="5" placeholder="Masukan Deskripsi Buku" required name="DeskripsiBuku"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Harga</label>
                            <input type="text" class="form-control" placeholder="Masukan Harga Buku" name="Harga" >
                        </div>
                        <div class="form-group">
                        <label class="form-label">Status</label> 
                        <select name="Status" class="form-control">
                        <option value="">Pilih Nama Kategori Buku</option>
                            <option value="Gratis">Gratis</option>
                            <option value="Berbayar">Berbayar</option>
                        </select>
                        </div>
                                                
                        <button type="submit" name="simpan" class="btn btn-primary mt-4">Simpan Data</button>
                        <a href="?page=daftar_buku" class="btn btn-danger mt-4">Batal</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
include "../inc/koneksi.php";

if (isset($_POST['simpan'])) {
    $NamaKategori = $_POST['NamaKategori'];
    $Judul = $_POST['Judul'];
    $Penulis = $_POST['Penulis'];
    $Penerbit = $_POST['Penerbit'];
    $TahunTerbit = $_POST['TahunTerbit'];
    $DeskripsiBuku = $_POST['DeskripsiBuku'];
    $Harga = $_POST['Harga'];
    $Status = $_POST['Status'];
    $namaFile = $_FILES['berkas']['name'];
    $x = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($x));
    $ukuranFile = $_FILES['berkas']['size'];
    $file_tmp = $_FILES['berkas']['tmp_name'];

    // Untuk foto
    $namaFoto = $_FILES['Foto']['name']; // Perhatikan nama input
    $sourceFoto = $_FILES['Foto']['tmp_name']; // Perhatikan nama input
    $folderFoto = '../foto/'; // Perhatikan folder tujuan penyimpanan foto

    // Lokasi Penempatan file buku
    $dirUpload = "../peminjam/kumpulan_file_buku/";
    $linkBerkas = $dirUpload . $namaFile;

    // Lokasi Penempatan file foto
    $linkFoto = $folderFoto . $namaFoto;

    // Menyimpan file buku
    $teruploadBuku = move_uploaded_file($file_tmp, $linkBerkas);

    // Menyimpan file foto
    $teruploadFoto = move_uploaded_file($sourceFoto, $linkFoto);

    if ($teruploadBuku && $teruploadFoto) {
        $koneksi->begin_transaction();

        $query_buku = "INSERT INTO buku (Judul, Penulis, Penerbit, TahunTerbit, title, size, ekstensi, berkas, foto, DeskripsiBuku, Harga, Status) 
                    VALUES ('$Judul', '$Penulis', '$Penerbit', '$TahunTerbit', '$namaFile', '$ukuranFile', '$ekstensiFile', '$linkBerkas','$linkFoto','$DeskripsiBuku','$Harga','$Status')";
        $result_buku = $koneksi->query($query_buku);

        $BukuID = $koneksi->insert_id;

        $query_kategoribukurelasi = "INSERT INTO kategoribuku_relasi (KategoriID, BukuID) VALUES ('$NamaKategori', '$BukuID')";
        $result_kategoribukurelasi = $koneksi->query($query_kategoribukurelasi);

        if ($result_buku && $result_kategoribukurelasi) {
            $koneksi->commit();
            ?>
            <script type="text/javascript">
                alert("Data buku berhasil ditambahkan!");
                window.location = "index.php?page=daftar_buku";
            </script>
            <?php
        } else {
            $koneksi->rollback();
            ?>
            <script type="text/javascript">
                alert("Data buku tidak berhasil ditambahkan!");
                window.location = "index.php?page=tambah_daftar_buku";
            </script>
            <?php
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("Gagal mengunggah file. Pastikan semua file terunggah dengan benar.");
            window.location = "index.php?page=tambah_daftar_buku";
        </script>
        <?php
    }
}
?>

