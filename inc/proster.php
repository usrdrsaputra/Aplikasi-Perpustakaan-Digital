<?php
include_once('koneksi.php');

if(isset($_POST['register'])) {
    $username     = $_POST['username'];
    $password     = $_POST['password'];
    $email        = $_POST['email'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat       = $_POST['alamat'];
    $Role         = $_POST['Role'];

    // Menggunakan MD5 untuk meng-hash password
    $password_md5 = md5($password);

    $sql = "INSERT INTO `user`(`Email`, `NamaLengkap`, `Username`, `Password`, `Alamat`, `Role`) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssss", $email, $nama_lengkap, $username, $password_md5, $alamat, $Role);

        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            ?>
            <script type="text/javascript">
                alert("Registrasi berhasil");
                window.location="../index.php";
            </script>
        <?php
        } else {
            ?>
            <script type="text/javascript">
                alert("Registrasi gagal");
                window.location="../register/index.php";
            </script>
        <?php
        }
        mysqli_stmt_close($stmt);
    } else {
        ?>
        <script type="text/javascript">
            alert("Maaf akun Anda Ada Yang Salah");
            window.location="../index.php";
        </script>
    <?php
    }
}
?>
