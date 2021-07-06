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
  <h1 class="h3 mb-2 text-gray-800">Daftar Mahasiswa Yang Mengajukan</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <?php
      foreach ($pengajuan as $variable) {
        $val = $this->Dosen_model->getDosen($variable->NIP)->result();
        foreach ($val as $dosen) {
          echo $dosen->nama;
        }
      }
      ?>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Kategori</th>
              <th>Judul</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <!--tfoot>
            <tr>
              <th>No</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Kategori</th>
              <th>Judul</th>
              <th>Aksi</th>
            </tr>
          </tfoot-->
          <tbody>
            <?php
            $no = 1;
            foreach ($pengajuan as $data) {
              $id_judul = $data->id_judul;
              $judul = $this->Judul_model->getJudulMahasiswa($id_judul)->result();
              foreach ($judul as $key) {
                $nama_judul = $key->nama_judul;
                $kategori = $key->kategori;
                $nim = $key->NIM;
              }
              $mahasiswa = $this->Mahasiswa_model->cekNim($nim)->result();
              foreach ($mahasiswa as $value) {
                $nama_mahasiswa = $value->nama;
              }
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $nim; ?></td>
                <td><?php echo $nama_mahasiswa; ?></td>
                <td><?php echo $kategori; ?></td>
                <td><?php echo $nama_judul; ?></td>
                <td>
                  <?php
                  if ($data->status=='menunggu') {
                    ?>
                    <a href="<?php echo base_url('proses_konfirmasi_aju/diterima_'.$data->id_pengajuan.'_'.$data->NIP) ?>">
                      <button type="button" class="btn btn-primary" name="button">Terima</button>
                    </a>
                    <a href="<?php echo base_url('proses_konfirmasi_aju/ditolak_'.$data->id_pengajuan.'_'.$data->NIP) ?>">
                      <button type="button" class="btn btn-info" name="button">Tolak</button>
                    </a>
                    <?php
                  }elseif ($data->status=='diterima') {
                    ?>
                    <div class="d-flex justify-content-center">
                      <button type="button" class="btn btn-sm btn-success" name="button">Diterima</button>
                    </div>
                    <?php
                  }elseif ($data->status=='ditolak') {
                    ?>
                    <div class="d-flex justify-content-center">
                      <button type="button" class="btn btn-sm btn-danger" name="button">Ditolak</button>
                    </div>
                    <?php
                  }
                  ?>
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
