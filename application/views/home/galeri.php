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

			<!-- Portfolio Filter
			============================================= -->
			<ul class="portfolio-filter clearfix" data-container="#portfolio">
				<li class="activeFilter"><a href="#" data-filter="*">Lihat Semua</a></li>

				<?php foreach ($galeri as $row => $value) : ?>
				<li><a href="#" data-filter=".<?php echo $value['data'] ?>"><?php echo $value['folder'] ?></a></li>
				<?php endforeach; ?>

			</ul>
			<!-- #portfolio-filter end -->

			<div class="portfolio-shuffle" data-container="#portfolio">
				<i class="icon-random"></i>
			</div>

			<div class="clear"></div>

			<!-- Portfolio Items
			============================================= -->
			<div id="portfolio" class="portfolio grid-container clearfix">
				<?php foreach ($galeri as $row => $value) : ?>
					<?php foreach ($value['file'] as $img) : ?>

						<article class="portfolio-item pf-media <?php echo $value['data'] ?>">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img style="object-fit: cover; height: 150px;" src="<?php echo base_url('/uploads/galeri/'.$value['folder'].'/'.$img.'') ?>" alt="Open Imagination">
								</a>
								<div class="portfolio-overlay">
									<a href="<?php echo base_url('/uploads/galeri/'.$value['folder'].'/'.$img.'') ?>" class="center-icon" data-lightbox="image" title="IMage">
										<i class="icon-line-plus"></i>
									</a>
								</div>
							</div>
						</article>

					<?php endforeach; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<!-- #content end -->