<?php
require_once APPPATH . 'core/Admin_core.php';

class Cetak extends Admin_core {
    
    function __construct(){
        parent::__construct();
        $this->load->library('pdf');
    }

    function index(){
    	$get = $this->input->get();

    	if (count($get) > 0) {
    		if (isset($get['id'])) {
    			$id = explode(',', $get['id']);

    			$this->db->select('*');
				$this->db->from('peneliti');
				$this->db->join('peneliti_pejabat', 
								'peneliti_pejabat.id_pejabat = peneliti.id_pejabat', 'left');
				$this->db->where_in('id_peneliti', $id);
				$data['db'] = $this->db->get()->result();
				$key = array_keys($data['db']);
				$data['end'] = end($key);

				//show_array($data); exit();

				if (count($data['db']) > 0) {
					//$jml = count($data['db']) - 1;


					$this->pdf->set_option('isRemoteEnabled', TRUE);
			        $this->pdf->setPaper('folio', 'potrait');
			        $this->pdf->filename = "Surat Ijin Penelitian.pdf";
			        $this->pdf->load_view('admin/cetak_surat', $data);
				}
				else{
					redirect('admin/dewan_riset');
				}
    		}
    		else{
    			redirect('admin/dewan_riset');
    		}
    	}
    	else{
			redirect('admin/dewan_riset');
		}
    }
}


/* End of file Cetak.php */
/* Location: ./application/controllers/Cetak.php */