<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Edit Dosen</h1>

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

  <div class="container">
    <form action="<?php echo base_url(); ?>proses_edit_dosen" method="post">
      <?php
      if (isset($cekNip)) {
      ?>
      <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
        </button>
        NIP <strong><?php echo $nip; ?></strong> telah terdaftar
      </div>
      <?php
      }
      ?>
      <?php
      if (isset($dosen)) {
        foreach ($dosen as $data) {
      ?>

      <div class="row">
        <div class="col-25">
          <label for="nip">NIP</label>
        </div>
        <div class="col-75">
          <input type="hidden" name="nownip" value="<?php echo $data->NIP; ?>">
          <input type="text" name="nip" placeholder="NIP" required value="<?php echo $data->NIP; ?>">
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
          <label for="golongan">Golongan</label>
        </div>
        <div class="col-75">
          <input type="text" name="golongan" placeholder="Golongan" required value="<?php echo $data->golongan ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="status">Status</label>
        </div>
        <div class="col-75">
          <select name="status">
            <option value="Aktif" <?php if ($data->status=='Aktif') { echo "selected"; } ?>>Aktif</option>
            <option value="Tidak Aktif" <?php if ($data->status=='Tidak Aktif') { echo "selected"; } ?>>Tidak Aktif</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="kelamin">Jenis Kelamin</label>
        </div>
        <div class="col-75">
          <select name="kelamin">
            <option value="Laki-laki" <?php if ($data->kelamin=='Laki-laki') { echo "selected"; } ?>>Laki-laki</option>
            <option value="Perempuan" <?php if ($data->kelamin=='Perempuan') { echo "selected"; } ?>>Perempuan</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="no_telpon">No. Telepon</label>
        </div>
        <div class="col-75">
          <input type="number" name="no_telpon" placeholder="No. Telepon" required value="<?php echo $data->no_telpon; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="pendidikan">Pendidikan</label>
        </div>
        <div class="col-75">
          <input type="text" name="pendidikan" placeholder="Pendidikan" required value="<?php echo $data->pendidikan; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="keahlian">Keahlian</label>
        </div>
        <div class="col-75">
          <select name="keahlian">
            <option value="Web" <?php if ($data->keahlian=='Web') { echo "selected"; } ?>>Web</option>
            <option value="Mobile" <?php if ($data->keahlian=='Mobile') { echo "selected"; } ?>>Mobile</option>
            <option value="Game" <?php if ($data->keahlian=='Game') { echo "selected"; } ?>>Game</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="pengalaman">Pengalaman</label>
        </div>
        <div class="col-75">
          <select name="pengalaman">
            <option value="< 1 tahun" <?php if ($data->pengalaman=='< 1 tahun') { echo "selected"; } ?>>< 1 tahun</option>
            <option value="> 1 tahun" <?php if ($data->pengalaman=='> 1 tahun') { echo "selected"; } ?>>> 1 tahun</option>
            <option value="> 2 tahun" <?php if ($data->pengalaman=='> 2 tahun') { echo "selected"; } ?>>> 2 tahun</option>
            <option value="> 5 tahun" <?php if ($data->pengalaman=='> 5 tahun') { echo "selected"; } ?>>> 5 tahun</option>
            <option value="> 10 tahun" <?php if ($data->pengalaman=='> 10 tahun') { echo "selected"; } ?>>> 10 tahun</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="penelitian">Penelitian</label>
        </div>
        <div class="col-75">
          <textarea name="penelitian" placeholder="Penelitian" style="height:200px"><?php echo $data->penelitian; ?></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="riwayat_bimbingan">Riwayat Bimbingan</label>
        </div>
        <div class="col-75">
          <textarea name="riwayat_bimbingan" placeholder="Riwayat Bimbingan" style="height:200px"><?php echo $data->riwayat_bimbingan; ?></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="kuota">Batas Kuota</label>
        </div>
        <div class="col-75">
          <input type="number" name="kuota" placeholder="Batas Kuota" required value="<?php echo $data->kuota; ?>">
        </div>
      </div>
      <br>
      <div class="row float-right">
        <input type="submit" value="Submit">
      </div>

      <?php
        }
      }
       ?>
    </form>
  </div>
  <br><br><br>

</div>
<!-- /.container-fluid -->
