<html lang="en">
<head>
    <?php $this->load->view('_partials/head.php') ?>
</head>
<body>

<style>
    body {
        padding-bottom: 20px;
        background-image: url(<?php echo base_url('static/gambar/bg.jpg')?>);
        background-repeat: repeat;
    }
    .judul {
        margin-right: -220px;
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
        <form method="POST" target="_blank" action="<?php echo base_url('index.php/Mushaf/view');?>">
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
