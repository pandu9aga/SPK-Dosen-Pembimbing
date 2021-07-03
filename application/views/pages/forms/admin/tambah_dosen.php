<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tambahkan Daftar Dosen</h1>

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
    <form action="<?php echo base_url(); ?>proses_tambah_dosen" method="post">
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
      <div class="row">
        <div class="col-25">
          <label for="nip">NIP</label>
        </div>
        <div class="col-75">
          <input type="text" name="nip" placeholder="NIP" required>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="nama">Nama</label>
        </div>
        <div class="col-75">
          <input type="text" name="nama" placeholder="Nama" required>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="golongan">Golongan</label>
        </div>
        <div class="col-75">
          <input type="text" name="golongan" placeholder="Golongan" required>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="status">Status</label>
        </div>
        <div class="col-75">
          <select name="status">
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="kelamin">Jenis Kelamin</label>
        </div>
        <div class="col-75">
          <select name="kelamin">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="no_telpon">No. Telepon</label>
        </div>
        <div class="col-75">
          <input type="number" name="no_telpon" placeholder="No. Telepon" required>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="pendidikan">Pendidikan</label>
        </div>
        <div class="col-75">
          <input type="text" name="pendidikan" placeholder="Pendidikan" required>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="keahlian">Keahlian</label>
        </div>
        <div class="col-75">
          <select name="keahlian">
            <option value="Web">Web</option>
            <option value="Mobile">Mobile</option>
            <option value="Game">Game</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="pengalaman">Pengalaman</label>
        </div>
        <div class="col-75">
          <select name="pengalaman">
            <option value="< 1 tahun">< 1 tahun</option>
            <option value="> 1 tahun">> 1 tahun</option>
            <option value="> 2 tahun">> 2 tahun</option>
            <option value="> 5 tahun">> 5 tahun</option>
            <option value="> 10 tahun">> 10 tahun</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="penelitian">Penelitian</label>
        </div>
        <div class="col-75">
          <textarea name="penelitian" placeholder="Penelitian" style="height:200px"></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="riwayat_bimbingan">Riwayat Bimbingan</label>
        </div>
        <div class="col-75">
          <textarea name="riwayat_bimbingan" placeholder="Riwayat Bimbingan" style="height:200px"></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="kuota">Batas Kuota</label>
        </div>
        <div class="col-75">
          <input type="number" name="kuota" placeholder="Batas Kuota" required>
        </div>
      </div>
      <br>
      <div class="row float-right">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
  <br><br><br>

</div>
<!-- /.container-fluid -->
