<?php
$username = 'root';
$password = '';
$database = 'db_surat_aas';

$con = new mysqli('localhost', $username, $password, $database);

if ($con->connect_error) {
    die('Connection Failed');
}

$sql = "SELECT * FROM tbl_surat_aas";
$result = $con->query($sql);
$data = $result->fetch_assoc();

$js = '';

if ($data['jenis_surat'] == 1) {
    $js = 'SURAT KEPUTUSAN';
} else if ($data['jenis_surat'] == 2) {
    $js = 'SURAT PERNYATAAN';
} else if ($data['jenis_surat'] == 3) {
    $js = 'SURAT PEMINJAMAN';
} else {
    die('Kode Bermasalah');
}

$surat = array(
    'date'          => $data['tgl_surat'],
    'nomor'         => $data['no_surat'],
    'kepada'        => $data['ttd_surat'],
    'kota'          => 'Tasikmalaya',
    'instansi'      => array('LP3I, ', 'Kota Tasikmalaya, ', '081297551925'),
    'barang'        => array('Kamera', 'Komputer'),
    'ttd'           => $data['ttd_menyetujui'],
    'js'            => $js,
);


?>
<html>

<head>
    <title>Surat Peminjaman Siti Aas latipah</title>
    <style>
        body {
            padding-left: 350px;
            padding-right: 350px;
        }

        .content {
            padding: 50px;
            padding-bottom: 100px;
            background: #fff;
            box-shadow: 0px 0px 0.1rem 0px grey;
        }

        @media print {
            body {
                padding-left: 0px;
                padding-right: 0px;
            }

            .content {
                padding: 0px;
                box-shadow: 0px 0px 0px 0px grey;
            }
        }
    </style>
</head>

<body>
    <div class="content">
        <?php
        echo '<b><center>' . $surat['js'] . '</center></b>';
        echo '<br>';
        echo '<center>';
        for ($i = 0; $i < count($surat['instansi']); $i++) {
            echo $surat['instansi'][$i];
        }
        echo '</center>';
        echo '<hr>';
        echo '<br>';
        echo '<br>';
        echo 'Nomor : ' . $surat['nomor'];
        echo '<br>';
        echo 'Lampiran : -';
        echo '<br>';
        echo 'Perihal : Permohonan Peminjaman Barang';
        echo '<br><br>';
        echo 'Yth. <br> <b>Kepada <br>' . $surat['kepada'] . '</b>';
        echo '<br> di Tempat';
        echo '<br><br> Dengan Hormat';
        echo '<br> Sehubungan akan di selenggarakannya acara PERLOMBAAN POSTER maka dari itu kami selaku panitia akan meminjam Lab 3. Adapun rencana kegiatan akan dilaksanakan pada :';
        echo '<br><br>Tanggal : ' . $surat['date'];
        echo '<br>Waktu : ' . date('h:i:s');
        echo '<br>Tempat : ' . $surat['instansi'][0]  . ', ' . $surat['instansi'][1];
        echo '<br><br>Demikian permohonan ini disampaikan, atas perhatian dan bantuannya diucapkan terima kasih.';
        echo '<div style="text-align: right; margin-top: 70px">' . $surat['kota'] . ', ' . $surat['date'] . '</div>';
        echo '<div style="text-align: right; margin-top: 60px;"><u><b>' . $surat['ttd'] . '</b></u></div>';
        ?>
    </div>
</body>

</html>