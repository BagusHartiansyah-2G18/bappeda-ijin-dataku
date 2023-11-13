<!--- ================ SLIDER =========== ---->
<section id="slider" class="slider-element slider-parallax swiper_wrapper full-screen clearfix" data-autoplay="7000" data-speed="650" data-loop="true">

	<div class="slider-parallax-inner">
		<div class="swiper-container swiper-parent">
			<div class="swiper-wrapper">

				<?php foreach ($slide as $row) : ?>
				<div class="swiper-slide dark" 
					style="background-image: url('<?php echo $row->gambar ?>'); 
					background-position: center top; background-size: 100% 100%;">
				</div>
				<?php endforeach; ?>

			</div>
			<div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
			<div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
		</div>

	</div>

</section>
<!--- ================ AKHIR SLIDER =========== ---->

<section id="content">
	<div class="content-wrap mb-0 pb-0">			
		<div class="container clearfix">
			<div class="fancy-title title-border"><h3>Berita Terkini</h3></div>
			<div class="row bottommargin-sm clearfix">
				<div class="col-lg-8 bottommargin">
					<div class="ipost clearfix">
						<div class="entry-image">
							<a href="<?php echo $berita[0]->link ?>">
								<img style="object-fit: cover; height: 400px;" class="image_fade" src="<?php echo $berita[0]->gambar ?>" alt="<?php echo $berita[0]->judul ?>">
							</a>
						</div>
						<div class="entry-title">
							<h3><a href="<?php echo $berita[0]->link ?>"><?php echo $berita[0]->judul ?></a></h3>
						</div>
						<ul class="entry-meta clearfix">
							<li><i class="icon-calendar3"></i> <?php echo $berita[0]->tanggal ?></li>
						</ul>
						<div class="entry-content">
							<?php echo substr(strip_tags($berita[0]->isi),0,150).'...' ?>
						</div>
					</div>
				</div>

				<div class="col-lg-4 bottommargin">
					<?php foreach ($berita as $row => $value) : ?>
						<?php if ($row <> 0) : ?>

						<div class="spost clearfix">
							<div class="entry-image">
								<a href="<?php echo $value->link ?>"><img src="<?php echo $value->gambar ?>" alt="<?php echo $value->judul ?>"></a>
							</div>
							<div class="entry-c">
								<div class="entry-title">
									<h4><a href="<?php echo $value->link ?>"><?php echo $value->judul ?></a></h4>
								</div>
								<ul class="entry-meta">
									<li><i class="icon-calendar3"></i> <?php echo $value->tanggal ?></li>
								</ul>
							</div>
						</div>

						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

		<div class="section topmargin-sm">
			<div class="container clearfix">
				<div class="heading-block center"><h3>6 Dewan Riset Terbaru</h3></div>
				<ul class="testimonials-grid grid-3 clearfix nobottommargin">

					<?php foreach ($peneliti as $row) : ?>
					<li>
						<div class="testimonial" style="object-fit: cover; height: 150px;">
							<div class="testi-image">
								<img src="<?php echo $row->photo ?>" alt="<?php echo $row->nama ?>">
							</div>
							<div class="testi-content">
								<p><?php echo substr($row->judul,0,150) ?>...</p>
								<div class="testi-meta">
									<?php echo $row->nama ?>
									<span><?php echo $row->instansi ?></span>
								</div>
							</div>
						</div>
					</li>
					<?php endforeach; ?>
			
				</ul>
			</div>
		</div>


		<div class="container clearfix">
			<div class="col_full bottommargin-sm clearfix">
				<div class="fancy-title title-border"><h3>Pengumuman</h3></div>
				<div id="posts" class="post-grid grid-container clearfix" data-layout="fitRows">

				<?php foreach ($pengumuman as $row) : ?>

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
			</div>
		</div>
	</div>
</section>
