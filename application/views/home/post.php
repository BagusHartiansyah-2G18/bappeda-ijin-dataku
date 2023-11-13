<style type="text/css">
	.post-gambar img {
		border-radius: 4px;
		padding: 10px;
		display: block;
		max-width: 100%;
		height: auto;
	}


</style>
<!-- Page Title
============================================= -->
<section id="page-title">
	<div class="container clearfix">
		<h4 class="text-uppercase w-75"><?php echo $title ?></h4>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo 'Post & Page' ?></li>
		</ol>
	</div>
</section>
<!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<!-- Post Content
			============================================= -->
			<div class="postcontent nobottommargin clearfix">
				<div class="single-post nobottommargin">
					<!-- Single Post
					============================================= -->
					<div class="entry clearfix">
						<!-- Entry Title
						============================================= -->
					<?php foreach ($post as $row) : ?>

						
						<!-- .entry-title end -->

						<!-- Entry Meta
						============================================= -->
						<ul class="entry-meta clearfix">
							<li><i class="icon-calendar3"></i> <?php echo $row->tanggal ?></li>
							<li><a href="#"><i class="icon-user"></i> <?php echo $row->username ?></a></li>
							<?php if ($row->kategori) : ?>
								<li><i class="icon-folder-open"></i> <a href="#"><?php echo $row->kategori ?></a></li>
							<?php endif; ?>
						</ul><!-- .entry-meta end -->

						<!-- Entry Content
						============================================= -->
						<div class="entry-content notopmargin post-gambar text-justify">
							<?php echo $row->isi ?>
						</div>
					
					<?php endforeach; ?>

					</div><!-- .entry end -->
				</div>
			</div><!-- .postcontent end -->

			<!-- Sidebar
			============================================= -->
			<div class="sidebar nobottommargin col_last clearfix">
				<div class="sidebar-widgets-wrap">
					<div class="widget clearfix">

						<div class="tabs nobottommargin clearfix" id="sidebar-tabs">
							<ul class="tab-nav clearfix">
								<li><a href="#tabs-1">Berita Terkini</a></li>
							</ul>
							<div class="tab-container">
								<div class="tab-content clearfix" id="tabs-1">
									<div id="popular-post-list-sidebar">

									<?php foreach ($berita as $row) : ?>
										<div class="spost clearfix">
											<div class="entry-image">
												<a href="<?php echo $row->link ?>" class="nobg"><img class="rounded-circle" src="<?php echo $row->gambar ?>" alt="<?php echo $row->judul ?>"></a>
											</div>
											<div class="entry-c">
												<div class="entry-title">
													<h4><a href="<?php echo $row->link ?>"><?php echo $row->judul ?></a></h4>
												</div>
											</div>
										</div>
									<?php endforeach; ?>

									</div>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div><!-- .sidebar end -->
		</div>
	</div>
</section><!-- #content end -->