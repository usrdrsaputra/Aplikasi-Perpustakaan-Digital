<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN DATA BUKU</title>
    <img src="../../assets_admin/images/logo_DigitalPustaka.png" width="100px" height="auto" alt="logo">
    <style>
        
        @media print{
            .div{
                display:none;
            }
        }
        .footer {
            text-align: right;
            margin-top: 20px;
            color: #000000;
            margin-right: 20px;
        }
    </style>
</head>
<body>


<center>
        <h2>LAPORAN DATA BUKU PERPUSTAKAAN DIGITAL</h2>
        <h4><i><b>Informasi : </b> Data Buku Perpustakaan Digital 2024</h4>
        <hr/>
    </center>
    <table width="100%" border="2" cellpadding="0" cellspacing="0">
        <thead>
        <tr>
        <th>No</th>
                            <th>Kategori Buku</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>                    
        </tr>
        </thead>
        <tbody>

        <?php
include '../../inc/koneksi.php';
$query = mysqli_query($koneksi, "SELECT *
            FROM buku
            INNER JOIN kategoribuku_relasi ON buku.BukuID = kategoribuku_relasi.BukuID
            INNER JOIN kategoribuku ON kategoribuku_relasi.KategoriID = kategoribuku.KategoriID ");
$nomor = 1;
while ($data = mysqli_fetch_array($query)) {
?>
    <tr style="text-align:center;">
        <td><?php echo $nomor++; ?></td>
        <td><?php echo $data['NamaKategori'] ?></td>
        <td><?php echo $data['Judul'] ?></td>
        <td><?php echo $data['Penulis'] ?></td>
        <td><?php echo $data['Penerbit'] ?></td>
    </tr>
<?php
}
?>

        </tbody>

    </table>

    <div class="footer">
    <p>Palabuhan Ratu, <?php echo date("d F Y"); ?></p>   
</div>

<div class="container">
    <p class="school-name">NAMA PETUGAS</p>
    <!-- <p class="school-name" style="margin-top: -20px;">PERPUSTAKAAN DIGITAL</p> Nama Sekolah -->
    <div class="signature-container">
        <!-- Tanda Tangan -->
        <div class="signature-text">------------------------</div>
        <!-- Nama Kepala Sekolah -->
        <div class="signature-text">Nanda Perdana s.pd</div>
    </div>
</div>
    <script>
    // Menangani peristiwa setelah pencetakan selesai
    window.onafterprint = function(event) {
        // Mengarahkan kembali ke halaman awal
        window.location.href = '../index.php?page=laporan_data_buku';
    };

    // Memulai proses pencetakan
    window.print();
</script>

</body>
</html>