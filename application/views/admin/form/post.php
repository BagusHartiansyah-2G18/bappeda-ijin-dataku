<?php
	$get = $this->input->get();
	if (count($get) > 0) {
		if (isset($get['post'])) {
			$tipe = 'post';
			$hash = '#post_tab';
		}
		else{
			$tipe = 'page';
			$hash = '#page_tab';
		}
	}
?>

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<a href="<?php echo site_url('admin/post'.$hash.'') ?>" class="btn btn-label-danger btn-bold btn-sm btn-icon-h"><i class="flaticon-reply"></i> Kembali</a>
		</div>
	</div>
</div>
<!-- end:: Content Head -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="kt-portlet">
		<div class="kt-portlet__body kt-portlet__body--fit">
			<div class="kt-grid kt-wizard-v3 kt-wizard-v3--white" id="kt_wizard_v3" data-ktwizard-state="step-first">
				<div class="kt-grid__item">

					<!--begin: Form Wizard Nav -->
					<div class="kt-wizard-v3__nav">
						<div class="kt-wizard-v3__nav-items">

							<!--doc: Replace A tag with SPAN tag to disable the step link click -->
							<div class="kt-wizard-v3__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
								<div class="kt-wizard-v3__nav-body">
									<div class="kt-wizard-v3__nav-label">
										<span>1</span> Judul
									</div>
									<div class="kt-wizard-v3__nav-bar"></div>
								</div>
							</div>
							<div class="kt-wizard-v3__nav-item" data-ktwizard-type="step">
								<div class="kt-wizard-v3__nav-body">
									<div class="kt-wizard-v3__nav-label">
										<span>2</span> Isi
									</div>
									<div class="kt-wizard-v3__nav-bar"></div>
								</div>
							</div>
						</div>
					</div>

					<!--end: Form Wizard Nav -->
				</div>
				<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v3__wrapper">

					<!--begin: Form Wizard Form-->
					<form class="kt-form" id="kt_form" action="<?php echo site_url("simpan/post"); ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo isset($id)?$id:""?>">
						<input type="hidden" name="tipe" value="<?php echo $tipe ?>">
						<!--begin: Form Wizard Step 1-->
						<div class="kt-wizard-v3__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
							<div class="kt-form__section kt-form__section--first">
								<div class="kt-wizard-v3__form">
									<div class="form-group">
										<label>Judul</label>
										<input type="text" class="form-control" placeholder="Masukan Judul" id="judul" name="judul" value="<?php echo isset($judul)?$judul:""?>">
									</div>

									<div class="form-group" id="kategori">
										<label>Kategori</label>
										<?php 
				                            $id_kategori = isset($id_kategori)?$id_kategori:"";
				                            $arr_kat = isset($arr_kat) ? $arr_kat : "";
				                            echo form_dropdown("id_kategori",$arr_kat,$id_kategori,'id="id_kategori" class="form-control"');
				                        ?>
									</div>

								</div>
							</div>
						</div>


						<!--end: Form Wizard Step 1-->

						<!--begin: Form Wizard Step 2-->
						<div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
							<div class="kt-form__section kt-form__section--first">
								<div class="kt-wizard-v3__form">
									<div class="form-group">
										<textarea class="form-control" id="isi" name="isi" rows="8"><?php echo isset($isi)?$isi:""?></textarea>
									</div>
								</div>
							</div>
						</div>

						<!--end: Form Wizard Step 2-->

						<!--begin: Form Actions -->
						<div class="kt-form__actions">
							<button class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
								Sebelumnya
							</button>
							<button class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit">
								Simpan
							</button>
							<button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
								Selanjutnya
							</button>
						</div>

						<!--end: Form Actions -->
					</form>

					<!--end: Form Wizard Form-->
				</div>
			</div>
		</div>
	</div>
</div>

<!-- end:: Content -->
<?php echo $plugin ?>
<?php echo $js ?>

<script type="text/javascript">
	var tipe = '<?php echo $tipe ?>';
</script>