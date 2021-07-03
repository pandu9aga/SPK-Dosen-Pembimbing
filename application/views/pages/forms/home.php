        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Home</h1>
          </div>

          <div class="d-flex justify-content-center">
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Judul Tugas Akhir</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <table>
                    <?php
                    foreach ($mahasiswa as $data) {
                    ?>
                    <tr>
                      <td>NIM</td><td></td>
                      <td>:</td><td></td>
                      <td><?php echo $data->NIM; ?></td>
                    </tr>
                    <tr>
                      <td>Nama</td><td></td>
                      <td>:</td><td></td>
                      <td><?php echo $data->nama; ?></td>
                    </tr>
                    <tr>
                      <td>Alamat</td><td></td>
                      <td>:</td><td></td>
                      <td><?php echo $data->alamat; ?></td>
                    </tr>
                    <tr>
                      <td>No. Telepon</td><td></td>
                      <td>:</td><td></td>
                      <td><?php echo $data->no_hp; ?></td>
                    </tr>
                    <tr>
                      <td>Program Studi</td><td></td>
                      <td>:</td><td></td>
                      <td><?php echo $data->prodi; ?></td>
                    </tr>
                    <tr>
                      <td>Semester</td><td></td>
                      <td>:</td><td></td>
                      <td><?php echo $data->semester; ?></td>
                    </tr>
                    <tr>
                      <td>Golongan</td><td></td>
                      <td>:</td><td></td>
                      <td><?php echo $data->golongan; ?></td>
                    </tr>
                    <?php
                    if ($jumlah_judul>0) {
                      foreach ($judul as $value) {
                      ?>
                      <tr>
                        <td>Judul TA</td><td></td>
                        <td>:</td><td></td>
                        <td><?php echo $value->nama_judul; ?></td>
                      </tr>
                      <tr>
                        <td>Kategori TA</td><td></td>
                        <td>:</td><td></td>
                        <td><?php echo $value->kategori; ?></td>
                      </tr>
                      <?php
                      }
                    }else {
                    ?>
                      <tr>
                        <td>Judul TA</td><td></td>
                        <td>:</td><td></td>
                        <td>Anda belum
                          <a href="<?php echo base_url('tambah_judul'); ?>">input judul</a>
                        </td>
                      </tr>
                      <tr>
                        <td>Kategori TA</td><td></td>
                        <td>:</td><td></td>
                        <td>-</td>
                      </tr>
                    <?php
                    }
                    }
                    ?>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
