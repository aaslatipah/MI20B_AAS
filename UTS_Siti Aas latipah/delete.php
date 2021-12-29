<?php

$con = new mysqli("localhost", "root", "" ,"db_data_guru");


if (isset($_POST['delete'])){
         $id = $_POST['id'];
         
         $result = mysqli_query($con, "DELETE FROM `tbl_guru` WHERE `tbl_guru`.`id` = $id") ; 
         header("location:view.php?pesan=success&&frm=del");     
                  }

?>