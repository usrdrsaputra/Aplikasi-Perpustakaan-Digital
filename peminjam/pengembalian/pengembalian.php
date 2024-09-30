
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pengembalian Buku</h3>
                <p class="text-subtitle text-muted">
                    <a href="?page=riwayat_pengembalian" class="btn btn-outline btn-success btn-sm" style="border-radius: 10px; font-weight: bold;" >
                        <i class="ti-receipt menu-icon"></i> Riwayat Pengembalian
                    </a>
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?page=pengembalian">Transaksi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pengembalian</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                Daftar Buku Yang Belum Di Kembalikan
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="table-responsive ">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Cover Buku</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Harus Di Kembalikan</th>
                                <th>Status</th>
                                <th>Pilih Buku </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman
                                    INNER JOIN user ON peminjaman.UserID = user.UserID
                                    INNER JOIN buku ON peminjaman.BukuID = buku.BukuID
                                    WHERE peminjaman.StatusPeminjaman != 'Sudah Di Kembalikan'  -- Tambahkan kondisi disini
                                    ORDER BY buku.BukuID") or die(mysqli_error($koneksi));
                        $nomor = 1;
                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $nomor++; ?></th>
                                <td>
                                    <?php
                                        if($data['Foto'] == ""){
                                        ?>
                                        <img src="../foto/foto_kosong.webp" width="100" class="img-fluid rounded" alt="">
                                        <?php
                                        }
                                        else{
                                        ?>
                                        <!-- <img src="../assets/images/fotosampul_judul_buku/<?php echo $data['Foto'];?>" width="50" class="img-fluid rounded" alt="foto"> -->
                                        <img src="../foto/<?php echo $data['Foto'];?>" width="50" class="img-fluid rounded" alt="foto">
                                        <?php
                                        }
                                    ?>
                                </td>
                                <td><?php echo $data['Judul'] ?></td>
                                <td><?php echo $data['TanggalPeminjaman'] ?></td>
                                <td><?php echo $data['TanggalPengembalian'] ?></td>
                                <td><?php echo $data['StatusPeminjaman'] ?></td>
                                <td>
                                    <input class="form-check-input" type="checkbox" name="selected_books[]" value="<?php echo $data['BukuID']; ?>">
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <button class="btn btn-primary  mt-2 mb-2" type="submit" name="kembalikan" title="kembalikan">Kembalikan Buku</button>
                </form>
               </div>
            </div>
        </div>
    </section>
</div>



<?php
include "../inc/koneksi.php";

if (isset($_POST['kembalikan'])) {
    // Pastikan ada data yang diposting
    if (isset($_POST['selected_books']) && !empty($_POST['selected_books'])) {
        // Loop melalui buku yang dipilih untuk dikembalikan
        foreach ($_POST['selected_books'] as $BukuID) {
            // Ambil BukuID berdasarkan BukuID untuk update status peminjaman
            $query_get_peminjaman = "SELECT BukuID FROM peminjaman WHERE BukuID = $BukuID";
            $result_get_peminjaman = mysqli_query($koneksi, $query_get_peminjaman);

            if ($result_get_peminjaman && mysqli_num_rows($result_get_peminjaman) > 0) {
                $row = mysqli_fetch_assoc($result_get_peminjaman);
                $BukuID = $row['BukuID'];

                // Update data peminjaman
                $query_update = "UPDATE peminjaman SET TanggalPengembalian = NOW(), StatusPeminjaman = 'Sudah Di Kembalikan' WHERE BukuID = $BukuID";
                $result_update = mysqli_query($koneksi, $query_update);

                // Periksa apakah pengembalian berhasil diupdate
                if ($result_update) {
                    // Jika berhasil, tampilkan pesan sukses
                    echo "<script>alert('Buku berhasil dikembalikan!');
                     window.location = 'index.php?page=riwayat_pengembalian';</script>";
                } else {
                    // Jika gagal, tampilkan pesan error
                    echo "<script>alert('Gagal mengembalikan buku!');</script>";
                }
            } else {
                // Jika tidak ada data peminjaman yang sesuai dengan BukuID
                echo "<script>alert('Data peminjaman tidak ditemukan untuk buku yang dipilih!');</script>";
            }
        }
    } else {
        // Jika tidak ada buku yang dipilih untuk dikembalikan
        echo "<script>alert('Anda belum memilih buku untuk dikembalikan!'); window.location = 'index.php?page=pengembalian';</script>";
    }
}
?>

