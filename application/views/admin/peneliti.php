<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<a href="<?php echo site_url('admin/dewan_riset?form=baru') ?>" class="btn btn-label-success btn-bold btn-sm btn-icon-h" id="tambah_post">Tambah</a>
			<a href="#" class="btn btn-label-primary btn-bold btn-sm btn-icon-h" id="edit_post">Edit</a>
			<button type="button" class="btn btn-label-danger btn-bold btn-sm btn-icon-h" id="hapus_post">Hapus</button>
			<button type="button" class="btn btn-label-primary btn-bold btn-sm btn-icon-h" id="setuju">Setuju ?</button>
			<button type="button" class="btn btn-label-warning btn-bold btn-sm btn-icon-h" id="berkas">Berkas ?</button>
			<button type="button" class="btn btn-label-success btn-bold btn-sm btn-icon-h" id="cetak">Cetak Surat</button>
		</div>
	</div>
</div>
<!-- end:: Content Head -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="kt-portlet kt-portlet--tabs">

		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				<h3 class="kt-portlet__head-title"><i class="flaticon-presentation"></i> <?php echo $title ?></h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-right" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#peneliti_tab" role="tab">
							<i class="flaticon-presentation"></i> Dewan Riset
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#pejabat_tab" role="tab">
							<i class="flaticon-businesswoman"></i> Pejabat
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="kt-portlet__body">
			<div class="tab-content">
				<div class="tab-pane table-responsive active" id="peneliti_tab" role="tabpanel">
					<table class="table table-striped table-bordered table-hover table-checkable" id="peneliti_tbl">
						<thead class="text-center">
							<tr>
								<th>
									<label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
				                        <input type="checkbox" name="checkAll" class="kt-group-checkable">
				                        <span></span>
				                    </label>
								</th>
								<th>Nama Dewan Riset</th>
								<th>Handphone</th>
								<th>Instansi</th>
								<th>Waktu Penelitian</th>
								<th>Status</th>
							</tr>
						</thead>
					</table>
				</div>

				<div class="tab-pane" id="pejabat_tab" role="tabpanel">
					<table class="table table-striped table-bordered table-hover table-checkable" id="pejabat_tbl">
						<thead class="text-center">
							<tr>
								<th>
									<label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
				                        <input type="checkbox" name="checkAll" class="kt-group-checkable">
				                        <span></span>
				                    </label>
								</th>
								<th>Nama Pejabat</th>
								<th>Nip</th>
								<th>Jabatan</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- end:: Content -->

<!-- JS -->
<?php echo $datatable ?>
<?php echo $js ?>
