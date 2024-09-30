<?php
include '../inc/koneksi.php';
$UserID = $_GET['UserID'];
$sql = mysqli_query($koneksi, "DELETE FROM user WHERE UserID = '$UserID'");

if ($sql) {
  ?>
 <script type="text/javascript">
                alert('Data User Berhasil Dihapus');
                document.location.href="?page=daftar_user";
            </script>
            <?php
        }

 ?>
