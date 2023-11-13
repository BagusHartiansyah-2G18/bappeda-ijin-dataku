<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<a href="<?php echo site_url('admin/dewan_riset') ?>" class="btn btn-label-danger btn-bold btn-sm btn-icon-h"><i class="flaticon-reply"></i> Kembali</a>
		</div>
	</div>
</div>
<!-- end:: Content Head -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="kt-portlet">
		<div class="kt-portlet__body kt-portlet__body--fit">
			<div class="kt-grid  kt-wizard-v2 kt-wizard-v2--white" id="kt_wizard_v2" data-ktwizard-state="step-first">
				<div class="kt-grid__item kt-wizard-v2__aside">

					<!--begin: Form Wizard Nav -->
					<div class="kt-wizard-v2__nav">
						<div class="kt-wizard-v2__nav-items">

							<!--doc: Replace A tag with SPAN tag to disable the step link click -->
							<div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
								<div class="kt-wizard-v2__nav-body">
									<div class="kt-wizard-v2__nav-icon">
										<i class="flaticon-globe"></i>
									</div>
									<div class="kt-wizard-v2__nav-label">
										<div class="kt-wizard-v2__nav-label-title">
											Dasar / Pengantar
										</div>
									</div>
								</div>
							</div>

							<div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
								<div class="kt-wizard-v2__nav-body">
									<div class="kt-wizard-v2__nav-icon">
										<i class="flaticon-bus-stop"></i>
									</div>
									<div class="kt-wizard-v2__nav-label">
										<div class="kt-wizard-v2__nav-label-title">
											Identitas
										</div>
									</div>
								</div>
							</div>
							<div class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step">
								<div class="kt-wizard-v2__nav-body">
									<div class="kt-wizard-v2__nav-icon">
										<i class="flaticon-responsive"></i>
									</div>
									<div class="kt-wizard-v2__nav-label">
										<div class="kt-wizard-v2__nav-label-title">
											Instansi
										</div>
									</div>
								</div>
							</div>
							<div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
								<div class="kt-wizard-v2__nav-body">
									<div class="kt-wizard-v2__nav-icon">
										<i class="flaticon-trophy"></i>
									</div>
									<div class="kt-wizard-v2__nav-label">
										<div class="kt-wizard-v2__nav-label-title">
											Penelitian
										</div>
									</div>
								</div>
							</div>
							<div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
								<div class="kt-wizard-v2__nav-body">
									<div class="kt-wizard-v2__nav-icon">
										<i class="flaticon-truck"></i>
									</div>
									<div class="kt-wizard-v2__nav-label">
										<div class="kt-wizard-v2__nav-label-title">
											Upload Berkas
										</div>
									</div>
								</div>
							</div>
							<div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
								<div class="kt-wizard-v2__nav-body">
									<div class="kt-wizard-v2__nav-icon">
										<i class="flaticon-like"></i>
									</div>
									<div class="kt-wizard-v2__nav-label">
										<div class="kt-wizard-v2__nav-label-title">
											Pengesahan
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!--end: Form Wizard Nav -->
				</div>

				<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v2__wrapper">
					<!--begin: Form Wizard Form-->
					<form class="kt-form" id="kt_form" action="<?php echo site_url("simpan/dewan_riset"); ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo isset($id_peneliti)?$id_peneliti:""?>">
						<!--begin: Form Wizard Step 1-->
						<div class="kt-wizard-v2__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
							<div class="kt-form__section kt-form__section--first">
								<div class="kt-wizard-v2__form">
									<div class="form-group">
										<label>Dasar / Pengantar</label>
										<textarea class="form-control" id="pengantar" name="pengantar" rows="8"><?php echo isset($pengantar)?$pengantar:""?></textarea>
										<span class="form-text text-muted">
											Diisi dengan surat pengantar dari pihak pemohon, seperti contoh berikut : <br><i>
											Surat Dekan Fakultas Ilmu Sosial dan Ilmu Politik Universitas Sumbawa Nomor : 255.72/FISIF/UNSA-SBW/B.02.01/2018 Tanggal 24 Juli Prihal Permohonan Ijin Penelitian</i>
										</span>
									</div>
								</div>
							</div>
						</div>
						<!--end: Form Wizard Step 1-->

						<!--begin: Form Wizard Step 2-->
						<div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
							<div class="kt-form__section kt-form__section--first">
								<div class="kt-wizard-v2__form">
									<div class="form-group text-center">
										<?php 
											if (isset($photo)){
												$link = base_url('uploads/peneliti/'.$photo.'');
											}
											else{
												$link = base_url('uploads/peneliti/default.jpg');
											}
										?>
										<div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
											<div class="kt-avatar__holder" style="background-image: url(<?php echo $link ?>)"></div>
											<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Ganti Photo">
												<i class="fa fa-pen"></i>
												<input type="file" name="photo" id="photo">
											</label>
											<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Hapus">
												<i class="fa fa-times"></i>
											</span>
										</div>
										<span class="form-text text-muted">Allowed file types: png, jpg</span>
									</div>

									<div class="form-group">
										<label>Nama Lengkap</label>
										<input type="text" class="form-control" placeholder="Nama Lengkap" id="nama" name="nama" value="<?php echo isset($nama)?$nama:""?>">
									</div>
									<div class="row">
										<div class="col-9">
											<div class="form-group">
												<label>NIM / NPM</label>
												<input type="text" class="form-control" placeholder="NIM / NPM" id="nim_npm" name="nim_npm" value="<?php echo isset($nim_npm)?$nim_npm:""?>">
											</div>
										</div>
										<div class="col-3">
											<div class="form-group">
											<label>Pendidikan</label>
					                        <?php 
					                            $pendidikan = isset($pendidikan)?$pendidikan:"";
					                            $arr_pen = array("D III"=>"D III","S1"=>"S1","S2"=>"S2","S3"=>"S3");
					                            echo form_dropdown("pendidikan",$arr_pen,$pendidikan,'id="pendidikan" class="form-control"');
					                        ?>
						                    </div>
										</div>
									</div>
									<div class="form-group">
										<label>Nomor Handphone</label>
										<input type="number" class="form-control" placeholder="Nomor Handphone" id="hp" name="hp" value="<?php echo isset($hp)?$hp:""?>">
									</div>

									<div class="form-group">
										<label>Email</label>
										<input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" id="email" name="email" value="<?php echo isset($email)?$email:""?>">
									</div>

									<div class="form-group">
										<label>Identitas</label>
										<div class="row">
											<div class="col-4">
												<?php 
						                            $kartu = isset($kartu)?$kartu:"";
						                            $arr = array(1=>'KTP',2 => 'SIM', 3=>'Lainnya');
						                            echo form_dropdown("kartu",$arr,$kartu,'id="kartu" class="form-control"');
						                        ?>
											</div>
											<div class="col-8">
												<input type="text" class="form-control" placeholder="Nomor Identitas" id="no_identitas" name="no_identitas" value="<?php echo isset($no_identitas)?$no_identitas:""?>">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end: Form Wizard Step 2-->

						<!--begin: Form Wizard Step 3-->
						<div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
							<div class="kt-form__section kt-form__section--first">
								<div class="kt-wizard-v2__form">
									<div class="form-group">
										<label>Instansi</label>
				                        <?php 
				                            $jenis_instansi = isset($jenis_instansi)?$jenis_instansi:"";
				                            $arr = array(1=>'Universitas', 2=>'Lainnya');
				                            echo form_dropdown("jenis_instansi",$arr,$jenis_instansi,'id="jenis_instansi" class="form-control"');
				                        ?>
									</div>
									<div class="form-group">
										<label id="l_instansi"></label>
										<input type="text" class="form-control" id="instansi" name="instansi" value="<?php echo isset($instansi)?$instansi:""?>">
									</div>
									<div id="unv">
										<div class="form-group">
											<label>Fakultas</label>
											<input type="text" class="form-control" placeholder="Nama Fakultas" id="fakultas" name="fakultas" value="<?php echo isset($fakultas)?$fakultas:""?>">
										</div>
										<div class="form-group">
											<label>Program Studi</label>
											<input type="text" class="form-control" placeholder="Nama Program Studi" id="prodi" name="prodi" value="<?php echo isset($prodi)?$prodi:""?>">
										</div>
									</div>
									<div class="form-group">
										<label>Kabupaten / Kota</label>
										<input type="text" class="form-control" placeholder="Nama Kabupaten / Kota" id="kab_instansi" name="kab_instansi" value="<?php echo isset($kab_instansi)?$kab_instansi:""?>">
									</div>
								</div>
							</div>
						</div>
						<!--end: Form Wizard Step 3-->

						<!--begin: Form Wizard Step 4-->
						<div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
							<div class="kt-form__section kt-form__section--first">
								<div class="kt-wizard-v2__form">
									<div class="form-group">
										<label>Lokasi Penelitian</label>
										<input type="text" class="form-control" placeholder="Nama Lokasi Penelitian" id="lokasi" name="lokasi" value="<?php echo isset($lokasi)?$lokasi:""?>">
									</div>
									<div class="form-group">
										<label>Judul Penelitian</label>
										<textarea class="form-control" id="judul" name="judul" rows="4"><?php echo isset($judul)?$judul:""?></textarea>
									</div>
									<div class="form-group">
										<label>Tujuan Penelitian</label>
										<textarea class="form-control" id="tujuan" name="tujuan" rows="2"><?php echo isset($tujuan)?$tujuan:""?></textarea>
									</div>
									<div class="form-group">
										<label>Tanggal Penelitian</label>
										<div class="input-daterange input-group" id="kt_datepicker_5">
											<input type="text" class="form-control" name="start" id="mulai" placeholder="Tanggal Mulai" value="<?php echo isset($mulai)?$mulai:""?>">
											<div class="input-group-append">
												<span class="input-group-text"><i class="flaticon-calendar"></i></span>
											</div>
											<input type="text" class="form-control" name="end" id="sampai" placeholder="Tanggal Selesai" value="<?php echo isset($sampai)?$sampai:""?>">
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end: Form Wizard Step 4-->

						<!--begin: Form Wizard Step 5-->
						<div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
							<div class="kt-form__section kt-form__section--first">
								<div class="kt-wizard-v2__form">
									<div class="form-group">
										<label>Upload Kartu Identitas 
											<?php if (isset($ktp)): ?>
												<a href="<?php echo base_url('uploads/peneliti/'.$ktp.'') ?>" target="blank" class="btn btn-label-danger btn-bold btn-sm btn-icon-h"><i class="flaticon-eye"></i> Lihat File</a>
											<?php endif ?>
										</label>
										<div></div>
										<div class="custom-file">
											<input type="file" class="custom-file-input" name="ktp" id="ktp">
											<label class="custom-file-label" for="ktp">Choose file</label>
										</div>
									</div>
									<div class="form-group">
										<label>Upload Surat Pengantar
											<?php if (isset($surat)): ?>
												<a href="<?php echo base_url('uploads/peneliti/'.$surat.'') ?>" target="blank" class="btn btn-label-danger btn-bold btn-sm btn-icon-h"><i class="flaticon-eye"></i> Lihat File</a>
											<?php endif ?>
										</label>
										<div></div>
										<div class="custom-file">
											<input type="file" class="custom-file-input" name="surat" id="surat">
											<label class="custom-file-label" for="surat">Choose file</label>
										</div>
									</div>
									<div class="form-group">
										<label>Upload Proposal Penelitian
											<?php if (isset($proposal)): ?>
												<a href="<?php echo base_url('uploads/peneliti/'.$proposal.'') ?>" target="blank" class="btn btn-label-danger btn-bold btn-sm btn-icon-h"><i class="flaticon-eye"></i> Lihat File</a>
											<?php endif ?>
										</label>
										<div></div>
										<div class="custom-file">
											<input type="file" class="custom-file-input" name="proposal" id="proposal">
											<label class="custom-file-label" for="proposal">Choose file</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end: Form Wizard Step 5-->

						<!--begin: Form Wizard Step 6-->
						<div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
							<div class="kt-form__section kt-form__section--first">
								<div class="kt-wizard-v2__form">
									<div class="form-group">
										<label>Nomor Surat</label>
										<input type="text" class="form-control" placeholder="Nomor Surat" id="no_surat" name="no_surat" value="<?php echo isset($no_surat)?$no_surat:""?>">
									</div>
									<div class="form-group">
										<label>Tembusan</label>
										<textarea class="form-control" id="tembusan" name="tembusan" rows="5"><?php echo isset($tembusan)?$tembusan:""?></textarea>
									</div>
									<div class="form-group">
										<label>Status</label>
										<div class="row">
											<div class="col-md-6">
												<?php 
						                        	$setuju = isset($setuju)?$setuju:"";
						                            echo form_dropdown("setuju",$arr_setuju,$setuju,'id="setuju" class="form-control"');
						                        ?>
											</div>
											<div class="col-md-6">
												<?php 
						                        	$berkas = isset($berkas)?$berkas:"";
						                            echo form_dropdown("berkas",$arr_berkas,$berkas,'id="berkas" class="form-control"');
						                        ?>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label>Tanggal Pengesahan</label>
												<input type="text" class="form-control" placeholder="Tanggal Pengesahan" id="tgl_ttd" name="tgl_ttd" value="<?php echo isset($tgl_ttd)?$tgl_ttd:""?>">
											</div>
											<div class="col-md-6">
												<label>Ditandatangani Oleh</label>
												<?php 
						                        	$id_pejabat = isset($id_pejabat)?$id_pejabat:"";
						                            echo form_dropdown("id_pejabat",$arr_pejabat,$id_pejabat,'id="id_pejabat" class="form-control"');
						                        ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end: Form Wizard Step 6-->


						<div class="kt-form__actions">
							<button class="btn btn-warning btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev"><i class="flaticon2-fast-back"></i>
								Sebelumnya
							</button>
							<button class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit">
								Simpan <i class="fa fa-save"></i> 
							</button>
							<button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
								Selanjutnya <i class="flaticon2-fast-next"></i> 
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end:: Content -->
<script type="text/javascript">
	var photo = '<?php echo isset($photo)?$photo:""?>';
	var ktp = '<?php echo isset($ktp)?$ktp:""?>';
	var surat = '<?php echo isset($surat)?$surat:""?>';
	var proposal = '<?php echo isset($proposal)?$proposal:""?>';

	$('#ktp').next('.custom-file-label').addClass("selected").html(ktp);
	$('#surat').next('.custom-file-label').addClass("selected").html(surat);
	$('#proposal').next('.custom-file-label').addClass("selected").html(proposal);

</script>
<?php echo $js ?>