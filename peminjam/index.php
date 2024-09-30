<?php
include '../inc/koneksi.php';
session_start();
if ($_SESSION['status']!="Peminjam") {
	header("location:../peminjam/index.php");
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
  <title>DigiPus</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets_peminjam/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../assets_peminjam/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <link rel="stylesheet" href="../assets_peminjam/extensions/simple-datatables/style.css">
  <link rel="stylesheet" href="../assets_peminjam/css/pages/simple-datatables.css">

  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../assets_peminjam/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../assets_peminjam/images/logo_DigitalPustaka.png" />
</head>
<body>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo me-5" href="index.html"><img src="../assets_peminjam/images/logo_DigitalPustaka.png" width="50" height="50" class="me-2" alt="logo"/></a>
        
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>

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
              <a class="dropdown-item" href="?page=edit_profile">
                <i class="ti-settings menu-icon"></i>
                Settings
              </a>
              <a class="dropdown-item" href="../inc/logout.php" onclick="return confirm('apakah anda yakin untuk logout')" aria-expanded="false">
              <i class="ti-power-off menu-icon"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
    <!-- navbar -end -->
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="?page=dashboard">
              <i class="ti-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=daftar_buku">
            <i class="ti-agenda menu-icon"></i>
              <span class="menu-title">Daftar Buku</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=koleksi_buku">
              <i class="ti-archive menu-icon"></i>
              <span class="menu-title">koleksi Buku Pribadi</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="ti-shift-right menu-icon"></i>
              <span class="menu-title">Transaksi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="?page=pengembalian">Pengembalian</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../inc/logout.php" onclick="return confirm('apakah anda yakin untuk logout')" aria-expanded="false">
              <i class="ti-power-off menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>

      <div class="main-panel">
        <div class="content-wrapper">
          

        <?php
            switch (@$_GET['page']) {
              // dashboard start
            case 'dashboard':
            include 'dashboard/dashboard.php';
            break;

            case 'detail_buku':
              include 'dashboard/lihat_buku.php';
              break;

              case 'beli':
                include 'dashboard/beli.php';
                break;

                case 'tambah_ulasan_buku':
                  include 'dashboard/tambah_ulasan_buku.php';
                  break;
  
                  case 'tampilan_membaca':
                    include 'dashboard/tampilan_membaca.php';
                    break;

                    case 'kuitansi.php':
                      include 'dashboard/kuitansi.php.php';
                      break;
            //  end

              // edit profile

              case 'edit_profile':
                include 'edit_profile/profile.php';
                break;
  
                case 'edit':
                  include 'edit_profile/edit.php';
                  break;
                // 

            case 'kumpulan_buku':
              include 'kumpulan_buku/kumpulan_buku.php';
              break;

             
                  
              case 'lihat_buku':
                include 'kumpulan_buku/lihat_buku.php';
                break;
                
              // 

              // daftar buku start
            case 'daftar_buku':
              include 'daftar_buku/daftar_buku.php';
              break;
      
              case 'tambah_ulasan':
              include 'daftar_buku/tambah_ulasan.php';
              break;
  
              case 'delet_daftar_buku':
              include 'daftar_buku/delet_daftar_buku.php';
              break;

              
              
              case 'tambah_koleksi_buku':
              include 'daftar_buku/tambah_koleksi_buku.php';
              break;
                // 
                // 
                case 'ulasan':
                  include 'ulasan/ulasan.php';
                  break;
                // 
                // daftar buku end
                // 
                case 'koleksi_buku':
                  include 'koleksi_buku/koleksi_buku.php';
                  break;

                  case 'delet_koleksi_buku':
                    include 'koleksi_buku/delet_koleksi_buku.php';
                    break;
                // 

                // 
                case 'proses_peminjaman':
                  include 'daftar_buku/peminjaman/proses_peminjaman.php';
                  break;
                // 

                case 'pengembalian':
                  include 'pengembalian/pengembalian.php';
                  break;

                  case 'kembalikan':
                    include 'pengembalian/kembalikan.php';
                    break;

                    case 'riwayat_pengembalian':
                      include 'pengembalian/riwayat_pengembalian.php';
                      break;
                // 
             

            default:
            include 'dashboard/dashboard.php';
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
<script src="../assets_peminjam/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../assets_peminjam/vendors/chart.js/Chart.min.js"></script>
  <script src="../assets_peminjam/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../assets_peminjam/js/off-canvas.js"></script>
  <script src="../assets_peminjam/js/hoverable-collapse.js"></script>
  <script src="../assets_peminjam/js/template.js"></script>
  <script src="../assets_peminjam/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../assets_peminjam/js/dashboard.js"></script>
  <!-- End custom js for this page-->

  <script src="../assets_peminjam/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="../assets_peminjam/js/pages/simple-datatables.js"></script>
</body>

</html>

