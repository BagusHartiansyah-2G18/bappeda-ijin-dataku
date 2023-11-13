<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Themes_model extends CI_Model {

	function css_utama(){
		$css = '<link href="'.base_url().'/assets/admin/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<link href="'.base_url().'/assets/admin/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="'.base_url().'/assets/admin/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="'.base_url().'/assets/admin/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="'.base_url().'/assets/admin/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="'.base_url().'/assets/admin/css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="'.base_url().'/assets/admin/css/skins/aside/dark.css" rel="stylesheet" type="text/css" />
		<link href="'.base_url().'/assets/admin/css/pages/wizard/wizard-2.css" rel="stylesheet" type="text/css" />
		<link href="'.base_url().'/assets/admin/css/pages/wizard/wizard-3.css" rel="stylesheet" type="text/css" />';

		return $css;
	}

	function css_home(){
		$css = '<link rel="stylesheet" href="'.base_url().'/assets/home/css/bootstrap.css" type="text/css" />
		<link rel="stylesheet" href="'.base_url().'/assets/home/css/style.css" type="text/css" />
		<link rel="stylesheet" href="'.base_url().'/assets/home/css/swiper.css" type="text/css" />
		<link rel="stylesheet" href="'.base_url().'/assets/home/css/dark.css" type="text/css" />
		<link rel="stylesheet" href="'.base_url().'/assets/home/css/font-icons.css" type="text/css" />
		<link rel="stylesheet" href="'.base_url().'/assets/home/css/animate.css" type="text/css" />
		<link rel="stylesheet" href="'.base_url().'/assets/home/css/magnific-popup.css" type="text/css" />
		<link rel="stylesheet" href="'.base_url().'/assets/home/css/responsive.css" type="text/css" />
		<link rel="stylesheet" href="'.base_url().'/assets/home/css/components/bs-datatable.css" type="text/css" />
		<link rel="stylesheet" href="'.base_url().'/assets/home/css/components/datepicker.css" type="text/css" />
		<link rel="stylesheet" href="'.base_url().'/assets/home/css/components/bs-filestyle.css" type="text/css" />
		';

		return $css;
	}

	function js_home(){
		$js = '<script src="'.base_url().'/assets/home/js/jquery.js"></script>
		<script src="'.base_url().'/assets/home/js/plugins.js"></script>
		<script src="'.base_url().'/assets/home/js/components/bs-datatable.js"></script>
		<script src="'.base_url().'/assets/home/js/functions.js"></script>
		<script src="'.base_url().'/assets/home/js/components/datepicker.js"></script>
		<script src="'.base_url().'/assets/home/js/components/bs-filestyle.js"></script>';

		return $js;
	}

	function js_utama(){
		$js = '<script src="'.base_url().'/assets/admin/plugins/global/plugins.bundle.js" type="text/javascript"></script>
		<script src="'.base_url().'/assets/admin/js/scripts.bundle.js" type="text/javascript"></script>
		<script src="'.base_url().'/assets/admin/plugins/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
		<script src="'.base_url().'/assets/admin/js/pages/dashboard.js" type="text/javascript"></script>';

		return $js;
	}

	function datatable(){
		$plugins = '<link href="'.base_url().'/assets/admin/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
		<script src="'.base_url().'/assets/admin/plugins/custom/datatables.net/js/jquery.dataTables.js" type="text/javascript"></script>
		<script src="'.base_url().'/assets/admin/plugins/custom/datatables.net-bs4/js/dataTables.bootstrap4.js" type="text/javascript"></script>';

		return $plugins;
	}

	function tinymce(){
		$plugins = '<script src="'.base_url().'/assets/admin/plugins/custom/tinymce/tinymce.bundle.js" type="text/javascript"></script>';

		return $plugins;
	}

	////Applications/MAMP/htdocs/jarlitbangda/v1/assets/admin/css/pages/wizard

}

/* End of file themes_model.php */
/* Location: ./application/models/themes_model.php */