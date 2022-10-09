<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Pendaftaran</title>
  <style>
    * {margin: 0;padding: 0;}
    .box-logo {
      /*text-align:justify;width:50%;*/
      margin-bottom: 60px;
    }

    .container {
      padding: 0 20px;
      margin: 20px auto;
    }

    .box-title {
      /*float: right;*/
      padding-top: 50px;
    }

     table {
      width: 100%;
    }

    .table-data td {
      padding: 5px;
      margin-top: 40px;
    }

    .box-logo img {
      height: 100%;
      float:left; margin:0 8px 4px 0;
    }

    .judul-lulus {
      margin-bottom: 10px;
      text-align: center;
    }

  </style>
</head>
<body>
   <div class="container">
     <div class="box-logo">
         <div class="row">
             <div class="col">
                <img src="https://i.pinimg.com/originals/23/8a/9c/238a9c568f8506bc2b7aff82ee4e5733.png" width="15%">
             </div>
             <div class="col">
                <div class="box-title align-center">
                    <center><h1>SMP Negeri 10 Kolaka Utara</h1></center>
                    <center><p>Jln Pendidikan No. 170 Latali Kec. Pakue Tengah Kab. Kolaka Utara</p></center><br>
                </div>
            </div>
         </div>

     </div>
     <div class="judul-lulus">
      <h4><u>Surat Bukti Pendaftaran</u></h4>
     </div>
     <table border="0" cellspacing="0" class="table-data">
        <tr>
           <td><strong>No.Pendaftaran</strong></td>
           <th>:</th>
           <td><?= $siswa->id_reg ?></td>
        </tr>
        <tr>
           <td><strong>NISN</strong></td>
           <th>:</th>
           <td><?= $siswa->nisn ?></td>
        </tr>
        <tr>
           <td><strong>Nama Lengkap</strong></td>
           <th>:</th>
           <td><?= $siswa->nama ?></td>
        </tr>
        <tr>
           <td><strong>Tempat/Tanggal Lahir</strong></td>
           <th>:</th>
           <td><?= $siswa->tempat_lahir ?>, <?= $siswa->tgl_lahir ?></td>
        </tr>
     </table>

   </div>
  

   <script type="text/javascript">
        window.print();
        window.onafterprint = function () {
            window.close();
        }
    </script>
</body>
</html>