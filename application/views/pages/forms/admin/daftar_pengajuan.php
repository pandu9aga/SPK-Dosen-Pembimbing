<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Daftar Pengajuan Pembimbing</h1>

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
              <th>Sisa Kuota</th>
              <th>Daftar Pengaju</th>
            </tr>
          </thead>
          <!--tfoot>
            <tr>
              <th>No</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Sisa Kuota</th>
              <th>Daftar Pengaju</th>
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
              <td><?php
                $terisi = $this->Pengajuan_model->cekKuotaDosen($data->NIP)->num_rows();
                echo $data->kuota - $terisi;
              ?></td>
              <td>
                <a href="<?php echo base_url('pengaju/'.$data->NIP) ?>">Lihat daftar pengaju</a>
              </td>
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
