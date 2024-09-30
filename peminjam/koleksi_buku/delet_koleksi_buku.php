<?php
include '../inc/koneksi.php';
$KoleksiID = $_GET['KoleksiID']; // Corrected variable name

$koneksi->begin_transaction();

// Delete the row in the koleksipribadi table first
$sql_koleksipribadi = mysqli_query($koneksi, "DELETE FROM koleksipribadi WHERE KoleksiID = '$KoleksiID'"); // Updated to use KoleksiID

if ($sql_koleksipribadi) {
    // Then delete the row in the buku table
    $sql_buku = mysqli_query($koneksi, "DELETE FROM buku WHERE BukuID IN (SELECT BukuID FROM koleksipribadi WHERE KoleksiID = '$KoleksiID')"); // Adjusted to delete corresponding rows in buku table based on KoleksiID

    if ($sql_buku) {
        $koneksi->commit();
        ?>
        <script type="text/javascript">
            alert('Koleksi Buku Berhasil Dihapus');
            document.location.href="?page=koleksi_buku";
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
