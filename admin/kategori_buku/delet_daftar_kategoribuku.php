<?php
include '../inc/koneksi.php';
$KategoriID = $_GET['KategoriID'];
$sql = mysqli_query($koneksi, "DELETE FROM kategoribuku WHERE KategoriID = '$KategoriID'");

if ($sql) {
  ?>
 <script type="text/javascript">
                alert('Data kategori buku berhasil dihapus');
                document.location.href="?page=daftar_kategoribuku";
            </script>
            <?php
        }

 ?>
