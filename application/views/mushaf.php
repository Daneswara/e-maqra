<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('_partials/head.php') ?>

    <style type="text/css">
        .gambar1 {
            max-width: 100%;
            max-height: 100%;
            position: static;
            width: 150%;
        }

        .gambar2 {
            max-width: 100%;
            max-height: 100%;
            position: static;
        }

        .gambar3 {
            height: 100px;
            position: fixed;
            z-index: 2;
            top: 100%;
            margin-top: -100px;
        }


        .next {
            height: 30px;
            position: fixed;
            z-index: 2;
            left: 1px;
            top: 50%;
        }

        .back {
            height: 30px;
            position: fixed;
            z-index: 2;
            right: 1px;
            top: 50%;
        }

        .untukbutton {
            position: fixed;
            padding-top: 5px;
            padding-left: 5px;
        }

        .untuksoal {
            position: fixed;
            padding-top: 5px;
            left: 50%;
            margin-left: -200px;
        }

        .soale {
            position: fixed;
            bottom: 10px;
            padding-left: 5px;
            font-size: 20px;
        }

        audio {
            display: none;
        }
    </style>
</head>

<body>

<style>
    .container {
        padding-top: 20px;
        position: fixed;

    }
</style>


<!-- Collect the nav links, forms, and other content for toggling history.go(-1); -->
<!--        --><?php
//        if (isset($_GET["namasurat"])) {
//            $nmsurat = $_GET["namasurat"];
//            $nmsurat = str_replace("petik", "'", $nmsurat);
//            if (isset($sampai)) {
//                echo "<div class='untuksoal'>
//                    <button class='btn btn-block btn-lg btn-danger' style='width: 400px' onclick='#'>Soal: <b>$nmsurat $surah : $ayat $sampai</b></button>
//                </div>";
//            } else {
//                echo "<div class='untuksoal'>
//                    <button class='btn btn-block btn-lg btn-danger' style='width: 400px' onclick='#'>Soal: <b>$nmsurat $surah : $ayat</b></button>
//                </div>";
//            }
//        }
//        ?>

<div class="untukbutton">
    <button class="btn tn-block btn-lg btn-primary fui-arrow-left" onclick="window.close();" style="width: 120px">
        Kembali
    </button>
    <br>
    <button id="mr" class="btn tn-block btn-lg btn-primary fui-play " style="margin-top: 7px; width: 120px"
            onclick="playAt()"> Play
    </button>
    <br>
    <button id="perbesar" class="btn tn-block btn-lg btn-primary fui-eye " style="margin-top: 7px; width: 120px"
            onclick="zoom()"> Perbesar
    </button>
    <br>
    <button class="btn tn-block btn-lg btn-primary fui-time " style="margin-top: 7px; width: 120px" onclick="alarm()">
        Alarm
    </button>
    <audio id="audio">
        <!--                <source src="audio/--><?php //echo $pengaturan->qori; ?><!--/-->
        <?php //echo sprintf("%03d", $surah) . sprintf("%03d", $ayat) ?><!--.mp3" type="audio/mpeg">-->
        Your browser does not support the audio element.
    </audio>
</div>
<script>
    function playAt() {
        if (k % 2 == 0) {
            var audio = document.getElementById('audio');
            audio.play();
            $("#mr").text(' Stop');
        } else {
            var audio = document.getElementById('audio');
            audio.currentTime = 0;
            audio.pause();
            $("#mr").text(' Play');
        }
        k++;
    }

    function stopAudio() {
        var audio = document.getElementById('audio');
        audio.currentTime = 0;
        audio.pause();
    }

    function zoom() {
        if (i % 2 == 0) {
            $("#besar").show();
            $("#kecil").hide();
            $("#perbesar").text(' Perkecil');
        } else {
            $("#kecil").show();
            $("#besar").hide();
            $("#perbesar").text(' Perbesar');
        }
        i++;
    }

    var i = 0;
    var j = 0;
    var k = 0;

    function alarm() {
        console.log("j:" + i);
        if (j % 2 == 0) {
            $("#alarm").show();
        } else {
            $("#alarm").hide();
        }
        j++;
    }
</script>
<script>
    $(document).ready(function () {
        $("#mushaf").click(function () {

        });
        var awalnya = <?php Print($awal); ?>;
        if (awalnya === 0) {
            $(function () {
                $("#besar").hide(0);
            });
        }
    });
</script>
<div id="besar" <?php
if ($awal === 1) {
    echo 'style="display:none;"';
}
?> >
    <img id="besar" src="<?php echo base_url("static/Mushaf/$kanan.png") ?>" class="gambar1">
</div>
<div id="kecil">
    <img src="<?php echo base_url("static/Mushaf/$kanan.png") ?>" class="gambar2 nav center-block">
</div>

<div class="container" id="mushaf">
    <div class="row">

        <?php
        echo "<a href='" . base_url('index.php/Mushaf/next') . "/$kanan'><img src='" . base_url("static/gambar/next.png") . "' class='next'></a>";
        ?>


        <?php
        echo "<a href='" . base_url('index.php/Mushaf/back') . "/$kanan'><img src='" . base_url("static/gambar/back.png") . "' class='back'></a>";

        ?>
    </div>
</div>

<div id="alarm" hidden="">
    <img src="<?php echo base_url("static/gambar/alarm.gif") ?>" class="gambar3 nav">
</div>

<?php $this->load->view('_partials/footer.php') ?>

<script>
    videojs.options.flash.swf = "dist/js/vendors/video-js.swf"
</script>
</body>
</html>
