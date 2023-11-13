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
	<div class="content-wrap mb-0 pb-0">			
		<div class="container clearfix">
			<?php
				// print_r($form."Bagus H");
				if($form){
					echo '
					<div class="card-header bg-primary">
						<h5 class="modal-title text-light" style="width: 100%;">
							<div class="row">
								<div class="col-auto">
									<i class="mdi mdi-note-plus"></i>
								</div>
								<div class="col-10">
									TAMBAH DOKUMEN
								</div>
							</div>
						</h5>
					</div>
					<hr>
					<form action="submit" method="post" enctype="multipart/form-data">
					
						<div class="row" style="margin-left:5px;margin-bottom:10px;">
							<div class="col m-auto">
								<label style="color:black;">Kategori</label>
							</div>
							<div class="col m-auto">
								
							<input type="text" class="form-control" name="kategori" placeholder="Kategori">
						
							</div>
						</div>
						<div class="row" style="margin-left:5px;margin-bottom:10px;">
							<div class="col m-auto">
								<label style="color:black;">Keterangan</label>
							</div>
							<div class="col m-auto">
								<textarea class="form-control" name="keterangan" placeholder="Keterangan" rows="3"></textarea>
							</div>
						</div>
						<div class="row" style="margin-left:5px;margin-bottom:10px;">
							<div class="col m-auto">
								<label style="color:black;">File</label>
							</div>
							<div class="col m-auto">
								<input type="file" name="fileToUpload" id="fileToUpload">
							</div>
						</div>
						<div class="row" style="margin-left:5px;margin-bottom:10px;">
							<div class="col m-auto">
								<label style="color:black;"></label>
							</div>
							<div class="col m-auto">
								<input type="submit" class="btn btn-sm btn-primary btn-block" value="Tambah Dokumen">
								</input>
							</div>
						</div>
					</form>
					<hr>
					';
				}
			?>
			<div class="col_full bottommargin-lg clearfix">
				<div id="posts" class="post-grid grid-container clearfix" data-layout="fitRows">
					
					<div class="table-responsive">
						<table class="table table-striped- table-bordered table-hover table-checkable">
							<thead class="text-center">
								<tr>
									<th width="7%">No</th>
									<th>Kategori</th>
									<th>Keterangan</th>
									<th width="15%">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=0; foreach ($download as $row) : $no++; ?>
								<tr>
									<td class="align-middle text-center"><?php echo $no ?></td>
									<td class="align-middle"><?php echo $row->kategori ?></td>
									<td class="align-middle"><?php echo $row->keterangan ?></td>
									<td>
										<div class="row" style="margin-left:5px;margin-bottom:10px;">
											<div class="col m-auto">
												<a href="<?php echo $row->file ?>" class="button button-3d button-mini button-rounded btn-success" target="blank"><i class="icon-off"></i>Download</a>
											</div>
											<?php
												if($form){ ?>
													<div class="col m-auto">
														<a href="<?php echo $row->url ?>" class="button button-3d button-mini button-rounded btn-danger">Hapus</a>
													</div>
												<?php
												}
												?>
										</div>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
