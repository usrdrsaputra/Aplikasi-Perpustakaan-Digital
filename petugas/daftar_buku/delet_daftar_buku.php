<?php
include '../inc/koneksi.php';
$BukuID = $_GET['BukuID'];

$koneksi->begin_transaction();

// Ambil nama file PDF yang terkait dengan buku ini
$result = mysqli_query($koneksi, "SELECT berkas FROM buku WHERE BukuID = '$BukuID'");
$row = mysqli_fetch_assoc($result);
$fileToDelete = $row['berkas'];

// Tampilkan isi dari $fileToDelete untuk memastikan path yang benar
// echo "File to delete: $fileToDelete";

// Hapus file PDF dari folder penyimpanan
if (unlink($fileToDelete)) {
    // Setelah itu, hapus data terkait dari tabel 'ulasanbuku' terlebih dahulu
    $sql_ulasanbuku = mysqli_query($koneksi, "DELETE FROM ulasanbuku WHERE BukuID = '$BukuID'");
    
    if ($sql_ulasanbuku) {
        // Setelah itu, hapus data terkait dari tabel 'peminjaman'
        $sql_peminjaman = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE BukuID = '$BukuID'");
        
        if ($sql_peminjaman) {
            // Hapus data terkait dari tabel 'koleksipribadi'
            $sql_koleksipribadi = mysqli_query($koneksi, "DELETE FROM koleksipribadi WHERE BukuID = '$BukuID'");
            
            if ($sql_koleksipribadi) {
                // Hapus data terkait dari tabel 'kategoribuku_relasi'
                $sql_kategoribuku_relasi = mysqli_query($koneksi, "DELETE FROM kategoribuku_relasi WHERE BukuID = '$BukuID'");
                
                if ($sql_kategoribuku_relasi) {
                    // Setelah itu, hapus data dari tabel 'buku'
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
            } else {
                $koneksi->rollback();
                echo "Error: " . mysqli_error($koneksi);
            }
        } else {
            $koneksi->rollback();
            echo "Error: " . mysqli_error($koneksi);
        }
    } else {
        $koneksi->rollback();
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    $koneksi->rollback();
    echo "Error: Failed to delete PDF file. File path: $fileToDelete";
}
?>
