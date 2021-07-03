<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tambah Judul</h1>

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
    <form action="<?php echo base_url(); ?>proses_tambah_judul" method="post">
      <div class="row">
        <div class="col-25">
          <label for="judul">Judul</label>
        </div>
        <div class="col-75">
          <input type="text" name="judul" placeholder="Judul" required>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="kategori">Kategori</label>
        </div>
        <div class="col-75">
          <select name="kategori">
            <option value="Web">Web</option>
            <option value="Mobile">Mobile</option>
            <option value="Game">Game</option>
          </select>
        </div>
      </div>
      <input type="hidden" name="nim" value="<?php echo $nim; ?>">
      <br>
      <div class="row float-right">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
  <br><br><br>

</div>
<!-- /.container-fluid -->
