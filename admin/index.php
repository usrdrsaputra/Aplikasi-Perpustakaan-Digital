<?php
include '../inc/koneksi.php';
session_start();
if ($_SESSION['status'] != "Administrator") {
	header("location:../admin/index.php");
}

$UserID = $_SESSION['UserID'];

// Ambil data pengguna berdasarkan UserID
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE UserID='$UserID'");
$data = mysqli_fetch_array($query);
if($data) {
    $NamaLengkap = $data['NamaLengkap'];
    $Foto = $data['foto'];
} else {
    $NamaLengkap = "Nama Pengguna";
    $Foto = "../foto_profil_petugas/foto_kosong.webp"; // Atur foto default jika tidak ditemukan
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>DigiPus Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets_admin/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets_admin/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <link rel="stylesheet" href="../assets_admin/extensions/simple-datatables/style.css">
  <link rel="stylesheet" href="../assets_admin/css/pages/simple-datatables.css">
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../assets_admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../assets_admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../assets_admin/images/logo_DigitalPustaka.png" />

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-7 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="index.html"><img src="../assets_admin/images/logo_DigitalPustaka.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../assets_admin/images/logo_DigitalPustaka.png" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <!-- Tampilkan foto pengguna -->
              <?php
                 if($data['foto'] == ""){
                 ?>
                 <img src="../foto_profil_petugas/foto_kosong.webp" width="100" class="img-fluid rounded" alt="">
                 <?php
                 }
                 else{
                 ?>
                 <img src="../foto_profil_admin/<?php echo $data['foto'];?>" width="200" height="auto" class="img-fluid rounded" alt="foto">
                 <?php
                 }
                ?>
              <!-- Tampilkan NamaLengkap pengguna yang login -->
              <span class="nav-profile-name ms-1"><?php echo $NamaLengkap; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a href="?page=edit_profile&UserID=<?php echo $UserID; ?>" class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Setting
            </a>

              <a class="dropdown-item" href="../inc/logout.php" onclick="return confirm('apakah anda yakin untuk logout')" aria-expanded="false">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>



    
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="?page=dashboard">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="?page=daftar_user">
            <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Daftar User</span>
            </a>
          </li>
           
          <li class="nav-item">
            <a class="nav-link" href="?page=daftar_kategoribuku">
            <i class="mdi mdi-book-open-page-variant menu-icon"></i>
              <span class="menu-title">Kategori Buku</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="?page=daftar_buku">
            <i class="mdi mdi-book-open-variant menu-icon"></i>
              <span class="menu-title">Daftar Buku</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Laporan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="?page=laporan_data_buku">Laporan Buku</a></li>
              </ul>
            </div>
            <!-- <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="?page=laporan_data_peminjaman">Laporan peminjaman</a></li>
              </ul>
            </div>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="?page=laporan_data_pengembalian">Laporan pengembalian</a></li>
              </ul>
            </div> -->
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../inc/logout.php" onclick="return confirm('apakah anda yakin untuk logout')" aria-expanded="false">
            <i class="mdi mdi-logout menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
        

        
      </nav>


      <div class="main-panel">
        <div class="content-wrapper">
          

          <?php
          switch (@$_GET['page']) {
          case 'dashboard':
          include 'dashboard/index.php';
          break;

            // edit profile

            case 'edit_profile':
              include 'edit_profile/profile.php';
              break;

              case 'edit':
                include 'edit_profile/edit.php';
                break;
              // 

           // daftar user start 

          case 'daftar_user':
          include 'daftar_user/daftar_user.php';
          break;
  
          case 'tambah_daftar_user':
          include 'daftar_user/tambah_daftar_user.php';
          break;

          case 'edit_daftar_user':
          include 'daftar_user/edit_daftar_user.php';
          break;

          case 'delet_daftar_user':
          include 'daftar_user/delet_daftar_user.php';
          break;

          case 'lihat_daftar_user':
          include 'daftar_user/lihat_daftar_user.php';
          break;
            // daftar user end

          // kategori buku start

          case 'daftar_kategoribuku':
          include 'kategori_buku/daftar_kategoribuku.php';
          break;
  
          case 'tambah_daftar_kategoribuku':
          include 'kategori_buku/tambah_daftar_kategoribuku.php';
          break;

          case 'edit_daftar_kategoribuku':
          include 'kategori_buku/edit_daftar_kategoribuku.php';
          break;

          case 'delet_daftar_kategoribuku':
          include 'kategori_buku/delet_daftar_kategoribuku.php';
          break;
            // kategori buku end
        
            // daftar buku start
          case 'daftar_buku':
            include 'daftar_buku/daftar_buku.php';
            break;
    
            case 'tambah_daftar_buku':
            include 'daftar_buku/tambah_daftar_buku.php';
            break;

            case 'edit_daftar_buku':
            include 'daftar_buku/edit_daftar_buku.php';
            break;

            case 'delet_daftar_buku':
            include 'daftar_buku/delet_daftar_buku.php';
            break;

            case 'lihat_ulasan_buku':
              include 'daftar_buku/lihat_ulasan_buku.php';
              break;
              // daftar buku end

            // laporan start
          case 'laporan_data_buku':
          include 'laporan_buku/laporan_data_buku.php';
          break;

            // laporan start
            case 'laporan_data_peminjaman':
              include 'laporan_buku/laporan_data_peminjaman.php';
              break;

                // laporan start
          case 'laporan_data_pengembalian':
            include 'laporan_buku/laporan_data_pengembalian.php';
            break;
  
          
            // laporan end

          default:
          include 'dashboard/index.php';
          break;
          }
          ?>

          
        </div>
        <!-- content-wrapper ends -->

        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->






  <!-- plugins:js -->
  <script src="../assets_admin/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../assets_admin/vendors/chart.js/Chart.min.js"></script>
  <script src="../assets_admin/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../assets_admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../assets_admin/js/off-canvas.js"></script>
  <script src="../assets_admin/js/hoverable-collapse.js"></script>
  <script src="../assets_admin/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../assets_admin/js/dashboard.js"></script>
  <script src="../assets_admin/js/data-table.js"></script>
  <script src="../assets_admin/js/jquery.dataTables.js"></script>
  <script src="../assets_admin/js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->

  <script src="../assets_admin/js/jquery.cookie.js" type="text/javascript"></script>

  <script src="../assets_admin/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="../assets_admin/js/pages/simple-datatables.js"></script>
</body>

</html>

