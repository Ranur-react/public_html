<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$set = $this->func->globalset("semua");
$nama = (isset($titel)) ? $set->nama." &#8211; ".$titel: $set->nama." &#8211; ".$set->slogan;
$nama = ($this->func->demo() == true) ? $nama." App by @masbil_al 085691257411" : $nama;
$headerclass = (isset($titel)) ? "header-v4" : "";
$keranjang = (isset($_SESSION["usrid"]) AND $_SESSION["usrid"] > 0) ? $this->func->getKeranjang() : 0;
$keyw = $this->db->get("kategori");
$keywords = "";
$img = (isset($img)) ? $img : base_url(backend()."/assets/img/".$set->favicon);
$url = (isset($url)) ? $url : site_url();
$desc = (isset($desc)) ? $desc : "Aplikasi toko online ".$nama;
$tema = (isset($set->tema)) ? $set->tema: 0;
$tema = $this->func->tema($tema);
foreach($keyw->result() as $key){ $keywords .= ",".$key->nama; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$nama?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="<?=base_url(backend()."/assets/img/".$set->favicon)?>"/>
	<meta name="google-site-verification" content="G35UyHn6lX6mRzyFws0NJYYxHQp_aejuAFbagRKCL7c" />
	<meta name="description" content="<?=$desc?>" />
	<!--  Social tags      -->
	<meta name="keywords" content="Aplikasi toko online <?=$nama?>">
	<meta name="description" content="<?=$desc?>">
	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="<?=$nama?>">
	<meta itemprop="description" content="<?=$desc?>">
	<meta itemprop="image" content="<?=$img?>">
	<!-- Twitter Card data -->
	<meta name="twitter:card" content="product">
	<meta name="twitter:site" content="@masbil_al">
	<meta name="twitter:title" content="<?=$nama?>">
	<meta name="twitter:description" content="<?=$desc?>">
	<meta name="twitter:creator" content="@masbil_al">
	<meta name="twitter:image" content="<?=$img?>">
	<!-- Open Graph data -->
	<meta property="fb:app_id" content="<?=$set->fb_pixel?>">
	<meta property="og:title" content="<?=$nama?>" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="<?=$url?>" />
	<meta property="og:image" content="<?=$img?>" />
	<meta property="og:description" content="<?=$desc?>" />
	<meta property="og:site_name" content="<?=$nama?>" />

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/aos.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/select2/select2.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/select2/select2-bootstrap4.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/slick/slick.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/slick/slick-theme.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/swal/sweetalert2.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/util.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/main.css?v='.time()) ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive.css?v='.time()) ?>">
	<!--<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/color-themes.css?v='.time()) ?>">-->

	<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.5.1.min.js') ?>"></script>

	<!-- GENERATED CUSTOM COLOR -->
	<style rel="stylesheet">
		<?php if($set->temawarna == 2){ ?>
			body{
				background-color: #2c3e50;
			}
		<?php } ?>

		.btn-primary{
			background-image: <?=$tema->light?>;
		}
		.badge-primary, .bg-primary, .hov-primary:hover, .btn-primary:hover{
			background-image: <?=$tema->hover?>;
		}
		a.text-primary:hover, .text-hov-primary:hover, .text-primary{
			background: <?=$tema->hover?>;
			background-clip: text;
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}
		a.text-primary{
			background: <?=$tema->light?>;
			background-clip: text;
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}
		.bg-foot,.playstore-section{
			background-color: <?=$tema->foot?>;
		}
		.bg-foot-gradient{
			background-image: <?=$tema->foot_gradient?>;
		}
		.sec-title{
			font-family: poppins-black;
			text-transform: uppercase;
			background: <?=$tema->hover?>;
			background-clip: text;
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}
		.title{
			font-family: poppins-bold;
			text-transform: uppercase;
			background: <?=$tema->hover?>;
			background-clip: text;
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}
		.testimoni-item{
			background-image: <?=$tema->testimoni?>;
		}
	</style>
</head>
<body>

	<!-- Header -->
	<?php if(isset($titel)){ ?>
	<div class="m-b-120"></div>
	<?php }else{ ?>
	<div class="m-b-100"></div>
	<?php } ?>

	<header class="header1">
		<nav class="navbar bg-dark navbar-expand-lg navbar-dark fixed-top">
			<div class="container">
				<a class="navbar-brand" href="<?=site_url()?>">
					<img src="<?= base_url(backend().'/assets/img/'.$set->logo) ?>" height="60" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarToggler">
					<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						<li class="nav-item active">
							<a class="nav-link" href="<?=site_url()?>"><i class="fas fa-home text-primary"></i> Home </a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=site_url("shop")?>"><i class="fas fa-search text-primary"></i> Cari Produk</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=site_url("blog")?>"><i class="fas fa-comment-dots text-primary"></i> Blog</a>
						</li>
						<!--
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-info-circle text-primary"></i> Informasi
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<?php 
									$this->db->where("status",1);
									$page = $this->db->get("page");
									foreach($page->result() as $pg){
										echo '<a class="dropdown-item" href="'.site_url("page/".$pg->slug).'">'.$pg->nama.'</a>';
									}
								?>
							</div>
						</li>
						-->
						<?php if($this->func->cekLogin() == true){ ?>
							<li class="nav-item">
								<a class="nav-link" href="<?=site_url('manage/pesanan')?>"><i class="fas fa-box text-primary"></i> Pesananku</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-user-circle text-primary"></i> Akun
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="<?=site_url("manage")?>">Pengaturan Akun</a>
									<a class="dropdown-item" href="javascript:signoutNow()">Logout</a>
								</div>
							</li>
						<?php } ?>
					</ul>
					<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
						<?php if($this->func->cekLogin() != true){ ?>
							<li class="nav-item">
								<a class="btn btn-primary" href="<?=site_url("home/signin")?>">
									<i class="fas fa-sign-in-alt"></i> Masuk / Daftar
								</a>
							</li>
						<?php }else{ ?>
							<li class="nav-item m-r--20">
								<a class="nav-link" href="<?=site_url('home/keranjang')?>">
									<i class="fas fa-shopping-basket text-primary"></i> <b class="badge badge-danger p-lr-8"><?=$this->func->getKeranjang()?></b>
								</a>
							</li>
							<li class="nav-item p-all-0">
								<a class="nav-link" href="<?=site_url('home/wishlist')?>">
									<i class="fas fa-heart text-primary"></i> <b class="badge badge-danger p-lr-8 wishlistcount"><?=$this->func->getWishlistCount()?></b>
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>