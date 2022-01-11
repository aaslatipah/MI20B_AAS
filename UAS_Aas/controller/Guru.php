<?php

include '../Database.php';
include '../model/Guru_model.php';

 class Guru{
 	public $model;	

 	function __construct(){ //untuk auto load
 	
	$db = new Database();
	$conn = $db->DBConnect();
	$this->model = new Guru_model($conn);
	
	//menghilangkan pesan error
	}

	function index(){
      session_start();
      if(!empty($_SESSION)){
         $hasil = $this->model->tampil_data();
	      return $hasil;
      }else{
         header("Location:index.php");
      }
   }

   function getData($id){
	$hasil = $this->model->getData($id);
	return $hasil;
   }

   function getJenisData(){
      $hasil = $this->model->getJenisData();
      echo json_encode($hasil);
   }

   function setGolongan(){
      $golongan = $_POST['golongan'];
      $data[] = array(
         'gol' => $golongan,
      );

      $add = $this->model->simpanGolongan($data);
      $result['status']=1;
      echo json_encode($result);
   }

   function getJenisData2(){
      $hasil = $this->model->getJenisData();
      return $hasil;
   }

   function hapusGuru(){
   	if (isset($_POST['delete'])) {
   		$id = $_POST['id'];
   		$result = $this->model->hapusData($id);

   		if ($result) {
   			 header("location:content.php?pesan=success&frm=del");
       }else{
      	     header("location:content.php?pesan=gagal&frm=del");
             }
   		}
   	}
   

   function simpanGuru(){
    if (isset($_POST['simpan']))
    {
         $nuptk =$_POST['nuptk'];
         $nama_guru =$_POST['namaguru'];
         $alamat =$_POST['alamat'];
         $jk =$_POST['jk'];
         $no_hp =$_POST['nohp'];
         $gaji_pokok =$_POST['gajipokok'];
         $gol =$_POST['gol'];

         $data[] = array(
         	'nuptk' => $nuptk,
         	'nama_guru' => $nama_guru,
         	'alamat' => $alamat,
         	'jk' => $jk,            
            'no_hp' => $no_hp,
            'gaji_pokok' => $gaji_pokok,
            'golongan' => $gol
         );
      $result = $this->model->simpanData($data);

      if ($result) {
      	header("Location:content.php?pesan=success&frm=add");
      }else{
      	header("Location:content.php?pesan=gagal&frm=add");
      }
   	}
   }

   function updateGuru($id){
    if (isset($_POST['update']))
    {
         $nuptk =$_POST['nuptk'];
         $nama_guru =$_POST['namaguru'];
         $alamat =$_POST['alamat'];
         $jk =$_POST['jk'];
         $no_hp =$_POST['nohp'];
         $gaji_pokok =$_POST['gajipokok'];
         $gol =$_POST['gol'];

         $data = array(
         	'nuptk' => $nuptk,
         	'nama_guru' => $nama_guru,
         	'alamat' => $alamat,
         	'jk' => $jk,            
           'no_hp' => $no_hp,
           'gaji_pokok' => $gaji_pokok,
           'golongan' => $gol
         );
         
      $result = $this->model->updateData($data, $id);

      if ($result) {
      	header("Location:content.php?pesan=success&frm=edit");
      }else{
      	header("Location:content.php?pesan=gagal&frm=edit");
         }
      }
   }

   function Logout(){
      if(isset($_POST['logout'])){
         session_start();
         session_destroy();
         header("Location:index.php?pesan=success&frm=logout");
      }
   }
 }
 
?>