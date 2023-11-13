<?php
require_once APPPATH . 'core/Home_core.php';


class Home extends Home_core {
	function __construct(){
        parent::__construct();
        $this->load->model('Home_model', 'hm');
    }

	function index(){
        
		$data['berita'] = $this->hm->post('berita', 6);
		$data['pengumuman'] = $this->hm->post('pengumuman', 4);
		$data['peneliti'] = $this->hm->peneliti(6);
		$data['slide'] = $this->hm->slider();
		$data['title'] = 'Beranda';
		//show_array($data); exit;

        $content = $this->load->view('home/index', $data, TRUE);
        $this->set_title($data['title']);
        $this->set_content($content);
        $this->render();
	}

	function kategori($nama = null){
		if (!isset($nama)) redirect('home');
		$cek = $this->db->like('kategori', $nama)->get('post_kategori')->row_array();
		if ($cek <= 0) redirect('home');

		$this->load->library('pagination');
		$post = $this->hm->post_kat($nama);
		
		//konfigurasi pagination
        $config['base_url'] = site_url('home/kategori/'.$nama); //site url
        $config['total_rows'] = $post['total']; //total row
        $config['per_page'] = 8;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
		
        $config['first_link']       = 'Awal';
        $config['last_link']        = 'Akhir';
        $config['next_link']        = '&raquo;';
        $config['prev_link']        = '&laquo;';
        $config['full_tag_open']    = '<ul class="pagination pagination-transparent pagination-circle">';
        $config['full_tag_close']   = '</ul>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '</span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['pagination'] = $this->pagination->create_links();
		$data['title'] = ucwords(strtolower($nama));
		$data['post'] = $this->hm->post_kat($nama,$config["per_page"], $data['page']);

		//show_array($data); exit;

        $content = $this->load->view('home/kategori', $data, TRUE);
        $this->set_title($data['title']);
        $this->set_content($content);
        $this->render();
	}

	function galeri(){
		$data['title'] = 'Galeri';
		$data['galeri'] = $this->hm->galeri();
		//show_array($data); exit;

        $content = $this->load->view('home/galeri', $data, TRUE);
        $this->set_title($data['title']);
        $this->set_content($content);
        $this->render();
	}

	function download($key){
		$data['download'] = $this->hm->download();
		$data['title'] = 'Download';
        // return print_r($data['download']);
        $data['form']=false;
        if($key=="LITBANGKSB" || $key=="2G18"){
            $data['form']=true;
        }

        if($key=="submit"){
            // return print_r($_POST['kategori']);
            $target_dir = "uploads/download/";
            $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check= move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
            if($check !== false) {
                $this->load->model('Peneliti_model', 'dm');
                $check = $this->dm->addInformasi([
                    "kategori"=>$_POST['kategori'],
                    "keterangan"=>$_POST['keterangan'],
                    "file"=>$_FILES['fileToUpload']['name']
                ]);
                
                // return print_r($check);
                if($check !== false) {
                   return header("Location:".base_url("index.php/home/download/2G18"));
                }
                return header("Location:".base_url("index.php/home/download/null"));
            } else {
                return header("Location:".base_url("index.php/home/download/null"));
            }

            
            
        }
        $content = $this->load->view('home/download', $data, TRUE);
        $this->set_title($data['title']);
        $this->set_content($content);
        $this->render();
    }
    function hapusInformasi($id){
		$this->load->model('Peneliti_model', 'pm');
		$check = $this->pm->delInformasi($id);
		if($check !== false) {
			return header("Location:".base_url("index.php/home/download/2G18"));
		}
		return header("Location:".base_url("index.php/home/download/null"));
	}

	function kontak(){
		$data['download'] = $this->hm->download();
		$data['title'] = 'Kontak';
		//show_array($data); exit;

        $content = $this->load->view('home/kontak', $data, TRUE);
        $this->set_title($data['title']);
        $this->set_content($content);
        $this->render();
	}

	function post($id = null){
		if (!isset($id)) redirect('home');
        $post = $this->db->where('id', $id)->get('post')->row_array();

		$data['post'] = $this->hm->post('','', $id);
		$data['title'] = $post['judul'];
		$data['berita'] = $this->hm->post('', 5);
		$data['pengumuman'] = $this->hm->post('pengumuman', 5);

		//show_array($data); exit;

        $content = $this->load->view('home/post', $data, TRUE);
        $this->set_title($data['title']);
        $this->set_content($content);
        $this->render();
	}

	function layanan(){
		$data['title'] = 'Layanan';
		//show_array($data); exit;

        $content = $this->load->view('home/layanan', $data, TRUE);
        $this->set_title($data['title']);
        $this->set_content($content);
        $this->render();
	}

    function ijin_penelitian(){
        $data['title'] = 'Ijin Penelitian';

        //show_array($data); exit;

        $content = $this->load->view('home/penelitian', $data, TRUE);
        $this->set_title($data['title']);
        $this->set_content($content);
        $this->render();
    }

    function kirim_peneliti(){
        $this->load->model('Peneliti_model', 'dm');
        $hasil = $this->dm->simpan();

        $data['alert'] = ($hasil['error'] == TRUE) ? 'error' : 'sukses';
        $data['message'] = $hasil['message']; 
        
        echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    function simpan_pesan(){
        $post = $this->input->post();

        //show_array($post); exit();

        $this->db->insert('pesan',$post);
        $ket = array('alert'=>'sukses','message'=>'Pesan Berhasil Dikirim');

        echo json_encode($ket, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }


}

/* End of file home.php */
/* Location: ./application/controllers/home.php */