<!-- Tambahkan link stylesheet Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="card-header text-center" style="background-color:white; font-weight:bold; padding: 10px;">
    <h3>kumpulan buku buku terbaru</h3>
</div>

<!-- Tambahkan dropdown untuk memilih kategori -->
<form method="GET" action="">
    <div class="input-group mt-3 mb-3">
        <select class="form-select" name="kategori" onchange="this.form.submit()">
            <option value="all">Kategori</option>
            <?php
            // Query untuk mengambil daftar kategori
            $kategoriQuery = mysqli_query($koneksi, "SELECT * FROM kategoribuku");
            
            // Tampilkan opsi dropdown untuk setiap kategori
            while ($kategoriData = mysqli_fetch_array($kategoriQuery)) {
                $selected = isset($_GET['kategori']) && $_GET['kategori'] == $kategoriData['KategoriID'] ? 'selected' : '';
                echo "<option value='" . $kategoriData['KategoriID'] . "' $selected>" . $kategoriData['NamaKategori'] . "</option>";
            }
            ?>
        </select>
        <button type="submit" class="btn btn-primary">Filter</button>
    </div>
</form>

<div class="row">
    <?php
    // Tangkap nilai kategori yang dipilih
    $selectedKategori = isset($_GET['kategori']) ? $_GET['kategori'] : 'all';

    // Buat query SQL untuk mengambil data buku berdasarkan kategori yang dipilih
    $query = "SELECT * FROM buku
              INNER JOIN kategoribuku_relasi ON buku.BukuID = kategoribuku_relasi.BukuID
              INNER JOIN kategoribuku ON kategoribuku_relasi.KategoriID = kategoribuku.KategoriID";
    
    // Jika kategori yang dipilih adalah 'all', tampilkan semua buku
    if ($selectedKategori != 'all') {
        $query .= " WHERE kategoribuku.KategoriID = $selectedKategori";
    }
    
    $query .= " ORDER BY buku.BukuID DESC";

    // Eksekusi query
    $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

    $card_width = 230; 
    $card_height = 300; 

    // Tampilkan buku sesuai dengan hasil query
    while ($data = mysqli_fetch_array($result)) {
    ?>
      <div class="col-md-3 col-sm-6 col-12 mt-3">
        <a href="?page=detail_buku&BukuID=<?php echo $data['BukuID'] ?>">
          <div class="card" style="width: <?php echo $card_width; ?>px; height: <?php echo $card_height; ?>px; background-color: #dddce1;">
            <img src="../foto/<?php echo $data['Foto']; ?>"  height="160px" class="card-img-top" alt="sampul_buku" />
        </a>
            <div class="card-body" style="background-color: white; border-radius:none; padding: 10px;">
              <h4 class="card-title mt-2" style="color: black; text-align:center;"><?php echo $data['Judul']; ?></h4>
              <h4 class="mt-2" style="color: black; text-align:center; color: red;"><?php echo $data['Status']; ?></h4>
            </div>
          </div>
      </div>
    <?php
    }
    ?>
</div>

<!-- Tambahkan script untuk Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
