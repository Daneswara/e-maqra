<?php

//if(isset($_GET["surat1"]) && isset($_GET["ayat1"])){
//    $tempsurat = $_GET["surat1"];
//    $tempayat = $_GET["ayat1"];
//
//    $hal = getHalaman($tempsurat, $tempayat);
//    $namasurat = getNamaSurat($tempsurat);
//    $namasurat = str_replace("'", "petik", $namasurat);
//    echo "<script type=\"text/javascript\">  window.open('mushaf.php?kanan=$hal&surah=$tempsurat&ayat=$tempayat&namasurat=$namasurat')</script>";
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
//?>
<html lang="en">
<head>
    <?php $this->load->view('_partials/head.php') ?>
</head>
<body>

<style>
    body {
        padding-bottom: 20px;
        padding-top: 20px;
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
        <form method="GET" action="linkmushaf.php">
            <div class="col-xs-4">
                <div class="form-group">
                    <select name="surat1" id="surat1" class="form-control select select-primary" data-toggle="select"
                            required>
                        <?php
                        $temp = "";
                        foreach ($daftar_surah as $surah) {
                            if ($surah->nama != $temp) {
                                echo "<option value=" . $surah->nosurat . ">" . $surah->nosurat . ". " . $surah->nama . "</option>";
                            }
                            $temp = $data['nama'];
                        }
                        //                        $query_mysql = mysqli_query($koneksi, "SELECT * FROM daftarsurah ORDER BY nosurat") or die(mysqli_error($koneksi));
                        //                        $temp = "";
                        //                        while ($data = mysqli_fetch_array($query_mysql)) {
                        //                            if ($data['nama'] == $temp) {
                        //
                        //                            } else if ($tempsurat == $data['nosurat']) {
                        //                                echo "<option value=" . $data['nosurat'] . " selected>" . $data['nosurat'] . ". " . $data['nama'] . "</option>";
                        //                            } else {
                        //                                echo "<option value=" . $data['nosurat'] . ">" . $data['nosurat'] . ". " . $data['nama'] . "</option>";
                        //                            }
                        //                            $temp = $data['nama'];
                        //                        }
                        ?>

                    </select></div>
            </div> <!-- /.col-xs-3 -->
            <div class="col-xs-4">
                <div class="form-group">
                    <select name="ayat1" id="ayat1" class="form-control select select-primary" data-toggle="select"
                            required>

                        <!--                        --><?php
                        //                        if (isset($tempayat)) {
                        //                            $query_mysql = mysqli_query($koneksi, "SELECT * FROM daftarsurah WHERE nosurat = $tempsurat ORDER BY nosurat") or die(mysqli_error($koneksi));
                        //                            echo "edit surat" . $where;
                        //                            while ($data = mysqli_fetch_array($query_mysql)) {
                        //
                        //                                for ($a = $data['awal']; $a <= $data['akhir']; $a++) {
                        //                                    if ($tempayat == $a) {
                        //                                        echo "<option value=" . $a . " selected>" . $a . "</option>";
                        //                                    } else {
                        //                                        echo "<option value=" . $a . ">" . $a . "</option>";
                        //                                    }
                        //                                }
                        //                            }
                        //                        }
                        ?>

                    </select></div>
            </div> <!-- /.col-xs-3 -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Link Mushaf</button>
            </div> <!-- /.col-xs-3 -->
        </form>
    </div> <!-- /.row -->

</div>


<!--<script type="text/javascript">-->
<!--    $(document).ready(function () {-->
<!--        $("#surat1").change(function () {-->
<!--            $.post("ajax/ayatgoto.php", {surah: $("#surat1").val()})-->
<!--                .success(function (data) {-->
<!--                    $("#ayat1").html(data);-->
<!--                    $("#ayat1").change();-->
<!--                });-->
<!--        });-->
<!--        if ($("#ayat1").val() == "" || $("#ayat1").val() == "0" || $("#ayat1").val() == null) {-->
<!--            $.post("ajax/ayatgoto.php", {surah: $("#surat1").val()})-->
<!--                .success(function (data) {-->
<!--                    $("#ayat1").html(data);-->
<!--                    $("#ayat1").change();-->
<!--                });-->
<!--        }-->
<!--    });-->
<!--</script>-->
<?php $this->load->view('_partials/footer.php') ?>
</body>
</html>
