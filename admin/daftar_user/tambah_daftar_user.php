<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Data Pengguna</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST">
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Masukan Username" required name="Username">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Masukan password" required name="password">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" placeholder="Masukan Email" required name="Email">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" required name="NamaLengkap">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" placeholder="Masukan Alamat Lengkap" required name="Alamat">
                        </div>
                        <input type="hidden" name="Role" id="role_input">

                        <div class="dropdown mt-3">
                            <label class="form-label me-2">Role</label>
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                Pilih Role
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <li><button class="dropdown-item" type="button" onclick="setStatus('Administrator')">Administrator</button></li>
                                <li><button class="dropdown-item" type="button" onclick="setStatus('Petugas')">Petugas</button></li>
                            </ul>
                        </div>

                        <button type="submit" name="simpan" class="btn btn-primary mt-4">Simpan Data</button>
                        <a href="?page=daftar_user" class="btn btn-danger mt-4">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function setStatus(role) {
        document.getElementById('role_input').value = role;
        document.getElementById('dropdownMenu2').innerText = 'Role: ' + role;
    }
</script>

<?php
include "../inc/koneksi.php";

if (isset($_POST['simpan'])) {
    $Username = $_POST['Username'];
    $Password = md5($_POST['password']); // Enkripsi password menggunakan md5
    $Email = $_POST['Email'];
    $NamaLengkap = $_POST['NamaLengkap'];
    $Alamat = $_POST['Alamat'];
    $Role = $_POST['Role']; // Mengambil role dari input tersembunyi

    // Parameterized query untuk mencegah SQL Injection
    $query = "INSERT INTO user (Username, Password, Email, NamaLengkap, Alamat, Role) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ssssss", $Username, $Password, $Email, $NamaLengkap, $Alamat, $Role);
    $result = $stmt->execute();

    if ($result) {
        ?>
        <script type="text/javascript">
            alert("Data berhasil ditambahkan!");
            window.location = "index.php?page=daftar_user";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Data tidak berhasil ditambahkan!");
            window.location = "index.php?page=tambah_daftar_user";
        </script>
        <?php
    }
}
?>
