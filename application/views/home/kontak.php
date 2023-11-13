<!-- Page Title
============================================= -->
<section id="page-title">
	<div class="container clearfix">
		<h1><?php echo $title ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $title ?></li>
		</ol>
	</div>
</section>
<!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<!-- Contact Form
			============================================= -->
			<div class="col_half">
				<div class="fancy-title title-dotted-border"><h3>Hubungi Kami</h3></div>
				<div class="form-widget">
					<div class="form-result"></div>
					<form id="pesan" action="<?php echo site_url('home/simpan_pesan'); ?>" method="post" class="quick-contact-form nobottommargin">
						
						<div class="form-process"></div>
						<div class="col_one_third">
							<label for="nama">Nama Lengkap <small>*</small></label>
							<input type="text" id="nama" name="nama" class="sm-form-control required" />
						</div>

						<div class="col_one_third">
							<label for="email">Email <small>*</small></label>
							<input type="email" id="email" name="email" class="required email sm-form-control" />
						</div>

						<div class="col_one_third col_last">
							<label for="hp">Nomor HP</label>
							<input type="text" id="hp" name="hp" class="sm-form-control required" />
						</div>

						<div class="clear"></div>

						<div class="col_full">
							<label for="tentang">Tentang <small>*</small></label>
							<input type="text" id="tentang" name="tentang" class="required sm-form-control" />
						</div>

						
						<div class="clear"></div>

						<div class="col_full">
							<label for="isi_pesan">Isi Pesan <small>*</small></label>
							<textarea class="required sm-form-control" id="isi" name="isi" rows="6" cols="30"></textarea>
						</div>

						<div class="col_full">
							<button type="submit" tabindex="5" class="button button-3d nomargin">Kirim</button>
						</div>

					</form>
				</div>

			</div><!-- Contact Form End -->

			<!-- Google Map
			============================================= -->
			<div class="col_half col_last">

				<section id="google-map" class="gmap" style="height: 410px;"></section>

			</div><!-- Google Map End -->

			<div class="clear"></div>

			<!-- Contact Info
			============================================= -->
			<div class="row clear-bottommargin">

				<div class="col-lg-4 col-md-6 bottommargin clearfix">
					<div class="feature-box fbox-center fbox-bg fbox-plain">
						<div class="fbox-icon">
							<a href="#"><i class="icon-map-marker2"></i></a>
						</div>
						<h3>Alamat<span class="subtitle">Jln. Bung Karno No.3 Komplek KTC. Taliwang, Kabupaten Sumbawa Barat.NTB Kode Pos 84355</span></h3>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 bottommargin clearfix">
					<div class="feature-box fbox-center fbox-bg fbox-plain">
						<div class="fbox-icon">
							<a href="#"><i class="icon-phone3"></i></a>
						</div>
						<h3>Telp<span class="subtitle">081239349090</span></h3>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 bottommargin clearfix">
					<div class="feature-box fbox-center fbox-bg fbox-plain">
						<div class="fbox-icon">
							<a href="#"><i class="icon-email3"></i></a>
						</div>
						<h3>Email<span class="subtitle">drdksb08@gmail.com</span></h3>
					</div>
				</div>

			</div><!-- Contact Info End -->

		</div>

	</div>

</section><!-- #content end -->