<?php
require_once APPPATH . 'core/Admin_core.php';

class Hapus extends Admin_core {

	function __construct(){
        parent::__construct();
    }

	function index(){
		redirect('admin');
	}

	function dewan_riset(){
		$this->load->model('Peneliti_model', 'dm');
		$data = $this->dm->hapus();
		
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function pejabat(){
		$this->load->model('Peneliti_model', 'dm');
		$data = $this->dm->hapus_pp();
		
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function menu(){
		$this->load->model('Pengaturan_model', 'sm');
		$data = $this->sm->hapus_menu();
		
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function slide(){
		$this->load->model('Pengaturan_model', 'sm');
		$data = $this->sm->hapus_slide();
		
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function pengguna(){
		$this->load->model('Pengaturan_model', 'sm');
		$data = $this->sm->hapus_user();
		
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function post(){
		$this->load->model('Post_model', 'pm');
		$data = $this->pm->hapus_post();
		
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function kategori(){
		$this->load->model('Post_model', 'pm');
		$data = $this->pm->hapus_kat();
		
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function pesan(){
		$id = $this->input->post('id');
		$db = $this->db->where_in('id',$id)->get('pesan')->result();

        foreach ($db as $row){
        	$this->db->where('id',$row->id)->delete('pesan');
        }

        $ket = array("error"=>false,'message'=>"Data Berhasil Dihapus");
        
        echo json_encode($ket);
	}

}

/* End of file hapus.php */
/* Location: ./application/controllers/hapus.php */