<?php
//if (isset($_GET['paket'])) {
//    $psoal = $_GET['paket'];
//    $queryview = mysqli_query($koneksi, "SELECT * FROM paket WHERE id = $psoal") or die(mysqli_error($koneksi));
//    $paketsoal = mysqli_fetch_array($queryview);
//    $paket = $paketsoal['namapaket'];
//    $query_mysql = mysqli_query($koneksi, "SELECT * FROM soal WHERE kategori = $psoal ORDER BY id") or die(mysqli_error($koneksi));
//
//    $surat = array();
//    $ayat = array();
//    $kanan = array();
//    $gambar = array();
//    $i = 0;
//    while ($data = mysqli_fetch_array($query_mysql)) {
//        $surat[$i] = $data['surat'];
//        $ayat[$i] = $data['ayat'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $namasurat2 = getNamaSurat($data['suratakhir']);
//        if ($namasurat2 != "") {
//            $namasurat2 = str_replace("'", "petik", $namasurat2);
//            $akhirsoal[$i] = "&surahakhir=" . $data['suratakhir'] . "&ayatakhir=" . $data['ayatakhir'] . "&akhirnamasurat=$namasurat2";
//        }
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/kotak$ig.png";
//        $i++;
//    }
//}
//if (isset($_GET['soal1']) || isset($_GET['surat1'])) {
//    $paket = "<br>Otomatis";
//    $queryview = mysqli_query($koneksi, "SELECT * FROM pengaturan LIMIT 1") or die(mysqli_error($koneksi));
//    $pengaturan = mysqli_fetch_array($queryview);
//    $jumlahsoal = $pengaturan['jumlahsoal'];
//    $jumlahsoalmudah = $pengaturan['jumlahsoalmudah'];
//    $query_mysql = null;
//    if ($jumlahsoal == 6) {
//        $soal1 = $_GET['soal1'];
//        $soal2 = $_GET['soal2'];
//        $soal3 = $_GET['soal3'];
//        $soal4 = $_GET['soal4'];
//        $soal5 = $_GET['soal5'];
//        $soal6 = $_GET['soal6'];
//        $query_mysql = mysqli_query($koneksi, "SELECT * FROM mutasyabihat WHERE id = $soal1 OR id = $soal2 OR id = $soal3 OR id = $soal4 OR id = $soal5 OR id = $soal6") or die(mysqli_error($koneksi));
//    } else if ($jumlahsoal == 5) {
//        $soal1 = $_GET['soal1'];
//        $soal2 = $_GET['soal2'];
//        $soal3 = $_GET['soal3'];
//        $soal4 = $_GET['soal4'];
//        $soal5 = $_GET['soal5'];
//        $query_mysql = mysqli_query($koneksi, "SELECT * FROM mutasyabihat WHERE id = $soal1 OR id = $soal2 OR id = $soal3 OR id = $soal4 OR id = $soal5") or die(mysqli_error($koneksi));
//    } else if ($jumlahsoal == 4) {
//        $soal1 = $_GET['soal1'];
//        $soal2 = $_GET['soal2'];
//        $soal3 = $_GET['soal3'];
//        $soal4 = $_GET['soal4'];
//        $query_mysql = mysqli_query($koneksi, "SELECT * FROM mutasyabihat WHERE id = $soal1 OR id = $soal2 OR id = $soal3 OR id = $soal4") or die(mysqli_error($koneksi));
//    } else if ($jumlahsoal == 3) {
//        $soal1 = $_GET['soal1'];
//        $soal2 = $_GET['soal2'];
//        $soal3 = $_GET['soal3'];
//        $query_mysql = mysqli_query($koneksi, "SELECT * FROM mutasyabihat WHERE id = $soal1 OR id = $soal2 OR id = $soal3") or die(mysqli_error($koneksi));
//    } else if ($jumlahsoal == 2) {
//        $soal1 = $_GET['soal1'];
//        $soal2 = $_GET['soal2'];
//        $query_mysql = mysqli_query($koneksi, "SELECT * FROM mutasyabihat WHERE id = $soal1 OR id = $soal2") or die(mysqli_error($koneksi));
//    } else if ($jumlahsoal == 1) {
//        $soal1 = $_GET['soal1'];
//        $query_mysql = mysqli_query($koneksi, "SELECT * FROM mutasyabihat WHERE id = $soal1") or die(mysqli_error($koneksi));
//    }
//    $surat = array();
//    $ayat = array();
//    $kanan = array();
//    $gambar = array();
//    $i = 0;
//
//    if ($jumlahsoalmudah == 1) {
//        $surat[$i] = $_GET['surat1'];
//        $ayat[$i] = $_GET['ayat1'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//        $i++;
//    } else if ($jumlahsoalmudah == 2) {
//        $surat[$i] = $_GET['surat1'];
//        $ayat[$i] = $_GET['ayat1'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//
//        $i++;
//        $surat[$i] = $_GET['surat2'];
//        $ayat[$i] = $_GET['ayat2'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//        $i++;
//    } else if ($jumlahsoalmudah == 3) {
//        $surat[$i] = $_GET['surat1'];
//        $ayat[$i] = $_GET['ayat1'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//
//        $i++;
//        $surat[$i] = $_GET['surat2'];
//        $ayat[$i] = $_GET['ayat2'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//
//        $i++;
//        $surat[$i] = $_GET['surat3'];
//        $ayat[$i] = $_GET['ayat3'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//        $i++;
//    } else if ($jumlahsoalmudah == 4) {
//        $surat[$i] = $_GET['surat1'];
//        $ayat[$i] = $_GET['ayat1'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//
//        $i++;
//        $surat[$i] = $_GET['surat2'];
//        $ayat[$i] = $_GET['ayat2'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//
//        $i++;
//        $surat[$i] = $_GET['surat3'];
//        $ayat[$i] = $_GET['ayat3'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//
//        $i++;
//        $surat[$i] = $_GET['surat4'];
//        $ayat[$i] = $_GET['ayat4'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//        $i++;
//    } else if ($jumlahsoalmudah == 5) {
//        $surat[$i] = $_GET['surat1'];
//        $ayat[$i] = $_GET['ayat1'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//
//        $i++;
//        $surat[$i] = $_GET['surat2'];
//        $ayat[$i] = $_GET['ayat2'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//
//        $i++;
//        $surat[$i] = $_GET['surat3'];
//        $ayat[$i] = $_GET['ayat3'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//
//        $i++;
//        $surat[$i] = $_GET['surat4'];
//        $ayat[$i] = $_GET['ayat4'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//
//        $i++;
//        $surat[$i] = $_GET['surat5'];
//        $ayat[$i] = $_GET['ayat5'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//        $i++;
//    } else if ($jumlahsoalmudah == 6) {
//        $surat[$i] = $_GET['surat1'];
//        $ayat[$i] = $_GET['ayat1'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//
//        $i++;
//        $surat[$i] = $_GET['surat2'];
//        $ayat[$i] = $_GET['ayat2'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//
//        $i++;
//        $surat[$i] = $_GET['surat3'];
//        $ayat[$i] = $_GET['ayat3'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//
//        $i++;
//        $surat[$i] = $_GET['surat4'];
//        $ayat[$i] = $_GET['ayat4'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//
//        $i++;
//        $surat[$i] = $_GET['surat5'];
//        $ayat[$i] = $_GET['ayat5'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//
//        $i++;
//        $surat[$i] = $_GET['surat6'];
//        $ayat[$i] = $_GET['ayat6'];
//        $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//        $namasurat[$i] = getNamaSurat($surat[$i]);
//
//        $ig = $i + 1;
//        $gambar[$i] = "gambar/okotak$ig.png";
//        $i++;
//    }
//
//    if ($query_mysql != null) {
//        while ($data = mysqli_fetch_array($query_mysql)) {
//            $nos = $data['nosurat'];
//            $noa = $data['ayat'];
//            $idnya = $data['id'];
//            $acakmanual = mysqli_query($koneksi, "INSERT INTO penjurian VALUES('', $nos, $noa)") or die(mysqli_error($koneksi));
//            $deletedata = mysqli_query($koneksi, "DELETE FROM mutasyabihat WHERE id=$idnya") or die(mysqli_error($koneksi));
//            $surat[$i] = $nos;
//            $ayat[$i] = $noa;
//            $kanan[$i] = getHalaman($surat[$i], $ayat[$i]);
//            $namasurat[$i] = getNamaSurat($surat[$i]);
//
//            $ig = $i + 1;
//            $gambar[$i] = "gambar/kotak$ig.png";
//            $i++;
//        }
//    }
//}
//
//// edit tampilan kotak soal
//if (isset($_POST['peserta'])) {
//    $id = $_POST['peserta'];
//    $queryview = mysqli_query($koneksi, "SELECT * FROM peserta WHERE id = $id") or die(mysqli_error($koneksi));
//    $peserta = mysqli_fetch_array($queryview);
//    $kat = $peserta['kategori'];
//
//    if ($kat == '10 Juz') {
//        $querysoal = mysqli_query($koneksi, "SELECT * FROM soal WHERE kategori = '5 Juz' OR kategori = '10 Juz'") or die(mysqli_error($koneksi));
//    } else if ($kat == '20 Juz') {
//        $querysoal = mysqli_query($koneksi, "SELECT * FROM soal WHERE kategori = '5 Juz' OR kategori = '10 Juz' OR kategori = '20 Juz'") or die(mysqli_error($koneksi));
//    } else {
//        $querysoal = mysqli_query($koneksi, "SELECT * FROM soal WHERE kategori = '5 Juz'") or die(mysqli_error($koneksi));
//    }
//    $jumlahsoal = mysqli_num_rows($querysoal);
//    $i = 1;
//    $random = rand(1, $jumlahsoal);
//    $surat = 0;
//    $ayat = 0;
//    while ($data = mysqli_fetch_array($querysoal)) {
//        if ($i == $random) {
//            $surat = $data['surat'];
//            $ayat = $data['ayat'];
//        }
//        $i++;
//    }
//
//    $querytambah = mysqli_query($koneksi, "INSERT INTO penjurian VALUES(NULL, '$id', '$surat', '$ayat')") or die(mysqli_error($koneksi));
//    if ($querytambah) {
//        header('location: index.php?surat=' . $surat . '&ayat=' . $ayat);
//    } else {
//        echo "Gagal dalam menambahkan soal penjurian";
//    }
//}
//
//function getHalaman($surat, $ayat) {
//    include "koneksi.php";
//    $queryview = mysqli_query($koneksi, "SELECT * FROM `halaman` WHERE nosurat = $surat and ayatawal <= $ayat ORDER BY no_halaman DESC LIMIT 1") or die(mysqli_error($koneksi));
//    $halaman = mysqli_fetch_array($queryview);
//    $kanan = $halaman['no_halaman'];
//    if (mysqli_num_rows($queryview) == 0) {
//        $surat = $surat - 1;
//        $queryview = mysqli_query($koneksi, "SELECT * FROM `halaman` WHERE nosurat = $surat ORDER BY no_halaman DESC LIMIT 1") or die(mysqli_error($koneksi));
//        $halaman = mysqli_fetch_array($queryview);
//        $kanan = $halaman['no_halaman'];
//    }
//    return $kanan;
//}
//
//function getNamaSurat($surat) {
//    include "koneksi.php";
//    $queryview = mysqli_query($koneksi, "SELECT * FROM `daftarsurah` WHERE nosurat = $surat LIMIT 1") or die(mysqli_error($koneksi));
//    $surah = mysqli_fetch_array($queryview);
//    $namasurat = $surah['nama'];
//    return $namasurat;
//}
//
?>
<html lang="en">
<head>
    <?php $this->load->view('_partials/head.php') ?>
</head>
<body>
<?php
//if (isset($_GET['not'])) {
//    $notifikasi = $_GET['not'];
//    if ($notifikasi == 1) {
//        echo "<script type='text/javascript'>swal({title: 'Login Berhasil!', confirmButtonColor: '#1abc9c', type: 'success'})</script>";
//    }
//}
//if (isset($_GET['note'])) {
//    $pilihan = $_GET['pilihan'];
//    $notifikasi = $_GET['note'];
//    if ($notifikasi == 1) {
//        echo "<script type='text/javascript'>swal({title: 'Berhasil!', text: 'Paket soal telah diacak', confirmButtonColor: '#1abc9c', type: 'success'})</script>";
//    } else if ($notifikasi == 12) {
//        echo "<script type='text/javascript'>swal({title: 'Gagal!', text: 'Paket soal telah habis, silahkan buat paket soal lagi atau gunakan Acak Otomatis!', confirmButtonColor: '#1abc9c', type: 'error'})</script>";
//    } else if ($notifikasi == 2) {
//        echo "<script type='text/javascript'>swal({title: 'Berhasil!', text: 'Acak otomatis telah dilakukan', confirmButtonColor: '#1abc9c', type: 'success'})</script>";
//    } else if ($notifikasi == 21) {
//        echo "<script type='text/javascript'>swal({title: 'Gagal!', text: 'Acak otomatis tidak dapat dilakukan, silahkan coba lagi!', confirmButtonColor: '#1abc9c', type: 'error'})</script>";
//    } else if ($notifikasi == 22) {
//        echo "<script type='text/javascript'>swal({title: 'Gagal!', text: 'Soal otomatis telah habis, silahkan lakukan reset Perlombaan untuk mengembalikan soal.', confirmButtonColor: '#1abc9c', type: 'error'})</script>";
//    }
//}
//?>
<style>
    body {
        padding-bottom: 20px;
        /*padding-top: 20px;*/
        background-image: url(<?php echo base_url('static/gambar/bg.jpg')?>);
        background-repeat: repeat;
    }

    .navbar {
        margin-bottom: 20px;
    }

    .bigtext {
        font-size: 1400%;
        text-align: center;
    }

    .img-center {
        margin: 0 auto;
    }
</style>

<div class="container">

    <?php $this->load->view('_partials/menu.php') ?>
    <div class="row">

        <form method="POST">
            <div class="col-xs-8">
                <div class="form-group">
                    <select name="kategori" class="form-control select select-primary" data-toggle="select" required>
                        <?php
                        foreach ($kategori as $data){
                            if ($pilihan == $data->id) {
                                echo "<option value=" . $data->index . "_" . $data->id . " selected> " . $data->jenis . " " . $data->nama . " (Juz " . $data->index . ")" . "</option>";
                            } else {
                                echo "<option value=" . $data->index . "_" . $data->id . "> " . $data->jenis . " " . $data->nama . " (Juz " . $data->index . ")" . "</option>";
                            }
                        }
//                        ?>

                    </select></div>
            </div> <!-- /.col-xs-3 -->
<!--            <div class="col-xs-3">-->
<!--                <button type="submit" formaction="acakpaket.php" class="btn btn-block btn-lg btn-primary">Acak Paket-->
<!--                </button>-->
<!--            </div> -->
    <!-- /.col-xs-3 -->
            <div class="col-xs-4">
                <button type="submit" formaction="<?php echo base_url('index.php/Hifzhil/acakHifzhilOtomatis')?>" class="btn btn-block btn-lg btn-primary">Acak
                </button>
            </div> <!-- /.col-xs-3 -->
        </form>
    </div> <!-- /.row -->
    <body>
    <style>
        .navbar {
            margin-bottom: 20px;
        }

        /* Jendela Pop Up */
        #popup {
            width: 100%;
            height: 100%;
            position: fixed;
            background: rgba(0, 0, 0, .7);
            top: 0;
            left: 0;
            z-index: 9999;
            visibility: hidden;
        }

        /* Button Close */
        .close-button {
            width: 35px;
            height: 35px;
            background: #000;
            border-radius: 50%;
            border: 3px solid #fff;
            display: block;
            text-align: center;
            color: #fff;
            text-decoration: none;
            position: absolute;
            top: -10px;
            right: -10px;
        }

        .window {
            width: 500px;
            height: 400px;
            background: #fff;
            border-radius: 10px;
            position: relative;
            padding: 20px;
            text-align: center;
            margin: 6% auto;
        }

        /* Memunculkan Jendela Pop Up*/
        #popup:target {
            visibility: visible;
        }

        .tengah {
            padding-top: 20%;
            text-align: center;
        }

        .tengah2 {
            z-index: 1000;
            padding-left: 9%;
            padding-top: 30%;
            padding-right: 45px;
            text-align: center;
            position: relative;
            color: white;
        }

        .kotak {
            margin-top: 100px;
            margin-left: 360px;
            margin-right: 360px;
            cursor: hand;
        }

        #kotak2 {
            margin-top: -200px;
            z-index: 10;
        }

        img {
            z-index: 1;
            position: absolute;
        }
    </style>


    <div class="row" id="kotak1" name="kotak1" style="padding-left: 25px">
        <div class="kotak" <?php
        if (isset($paket) || isset($surat[0])) {
            echo "onclick='showSoal()'";
        }
        ?> >
            <img src="<?php echo base_url('static/gambar/kotak.png'); ?>" class="img-responsive center-block"/>
            <!--<dl class="palette palette-alizarin" style="height: 200px">-->
            <?php
            if (isset($paket)) {
                echo '<h5><div class="tengah2" style="padding-top: 50px; padding-left: 25px">Paket ';
                echo $paket;
            } else {
                echo '<h5><div class="tengah2" style="padding-top: 50px; padding-left: 25px">Paket ';
                echo "?";
            };
            ?></div>
        </h5>
        <!--</dl>-->
    </div>
</div>
<br><!-- /.row -->
<div class="row" id="kotak2" name="kotak2">
    <?php
    if (!isset($surat[1]) && !isset($surat[2]) && !isset($surat[3]) && !isset($surat[4]) && !isset($surat[5])) {
        $margin = "370px";
    } else if (!isset($surat[2]) && !isset($surat[3]) && !isset($surat[4]) && !isset($surat[5])) {
        $margin = "250px";
    } else if (!isset($surat[3]) && !isset($surat[4]) && !isset($surat[5])) {
        $margin = "125px";
    } else if (!isset($surat[4]) && !isset($surat[5])) {
        $margin = "125px";
        $margin1 = "370px";
        $margin2 = "110px";
    } else if (!isset($surat[5])) {
        $margin = "125px";
        $margin1 = "245px";
        $margin2 = "110px";
    } else {
        $margin = "125px";
        $margin1 = "125px";
        $margin2 = "110px";
    }
    for ($i=0;$i < count($surat);$i++){
        $namasurat1 = str_replace("'", "petik", $namasurat[$i]);
        if (isset($akhirsoal[$i])) {
            echo "<a target='_blank' href='". base_url('index.php/Mushaf/view?surat='.$surat[$i].'&ayat='.$ayat[$i])."'>";
        } else {
            echo "<a target='_blank' href='". base_url('index.php/Mushaf/view?surat='.$surat[$i].'&ayat='.$ayat[$i])."'>";
            //echo "<a target='_blank' href='mushaf.php?kanan=$kanan[$i]&surah=$surat[$i]&ayat=$ayat[$i]&namasurat=$namasurat1'>";
        }
        ?>
    <div class="col-xs-3 col-md-3" style="margin-left: <?php if($i == 0 || $i == 3){ echo $margin; }?>;
            margin-top: <?php if($i >= 3) {echo $margin2;} ?>;">
        <img src="<?php echo $gambar[$i]; ?>" class="img-responsive center-block">
        <!--                        <dl class="palette palette-alizarin" style="height: 140px">-->
        <dt>
            <div class="tengah2"><?php
                if (isset($surat[$i])) {
                    echo "QS: " . $namasurat[$i] . " " . $surat[$i] . " : " . $ayat[$i];
                }
                ?></div>
        </dt>
        <!--</dl>-->
    </div>
    <?php
    }
    ?>
</div>


<br>
<br>
<br>
<br>

<?php $this->load->view('_partials/footer.php') ?>
<script>
    document.getElementById('kotak2').style.visibility = 'hidden';

    function showSoal() {
        document.getElementById('kotak1').style.visibility = 'hidden';
        document.getElementById('kotak2').style.visibility = 'visible';
    }

</script>


</body>
