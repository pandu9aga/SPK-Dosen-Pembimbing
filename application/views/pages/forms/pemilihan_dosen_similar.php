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
              <input type="text" name="topik" id="topik" placeholder="Topik Tugas Akhir" value="<?php echo $get_topik; ?>">
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
              <th>Kecocokan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Kuota Dosen</th>
              <th>Keahlian</th>
              <th>Penelitian</th>
              <th>Riwayat Bimbingan</th>
              <th>Kecocokan</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <?php
          if (isset($_GET['kategori'])) {
            if ($_GET['topik']!='') {
              $index = 0;
              foreach ($dosen as $value) {
                $topik_dosen = $value->keahlian.'. '.$value->penelitian.' '.$value->riwayat_bimbingan;
                $topik_input = $get_kategori.'. '.$get_topik;
                similar_text($topik_input,$topik_dosen,$percent);
                $filter[$index] = array(
                  'NIP' => $value->NIP,
                  'nama' => $value->nama,
                  'kuota' => $value->kuota,
                  'keahlian' => $value->keahlian,
                  'penelitian' => $value->penelitian,
                  'riwayat_bimbingan' => $value->riwayat_bimbingan,
                  'kecocokan' => $percent
                );
                $index++;
              }
              $no = 1;
              for ($i=0;$i<$index;$i++) {
                ?>
                <tbody>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $filter[$i]['NIP']; ?></td>
                    <td><?php echo $filter[$i]['nama']; ?></td>
                    <td><?php
                      $terisi = $this->Pengajuan_model->cekKuotaDosen($filter[$i]['NIP'])->num_rows();
                      echo $filter[$i]['kuota'] - $terisi;
                    ?></td>
                    <td><?php echo $filter[$i]['keahlian']; ?></td>
                    <td>
                      <p hidden><?php echo $filter[$i]['penelitian']; ?></p>
                      <div class="d-flex justify-content-center">
                        <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#modaldp<?php echo $no; ?>">Penelitian</button>
                      </div>
                    </td>
                    <!-- Modal -->
                    <div class="modal fade" id="modaldp<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="titledp<?php echo $no; ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="titledp<?php echo $no; ?>">Daftar Penelitian</h5>
                                    <button class="btn btn-circle btn-secondary btn-sm" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                </div>
                                <div class="modal-body">
                                    <?php echo $filter[$i]['penelitian']; ?>
                                </div>
                                <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button></div>
                            </div>
                        </div>
                    </div>
                    <td>
                      <p hidden><?php echo $filter[$i]['riwayat_bimbingan']; ?></p>
                      <div class="d-flex justify-content-center">
                        <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#modalrb<?php echo $no; ?>">Bimbingan</button>
                      </div>
                    </td>
                    <!-- Modal -->
                    <div class="modal fade" id="modalrb<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="titlerb<?php echo $no; ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="titlerb<?php echo $no; ?>">Riwayat Bimbingan</h5>
                                    <button class="btn btn-circle btn-secondary btn-sm" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                </div>
                                <div class="modal-body">
                                    <?php echo $filter[$i]['riwayat_bimbingan']; ?>
                                </div>
                                <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button></div>
                            </div>
                        </div>
                    </div>
                    <td><?php echo $filter[$i]['kecocokan']; ?></td>
                    <td>Aksi</td>
                  </tr>
                </tbody>
                <?php
                $no++;
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
