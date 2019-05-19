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
        <form method="GET" target="_blank" action="<?php echo base_url('index.php/Mushaf/view');?>">
            <div class="col-xs-4">
                <div class="form-group">
                    <select name="surat" id="surat" class="form-control select select-primary" data-toggle="select"
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
                    <select name="ayat" id="ayat" class="form-control select select-primary" data-toggle="select"
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
        $("#surat").change(function () {
            $.post('<?php echo base_url('index.php/ToolsAcak/getJumlahAyat');?>', {surah: $("#surat").val()})
                .success(function (data) {
                    $("#ayat").html(data);
                    $("#ayat").change();
                });
        });
        if ($("#ayat").val() == "" || $("#ayat").val() == "0" || $("#ayat").val() == null) {
            $.post('<?php echo base_url('index.php/ToolsAcak/getJumlahAyat');?>', {surah: 1})
                .success(function (data) {
                    $("#ayat").html(data);
                    $("#ayat").change();
                });
        }
    });
</script>
<?php $this->load->view('_partials/footer.php') ?>
</body>
</html>
