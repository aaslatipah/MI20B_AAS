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
        <title> View Surat Database </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head> 
    <body>
       <div class="container">
           <row>
               <div class="card">
                   <h2 align ="center">Tambah Surat</h2>
                   <div class="card-body">
                   <form class="row g-3">
                    <div class="col-md-6">
                        <label for="nosurat" class="form-label">NO Surat</label>
                        <input type="text" class="form-control" id="nosurat">
                    </div>
                    <div class="col-md-6">
                    <label for="jenissurat" class="form-label">Jenis Surat</label>
                        <select id="jenissurat" class="form-select">
                        <option selected>Masukkan Pilihan</option>
                        <option>Surat Keputusan</option>
                        <option>Surat Pernyataan</option>
                        <option>Surat Peminjaman</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="tglsurat" class="form-label">Tanggal Surat</label>
                        <input type="date" class="form-control" id="tglsurat" >
                    </div>
                    <div class="col-6">
                        <label for="ttdsurat" class="form-label">TTD Surat</label>
                        <input type="text" class="form-control" id="ttdsurat">
                    </div>
                    <div class="col-md-6">
                        <label for="ttdmengetahui" class="form-label">TTD Mengetahui</label>
                        <input type="text" class="form-control" id="ttdmengetahui">
                    </div>
                    
                    <div class="col-md-6">
                        <label for="ttdmenyetujui" class="form-label">TTD Menyetujui</label>
                        <input type="text" class="form-control" id="ttdmenyetujui">
                    </div>
                    
                    <div class="col-1">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-danger">Cancel</button>
                    </div>
                    </form>
                   </div>
                   </div>
                </row>
                </div> 
                <?php
                  if (isset($_POST['submit'])){
                      $no_surat =$_POST['nosurat'];
                      $jenis_surat =$_POST['jenissurat'];
                      $tgl_surat =$_POST['tglsurat'];
                      $ttd_surat =$_POST['ttdsurat'];
                      $ttd_mengetahui =$_POST['ttdmengetahui'];
                      $ttd_menyetujui =$_POST['ttdmenyetujui'];

                      //insert data to table
                      $result = mysqli_query($mysqli, "INSERT INTO tbl_surat_aas(id,no_surat,jenis_surat,ttd_surat,
                      ttd_mengetahui,ttd_menyetujui)VALUES('',$no_surat,$jenis_surat,$tgl_surat,$ttd_surat,$ttd_mengetahui,
                      $ttd_menyetujui)");

                      //show message when user added
                      echo "User added successfully. <a href ='view.php'>List Surat</a>";
                  }                
                ?>
    </body>
    <script src="..//asset/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   

</html>