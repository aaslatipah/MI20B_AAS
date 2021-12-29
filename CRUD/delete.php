<?php

$con = new mysqli("localhost", "root", "" ,"db_surat_aas");


if (isset($_POST['delete'])){
         $id = $_POST['id'];
          //insert data to table
         $result = mysqli_query($con, "DELETE FROM `tbl_surat_aas` WHERE `tbl_surat_aas`.`id` = $id") ; 
         header("location:view.php?pesan=success&&frm=del");     
                  }

?>