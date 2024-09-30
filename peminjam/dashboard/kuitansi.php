<?php
// Proses pengunggahan konfirmasi pembayaran

// Cek apakah BukuID telah diset sebelum mengaksesnya
if (isset($_GET['BukuID'])) {
    $BukuID = $_GET['BukuID'];
    
    // Proses pengunggahan konfirmasi pembayaran
    // ...
    
    // Setelah proses pengungahan selesai, arahkan kembali ke halaman pembelian buku dengan pesan sukses
    echo "<script type='text/javascript'>
            alert('Konfirmasi pembayaran berhasil diunggah');
            window.location = 'index.php?page=detail_buku&BukuID=".$BukuID."';
          </script>";
} else {
    // Jika BukuID tidak diset, arahkan ke halaman yang sesuai
    // ...
}
?>
