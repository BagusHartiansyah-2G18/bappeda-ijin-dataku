<?php 

class Home_core extends CI_Controller {

	var $title; 
	var $content;
	function __construct(){
		parent::__construct();
	}

	function set_title($str){
		$this->title = $str;
	}

	function set_content($str) {
		$this->content = $str;
	}

	function render(){
		$this->load->model('Themes_model', 'tm');
		$this->load->model('Home_model', 'hm');

		$data['css'] = $this->tm->css_home();
		$data['js'] = $this->tm->js_home();
		$data['menu'] = $this->hm->menu();
		$data['baru'] = $this->hm->post('', 3);
		//show_array($data); exit();

		$data['title'] = $this->title;
		$data['content'] = $this->content;

		$this->load->view("themes/home",$data);
	}
}
?>