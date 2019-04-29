<?php
//session_start(); // memulai session
//session_destroy();
$acara = $pengaturan->acara;
$acara = str_replace("<petik>", "'", $acara);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo SITE_NAME?></title>
    <meta name="description" content="<?php echo SITE_NAME?>"/>

    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="<?php echo base_url('static/dist/css/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="<?php echo base_url('static/dist/css/flat-ui.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('static/docs/assets/css/demo.css')?>" rel="stylesheet">

    <script src="<?php echo base_url('static/js/sweetalert.min.js')?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/js/sweetalert.css')?>">

    <link rel="shortcut icon" href="<?php echo base_url('static/img/favicon.ico')?>">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url('static/dist/js/vendor/html5shiv.js')?>"></script>
    <script src="<?php echo base_url('static/dist/js/vendor/respond.min.js')?>"></script>
    <![endif]-->

</head>
<body>
<?php
if (isset($_GET['note'])) {
    $notifikasi = $_GET['note'];
    if ($notifikasi == 1) {
        echo "<script type='text/javascript'>swal({title: 'Login Gagal!', text: 'Username/Password anda salah, silahkan coba lagi!', confirmButtonColor: '#1abc9c', type: 'error'})</script>";
    }
}
?>
<style>
    body{
        background-color: #1abc9c;
    }
    .container{
        padding: 15%;
    }
</style>
<div class="container" style="margin-top: -100px">
    <form action="CekLogin.php" method="POST">
        <div class="login-form">
            <div style="text-align: center; padding: 20px"><img style="margin-top: -10px" height="100px" src="<?php echo base_url('static/gambar/'.$pengaturan->logo); ?>"></div>
            <div style="margin-bottom: 20px; text-align: center"><b><center><?php echo $acara;?></center></b></div>
            <div class="form-group">
                <input type="text" name="username" class="form-control login-field" value="" placeholder="Enter your name" id="login-name" />
                <label class="login-field-icon fui-user" for="login-name"></label>
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control login-field" value="" placeholder="Password" id="login-pass" />
                <label class="login-field-icon fui-lock" for="login-pass"></label>
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">Log in Pengguna</button>
            <a class="login-link" href="#">Lost your password?</a>
        </div>
    </form>
</div>
<script src="<?php echo base_url('static/dist/js/vendor/jquery.min.js')?>"></script>
<script src="<?php echo base_url('static/dist/js/vendor/video.js')?>"></script>
<script src="<?php echo base_url('static/dist/js/flat-ui.min.js')?>"></script>
<script src="<?php echo base_url('static/docs/assets/js/application.js')?>"></script>

<script>
    videojs.options.flash.swf = "<?php echo base_url('static/dist/js/vendors/video-js.swf')?>"
</script>
</body>
</html>
