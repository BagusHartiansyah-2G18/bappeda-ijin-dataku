<script src="https://maps.google.com/maps/api/js?key=AIzaSyDwFDIGf4SfMS7X1A0PLhclAkDPWqOiy5s"></script>
<script src="<?php echo base_url() ?>/assets/home/js/jquery.gmap.js"></script>
<script type="text/javascript">
	var base_url = '<?php echo base_url() ?>';
	$('#google-map').gMap({
		address: '-8.753745,116.852609',
		maptype: 'ROADMAP',
		zoom: 15,
		markers: [
			{
				address: "-8.753745,116.852609",
				html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;"><span>BAPPEDA JARLITBANG</span></h4><p class="nobottommargin">Jln. Bung Karno No.3 Komplek KTC. Taliwang, Kabupaten Sumbawa Barat.NTB Kode Pos 84355</p></div>',
				icon: {
					image: base_url + "assets/home/images/icons/map-icon-red.png",
					iconsize: [32, 39],
					iconanchor: [32,39]
				}
			}
		],
		doubleclickzoom: false,
		controls: {
			panControl: true,
			zoomControl: true,
			mapTypeControl: true,
			scaleControl: false,
			streetViewControl: false,
			overviewMapControl: false
		}
	});

</script>