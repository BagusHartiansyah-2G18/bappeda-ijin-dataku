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
			<div class="col_full bottommargin-sm clearfix">
				<div id="posts" class="post-grid grid-container clearfix" data-layout="fitRows">

				<?php foreach ($post['arr'] as $row) : ?>

					<div class="entry clearfix">
						<div class="entry-image">
							<a href="<?php echo $row->link ?>" data-lightbox="image">
								<img style="object-fit: cover; height: 150px;"  class="image_fade" src="<?php echo $row->gambar ?>" alt="<?php echo $row->judul ?>"></a>
						</div>
						<div class="entry-title">
							<h2><a href="<?php echo $row->link ?>"><?php echo substr($row->judul,0,50).'...' ?></a></h2>
						</div>
						<ul class="entry-meta clearfix">
							<li><i class="icon-calendar3"></i> <?php echo $row->tanggal ?></li>
						</ul>
						<div class="entry-content">
							<?php echo substr(strip_tags($row->isi),0,150).'...' ?>
							<a href="<?php echo $row->link ?>"class="more-link">Selengkapnya</a>
						</div>
					</div>

				<?php endforeach; ?>

				</div>

				<?php echo $pagination ?>

			</div>
		</div>
	</div>
</section>
