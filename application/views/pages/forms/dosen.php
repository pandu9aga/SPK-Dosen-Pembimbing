<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Daftar Dosen Jurusan Teknologi Informasi</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Pendidikan</th>
              <th>Golongan</th>
              <th>Pengalaman</th>
              <th>Status</th>
              <th>Keahlian</th>
              <th>Penelitian</th>
              <th>Riwayat Bimbingan</th>
            </tr>
          </thead>
          <!--tfoot>
            <tr>
              <th>No</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Pendidikan</th>
              <th>Golongan</th>
              <th>Pengalaman</th>
              <th>Status</th>
              <th>Keahlian</th>
              <th>Penelitian</th>
              <th>Riwayat Bimbingan</th>
            </tr>
          </tfoot-->
          <tbody>
            <?php
            $no = 1;
            foreach ($dosen as $data) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $data->NIP; ?></td>
              <td><?php echo $data->nama; ?></td>
              <td><?php echo $data->pendidikan; ?></td>
              <td><?php echo $data->golongan; ?></td>
              <td><?php echo $data->pengalaman; ?></td>
              <td><?php echo $data->status; ?></td>
              <td><?php echo $data->keahlian; ?></td>
              <td>
                <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#modaldp<?php echo $no; ?>">Penelitian</button>
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
                              <?php echo $data->penelitian; ?>
                          </div>
                          <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button></div>
                      </div>
                  </div>
              </div>
              <td>
                <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#modalrb<?php echo $no; ?>">Bimbingan</button>
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
                              <?php echo $data->riwayat_bimbingan; ?>
                          </div>
                          <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button></div>
                      </div>
                  </div>
              </div>
            </tr>
            <?php
            $no++;
            }
             ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
