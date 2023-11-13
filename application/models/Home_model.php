<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->library('encryption');
		$this->load->database();
	}
	function menu(){
		$db = $this->db->order_by('urut','asc')->get('menu');
		$subdb = $this->db->order_by('menu','asc')->get('menu');

		foreach ($db->result() as $row) {
			$sb = $this->db->where('id_parent',$row->id_menu)->get('menu')->row_array();
			$row->sub = ($sb > 0) ? 1 : 0;

			if ($row->tipe == 'kategori') {
				$cek = $this->db->where('id_kategori', $row->link)->get('post_kategori')->row_array();
				$row->link = site_url('home/kategori/'.strtolower($cek['kategori']));
			}
			elseif ($row->tipe == 'page') {
				$cek = $this->db->where('id', $row->link)->get('post')->row_array();
				$row->link = site_url('home/post/'.$cek['id']);
			}
			else{
				$row->link = (strrpos($row->link, 'https') !== false || strrpos($row->link, 'http') !== false) ? 
							$row->link : site_url($row->link);

				$row->link = ($row->link == '#') ? '#' : $row->link;
			}

			if ($row->id_parent == '') {
				$main[] = $row;
			}
		}

		foreach ($subdb->result() as $r) {
			$cek = $this->db->where('id_kategori', $r->link)->get('post_kategori')->row_array();
			if ($r->id_parent) {
				if ($r->tipe == 'kategori') {
					$r->link = site_url('home/kategori/'.strtolower($cek['kategori']));
				}
				elseif ($r->tipe == 'page') {
					$cek = $this->db->where('id', $r->link)->get('post')->row_array();
					$r->link = site_url('home/post/'.$cek['id']);
				}
				else{
					$r->link = (strrpos($r->link, 'https') !== false || strrpos($r->link, 'http') !== false) ? 
							$r->link : site_url($r->link);
					$r->link = ($r->link == '#') ? '#' : $r->link;
				}

				$sub[] = $r;
			}
		}

		return array(
			'main' => $main,
			'sub' => $sub,
		);
	}

	function post($kat = null, $limit = null, $id = null){
		$this->db->select('*, date_format(tanggal,"%d-%m-%Y") as tanggal');
		$this->db->from('post p');
		$this->db->join('post_kategori pk', 'pk.id_kategori = p.id_kategori', 'left');
		$this->db->join('user u', 'u.id_user = p.id_user', 'left');
		$this->db->order_by('p.tanggal', 'desc');
		if ($kat) {
			$this->db->where('pk.kategori', $kat);
			$this->db->where('p.tipe', 'post');
		}
		if ($limit) {
			$this->db->limit($limit);
			$this->db->where('p.tipe', 'post');
		}
		if ($id) {
			$this->db->where('p.id', $id);
		}
		
		$db = $this->db->get();

		foreach ($db->result() as $row) {
		    $file = preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $row->isi, $img);
		    $row->gambar = ($file <> 0) ? $img['src'] : base_url('uploads/no_image.jpg');
		    $row->gambar = str_replace('../uploads/', base_url('uploads/'), $row->gambar);
		    $row->isi = str_replace('../uploads/', base_url('uploads/'), $row->isi);
		    $row->link = site_url('home/post/'.$row->id);
		    $row->username = str_replace('syarian', 'admin', $row->username);
			unset($row->password);
			unset($row->id_user);
			unset($row->email);

			$arr[] = $row;   
		}

		return $arr;

	}

	function peneliti($limit = null){
		$this->db->select('nama, instansi,kab_instansi,judul,photo');
		$this->db->from('peneliti');
		$this->db->where('setuju',1);
		$this->db->limit($limit);
		$this->db->order_by('id_peneliti', 'desc');
		$db = $this->db->get()->result();

		foreach ($db as $row) {
			$row->instansi = ($row->instansi) ? explode('-', $row->instansi) : array('','');
			$row->instansi = $row->instansi[1];
			$row->photo = $row->photo ? base_url('uploads/peneliti/'.$row->photo.'') : base_url('uploads/ksb.png');
			$arr[] = $row;
		}

		return $arr;

	}

	function slider(){
		$this->db->select('*');
		$this->db->from('slider');
		$this->db->order_by('id_slider', 'desc');
		$db = $this->db->get()->result();

		foreach ($db as $row) {
			$row->gambar = $row->gambar ? base_url('uploads/slide/'.$row->gambar.'') : base_url('uploads/no_image.png');
			$arr[] = $row;
		}

		return $arr;

	}
	
	function post_kat($kat, $limit = null, $start = null){
		$this->db->select('*, date_format(tanggal,"%d-%m-%Y") as tanggal');
		$this->db->from('post p');
		$this->db->join('post_kategori pk', 'pk.id_kategori = p.id_kategori', 'left');
		$this->db->join('user u', 'u.id_user = p.id_user', 'left');
		$this->db->order_by('p.tanggal', 'desc');
		$this->db->where('p.tipe', 'post');
		$this->db->like('pk.kategori', $kat);
		if ($limit || $start) {
			$this->db->limit($limit, $start);
		}
		
		$db = $this->db->get();

		foreach ($db->result() as $row) {
		    $file = preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $row->isi, $img);
		    $row->gambar = ($file <> 0) ? $img['src'] : base_url('uploads/no_image.jpg');
		    $row->gambar = str_replace('../uploads/', base_url('uploads/'), $row->gambar);
		    $row->isi = str_replace('../uploads/', base_url('uploads/'), $row->isi);
		    $row->link = site_url('home/post/'.$row->id);
		    $row->username = str_replace('syarian', 'admin', $row->username);
			unset($row->password);
			unset($row->id_user);
			unset($row->email);

			$arr[] = $row;   
		}

		return array(
			'arr' => $arr,
			'total' => $db->num_rows()
		);

	}

	function galeri(){
		$this->load->helper('directory');
		$dir = directory_map(FCPATH.'/uploads/galeri/');

		foreach ($dir as $row => $value) {
			$arr[] = array(
				'data' => 'pf-'.str_replace(' ', '-', strtolower(str_replace('/', '', $row))),
				'folder' => str_replace('/', '', $row),
				'file' => $value
			);
		}

		return $arr;
	}

	function download(){
		$this->load->helper('directory');
		$dir = directory_map(FCPATH.'/uploads/download/');
		$arr=[];
		// return 
		foreach ($dir as $key => $value) :
			$nama = pathinfo($value, PATHINFO_FILENAME);
			$ukuran = filesize(FCPATH.'/uploads/download/'.$value);
			// print_r($ukuran);
			// if(empty($ukuran)){
				$arr[] = array(
					'nama' => $nama,
					'ukuran' => $this->file_size($ukuran),
					'file' => base_url('uploads/download/'.$value),
				);
			// }

		endforeach;

		$this->db->select('*');
		$this->db->from('informasi');
		$db = $this->db->get()->result();
		foreach ($db as $key => $v) {
			// return $v->file;
			$db[$key]->file=base_url('uploads/download/'.$v->file);
			$db[$key]->url=base_url('index.php/home/hapusInformasi/'.$v->kdInformasi);
		}
		return $db;
		// return $arr;
	}
	function file_size($bytes, $decimals = 2) {
		$sz = 'BKMGTP';
		$factor = floor((strlen($bytes) - 1) / 3);
		return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)).' '. @$sz[$factor] .'b';
	  }

}

/* End of file home_model.php */
/* Location: ./application/models/home_model.php */