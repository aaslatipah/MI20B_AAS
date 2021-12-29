<?php 
error_reporting(0);

$con = new mysqli("localhost", "root", "" ,"db_surat_aas");

$tgl = date('d F Y');
$id = $_GET['id'];//fungsinya untuk mengambil parameter yang ada di url
$query = mysqli_query($con, "SELECT * FROM tbl_surat_aas where id='$id'");
$isi = $query->fetch_assoc();
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
<!DOCTYPE html>
<html>
    <head>
        <title> Edit Surat Database </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head> 
    <body>
       <div class="container">
           <row>
               <div class="card">
                   <h2 align ="center">Tambah Surat</h2>
                   <div class="card-body">
                   <form class="row g-3" method="post" action="edit.php" name="form1">
                   <div class="col-md-12">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $isi['id']?>">
                    </div>
                    <div class="col-md-6">
                        <label for="nosurat" class="form-label">NO Surat</label>
                        <input type="text" class="form-control" name="nosurat" value="<?php echo $isi['no_surat']?>">
                    </div>
                    <div class="col-md-6">
                    <label for="jenissurat" class="form-label">Jenis Surat</label>
                        <select name ="jenissurat" class="form-select">
                        <option selected value="<?php echo $isi['jenis_surat']?>"><?php echo $js ?></option>
                        <option value="1">Surat Keputusan</option>
                        <option value="2">Surat Pernyataan</option>
                        <option value="3">Surat Peminjaman</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="tglsurat" class="form-label">Tanggal Surat</label>
                        <input type="date" class="form-control" name="tglsurat" value="<?php echo $isi['tgl_surat']?>">
                    </div>
                    <div class="col-6">
                        <label for="ttdsurat" class="form-label">TTD Surat</label>
                        <input type="text" class="form-control" name="ttdsurat" value="<?php echo $isi['ttd_surat']?>">
                    </div>
                    <div class="col-md-6">
                        <label for="ttdmengetahui" class="form-label">TTD Mengetahui</label>
                        <input type="text" class="form-control" name="ttdmengetahui" value="<?php echo $isi['ttd_mengetahui']?>">
                    </div>
                    
                    <div class="col-md-6">
                        <label for="ttdmenyetujui" class="form-label">TTD Menyetujui</label>
                        <input type="text" class="form-control" name="ttdmenyetujui" value="<?php echo $isi['ttd_menyetujui']?>">
                    </div>
                    
                    <div class="col-1">
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
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
                  if (isset($_POST['update'])){
                      $id = $_POST['id'];
                      $no_surat =$_POST['nosurat'];
                      $jenis_surat =$_POST['jenissurat'];
                      $tgl_surat =$_POST['tglsurat'];
                      $ttd_surat =$_POST['ttdsurat'];
                      $ttd_mengetahui =$_POST['ttdmengetahui'];
                      $ttd_menyetujui =$_POST['ttdmenyetujui'];

                      //insert data to table
                      $result = mysqli_query($con, "UPDATE tbl_surat_aas SET `no_surat`='$no_surat',`jenis_surat`='$jenis_surat',`tgl_surat`='$tgl_surat',`ttd_surat`='$ttd_surat',
                      `ttd_mengetahui`='$ttd_mengetahui',`ttd_menyetujui`='$ttd_menyetujui'
                      WHERE `id`='$id'") ;
                      //show message when user added
                     // echo "User added successfully. <a href ='view.php'>List Surat</a>";
                     header("location:view.php?pesan=success&&frm=edit");
                  }                
                ?>
    </body>
    <script src="..//asset/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   

</html>