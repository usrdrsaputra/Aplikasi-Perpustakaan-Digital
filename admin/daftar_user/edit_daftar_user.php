<?php
$UserID = $_GET['UserID'];
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE UserID='$UserID'");
$data = mysqli_fetch_array($query);
?>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Data Petugas Atau Admin</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST">
                    <div class="form-group">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" value="<?php echo $data ['NamaLengkap']?>" placeholder="Masukan Nama Lengkap" required name="NamaLengkap">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" value="<?php echo $data ['Email']?>" placeholder="Masukan Email" required name="Email">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" value="<?php echo $data ['Alamat']?>" placeholder="Masukan Alamat Lengkap" required name="Alamat">
                        </div>

                        <button type="edit" name="edit" class="btn btn-primary mt-4">Simpan perubahan Data</button>
                        <a href="?page=daftar_user" class="btn btn-danger mt-4">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
if (isset($_POST['edit'])) {
    $NamaLengkap = $_POST['NamaLengkap'];
    $Email = $_POST['Email'];
    $Alamat = $_POST['Alamat'];
    $UserID = $_GET['UserID']; // tambahkan ini untuk mendapatkan UserID dari URL

    // Prepared statement untuk mencegah SQL injection
    $stmt = mysqli_prepare($koneksi, "UPDATE user SET NamaLengkap=?, Email=?, Alamat=? WHERE UserId=?");
    mysqli_stmt_bind_param($stmt, "sssi", $NamaLengkap, $Email, $Alamat, $UserID); // ubah "sisi" menjadi "sssi"
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        ?>
        <script type="text/javascript">
            alert("Data Berhasil Di edit!");
            window.location = "index.php?page=daftar_user";
        </script>
        <?php
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
