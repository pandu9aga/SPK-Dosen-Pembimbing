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
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Pemilihan Dosen Pembimbing</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <?php
    if ($jumlah_judul>0) {
    ?>
    <div class="card-header py-3">
      <div class="d-flex justify-content-center">
        <form class="" action="<?php echo base_url(); ?>pemilihan_dosen_pembimbing" method="" onkeydown="return event.key != 'Enter';">
          <div class="row">
            <div class="col-25">
              <label for="kategori">Kategori</label>
            </div>
            <?php
            if(isset($_GET['kategori'])) {
                $get_kategori = $_GET['kategori'];
            }else {
              $get_kategori = '';
            }
            if(isset($_GET['topik'])) {
                $get_topik = $_GET['topik'];
            }else {
              $get_topik = '';
            }
            ?>
            <div class="col-75">
              <select name="kategori" id="kategori">
                <option value="Web" <?php if ($get_kategori == 'Web') { echo "selected"; } ?>>Web</option>
                <option value="Mobile" <?php if ($get_kategori == 'Mobile') { echo "selected"; } ?>>Mobile</option>
                <option value="Game" <?php if ($get_kategori == 'Game') { echo "selected"; } ?>>Game</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="topik">Topik</label>
            </div>
            <div class="col-75">
              <input type="text" name="topik" id="topik" placeholder="Topik Tugas Akhir" value="<?php echo $get_topik; ?>" required>
            </div>
          </div>
          <br>
          <div class="d-flex justify-content-center">
            <button class="btn btn-primary" type="submit">Tampilkan Rekomendasi Dosen Pembimbing</button>
          </div>
          <hr>
        </form>
      </div>
      <h5>Rekomendasi Dosen Pembimbing Tugas Akhir</h5>
    </div>
    <?php
    }else {
    ?>
    <div class="card-header py-3">
      <div class="d-flex justify-content-center">
        <h5>
          Anda belum <a href="<?php echo base_url('tambah_judul'); ?>"><b>input judul</b></a>
        </h5>
      </div>
    </div>
    <?php
    }
    ?>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Kuota Dosen</th>
              <th>Keahlian</th>
              <th>Penelitian</th>
              <th>Riwayat Bimbingan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <!--tfoot>
            <tr>
              <th>No</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Kuota Dosen</th>
              <th>Keahlian</th>
              <th>Penelitian</th>
              <th>Riwayat Bimbingan</th>
              <th>Aksi</th>
            </tr>
          </tfoot-->
          <?php
          $nim = $this->session->userdata('nim');
          $data = $this->Judul_model->cekJudulMahasiswa($nim)->result();
      		foreach ($data as $key) {
      			$id_judul = $key->id_judul;
      		}
          $jumlah_status_pengajauan = $this->Pengajuan_model->cekStatusPengajauan($id_judul)->num_rows();
          if (isset($_GET['kategori'])) {
            if ($_GET['topik']!='') {
              $token = explode(" ",$get_topik);
              $filter = $this->Dosen_model->selectDosen($token,$get_kategori)->result();
              $no = 1;
              foreach ($filter as $key) {
                if ($key->keahlian==$get_kategori) {
                  ?>
                  <tbody>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $key->NIP; ?></td>
                      <td><?php echo $key->nama; ?></td>
                      <td><?php
                        $terisi = $this->Pengajuan_model->cekKuotaDosen($key->NIP)->num_rows();
                        echo $key->kuota - $terisi;
                      ?></td>
                      <td><?php echo $key->keahlian; ?></td>
                      <td>
                        <p hidden><?php echo $key->penelitian; ?></p>
                        <div class="d-flex justify-content-center">
                          <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#modaldp<?php echo $no; ?>">Penelitian</button>
                        </div>
                      </td>
                      <!-- Modal -->
                      <div class="modal fade" id="modaldp<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="titledp<?php echo $no; ?>" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="titledp<?php echo $no; ?>">Daftar Penelitian <?php echo $key->nama; ?></h5>
                                      <button class="btn btn-circle btn-secondary btn-sm" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                  </div>
                                  <div class="modal-body">
                                      <?php echo $key->penelitian; ?>
                                  </div>
                                  <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button></div>
                              </div>
                          </div>
                      </div>
                      <td>
                        <p hidden><?php echo $key->riwayat_bimbingan; ?></p>
                        <div class="d-flex justify-content-center">
                          <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#modalrb<?php echo $no; ?>">Bimbingan</button>
                        </div>
                      </td>
                      <!-- Modal -->
                      <div class="modal fade" id="modalrb<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="titlerb<?php echo $no; ?>" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="titlerb<?php echo $no; ?>">Riwayat Bimbingan <?php echo $key->nama; ?></h5>
                                      <button class="btn btn-circle btn-secondary btn-sm" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                  </div>
                                  <div class="modal-body">
                                      <?php echo $key->riwayat_bimbingan; ?>
                                  </div>
                                  <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button></div>
                              </div>
                          </div>
                      </div>
                      <td>
                        <?php
                        if ($jumlah_status_pengajauan == 0) {
                          if ($key->kuota - $terisi<=0) {
                          ?>
                          <button class="btn btn-secondary btn-sm" name="button">Penuh</button>
                          <?php
                          }else {
                            $cek_penolakan = $this->Pengajuan_model->cekTolakDosen($key->NIP,$id_judul)->num_rows();
                            if ($cek_penolakan>0) {
                              ?>
                              <button class="btn btn-secondary btn-sm" name="button">Pernah Ditolak</button>
                              <?php
                            }else {
                              ?>
                              <button class="btn btn-success btn-sm" name="button"  data-toggle="modal" data-target="#modalaju<?php echo $no; ?>">Ajukan</button>
                              <!-- Modal -->
                              <div class="modal fade" id="modalaju<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="titleaju<?php echo $no; ?>" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                          <div class="modal-body">
                                              <h5 class="modal-title" id="titleaju<?php echo $no; ?>">Anda Yakin Mengajukan Dosen Pembimbing : <br> <?php echo $key->nama; ?> ?</h5>
                                          </div>
                                          <div class="modal-footer">
                                            <a href="<?php echo base_url('proses_pengajuan/'.$key->NIP); ?>">
                                              <button class="btn btn-success">Lanjut</button>
                                            </a>
                                            <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <?php
                            }
                          }
                        }else {
                          ?>
                          <button class="btn btn-secondary btn-sm" name="button">Menunggu pengajuan sebelumnya</button>
                          <?php
                        }
                        ?>

                      </td>
                    </tr>
                  </tbody>
                  <?php
                  $no++;
                }
              }
            }
          }
          ?>

        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
