<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

	function data($param){
        $tipe = $param['tipe'];

        $this->db->select('*, date_format(tanggal,"%d-%m-%Y") as tanggal');
        $this->db->from('post p');
        $this->db->join('post_kategori pk', 'pk.id_kategori = p.id_kategori', 'left');
        $this->db->join('user u', 'u.id_user = p.id_user', 'left');
        $this->db->order_by('p.tanggal', 'desc');
        if ($tipe == 'post') {
            $this->db->where('p.tipe', 'post');
        }
        else{
            $this->db->where('p.tipe', 'page'); 
        }

        if($param['judul'] <> '') {
            $this->db->like('p.judul',$param['judul']);
        }

        ($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');

        $res = $this->db->get();

        return $res;

/*
		$this->db->select('*, date_format(tanggal,"%d-%m-%Y") as tanggal');
		$this->db->from('post p');
		$this->db->join('post_kategori pk', 'pk.id_kategori = p.id_kategori', 'left');
		$this->db->join('user u', 'u.id_user = p.id_user', 'left');
		$this->db->order_by('p.tanggal', 'desc');
		if ($tipe == 'post') {
			$this->db->where('p.tipe', 'post');
		}
		else{
			$this->db->where('p.tipe', 'page');	
		}


		$db = $this->db->get();

		$n = 0; foreach ($db->result() as $row): $n++;
			$id = $row->id;
			$aksi = '<a href="'.site_url('home/post/'.$id).'" target="_blank" class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">Lihat</a>';
			$cek = '<label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
		                    <input type="checkbox" class="kt-checkable" value="'.$id.'">
		                    <span></span>
		                </label>';

			$arr[] = array(
				'cek' => $cek,
				'judul' => ucwords(strtolower($row->judul)),
				'kategori' => $row->kategori,
				'user' => str_replace('syarian', 'admin', $row->username),
				'tanggal' => $row->tanggal,
				'aksi' => $aksi,
			);
		endforeach;

    	$table['meta'] = array(
    		'page' => 1,
    		'pages' => 1,
    		'perpage' => -1,
    		'total' => $db->num_rows(),
    	);

    	$table['data'] = $arr;
		return $table;

*/
	}
	
	function simpan_post()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $cek = $this->db->where('id', $id)->get('post')->row_array();
        $post['tanggal'] = date("Y.m.d H:i:s");

        if($cek > 0){
        	unset($post['id']);
            $this->db->where('id',$id)->update('post',$post);
            $ket = array("error"=>false,'message'=>"Data Berhasil Diupdate");
        }
        else{
        	unset($post['id']);
            $this->db->insert('post',$post);
            $ket = array("error"=>false,'message'=>"Data Berhasil Disimpan");
        }
        
        return $ket;
    }

    function hapus_post(){
    	$id = $this->input->post('id');
		$db = $this->db->where_in('id',$id)->get('post')->result();

        foreach ($db as $row){
        	$this->db->where('id',$row->id)->delete('post');
        }

        $ket = array("error"=>false,'message'=>"Data Berhasil Dihapus");
        
        return $ket;
    }

	function kategori(){
		$db = $this->db->get('post_kategori');

		$n = 0; foreach ($db->result() as $row): $n++;

			$id = $row->id_kategori;

			$cek = '<label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
		                    <input type="checkbox" class="kt-checkable" value="'.$id.'">
		                    <span></span>
		                </label>';

			$where = "id_kategori = '$row->id_kategori' && tipe = 'post'";
			$jml_post = $this->db->where($where)->get('post')->num_rows();

			$arr[] = array(
				'cek' => $cek,
				'kategori' => $row->kategori,
				'jml_post' => $jml_post.' Postingan'
			);

		endforeach;

		$table['meta'] = array(
    		'page' => 1,
    		'pages' => 1,
    		'perpage' => -1,
    		'total' => $db->num_rows(),
    	);

    	$table['data'] = $arr;

		return $table;
	}

	function simpan_kat()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $cek = $this->db->where('id_kategori', $id)->get('post_kategori')->row_array();

        if($cek > 0){
        	unset($post['id']);
            $this->db->where('id_kategori',$id)->update('post_kategori',$post);
            $ket = array("error"=>false,'message'=>"Data Berhasil Diupdate");
        }
        else{
        	unset($post['id']);
            $this->db->insert('post_kategori',$post);
            $ket = array("error"=>false,'message'=>"Data Berhasil Disimpan");
        }
        
        return $ket;
    }

    function hapus_kat(){
    	$id = $this->input->post('id');
		$db = $this->db->where_in('id_kategori',$id)->get('post_kategori')->result();

        foreach ($db as $row){
        	$this->db->where('id_kategori',$row->id_kategori)->delete('post_kategori');
        }

        $ket = array("error"=>false,'message'=>"Data Berhasil Dihapus");
        
        return $ket;
    }
}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */