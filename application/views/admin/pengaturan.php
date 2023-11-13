<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<a href="<?php echo site_url() ?>/admin/pengaturan?menu=baru" class="btn btn-label-warning btn-bold btn-sm btn-icon-h" id="tambah">Tambah</a>
			<a href="#" class="btn btn-label-primary btn-bold btn-sm btn-icon-h" id="edit">Edit</a>
			<a href="#" class="btn btn-label-danger btn-bold btn-sm btn-icon-h" id="hapus">Hapus</a>
		</div>
	</div>
</div>
<!-- end:: Content Head -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="kt-portlet kt-portlet--tabs">

		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				<h3 class="kt-portlet__head-title"><i class="flaticon2-gear"></i> <?php echo $title ?></h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-right" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#menu_tab" role="tab">
							<i class="flaticon-web"></i> Menu
						</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#slide_tab" role="tab">
							<i class="flaticon-photo-camera"></i> Slide
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#pengguna_tab" role="tab">
							<i class="flaticon-users"></i> Pengguna
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="kt-portlet__body">
			<div class="tab-content">
				
				<div class="tab-pane table-responsive active" id="menu_tab" role="tabpanel">
					<table class="table table-striped- table-bordered table-hover table-checkable" id="menu_tbl">
						<thead class="text-center">
							<tr>
								<th style="max-width: 5%">
									<label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
				                        <input type="checkbox" name="checkAll" class="kt-group-checkable">
				                        <span></span>
				                    </label>
								</th>
								<th>Nama Menu</th>
								<th>Parent Menu</th>
								<th>No. Urut</th>
								<th>Link Menu</th>
								<th>Tipe</th>
							</tr>
						</thead>
					</table>
				</div>

				<div class="tab-pane" id="slide_tab" role="tabpanel">
					<table class="table table-striped- table-bordered table-hover table-checkable" id="slide_tbl">
						<thead class="text-center">
							<tr>
								<th style="max-width: 5%">
									<label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
				                        <input type="checkbox" name="checkAll" class="kt-group-checkable">
				                        <span></span>
				                    </label>
								</th>
								<th>Gambar</th>
								<th>Judul</th>
								<th>Link</th>
							</tr>
						</thead>
					</table>
				</div>

				<div class="tab-pane" id="pengguna_tab" role="tabpanel">
					<table class="table table-striped- table-bordered table-hover table-checkable" id="pengguna_tbl">
						<thead class="text-center">
							<tr>
								<th>
									<label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
				                        <input type="checkbox" name="checkAll" class="kt-group-checkable">
				                        <span></span>
				                    </label>
								</th>
								<th>username</th>
								<th>Nama</th>
								<th>Email</th>
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