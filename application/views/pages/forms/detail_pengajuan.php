<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Pengajuan</h1>
  </div>

  <div class="d-flex justify-content-center">
    <!-- Area Chart -->
    <div class="col-xl-10 col-lg-8">
      <div class="card shadow mb-4">
        <!-- Card Body -->
        <div class="card-body">
          <?php
          foreach ($pengajuan as $data) {
            $id_pengajuan = $data->id_pengajuan;
            $id_judul = $data->id_judul;
            $nip = $data->NIP;
            $status = $data->status;
          }
          foreach ($dosen as $key) {
            $nama_dosen = $key->nama;
            $kelamin = $key->kelamin;
            $keahlian = $key->keahlian;
            $no_telpon = $key->no_telpon;
          }
          if ($status=='menunggu') {
            ?>
            <h5>Pengajuan Dosen Pembimbing Tugas Akhir Atas Nama</h5>
            <br>
            <div class="col-12">
              <table>
                <tr>
                  <td>Nama</td>
                  <td> : </td>
                  <td><?php echo $nama_dosen; ?></td>
                </tr>
                <tr>
                  <td>NIP</td>
                  <td> : </td>
                  <td><?php echo $nip; ?></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td> : </td>
                  <td><?php echo $kelamin; ?></td>
                </tr>
                <tr>
                  <td>Keahlian</td>
                  <td> : </td>
                  <td><?php echo $keahlian; ?></td>
                </tr>
                <tr>
                  <td>No. Telepon</td>
                  <td> : </td>
                  <td><?php echo $no_telpon; ?></td>
                </tr>
                <tr>
                  <td>Status Pengajuan</td>
                  <td> : </td>
                  <td>
                    <button type="button" class="btn btn-sm btn-secondary" name="button">Menunggu</button>
                  </td>
                </tr>
              </table>
            </div>
            <br>
            <p>Mohon untuk menunggu konfirmasi dari pihak dosen.</p>
            <?php
          }elseif ($status=='diterima') {
            ?>
            <h5>Selamat Pengajuan Dosen Pembimbing Tugas Akhir Atas Nama</h5>
            <br>
            <div class="col-12">
              <table>
                <tr>
                  <td>Nama</td>
                  <td> : </td>
                  <td><?php echo $nama_dosen; ?></td>
                </tr>
                <tr>
                  <td>NIP</td>
                  <td> : </td>
                  <td><?php echo $nip; ?></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td> : </td>
                  <td><?php echo $kelamin; ?></td>
                </tr>
                <tr>
                  <td>Keahlian</td>
                  <td> : </td>
                  <td><?php echo $keahlian; ?></td>
                </tr>
                <tr>
                  <td>No. Telepon</td>
                  <td> : </td>
                  <td><?php echo $no_telpon; ?></td>
                </tr>
                <tr>
                  <td>Status Pengajuan</td>
                  <td> : </td>
                  <td>
                    <button type="button" class="btn btn-sm btn-success" name="button">Diterima</button>
                  </td>
                </tr>
              </table>
            </div>
            <br>
            <p>Silahkan menghubungi nomor telepon dosen tersebut untuk melakukan bimbingan, terima kasih.</p>
            <?php
          }elseif ($status=='ditolak') {
            ?>
            <h5>Maaf Pengajuan Dosen Pembimbing Tugas Akhir Atas Nama</h5>
            <br>
            <div class="col-12">
              <table>
                <tr>
                  <td>Nama</td>
                  <td> : </td>
                  <td><?php echo $nama_dosen; ?></td>
                </tr>
                <tr>
                  <td>NIP</td>
                  <td> : </td>
                  <td><?php echo $nip; ?></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td> : </td>
                  <td><?php echo $kelamin; ?></td>
                </tr>
                <tr>
                  <td>Keahlian</td>
                  <td> : </td>
                  <td><?php echo $keahlian; ?></td>
                </tr>
                <tr>
                  <td>No. Telepon</td>
                  <td> : </td>
                  <td><?php echo $no_telpon; ?></td>
                </tr>
                <tr>
                  <td>Status Pengajuan</td>
                  <td> : </td>
                  <td>
                    <button type="button" class="btn btn-sm btn-danger" name="button">Ditolak</button>
                  </td>
                </tr>
              </table>
            </div>
            <br>
            <p>Segera lakukan pengajuan kepada dosen yang lain.</p>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
