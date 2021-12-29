<?php 
    

    $tanggal = "date";
    $kota = "Tasikmalaya";
    $no = "32b-111-b";
    $perihal ="Surat Peminjaman";
    $ttd = "Siti Aas Latipah";
    $inst = array('LP3I','Kota Tasikmalaya','08781234567'   
    );
    $brg = array('Ruangan Kelas','Lab Komputer','Kamera','Kursi','Meja');
    ?>
    <!DOCTYPE html>
        <html>
        <head>
        <title>Surat Peminjaman_Siti Aas Latipah </title>
        <head>
        <body>
        <table border=1>
                <tr>
                    <td>
        <?php
            echo "<center>"."<b>"."PT MITRA BUANA KOMPUTINDO"."</center>"."</b>";
            echo "<center>"."Wirausaha Building 8th Suite 802 Jl.Rasuna Said"."</center>";
            
            echo $kota." "; 
            echo date('d - M - y')."<br>";
            echo "Nomor : ".$no."<br>";
            echo "Perihal : ".$perihal."<br><br>";
            echo "Kepada yth : "."<br>";
            for($x=0;$x<count($inst);$x++){
                echo $inst[$x]."<br/>";
            }
            echo "<br>";
            echo "Di "."<br>";
            echo " Tempat "."<br><br>";
            echo " Assalamu'alaikum Wr.Wb"."<br>";
            echo " Sehubungan akan di selenggarakannya acara PERLOMBAAN POSTER maka dari itu kami selaku panitia akan meminjam beberapa barang diantaranya : "."<br>";
            $n = 1;
            for($a=0;$a<count($brg);$a++){
                echo $n." " .$brg[$a]."<br/>";
                $n++;
            }
            echo "Semoga Bapak/Ibu berkenan untuk meminjam beberapa barang yang kita pinjam."."<br>";
            echo "Terima Kasih"."<br>";
            echo " Wassalamu'alaikum Wr.Wb";
            echo "<br><br>";
            echo "ttd,"."<br>";
            echo $ttd;
            ?>
                 </tr>
                     </td>
                </table>
            </body>
            </html>