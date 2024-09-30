<?php
include "../inc/koneksi.php";

if (isset($_POST['pinjam'])) {
    $NamaKategori = $_POST['NamaKategori'];
    $Judul = $_POST['Judul'];
    $Penulis = $_POST['Penulis'];
    $Penerbit = $_POST['Penerbit'];
    $TahunTerbit = $_POST['TahunTerbit'];

    $koneksi->begin_transaction();

    $query_buku = "INSERT INTO buku (Judul, Penulis, Penerbit, TahunTerbit) VALUES ('$Judul', '$Penulis', '$Penerbit', '$TahunTerbit')";
    $result_buku = $koneksi->query($query_buku);

    $BukuID = $koneksi->insert_id;

    $query_kategoribukurelasi = "INSERT INTO kategoribuku_relasi (KategoriID, BukuID) VALUES ('$NamaKategori', '$BukuID')";
    $result_kategoribukurelasi = $koneksi->query($query_kategoribukurelasi);

    if ($result_buku && $result_kategoribukurelasi) {

        $koneksi->commit();
        ?>
        <script type="text/javascript">
            alert("Data buku berhasil ditambahkan!");
            window.location = "index.php?page=daftar_buku";
        </script>
        <?php

    } else {
        $koneksi->commit();
        ?>
        <script type="text/javascript">
            alert("Data buku tidak berhasil ditambahkan!");
            window.location = "index.php?page=tambah_daftar_buku";
        </script>
        <?php
    }
}
?>