<?php 
error_reporting(0);

$con = new mysqli("localhost", "root", "" ,"db_data_guru");

$id = $_GET['id'];//fungsinya untuk mengambil parameter yang ada di url
$query = mysqli_query($con, "SELECT * FROM tbl_guru where id='$id'");
$isi = $query->fetch_assoc();

    if ($isi['golongan'] == "1") {
        $gol = "Golongan I";
    } else if ($isi['golongan'] == "2") {
        $gol = "Golongan II";
    } else if ($isi['golongan'] == "3") {
        $gol = "Golongan III";
    } else if ($isi['golongan'] == "4") {
        $gol = "Golongan IV";
    }   

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Edit Data Guru </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head> 
    <body>
       <div class="container">
           <row>
               <div class="card">
                   <h2 align ="center">Edit Data Guru</h2>
                   <div class="card-body">
                   <form class="row g-3" method="post" action="edit.php" name="form1">
                   <div class="col-md-12">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $isi['id']?>">
                    </div>
                    <div class="col-md-6">
                        <label for="nuptk" class="form-label">NUPTK</label>
                        <input type="text" class="form-control" name="nuptk" value="<?php echo $isi['nuptk']?>">
                    </div>
                    <div class="col-md-6">
                    <label for="golongan" class="form-label">Golongan</label>
                        <select name ="golongan" class="form-select">
                        <option selected value="">Silahkan Pilih</option>
                        <?php
                        
                        ?>
                        <option value="1">Golongan I</option>
                        <option value="2">Golongan II</option>
                        <option value="3">Golongan III</option>
                        <option value="4">Golongan IV</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="nama" class="form-label">Nama Guru</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $isi['nama_guru']?>">
                    </div>
                    <div class="col-6">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $isi['alamat']?>">
                    </div>
                    <div class="col-12">
                        <label for="jk" class="form-label">JENIS KELAMIN</label><br>
                        <label><input type="radio"  id="jk" name="jk" value="Laki-laki" required>Laki-laki</label><br>
                        <label><input type="radio"  id="jk" name="jk" value="Perempuan" required>Perempuan</label>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="nohp" class="form-label">No_Handphone</label>
                        <input type="text" class="form-control" name="nohp" value="<?php echo $isi['no_hp']?>">
                    </div>

                    <div class="col-md-6">
                        <label for="gajipokok" class="form-label">Gaji Pokok</label>
                        <input type="text" class="form-control" name="gajipokok" value="<?php echo $isi['gaji_pokok']?>">
                    </div>
                    
                    <div class="col-1">
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </div>
                    <div class="col-4">
                        <a href ="view.php" class="btn btn-danger">Cancel</a>
                    </div>
                    </form>
                   </div>
                   </div>
                </row>
                </div> 
                <?php
                  if (isset($_POST['update'])){
                    $id=$_POST['id'];
                    $nuptk =$_POST['nuptk'];
                    $nama_guru =$_POST['nama'];
                    $alamat =$_POST['alamat'];
                    $jk =$_POST['jk'];
                    $no_hp =$_POST['nohp'];
                    $gaji_pokok =$_POST['gajipokok'];
                    $gol =$_POST['golongan'];

                      //insert data to table
                      $result = mysqli_query($con, "UPDATE tbl_guru SET nuptk='$nuptk',nama_guru='$nama_guru',alamat='$alamat',
                      jk='$jk',no_hp='$no_hp',gaji_pokok='$gaji_pokok',golongan='$gol'
                      WHERE id='$id'") ;

                      //show message when user added
                     // echo "User added successfully. <a href ='view.php'>List Data Guru</a>";
                     header("location:view.php?pesan=success&&frm=edit");
                  }                
                ?>
    </body>
    <script src="..//asset/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   

</html>