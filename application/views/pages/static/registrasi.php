<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SPK DosPem- Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
              </div>
              <?php
							if (isset($cekNim)) {
							?>
              <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                </button>
                NIM <strong><?php echo $NIM; ?></strong> telah terdaftar
              </div>
              <?php
              }
              ?>
              <form class="user" action="proses_registrasi" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                  </div>
                  <div class="col-sm-6">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" class="form-control" placeholder="NIM" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                </div>
                <div class="form-group">
                  <label for="no_hp">No. Hp</label>
                  <input type="number" name="no_hp" class="form-control" placeholder="No. Hp" required>
                </div>
                <div class="form-group">
                  <label for="prodi">Prodi</label>
                  <select id="prodi" name="prodi" class="form-control">
                    <option value="mif">Manajemen Informatika</option>
                    <option value="tkk">Teknik Komputer</option>
                    <option value="tif">Teknik Informatika</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="semester">Semester</label>
                  <input type="number" name="semester" class="form-control" placeholder="Semester" required>
                </div>
                <div class="form-group">
                  <label for="golongan">Golongan</label>
                  <select id="golongan" name="golongan" class="form-control">
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                    <option value="d">D</option>
                    <option value="inter">Inter</option>
                  </select>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="repassword" class="form-control" id="exampleRepeatPassword" placeholder="Ulangi Password" required>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Registrasi
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?php echo base_url(); ?>login">Sudah punya akun? Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>
