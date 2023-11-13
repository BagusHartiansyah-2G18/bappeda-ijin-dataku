<?php
require_once APPPATH . 'core/Admin_core.php';

class Simpan extends Admin_core {

	function __construct(){
        parent::__construct();
    }

	function index(){
		redirect('admin');
	/*
		$this->load->helper('file');
		$post = $this->input->post();
		$data = implode("|",$post);
		write_file('./log.txt', $data);
		$ket = array("error"=>false,'message'=>"Data Berhasil Disimpan");
		//show_array($post); exit();
		echo json_encode($ket);
	*/
	}

	function dewan_riset(){
		$this->load->model('Peneliti_model', 'dm');
		$data = $this->dm->simpan();
		
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function berkas(){
		$this->load->model('Peneliti_model', 'dm');
		$data = $this->dm->berkas_up();
		
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function setuju(){
		$this->load->model('Peneliti_model', 'dm');
		$data = $this->dm->setuju_up();
		
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function pejabat(){
		$this->load->model('Peneliti_model', 'dm');
		$data = $this->dm->simpan_pp();
		
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function menu(){
		$this->load->model('Pengaturan_model', 'sm');
		$data = $this->sm->simpan_menu();
		
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function slide(){
		$this->load->model('Pengaturan_model', 'sm');
		$data = $this->sm->simpan_slide();
		
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function pengguna(){
		$this->load->model('Pengaturan_model', 'sm');
		$data = $this->sm->simpan_user();
		
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function post(){
		$this->load->model('Post_model', 'pm');
		$data = $this->pm->simpan_post();
		
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function kategori(){
		$this->load->model('Post_model', 'pm');
		$data = $this->pm->simpan_kat();
		
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}
}

/* End of file simpan.php */
/* Location: ./application/controllers/simpan.php */