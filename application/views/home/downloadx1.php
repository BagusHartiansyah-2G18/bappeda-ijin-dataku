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
			<div class="col_full bottommargin-lg clearfix">
				<div id="posts" class="post-grid grid-container clearfix" data-layout="fitRows">
					<div class="table-responsive">
						<table class="table table-striped- table-bordered table-hover table-checkable">
							<thead class="text-center">
								<tr>
									<th width="7%">No</th>
									<th>Nama File</th>
									<th width="10%">Ukuran</th>
									<th width="15%">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=0; foreach ($download as $row) : $no++; ?>
								<tr>
									<td class="align-middle text-center"><?php echo $no ?></td>
									<td class="align-middle"><?php echo $row['nama'] ?></td>
									<td class="align-middle"><?php echo $row['ukuran'] ?></td>
									<td><a href="<?php echo $row['file'] ?>" class="button button-3d button-mini button-rounded button-red" target="blank"><i class="icon-off"></i>Download</a></td>
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
