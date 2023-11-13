<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i"
		rel="stylesheet" type="text/css" />

	<meta property="og:title" content="<?php echo $title ?>" />
	<meta property="og:description" content="<?php echo $title ?> | Bappeda Litbang KSB" />
	<meta property="og:url" content="<?php echo current_url() ?>" />

	<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/admin/media/logos/favicon.ico" />

	<!-- Javascript
	============================================= -->
	<?php echo $css ?>
	
	<!-- Javascript
	============================================= -->
	
	<!-- Document Title
	============================================= -->
	<title><?php echo $title ?> | Bappeda Litbang KSB</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="transparent-header semi-transparent full-header">
			<div id="header-wrap">
				<div class="container clearfix">
					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="<?php echo site_url() ?>" class="standard-logo" data-dark-logo="<?php echo base_url() ?>/uploads/logo.png">
							<img src="<?php echo base_url() ?>/uploads/logo.png" alt="Bappeda KSB">
						</a>
						
					</div>
					<!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu" class="dark">
						<ul>
							<li><a href="<?php echo site_url() ?>">BERANDA</a></li>

							<?php foreach ($menu['main'] as $row) : ?>
								<li><a href="<?php echo $row->link ?>"><?php echo $row->menu ?></a>
									<?php if ($row->sub == 1) : ?>
										<ul>
											<?php foreach ($menu['sub'] as $s) : ?>
												<?php if ($row->id_menu == $s->id_parent) : ?>
													<li><a href="<?php echo $s->link ?>"><?php echo $s->menu ?></a></li>
												<?php endif; ?>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>
								</li>
							<?php endforeach; ?>
						</ul>

						
						<!-- Top Search
						============================================= -->
						<div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="" method="get">
								<input type="text" name="q" class="form-control" value="" placeholder="Masukan pencarian &amp; Tekan Enter..">
							</form>
						</div><!-- #top-search end -->

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->

		<!-- Content -->
		
				<?php echo $content ?>

		<!-- #content end -->

	

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">
			<div class="container">
				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix">
					<div class="col_half">
						<div class="widget clearfix">
							<img src="<?php echo base_url() ?>/uploads/ksb.png" alt="" class="footer-logo">
							<p>Bappeda Litbang Kabupaten Sumbawa Barat <br> IJS (Ikhlas, Jujur & Sungguh-sungguh)</p> 
							<div class="clearfix" style="padding: 10px 0; background: url('<?php echo base_url() ?>/assets/home/images/world-map.png') no-repeat center center;">
								<div class="col_half">
									<address class="nobottommargin">
										<abbr title="Headquarters" style="display: inline-block;margin-bottom: 7px;"><strong>Alamat:</strong></abbr><br>
										Jln. Bung Karno No.3 Komplek KTC. Taliwang, Kabupaten Sumbawa Barat. <br>
										NTB Kode Pos 84355
									</address>
								</div>
								<div class="col_half col_last"> <br>
									<abbr title="Phone Number"><strong>Telp:</strong></abbr> 081239349090<br>
									<abbr title="Email Address"><strong>Email:</strong></abbr> drdksb08@gmail.com
								</div>
							</div>

						</div>

					</div>

					<div class="col_one_fourth">

						<div class="widget clearfix">
							<h4>Postingan Terbaru</h4>
							<div id="post-list-footer">

								<?php foreach ($baru as $row) : ?>
								<div class="spost clearfix">
									<div class="entry-image d-md-none d-lg-block">
										<a href="<?php echo $row->link ?>"><img class="rounded-circle" src="<?php echo $row->gambar ?>" alt="<?php echo $row->judul ?>"></a>
									</div>
									<div class="entry-c">
										<div class="entry-title">
											<h4><a href="<?php echo $row->link ?>"><?php echo substr($row->judul,0,35).'...' ?></a></h4>
										</div>
										<ul class="entry-meta">
											<li><?php echo $row->tanggal ?></li>
										</ul>
									</div>
								</div>
								<?php endforeach; ?>
								
							</div>

						</div>

					</div>

					<div class="col_one_fourth col_last">

						<div class="widget quick-contact-widget form-widget clearfix">

							<h4>Kirim Pesan</h4>

							<div class="form-result"></div>

							<form id="pesan" action="<?php echo site_url('home/simpan_pesan'); ?>" method="post" class="quick-contact-form nobottommargin">

								<div class="form-process"></div>

								<div class="input-group divcenter">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="icon-user"></i></div>
									</div>
									<input type="text" class="required form-control" id="nama" name="nama"placeholder="Nama Lengkap" />
								</div>
								<div class="input-group divcenter">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="icon-email2"></i></div>
									</div>
									<input type="text" class="required form-control email" id="email" name="email" placeholder="Email" />
								</div>
								<textarea class="required form-control input-block-level short-textarea" id="isi" name="isi" rows="4" cols="30" placeholder="Pesan"></textarea>
								<button type="submit" class="btn btn-danger nomargin">Kirim</button>

							</form>

						</div>

					</div>

				</div><!-- .footer-widgets-wrap end -->

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">
				<div class="container clearfix">
					<div class="col_full nobottommargin center">
						Copyrights &copy; 2019 Dibuat dan dikelola Bappeda Litbang Sumbawa Barat. Hak cipta dilindungi.
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<?php echo $js ?>


	<?php 
		if ($this->uri->segment(2) == 'kontak') {
			echo $this->load->view('home/googlemap', array(), true);
		}
	?>

	<script type="text/javascript">
		$(document).ready(function(){
	       $('.table').DataTable();
	    });

	    $('.input-daterange').datepicker({
	        todayHighlight: true,
	        format: 'yyyy-mm-dd',
	    });

	    $(".gbr").fileinput({
			showUpload: false,
			required : true,
			// previewFileType: "image",
			allowedFileExtensions: ["jpg","png"],
			browseClass: "btn btn-success",
			browseLabel: "",
			browseIcon: "<i class=\"icon-picture\"></i> ",
			removeClass: "btn btn-danger",
			removeLabel: "",
			removeIcon: "<i class=\"icon-trash\"></i> ",
		});

		$(".pdf").fileinput({
			showUpload: false,
			maxFileSize : 2024,
			required : true,
			allowedFileExtensions: ["pdf"],
			browseClass: "btn btn-success",
			browseLabel: "",
			browseIcon: "<i class=\"icon-folder-open\"></i> ",
			removeClass: "btn btn-danger",
			removeLabel: "",
			removeIcon: "<i class=\"icon-trash\"></i> ",
		});

	</script>

</body>
</html>