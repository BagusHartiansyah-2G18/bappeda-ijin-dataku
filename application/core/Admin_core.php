<?php 

class Admin_core extends CI_Controller {

	var $title; 
	var $content;
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata("user_bappeda")) {
			redirect('login','refresh');
			exit();
		}
	}

	function set_title($str){
		$this->title = $str;
	}

	function set_content($str) {
		$this->content = $str;
	}

	function render(){
		$this->load->model('Themes_model');
		$user = $this->session->userdata('user_bappeda');
		$ini = $user['nama'];
		$ini = explode(' ',trim($ini));
		$ini = strtoupper(substr($ini[0],0,1));

		$data['title'] = $this->title;
		$data['content'] = $this->content;
		$data['css'] = $this->Themes_model->css_utama();
		$data['js'] = $this->Themes_model->js_utama();
		$data['menu'] = $this->uri->segment(2);
		$data['nama'] = $user['nama'] ? $user['nama'] : '';
		$data['ini'] = $ini ? $ini : '';
		//show_array($data); exit();
		$this->load->view("themes/admin",$data);
	}
}
?>