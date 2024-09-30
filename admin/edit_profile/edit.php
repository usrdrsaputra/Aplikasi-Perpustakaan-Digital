<?php
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE UserID='$UserID'");
$data = mysqli_fetch_array($sql);
$UserID = $data['UserID']; // Add this line to get the 'UserID' value

if (isset($_POST['simpan'])) {
    $NamaLengkap  = $_POST['NamaLengkap'];
    $Email         = $_POST['Email'];
    $Alamat         = $_POST['Alamat'];

    // Check if a file is uploaded
    if ($_FILES['foto']['size'] > 0) {
        $foto = $_FILES['foto']['name'];
        $nama_file = $_FILES['foto']['name'];
        $source = $_FILES['foto']['tmp_name'];
        $folder = '../foto_profil_admin/';

        // Move the uploaded file to the desired folder
        move_uploaded_file($source, $folder . $nama_file);

        // If there's an old photo, delete it
        if ($data['foto'] != "") {
            unlink($folder . $data['foto']);
        }
    } else {
        // If no new file is uploaded, use the old photo file name
        $nama_file = $data['foto'];
    }

    // Update the database with the new file name
    $sql = mysqli_query($koneksi, "UPDATE user SET NamaLengkap='$NamaLengkap', Email='$Email', Alamat='$Alamat', foto='$nama_file' WHERE UserID= '$UserID'");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data berhasil edit");
            window.location = "index.php?page=edit_profile&UserID=<?php echo $UserID; ?>"; // Fix the URL parameter here
        </script>
<?php
    }
}
?>

            <div class="col-md-12 ">
                <div class="row z-depth-3">
                    <div class="col-sm-4 bg-info rounded-left">
                        <div class="card-block text-center text-white mt-5">
                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="hidden" name="UserID" value="<?php echo $data['UserID']; ?>">
                                <?php
                 if($data['foto'] == ""){
                 ?>
                 <img src="../foto_profil_admin/foto_kosong.webp" width="100" class="img-fluid rounded" alt="">
                 <?php
                 }
                 else{
                 ?>
                 <img src="../foto_profil_admin/<?php echo $data['foto'];?>" width="200" height="auto" class="img-fluid rounded" alt="foto">
                 <?php
                 }
                ?>
                                <input type="file" name="foto" class="form-control mt-2">
                                <input class="form-control font-weight-bold mt-2" name="NamaLengkap" value="<?php echo $data['NamaLengkap']; ?>">
                                </input>
                                <button class="btn btn-primary  mt-3 mb-3" style="border-radius: 10px;" type="submit" name="simpan">Simpan</button>
                                <a href="?page=edit_profile" class="btn btn-warning mt-3 mb-3 ms-2" style="border-radius: 10px;">Kembali </a>
                            </div>
                        </div>
                        <div class="col-sm-8 bg-white rounded-right">
                            <h4 class="mt-3 text-center">Informasi</h4>
                            <hr class="bg-primary">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="font-weight-bold">Email:</p>
                                    <input class="form-control text-muted" name="Email" value="<?php echo $data['Email']; ?>">
                                    </input>
                                </div>
                                <div class="col-sm-6">
                                    <p class="font-weight-bold">Alamat:</p>
                                    <input class="form-control text-muted" name="Alamat" value="<?php echo $data['Alamat']; ?>" ></input>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <hr class="bg-primary">
                            
                        </div>
                    </form>
                </div>
            </div>