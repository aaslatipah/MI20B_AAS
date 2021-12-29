<?php 
error_reporting(0);

$con = new mysqli("localhost", "root", "" ,"db_data_guru");


$query = mysqli_query($con, "SELECT * FROM tbl_golongan");
$sql_golongan = "SELECT * FROM tbl_golongan";
$result_golongan = $con->query($sql_golongan);
$sql = "SELECT * FROM tbl_guru";

 //var_dump($result_golongan);
 //die;

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Tambah Data Guru </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head> 
    <body>
       <div class="container">
           <row>
               <div class="card">
                   <h2 align ="center">Tambah Data Guru</h2>
                   <div class="card-body">
                   <form class="row g-3" method="post" action="add.php" name="form1">
                    <div class="col-md-6">
                        <label for="nuptk" class="form-label">NUPTK</label>
                        <input type="text" class="form-control" name="nuptk">
                    </div>

                    <div class="col-md-6">
                    <label for="gol" class="form-label">Golongan</label>
                        <select name ="gol" class="form-select">
                        <option selected>Masukkan Golongan</option>
                        <?php foreach($result_golongan as $gol){ 
                            ?>
                        <option value="<?= $gol['id']; ?>"><?= $gol['golongan']; ?></option>
                        <?php 
                         }
                        ?>
                     
                        </select>
                    </div>
                    <div class="col-6">
                    <label for="namaguru" class="form-label">Nama Guru</label>
                        <input type="text" class="form-control" name="namaguru">
                    </div>

                    <div class="col-6">
                    <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat">
                    </div>

                    <div class="col-12">
                        <label for="jk" class="form-label">JENIS KELAMIN</label><br>
                        <label><input type="radio"  id="jk" name="jk" value="Laki-laki" required>Laki-laki</label><br>
                        <label><input type="radio"  id="jk" name="jk" value="Perempuan" required>Perempuan</label>
                    </div>
                    
                    <div class="col-md-6">
                    <label for="nohp" class="form-label">No Handphone</label>
                        <input type="text" class="form-control" name="nohp">
                    </div>

                    <div class="col-md-6">
                        <label for="gajipokok" class="form-label">Gaji Pokok</label>
                        <input type="text" class="form-control" name="gajipokok">
                    </div>
                    
                    <div class="col-1">
                        <button type="submit" class="btn btn-primary" name="simpan">Add</button>
                    </div>
                    <div class="col-4">
                        <button type="button" class="btn btn-danger">Cancel</button>
                    </div>
            
                    </form>
                   </div>
                   </div>
                </row>
                </div> 
                <?php
                  if (isset($_POST['simpan'])){
                    $nuptk =$_POST['nuptk'];
                    $nama_guru =$_POST['namaguru'];
                    $alamat =$_POST['alamat'];
                    $jk =$_POST['jk'];
                    $no_hp =$_POST['nohp'];
                    $gaji_pokok =$_POST['gajipokok'];
                    $gol =$_POST['gol'];

                      //insert data to table
                      $result = mysqli_query($con, "INSERT INTO tbl_guru (`nuptk`,`nama_guru`,`alamat`,`jk`,
                     `no_hp`,`gaji_pokok`,`golongan`) VALUES ('$nuptk','$nama_guru','$alamat','$jk','$no_hp',
                      '$gaji_pokok','$gol')");

                      //show message when user added
                      header("location:view.php?pesan=success&&frm=add");
                  }                
                ?>
    </body>
    <script src="..//asset/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   

</html>