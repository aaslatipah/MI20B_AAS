<?php 
error_reporting(0);

include '../controller/Guru.php';

$ctrl = new Guru();
// $result_golongan = $ctrl->getJenisData();



//  //var_dump($result_golongan);
//  //die;

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Tambah Data Guru </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
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
            
            function add_option() {
            $('#form-add-option').on('submit', function(e) {
                e.preventDefault();
                let status = $('#record_add_status').val();

                $.ajax({
                    url: 'api.php',
                    type: 'POST',
                    data: {
                        status: status,
                    },
                    dataType: 'json',
                    success: function(data) {
                        show_status();
                        alert('Success added data');


                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        }
            
        </script>
       <div class="container">
           <row>
               <div class="card">
                    <h2 align ="center">Tambah Data Guru</h2>
                        <div class="card-body">
                            <form class="row g-3" action ="<?php echo $ctrl->simpanGuru();?>"method="post" name="form1">
                                <div class="col-md-6">
                                    <label for="nuptk" class="form-label">NUPTK</label>
                                    <input type="text" class="form-control" name="nuptk">
                                </div>

                                <div class="col-md-4">
                                    <label for="gol" class="form-label">Golongan</label>
                                        <select name ="gol" id = "gol" class="form-select">
                                        <option selected>Masukkan Golongan</option>
                                        </select>
                                </div>

                                <div class="col-md-1">
                                    <a href="#" class="btn btn-secondary" title="Tambah" data-bs-toggle="modal" data-bs-target="#golongan"><i class="bi bi-plus"></i></a>
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
                                    <label><input type="radio"  id="jk" name="jk" value="Laki-laki" required>Laki-laki</label>
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
                                    <a href ="content.php" class="btn btn-danger">Cancel</a>
                                </div>
            
                            </form>
                        </div>
                </div>
            </row>
        </div> 
        <div class="example-modal">
            <div id="golongan" class="modal fade" role="dialog" style="display:none;">
                <div class="modal-dialog">
                    <form class="row g-3" id="formGolongan">
                        <div class="modal-content"> 
                            <div class="modal-header">
                                <h3 class="modal-title">Tambahkan Golongan</h3>
                            </div>  
                            <div class="modal-body">
                                <label for="golongan" class="form-label1">Golongan</label>
                                    <input type="text" class="form-control" id="golongan" name="golongan" placeholder="Golongan..."> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary btn-block" id="btnSimpan">Simpan</button>
                                <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

               
    </body>
    
    
    <!-- <script>
        // $('#formGolongan').on('submit', function(e){
        //     e.preventDefault();
        //     console.log('Ok Chek');
        //     $.ajax({
        //         url: 'api.php',
        //         type: 'POST',
        //         data: {
        //             status: status,
        //         },
        //         dataType: 'json',
        //     });
        // });
    </script> -->

    <script src="..//asset/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   

    
</html>