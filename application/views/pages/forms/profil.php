<!-- Begin Page Content -->
<div class="container-fluid">

  <style>
    * {
      box-sizing: border-box;
    }

    input[type=text], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    input[type=number], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    input[type=submit] {
      background-color: #04AA6D;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    .container {
      border-radius: 5px;
      padding: 20px;
    }

    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }

    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
      .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }
  </style>

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profil</h1>
  </div>

  <div class="d-flex justify-content-center">
    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Profil Mahasiswa</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <form action="<?php echo base_url(); ?>proses_edit_profil" method="post">
            <?php
            foreach ($mahasiswa as $data) {
            ?>
            <div class="row">
              <div class="col-25">
                <label for="nim">NIM</label>
              </div>
              <div class="col-75">
                <input type="text" name="nim" placeholder="NIM" required value="<?php echo $data->NIM; ?>">
                <input type="hidden" name="nimnow" value="<?php echo $data->NIM; ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="nama">Nama</label>
              </div>
              <div class="col-75">
                <input type="text" name="nama" placeholder="Nama" required value="<?php echo $data->nama; ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="alamat">Alamat</label>
              </div>
              <div class="col-75">
                <input type="text" name="alamat" placeholder="Alamat" required value="<?php echo $data->alamat; ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="no_hp">No. Telepon</label>
              </div>
              <div class="col-75">
                <input type="number" name="no_hp" placeholder="No. Telepon" required value="<?php echo $data->no_hp; ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="prodi">Program Studi</label>
              </div>
              <div class="col-75">
                <select name="prodi">
                  <option value="mif" <?php if ($data->prodi=='mif') { echo "selected"; } ?>>Manajemen Informatika</option>
                  <option value="tkk" <?php if ($data->prodi=='tkk') { echo "selected"; } ?>>Teknik Komputer</option>
                  <option value="tif" <?php if ($data->prodi=='tif') { echo "selected"; } ?>>Teknik Informatika</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="semester">Semester</label>
              </div>
              <div class="col-75">
                <input type="number" name="semester" placeholder="Semester" required value="<?php echo $data->semester; ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="golongan">Golongan</label>
              </div>
              <div class="col-75">
                <select name="golongan">
                  <option value="a" <?php if ($data->golongan=='a') { echo "selected"; } ?>>A</option>
                  <option value="b" <?php if ($data->golongan=='b') { echo "selected"; } ?>>B</option>
                  <option value="c"  <?php if ($data->golongan=='c') { echo "selected"; } ?>>C</option>
                  <option value="d" <?php if ($data->golongan=='d') { echo "selected"; } ?>>D</option>
                  <option value="inter"  <?php if ($data->golongan=='inter') { echo "selected"; } ?>>Inter</option>
                </select>
              </div>
            </div>
            <?php
            if ($jumlah_judul>0) {
              foreach ($judul as $value) {
              ?>
              <div class="row">
                <div class="col-25">
                  <label for="nama_judul">Judul TA</label>
                </div>
                <div class="col-75">
                  <input type="text" name="nama_judul" placeholder="Judul TA" required value="<?php echo $value->nama_judul; ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="kategori">Kategori</label>
                </div>
                <div class="col-75">
                  <select name="kategori">
                    <option value="Web" <?php if ($value->kategori=='Web') { echo "selected"; } ?>>Web</option>
                    <option value="Mobile" <?php if ($value->kategori=='Mobile') { echo "selected"; } ?>>Mobile</option>
                    <option value="Game" <?php if ($value->kategori=='Game') { echo "selected"; } ?>>Game</option>
                  </select>
                </div>
              </div>
              <?php
              }
            }else {
            ?>
              <div class="row">
                <div class="col-25">
                  <label for="judul_ta">Judul TA</label>
                </div>
                <div class="col-75">
                  <input type="text" value="Anda belum input judul" readonly>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="kategori">Kategori</label>
                </div>
                <div class="col-75">
                  <input type="text" value="Anda belum input judul" readonly>
                </div>
              </div>
              <a class="float-right" href="<?php echo base_url('tambah_judul'); ?>">Input judul</a><br><br>
            <?php
            }
            }
            ?>
            <br>
            <div class="row float-right">
              <input type="submit" value="Simpan">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
