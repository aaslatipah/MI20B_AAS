<?php 

error_reporting(0);
include '../controller/Guru.php';

$ctrl = new Guru();
$hasil = $ctrl->index();

// echo "koneksi berhasil.php";
// var_dump($hasil);


?>

<!DOCTYPE html>
<html>
    <head>
        <title> VIEW DATA </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    </head> 
    <body>
        <div class="example-modal">
            <div id="logout" class="modal fade" role="dialog" style="display:none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="row g-3" method="post" action="<?php echo $ctrl->Logout()?>" name="form1">
                            <div class="modal-header">
                                <h3 class="modal-title">Log Out</h3>
                            </div>  
                            <div class="modal-body">
                                <h4 align="center">Apakah Anda Yakin ingin Keluar<strong><span class="grt"></span></strong>?</h4> 
                            </div>

                            <div class="modal-footer">
                                    <button id="nologout" type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary" name="logout">Keluar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

       <div class="container">
           <?php
                $pesan=$_GET['pesan'];
                $frm =$_GET['frm'];
                //echo $pesan;
                if($pesan =='success' && $frm == 'del'){
              
           ?>
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Warning!!!</strong> Anda Berhasil Menghapus Data .
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> 
            <?php 
                }else if($pesan=='success'&& $frm =='add'){
            ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
         <strong>Selamat!!</strong> Anda Berhasil Menambahkan Data.
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
            <?php 
                }else if($pesan=='success' && $frm =='edit'){
              
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Selamat!!!</strong>  Anda Berhasil Merubah Data.
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
             <?php 
                }else if($pesan=='success' && $frm =='login'){
              
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Selamat!!!</strong>  Anda Berhasil Masuk.
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
             
             <?php 
                }
              
            ?>

        <h1><center>Data Guru</h1></center>
        <br>
        <p><a href="add.php"><button class="btn btn-primary"><i class="bi bi-plus">Data Guru</i></button></a>
        <a href="report.php"><button class="btn btn-primary"><i class="bi bi-printer"> Laporan</i></button></a></p>
        <table class="table table-bordered border-dark">
    <thead class="table-dark text-center">
        <tr>
        <td>NUPTK</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td>Jenis Kelamin</td>
        <td>No Handphone</td>
        <td>Gaji Pokok</td>
        <td>Golongan</td>
        <td>Gaji Bersih</td>
        
        <td colspan=2>ACTION</td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($hasil as $isi){ ?>
        <?php
         if ($isi['golongan'] == 'Golongan I') {
            $gol = "Golongan I";
            $tip = 200000;
        } else if ($isi['golongan'] == 'Golongan II') {
            $gol= "Golongan II";
            $tip = 100000;
        } else if ($isi['golongan'] == 'Golongan III') {
            $gol = "Golongan III";
            $tip = 75000;
        } else if ($isi['golongan'] == 'Golongan IV') {
            $gol = "Golongan IV";
            $tip = 50000;
        } 
        ?>
    <tr > 
            <td><?= $isi['nuptk'];?></td>
            <td><?= $isi['nama_guru'];?></td>
            <td><?= $isi['alamat'];?></td>
            <td><?= $isi['jk'];?></td>
            <td><?= $isi['no_hp'];?></td>
            <td><?= $isi['gaji_pokok'];?></td>
            <td><?= $isi['golongan'];?></td>
            <td><?= $isi['gaji_pokok']+$tip?></td>
            <td><a href ="edit.php?id=<?php echo $isi['id'];?>"><i class="bi bi-pencil-square"></i></a></td>
            <td><a href ="#" data-bs-toggle="modal" data-bs-target="#deletedtguru<?php echo $isi['id'];?>"><i class="bi bi-trash"></i></a></td>
         </tr>

        <div class="example-modal">
            <div id="deletedtguru<?php echo $isi['id'];?>" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog">
            <div class="modal-content">
            <form class="row g-3" method="post" action="<?php echo $ctrl->hapusGuru()?>" name="form1">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Konfirmasi Data Delete Surat</h3>
            </div>  
        <div class="modal-body">
           
            <input type="hidden" class="form-control" name="id" value="<?php echo $isi['id']?>">
            <h4 align="center">Apakah Anda Yakin ingin Menghapus NUPTK <?php echo $isi['nuptk'];?>
            <strong><span class="grt"></span></strong>?</h4> 
         
        </div>

        <div class="modal-footer">
                 <button id="nodelete" type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cancel</button>
                 <button type="submit" class="btn btn-primary" name="delete">Delete</button>
                </div>
                 </form>
                 </div>
            </div>
            </div>
        </div>
    <?php } ?>
    </tbody>
    </table>  
     
    <a class="btn btn-primary action-button" role="button" href="#" data-bs-toggle="modal" data-bs-target="#logout"><i class="bi bi-box-arrow-right"></i></a>

        
    </div>
    </body>
    <script src="..//asset/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   

</html>
