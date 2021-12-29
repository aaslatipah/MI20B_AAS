<?php 
    $biodata = array(
        'Nama' => 'Siti Aas Latipah',
        'Kelas' => 'MI20B',
        'Jurusan' => 'Management Informatika'
    );
    $Matkul = array('Web Programming','Sistem Desaign Analysis','Networking Operation system');
    ?>
    <!DOCTYPE html>
        <html>
        <head>
        <title>week2_Siti Aas </title>
        <head>
        <body>
            <table border=1 align ="center" >
                <tr>
                    <td>
        <?php
            echo "<center>"."<br>";
            echo "BIODATA "."<br>";
            echo "***************"."<br>";
            echo "Nama  :".$biodata['Nama']."<br>";
            echo "Kelas :".$biodata['Kelas']."<br>";
            echo "Jurusan :".$biodata['Jurusan']."<br><br>";
            echo "MATA KULIAH "."<br>";
            echo "***************"."<br>";
            echo " Saya Mengambil Mata Kuliah sebagai berikut : "."<br>";
            $n = 1;
            for($x=0;$x<count($Matkul);$x++){
                echo $n." " .$Matkul[$x]."<br/>";
            $n++;
            }
            
            ?>
                    </tr>
                     </td>
                </table>
            </body>
            </html>