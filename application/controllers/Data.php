<?php
require_once APPPATH . 'core/Admin_core.php';

class Data extends Admin_core {

	function __construct(){
        parent::__construct();
    }

    function index(){
		redirect('admin');
	}

	function post($tipe){
		$this->load->model('Post_model', 'pm');

		$draw = $_REQUEST['draw']; 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"daft_id";
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc";
        $judul = $_REQUEST['columns'][1]['search']['value'];

        $req_param = array(
            "sort_by" => $sidx,
            "sort_direction" => $sord,
            "limit" => null ,
            "judul" => $judul,
            "tipe" => $tipe
        );     
        
        $row = $this->pm->data($req_param)->result();
        $count = count($row); 
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
        
        $result = $this->pm->data($req_param)->result();
        
        $arr_data = array();
        $n=0; foreach($result as $row) : $n++;
			$id = $row->id;
			$aksi = '<a href="'.site_url('home/post/'.$id).'" target="_blank" class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">Lihat</a>';
			$cek = '<label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
		                    <input type="checkbox" class="kt-checkable" value="'.$id.'">
		                    <span></span>
		                </label>';


		    if ($tipe == 'post') {
		    	$arr_data[] = array(
	                $cek,
	                ucwords(strtolower($row->judul)),
	                $row->kategori,
	                str_replace('syarian', 'admin', $row->username),
	                $row->tanggal,
	                $aksi
	            );
		    }
		    else{
		    	$arr_data[] = array(
	                $cek,
	                ucwords(strtolower($row->judul)),
	                str_replace('syarian', 'admin', $row->username),
	                $row->tanggal,
	                $aksi
	            );
		    }
            
        endforeach;

        $responce = array(
            'draw' => $draw,
            'recordsTotal' => $count, 
            'recordsFiltered' => $count,
            'data'=>$arr_data
        );
        
        echo json_encode($responce); 
	}

	function page(){
		$this->load->model('Post_model', 'pm');
		$data = $this->pm->data('page');
		//show_array($data); exit();
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function kategori(){
		$this->load->model('Post_model', 'pm');
		$data = $this->pm->kategori();
		//show_array($data); exit();
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function peneliti(){
		$this->load->model('Peneliti_model', 'dm');
		$data = $this->dm->data_peneliti();
		//show_array($data); exit();
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function pejabat(){
		$this->load->model('Peneliti_model', 'dm');
		$data = $this->dm->data_pejabat();
		//show_array($data); exit();
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function menu(){
		$this->load->model('pengaturan_model', 'sm');
		$data = $this->sm->data_menu();
		//show_array($data); exit();
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function get_m_page(){
		$this->load->model('pengaturan_model', 'sm');
    	$data = $this->sm->get_m_page();
        echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    function get_m_kat(){
    	$this->load->model('pengaturan_model', 'sm');
    	$data = $this->sm->get_m_kat();
        echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }


	function slide(){
		$this->load->model('pengaturan_model', 'sm');
		$data = $this->sm->data_slide();
		//show_array($data); exit();
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

	function pengguna(){
		$this->load->model('pengaturan_model', 'sm');
		$data = $this->sm->data_pengguna();
		//show_array($data); exit();
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}

}

/* End of file data.php */
/* Location: ./application/controllers/data.php */