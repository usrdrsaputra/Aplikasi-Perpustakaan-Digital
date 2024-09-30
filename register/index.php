<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register DigiPus</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets_admin/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets_admin/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../assets_admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../assets_admin/images/logo_DigitalPustaka.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <!-- <div class="brand-logo">
                <img src="../assets_admin/images/logo_DigitalPustaka.png" alt="logo">
              </div> -->
              <h4>Belum membuat akun?</h4> 
              <h6 class="font-weight-light"> Daftar Untuk Membaca Buku Secara Gratis! Hanya Dengan Beberapa Langkah Di Bawah Ini</h6>
              <form action="../inc/proster.php" method="POST" class="pt-3">
              <div class="form-group">
                  <label>Nama Lengkap</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" placeholder="Masukan Nama Lengkap Anda" name="nama_lengkap" Required>
                  </div>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-email-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="email" class="form-control form-control-lg border-left-0" placeholder="Masukan Email Anda" name="email" Required>
                  </div>
                </div>
              <div class="form-group">
                  <label>Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" placeholder="Masukan Username Anda" name="username" Required>
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Masukan Password Anda" name="password" Required>                        
                  </div>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-home text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" placeholder="Masukan Alamat Anda" name="alamat" Required>
                  </div>
                </div>  
                <input type="hidden" name="Role" value="Peminjam"/>
                <div class="mb-4">
                  <div class="form-check">
                    <!-- <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Saya menyetujui semua Syarat & Ketentuan
                    </label> -->
                  </div>
                </div>
                <div class="mt-3">
                  <button type="submmit" name="register" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                Sudah memiliki akun? <a href="../index.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <img src="../assets_admin/images/logo_DigitalPustaka.png" class="img-fluid" alt="Digital Pustaka Logo">
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../assets_admin/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../assets_admin/js/off-canvas.js"></script>
  <script src="../assets_admin/js/hoverable-collapse.js"></script>
  <script src="../assets_admin/js/template.js"></script>
  <!-- endinject -->
</body>

</html>


