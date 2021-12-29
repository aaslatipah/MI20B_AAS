<?php 
error_reporting(0);

$con = new mysqli("localhost", "root", "" ,"db_surat_aas");

$tgl = date('d F Y');

$sql = "SELECT * FROM tbl_surat_aas";
$result = $con->query($sql);

?>
<!DOCTYPE html>
<html>
    <head>
        <title> View Surat </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head> 
    <body>
       <div class="container">
        <h1><center>LIST SURAT</h1></center>
        <br>
        <table class="table table-bordered border-dark">
    <thead class="table-dark text-center">
        <td>NO SURAT</td>
        <td>JENIS SURAT</td>
        <td>TANGGAL SURAT</td>
        <td>TTD SURAT</td>
    </thead>
    <tbody>
    <?php foreach($result as $isi){ ?>
        <?php
         if ($isi['jenis_surat'] == 1) {
            $js = 'SURAT KEPUTUSAN';
        } else if ($isi['jenis_surat'] == 2) {
            $js = 'SURAT PERNYATAAN';
        } else if ($isi['jenis_surat'] == 3) {
            $js = 'SURAT PEMINJAMAN';
        } else {
           $js='Kode Bermasalah';
        }   
        ?>
    <tr > 
       <td><?= $isi['no_surat'] ?></td>
       <td><?= $js?></td>
       <td><?= $isi['tgl_surat'] ?></td>
       <td><?= $isi['ttd_surat'] ?></td>
    </tr>
    <?php } ?>
     

    </tbody>
    </table>
    </div>

    </body>
    <script src="..//asset/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   

</html>