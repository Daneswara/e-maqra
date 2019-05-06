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
        <form method="GET" action="<?php echo base_url('index.php/Mushaf/view');?>">
            <div class="col-xs-4">
                <div class="form-group">
                    <select name="surat1" id="surat1" class="form-control select select-primary" data-toggle="select"
                            required>
                        <?php
                        $temp = "";
                        foreach ($daftar_surah as $surah) {
                            echo "<option value=" . $surah->nosurat . ">" . $surah->nosurat . ". " . $surah->nama . "</option>";
                        }
                        ?>

                    </select></div>
            </div> <!-- /.col-xs-3 -->
            <div class="col-xs-4">
                <div class="form-group">
                    <select name="ayat1" id="ayat1" class="form-control select select-primary" data-toggle="select"
                            required>
                    </select></div>
            </div> <!-- /.col-xs-3 -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Link Mushaf</button>
            </div> <!-- /.col-xs-3 -->
        </form>
    </div> <!-- /.row -->

</div>


<script type="text/javascript">
    $(document).ready(function () {
        $("#surat1").change(function () {
            $.post('<?php echo base_url('index.php/ToolsAcak/getJumlahAyat');?>', {surah: $("#surat1").val()})
                .success(function (data) {
                    $("#ayat1").html(data);
                    $("#ayat1").change();
                });
        });
        if ($("#ayat1").val() == "" || $("#ayat1").val() == "0" || $("#ayat1").val() == null) {
            $.post('<?php echo base_url('index.php/ToolsAcak/getJumlahAyat');?>', {surah: 1})
                .success(function (data) {
                    $("#ayat1").html(data);
                    $("#ayat1").change();
                });
        }
    });
</script>
<?php $this->load->view('_partials/footer.php') ?>
</body>
</html>
