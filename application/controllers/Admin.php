<?php
require_once APPPATH . 'core/Admin_core.php';

class Admin extends Admin_core {
    
    function __construct(){
        parent::__construct();
    }

	function index(){
        $get = $this->input->get();
		$data['title'] = 'Dashboard';
        $data['pesan'] = $this->db->order_by('id', 'DESC')->get('pesan', 5)->result_array();
        $data['peneliti'] = $this->db
                            ->select('nama, instansi, photo, id_peneliti')
                            ->order_by('id_peneliti', 'DESC')
                            ->get('peneliti', 5)->result();
        $data['post'] = $this->db
                        ->select('judul, date_format(tanggal,"%d-%m-%Y") as tanggal, id')
                        ->where('tipe', 'post')
                        ->order_by('id', 'DESC')
                        ->get('post', 5)->result();
        $data['page'] = $this->db
                        ->select('judul, date_format(tanggal,"%d-%m-%Y") as tanggal, id')
                        ->where('tipe', 'page')
                        ->order_by('id', 'DESC')
                        ->get('post', 5)->result();

		//show_array($data); exit;
        $content = $this->load->view('admin/index', $data, true);
        if (isset($get['pesan'])) {
            $data = array();
            $data['js'] = '<script src="'.base_url().'/assets/admin/datajs/pesan.js" type="text/javascript"></script>';
            $data['pesan'] = $this->db->order_by('id', 'DESC')->get('pesan')->result_array();
            $data['title'] = 'Pesan';

            //show_array($data); exit;
            $content = $this->load->view('admin/pesan', $data, true);

        }

        $this->set_title($data['title']);
        $this->set_content($content);
        $this->render();

	}

    function post(){
        $this->load->model('Themes_model', 'tm');
        $get = $this->input->get();

        $data['title'] = 'Data Post, Page & Kategori';
        $data['datatable'] = $this->tm->datatable();
        $data['js'] = '<script src="'.base_url().'/assets/admin/datajs/post.js" type="text/javascript"></script>';
        $content = $this->load->view('admin/post', $data, true);

        if (count($get) > 0) {
            unset($data['datatable']);
            $data['plugin'] = $this->tm->tinymce();
//================ PAGE =================================
            if (isset($get['post'])) {
                $data['js'] = '<script src="'.base_url().'/assets/admin/datajs/post_form.js" type="text/javascript"></script>';
                $data['arr_kat'] = arr_dropdown('post_kategori', 'id_kategori', 'kategori', 'kategori');

                if ($get['post'] == 'baru') {
                    $data['title'] = 'Tambah Post Baru';
                }
                else{
                    $id = $get['post'];
                    $where = "tipe = 'post' && id='$id'";
                    $db = $this->db->where($where)->get('post')->row_array();
                    $data = array_merge($db, $data);
                    $data['title'] = 'Edit Post "'.ucwords(strtolower($db['judul'])).'"';
                }
                $content = $this->load->view('admin/form/post', $data, true);
            }

//================  PAGE =================================
            elseif (isset($get['page'])) {
                $data['js'] = '<script src="'.base_url().'/assets/admin/datajs/post_form.js" type="text/javascript"></script>';

                if ($get['page'] == 'baru') {
                    $data['title'] = 'Tambah Page Baru';
                }
                else{
                    $id = $get['page'];
                    $where = "tipe = 'page' && id='$id'";
                    $db = $this->db->where($where)->get('post')->row_array();
                    $data = array_merge($db, $data);
                    $data['title'] = 'Edit Page "'.ucwords(strtolower($db['judul'])).'"';
                }
                $content = $this->load->view('admin/form/post', $data, true);
            }
//================ KATEGORI =================================
            elseif (isset($get['kat'])) {
                $data['js'] = '<script src="'.base_url().'/assets/admin/datajs/kat_form.js" type="text/javascript"></script>';

                if ($get['kat'] == 'baru') {
                    $data['title'] = 'Tambah Kategori Baru';
                }
                else{
                    $db = $this->db->where('id_kategori', $get['kat'])->get('post_kategori')->row_array();
                    $data = array_merge($db, $data);
                    $data['title'] = 'Edit Kategori "'.ucwords(strtolower($db['kategori'])).'"';
                }
                $content = $this->load->view('admin/form/kategori', $data, true);
            }
            else{
                redirect('admin/post');
            }

        }

        $this->set_title($data['title']);
        $this->set_content($content);
        $this->render();
    }

    function dewan_riset(){
        $this->load->model('Themes_model', 'tm');
        $get = $this->input->get();

        $data['title'] = 'Dewan Riset';
        $data['datatable'] = $this->tm->datatable();
        $data['js'] = '<script src="'.base_url().'/assets/admin/datajs/peneliti.js" type="text/javascript"></script>';
        $content = $this->load->view('admin/peneliti', $data, true);

        if (count($get) > 0) {
            unset($data['datatable']);
            $data['js'] = '<script src="'.base_url().'/assets/admin/datajs/peneliti_form.js" type="text/javascript"></script>';

            if (isset($get['form'])) {
                $data['arr_berkas'] = array('Belum Kirim Berkas', 'Berkas Diterima', 'Berkas Ditolak');
                $data['arr_setuju'] = array('Belum Diproses', 'Disetujui', 'Ditolak');
                $data['arr_pejabat'] = arr_dropdown('peneliti_pejabat', 'id_pejabat', 'pejabat', 'pejabat');

                if ($get['form'] == 'baru') {
                    $data['title'] = 'Tambah Dewan Riset';
                }
                else{
                    $db = $this->db->where('id_peneliti', $get['form'])->get('peneliti')->row_array();
                    $data['title'] = 'Edit Data "'.ucwords(strtolower($db['nama'])).'"';
                    if ($db > 0) {
                        $data = array_merge($data, $db);
                        $arr_k = isset($data['no_identitas']) ? explode('-', $data['no_identitas']) : array();
                        $data['kartu'] = $arr_k[0];
                        $data['no_identitas'] = $arr_k[1];
                        $arr_jk = isset($data['instansi']) ? explode('-', $data['instansi']) : array();
                        $data['jenis_instansi'] = $arr_jk[0];
                        $data['instansi'] = $arr_jk[1];
                        
                    }
                    else{
                        redirect('admin/dewan_riset');
                    }
                }
                $content = $this->load->view('admin/form/peneliti', $data, true);
            }

            elseif (isset($get['pejabat'])){
                $data['js'] = '<script src="'.base_url().'/assets/admin/datajs/pejabat_form.js" type="text/javascript"></script>';
                if ($get['pejabat'] == 'baru') {
                    $data['title'] = 'Tambah Pejabat';
                }
                else{
                    $db = $this->db->where('id_pejabat', $get['pejabat'])->get('peneliti_pejabat')->row_array();
                    $data = array_merge($db, $data);
                    $data['title'] = 'Edit Data "'.ucwords(strtolower($db['pejabat'])).'"';
                }
                $content = $this->load->view('admin/form/pejabat', $data, true);
            }
            else{
                redirect('admin/dewan_riset');
            }
        }
        
        $this->set_title($data['title']);
        $this->set_content($content);
        $this->render();
    }

    function pengaturan(){
        $this->load->model('Themes_model', 'tm');
        $get = $this->input->get();

        $data['title'] = 'Pengaturan';
        $data['datatable'] = $this->tm->datatable();
        $data['js'] = '<script src="'.base_url().'/assets/admin/datajs/pengaturan.js" type="text/javascript"></script>';
        $content = $this->load->view('admin/pengaturan', $data, true);

        if (count($get) > 0) {
            unset($data['datatable']);
//================ MENU ========================            
            if (isset($get['menu'])) {
                $pm = $this->db->where('id_parent','')->get('menu')->result_array();
                $arr_menu = arr_dropdown2($pm,'id_menu', 'menu');
                $data['arr_menu'] = add_arr_head($arr_menu,'','- Pilih Menu Parent -');
                $data['arr_tipe'] = array('blank'=>'Blank', 'kategori'=>'Kategori','page'=>'Page');
                $data['js'] = '<script src="'.base_url().'/assets/admin/datajs/menu_form.js" type="text/javascript"></script>';

                if ($get['menu'] == 'baru') {
                    $data['title'] = 'Tambah Menu Baru';
                }
                else{
                    $db = $this->db->where('id_menu', $get['menu'])->get('menu')->row_array();
                    $data = array_merge($db, $data);
                    $data['title'] = 'Edit Data "'.ucwords(strtolower($db['menu'])).'"';
                }
                $content = $this->load->view('admin/form/menu', $data, true);
            }
//================ SILDER ==========================
            elseif (isset($get['slide'])) {
                $data['arr_tipe'] = array('blank'=>'Blank','post'=>'Post');
                $data['js'] = '<script src="'.base_url().'/assets/admin/datajs/slide_form.js" type="text/javascript"></script>';

                if ($get['slide'] == 'baru') {
                    $data['title'] = 'Tambah Slide Baru';
                }
                else{
                    $db = $this->db->where('id_slider', $get['slide'])->get('slider')->row_array();
                    $data = array_merge($db, $data);
                    $data['title'] = 'Edit Data "'.ucwords(strtolower($db['judul'])).'"';
                }
                $content = $this->load->view('admin/form/slide', $data, true);
            }
//================ PENGGUNA =======================            
            elseif (isset($get['user'])) {
                $data['js'] = '<script src="'.base_url().'/assets/admin/datajs/user_form.js" type="text/javascript"></script>';

                if ($get['user'] == 'baru') {
                    $data['title'] = 'Tambah Pengguna Baru';
                }
                else{
                    $db = $this->db->where('id_user', $get['user'])->get('user')->row_array();
                    $data = array_merge($db, $data);
                    $data['title'] = 'Edit Data "'.ucwords(strtolower($db['nama'])).'"';
                }
                $content = $this->load->view('admin/form/pengguna', $data, true);
            }
            else{
                redirect('admin/pengaturan');
            }
        }

        $this->set_title($data['title']);
        $this->set_content($content);
        $this->render();
    }

    function media(){
        $this->load->model('Themes_model', 'tm');
        $data['judul'] = 'Media';
        //show_array($data); exit;

        $content = $this->load->view('admin/media', $data, true);
        $this->set_title("Media");
        $this->set_content($content);
        $this->render();
    }

    function logout()
    {
        $this->session->unset_userdata("user_bappeda");
        redirect();
    }
    
}
