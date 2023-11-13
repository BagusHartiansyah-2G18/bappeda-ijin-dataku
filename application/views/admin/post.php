<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<a href="<?php echo site_url() ?>/admin/post?post=baru" class="btn btn-label-warning btn-bold btn-sm btn-icon-h" id="tambah">Tambah</a>
			<a href="#" class="btn btn-label-primary btn-bold btn-sm btn-icon-h" id="edit">Edit</a>
			<a href="#" class="btn btn-label-danger btn-bold btn-sm btn-icon-h" id="hapus">Hapus</a>
			<div class="kt-input-icon kt-input-icon--right kt-subheader__search">
				<input type="text" class="form-control cari" placeholder="cari..." id="cari_post">
				<span class="kt-input-icon__icon kt-input-icon__icon--right">
					<span><i class="flaticon2-search-1"></i></span>
				</span>
			</div>
		</div>
	</div>
</div>
<!-- end:: Content Head -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="kt-portlet kt-portlet--tabs">

		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				<h3 class="kt-portlet__head-title"><i class="flaticon-edit-1"></i> <?php echo $title ?></h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-right" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#post_tab" role="tab">
							<i class="flaticon2-rectangular"></i> Post
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#page_tab" role="tab">
							<i class="flaticon2-list-2"></i> Page 
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#kat_tab" role="tab">
							<i class="flaticon2-folder"></i> Kategori
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="kt-portlet__body">
			<div class="tab-content">
				<div class="tab-pane table-responsive active" id="post_tab" role="tabpanel">
					<table class="table table-striped table-bordered table-hover table-checkable" id="post_tbl">
						<thead class="text-center">
							<tr>
								<th>
									<label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
				                        <input type="checkbox" name="checkAll" class="kt-group-checkable">
				                        <span></span>
				                    </label>
								</th>
								<th>Judul Post</th>
								<th>Kategori</th>
								<th>User</th>
								<th>Tgl Publish</th>
								<th>Aksi</th>
							</tr>
						</thead>
					</table>
				</div>

				<div class="tab-pane" id="page_tab" role="tabpanel">
					<table class="table table-striped table-bordered table-hover table-checkable" id="page_tbl">
						<thead class="text-center">
							<tr>
								<th>
									<label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
				                        <input type="checkbox" name="checkAll" class="kt-group-checkable">
				                        <span></span>
				                    </label>
								</th>
								<th>Judul Page</th>
								<th>User</th>
								<th>Tgl Publish</th>
								<th>Aksi</th>
							</tr>
						</thead>
					</table>
				</div>

				<div class="tab-pane" id="kat_tab" role="tabpanel">
					<table class="table table-striped table-bordered table-hover table-checkable" id="kat_tbl">
						<thead class="text-center">
							<tr>
								<th>
									<label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
				                        <input type="checkbox" name="checkAll" class="kt-group-checkable">
				                        <span></span>
				                    </label>
								</th>
								<th>Kategori</th>
								<th>Jumlah Post</th>
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