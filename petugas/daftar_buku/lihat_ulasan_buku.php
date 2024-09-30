<?php
$BukuID = $_GET['BukuID'];
$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE BukuID='$BukuID'");
$data = mysqli_fetch_array($query);
?>
<div class="page-heading mb-4">
    <div class="page-title">
        <div class="row">
            <div class="col-md-6">
                <h3>Ulasan Buku</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <!-- Card 1 -->
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <img src="../foto/<?php echo $data['Foto'];?>" class="img-fluid rounded mx-auto" alt="foto">
                </div>
                <h4 class="text-center mt-2"><?php echo $data['Judul'] ?></h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $data['Penulis'] ?></td>
                            <td><?php echo $data['Penerbit'] ?></td>
                            <td><?php echo $data['TahunTerbit'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="?page=daftar_buku" class="btn btn-outline btn-danger ms-3 me-3 mb-3"  style="border-radius: 5px;">Kembali</a>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->

    <div class="col-md-6" >
        <!-- Colom untuk Card 2 -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h4>Ulasan</h4>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Ulasan</th>
                        <th>Rating</th>
                        <th>Pemberi Ulasan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($koneksi,"SELECT *
                    FROM ulasanbuku
                    INNER JOIN buku ON ulasanbuku.BukuID = buku.BukuID
                    INNER JOIN user ON ulasanbuku.UserID = user.UserID; ")or die(mysqli_error($koneksi));
                    $nomor = 1;
                    while($data = mysqli_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $data['Ulasan'] ?></td>
                            <td><?php echo $data['Rating'] ?></td>
                            <td><?php echo $data['NamaLengkap'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
