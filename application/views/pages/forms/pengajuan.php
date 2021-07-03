<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Daftar Pengajuan</h1>

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
              <th>Status Pengajuan</th>
              <th>Detail</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Status Pengajuan</th>
              <th>Detail</th>
            </tr>
          </tfoot>
          <?php
          $no = 1;
          foreach ($pengajuan as $key) {
          ?>
          <tbody>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $key->NIP; ?></td>
              <td><?php
                $dosen = $this->Dosen_model->getDosen($key->NIP)->result();
                foreach ($dosen as $value) {
                  echo $value->nama;
                }
              ?></td>
              <td>
                <div class="d-flex justify-content-center">
                  <?php
                    if ($key->status=='menunggu') {
                      ?>
                      <button class="btn btn-secondary btn-sm" name="button">Menunggu</button>
                      <?php
                    }elseif ($key->status=='diterima') {
                      ?>
                      <button class="btn btn-success btn-sm" name="button">Diterima</button>
                      <?php
                    }elseif ($key->status=='ditolak') {
                      ?>
                      <button class="btn btn-danger btn-sm" name="button">Ditolak</button>
                      <?php
                    }
                    ?>
                </div>
              </td>
              <td>
                <a href="<?php echo base_url('detail_pengajuan/'.$key->id_pengajuan) ?>">Lihat Detail</a>
              </td>
            </tr>
          </tbody>
          <?php
          $no++;
          }
          ?>

        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
