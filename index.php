<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login DigiPus</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets_admin/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets_admin/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets_admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets_admin/images/logo_DigitalPustaka.png" />
  <style>
    @media (max-width: 768px) {
      .auth-img-bg {
        background-image: none;
      }
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex flex-column align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <h4>Aplikasi Perpustakaan Digital</h4>
              <h6 class="font-weight-light">Masuk Untuk Membaca & Mencari Ilmu Lewat Buku</h6>
              <form action="inc/proslog.php" method="post" class="pt-3">
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Masukan Username" name="username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Masukan Password" name="password">                        
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Biarkan Saya Tetap Masuk
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Lupa Password?</a>
                </div>
                <div class="my-2">
                  <button type="submit" name="masuk" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">LOGIN</button>
                </div>  
                <div class="text-center mt-4 font-weight-light">
                  Tidak Punya Akun? <a href="register/index.php" class="text-primary">Klik Untuk Daftar</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <img src="assets_admin/images/logo_DigitalPustaka.png" class="img-fluid" alt="Digital Pustaka Logo">
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
</body>

</html>
