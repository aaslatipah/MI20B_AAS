<?php 
error_reporting(0);

include '../controller/Guru.php';

$ctrl = new Guru();
$id = $_GET['id'];
$isi = $ctrl->getData($id);
$result_golongan = $ctrl->getJenisData2();    

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Edit Data Guru </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head> 
    <body>
    <script type="text/javascript">
            $(document).ready(function(){
                //alert('test');
                show_golongan(); //memanggil function yang ada di bawah

            function show_golongan(){  //untuk menampilkan data product
                $.ajax({
                    type    : 'GET',
                    url     : 'api.php',
                    async   : false,
                    dataType : 'json',
                    success : function(data){
                        console.log(data);
                        var html = '';
                        var i;
                        var no;
                        for(i=0; i<data.length; i++){
                            no = i + 1;
                            html +=
                                '<option value="'+data[i].gol+'">'+data[i].gol+'</option>';
                        }//akhir dari looping
                        $('#gol').html(html);//mengirim data
                    },
                    error:function(data){
                        console.log(data);
                    }
                });    
                }
            });    
        </script>
       <div class="container">
           <row>
               <div class="card">
                   <h2 align ="center">Edit Data Guru</h2>
                   <div class="card-body">
                   <form class="row g-3" action="<?php echo $ctrl->updateGuru($id);?>" method="post" name="form1">
                   <div class="col-md-12">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $isi['id']?>">
                    </div>
                    <div class="col-md-6">
                        <label for="nuptk" class="form-label">NUPTK</label>
                        <input type="text" class="form-control" name="nuptk" value="<?php echo $isi['nuptk']?>">
                    </div>

                    <div class="col-md-6">
                    <label for="gol" class="form-label">Golongan</label>
                        <select name ="gol" class="form-select">
                        <?php foreach($result_golongan as $gol){ 
                            ?>
                        <option value="<?= $gol['gol']; ?>"><?= $gol['gol']; ?></option>
                        <?php 
                         }
                        ?>
                     
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="nama" class="form-label">Nama Guru</label>
                        <input type="text" class="form-control" name="namaguru" value="<?php echo $isi['nama_guru']?>">
                    </div>
                    <div class="col-6">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $isi['alamat']?>">
                    </div>
                    <div class="col-12">
                        <label for="jk" class="form-label">JENIS KELAMIN</label><br>
                        <label><input type="radio"  id="jk" name="jk" value="Laki-laki" required>Laki-laki</label>
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
                        <a href ="content.php" class="btn btn-danger">Cancel</a>
                    </div>
                    </form>
                   </div>
                   </div>
                </row>
                </div> 
    </body>
    <script src="..//asset/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   

</html>