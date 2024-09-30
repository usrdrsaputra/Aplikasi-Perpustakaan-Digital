<?php
include '../inc/koneksi.php';
$BukuID = $_GET['BukuID'];

$koneksi->begin_transaction();

$sql_kategoribuku_relasi = mysqli_query($koneksi, "DELETE FROM kategoribuku_relasi WHERE BukuID = '$BukuID'");

if ($sql_kategoribuku_relasi) {
    $sql_buku = mysqli_query($koneksi, "DELETE FROM buku WHERE BukuID = '$BukuID'");

    if ($sql_buku) {
        $koneksi->commit();
        ?>
        <script type="text/javascript">
            alert('Data daftar buku berhasil dihapus');
            document.location.href="?page=daftar_buku";
        </script>
        <?php
    } else {
        $koneksi->rollback();
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    $koneksi->rollback();
    echo "Error: " . mysqli_error($koneksi);
}
?>
