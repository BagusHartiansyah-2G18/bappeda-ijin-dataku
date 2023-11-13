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
</section><!-- #page-title end -->

<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<!-- Contact Form
			============================================= -->
			<div class="form-widget">
				<div class="form-result"></div>
				<form class="nobottommargin" id="penelitian" action="<?php echo site_url("home/kirim_peneliti"); ?>" method="post">
					<div class="form-process"></div>

					<!-- KOLOM --->
					

					<div class="col_half">
<div class="fancy-title title-dotted-border title-center"><h3>PENGANTAR</h3></div>
						<div class="col_full">
							<label for="pengantar">Pengantar</label>
							<textarea class="required sm-form-control" id="pengantar" name="pengantar" rows="4" cols="30"></textarea>
						</div>

<div class="fancy-title title-dotted-border title-center"><h3>IDENTITAS</h3></div>
						<div class="col_full">
							<label for="nama">Nama Lengkap</label>
							<input type="text" id="nama" name="nama" class="sm-form-control required" />
						</div>
						<div class="col_half">
							<label for="hp">NIM / NPM</label>
							<input type="text" id="nim_npm" name="nim_npm" value="" class="sm-form-control required" />
						</div>
						<div class="col_half col_last">
							<label for="hp">Pendidikan</label>
							<div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
							<label class="btn btn-outline-dark font-body ls0 nott active">
									<input type="radio" class="required form-control" name="pendidikan" id="dIII" value="D III" checked>D3
								</label>
								<label class="btn btn-outline-dark font-body ls0 nott">
									<input type="radio" class="required form-control" name="pendidikan" id="s1" value="S1">S1
								</label>
								<label class="btn btn-outline-dark font-body ls0 nott">
									<input type="radio" class="required form-control" name="pendidikan" id="s2" value="S2">S2
								</label>
								<label class="btn btn-outline-dark font-body ls0 nott">
									<input type="radio" class="required form-control" name="pendidikan" id="s3" value="S3">S3
								</label>
							</div>
						</div>

						<div class="col_half">
							<label for="hp">Nomor Handphone</label>
							<input type="number" id="hp" name="hp" class="required sm-form-control" />
						</div>

						<div class="col_half col_last">
							<label for="email">Email</label>
							<input type="email" id="email" name="email" value="" class="required email sm-form-control" />
						</div>

						<div class="col_half">
							<label for="kartu">Indentitas</label>
							<div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
								<label class="btn btn-outline-dark font-body ls0 nott active">
									<input type="radio" class="required form-control" name="kartu" id="ktp" value="1" checked>KTP
								</label>
								<label class="btn btn-outline-dark font-body ls0 nott">
									<input type="radio" class="required form-control" name="kartu" id="sim" value="2">SIM
								</label>
								<label class="btn btn-outline-dark font-body ls0 nott">
									<input type="radio" class="required form-control" name="kartu" id="k-lainnya" value="3">Lainnya
								</label>
							</div>
						</div>

						<div class="col_half col_last">
							<label for="no_identitas">Nomor Identitas</label>
							<input type="number" id="no_identitas" name="no_identitas" value="" class="required sm-form-control" />
						</div>

						<div class="clear"></div>

<div class="fancy-title title-dotted-border title-center"><h3>INSTANSI</h3></div>
						<div class="col_full">
							<label for="jenis_instansi">Instansi</label>
							<div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
								<label id="l_unv" class="btn btn-outline-dark font-body ls0 nott active">
									<input type="radio" class="required form-control" name="jenis_instansi" id="universitas" value="1" checked>Universitas
								</label>
								<label id="l_lain" class="btn btn-outline-dark font-body ls0 nott">
									<input type="radio" class="required form-control" name="jenis_instansi" id="lainnya" value="2">Lainnya
								</label>
							</div>
						</div>
						<div class="col_full">
							<label id="l_instansi">Nama Universitas</label>
							<input type="text" class="required sm-form-control" id="instansi" name="instansi">
						</div>

						<div id="unv">
							<div class="col_full">
								<label>Fakultas</label>
								<input type="text" class="sm-form-control" id="fakultas" name="fakultas">
							</div>

							<div class="col_full">
								<label>Program Studi</label>
								<input type="text" class="sm-form-control" id="prodi" name="prodi">
							</div>
						</div>

						<div class="col_full">
							<label>Kabupaten / Kota</label>
							<input type="text" class="sm-form-control required" id="kab_instansi" name="kab_instansi">
						</div>

						<div class="clear"></div>
					</div>

					<div class="col_half col_last">

<div class="fancy-title title-dotted-border title-center"><h3>PENELITIAN</h3></div>
						<div class="col_full">
							<label>Lokasi Penelitian</label>
							<input type="text" class="sm-form-control required" id="lokasi" name="lokasi">
						</div>

						<div class="col_full">
							<label>Judul Penelitian</label>
							<textarea class="sm-form-control required" id="judul" name="judul" rows="4"></textarea>
						</div>

						<div class="col_full">
							<label>Tujuan Penelitian</label>
							<textarea class="sm-form-control required" id="tujuan" name="tujuan" rows="4"></textarea>
						</div>

						<div class="col_full">
							<label>Tanggal Penelitian</label>
							<div class="input-daterange input-group">
								<input type="text" class="form-control tleft required" name="start" id="mulai" placeholder="Tanggal Mulai">
								<div class="input-group-prepend"><div class="input-group-text">to</div></div>
								<input type="text" class="form-control tleft required" name="end" id="sampai" placeholder="Tanggal Selesai">
							</div>
						</div>

						<div class="clear"></div>

<div class="fancy-title title-dotted-border title-center"><h3>UPLOAD BERKAS</h3></div>
						<div class="col_full">
							<label>Upload Photo</label>
							<input id="photo" name="photo" type="file" accept="image/*" class="file-loading gbr" data-show-preview="false">
						</div>

						<div class="col_full">
							<label>Upload Kartu Identitas</label>
							<input id="ktp" name="ktp" type="file" accept="image/*" class="file-loading gbr" data-show-preview="false">
						</div>

						<div class="col_full">
							<label>Upload Surat Pengantar (PDF max 2mb)</label>
							<input id="surat" name="surat" type="file" accept="pdf/*" class="file-loading pdf" data-show-preview="false">
						</div>

						<div class="col_full">
							<label>Upload Proposal Penelitian (PDF max 2mb)</label>
							<input id="proposal" name="proposal" type="file" accept="pdf/*" class="file-loading pdf" data-show-preview="false">
						</div>

						<div class="col_full">
							<button type="submit" class="button button-3d nomargin">Kirim</button>
						</div>

					</div>
				</form>
			</div>
			<!-- Contact Form End -->
		</div>
	</div>
</section>

<script src="<?php echo base_url()?>/assets/home/js/jquery.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		instansi();
	});

	var instansi = function(){
		$('#l_unv').on('click', function(){
			$('#l_instansi').html('Nama Universitas');
            $('#unv').removeClass('d-none');
            $('#lainnya').attr('checked', false);
            $('#universitas').attr('checked', true);
		});

		$('#l_lain').on('click', function(){
			$('#l_instansi').html('Nama Instansi');
            $('#unv').addClass('d-none');
            $('#lainnya').attr('checked', true);
            $('#universitas').attr('checked', false);
		});
    }
</script>
