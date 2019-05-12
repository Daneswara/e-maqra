<div class="judul" style="text-align: center; margin-left: -220px; padding: 20px"><b><?php echo $acara;?></b><img style="margin-top: -10px" height="50px" src="<?php echo base_url('static/gambar/'.$pengaturan->logo);?>"></div>
<nav class="navbar navbar-inverse navbar-lg navbar-embossed" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-8">
            <span class="sr-only">Toggle navigation</span>
        </button>
        <a class="navbar-brand" style="padding-top: 15px; line-height: 1.8; text-align: center" href="#">E-MAQRA</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse-8">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hifzhil<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="active"><a href="<?php echo base_url('index.php/Hifzhil/');?>">Paket</a></li>
                    <li ><a href="<?php echo base_url('index.php/Hifzhil/');?>">Otomatis</a></li>
                    <li ><a href="<?php echo base_url('index.php/Hifzhil/');?>">Otomatis Terkelompok</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tilawah<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="active"><a href="index.php">Paket</a></li>
                    <li ><a href="tafsir.php">Otomatis</a></li>
                </ul>
            </li>
            <li ><a href="<?php echo base_url('index.php/Tafsir/');?>">Tafsir</a></li>
            <li ><a href="<?php echo base_url('index.php/Fahmil/');?>">Fahmil</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tools<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url('index.php/ToolsAcak/');?>">Link Mushaf</a></li>
                    <li><a href="acak.php">Acak</a></li>
                </ul>
            </li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pengaturan <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="about.php">Bantuan</a></li>
                    <li><a href="login.php">Keluar</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>