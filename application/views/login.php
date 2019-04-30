<?php
//session_start(); // memulai session
//session_destroy();
$acara = $pengaturan->acara;
$acara = str_replace("<petik>", "'", $acara);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('_partials/head.php')?>
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
    <form action="<?php echo base_url('index.php/Login/proses');?>" method="POST">
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

<?php $this->load->view('_partials/footer.php')?>

<script>
    videojs.options.flash.swf = "<?php echo base_url('static/dist/js/vendors/video-js.swf')?>"
</script>
</body>
</html>
