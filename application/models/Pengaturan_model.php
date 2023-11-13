<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan_model extends CI_Model {

	function data_menu()
	{
		$db = $this->db->order_by('urut','desc')->get('menu');

		if ($db->num_rows() > 0) {
			$n = 0; foreach($db->result() as $row) : $n++;

		        $par = $this->db->where('id_menu', $row->id_parent)->get('menu')->row_array();
		        $page =$this->db->where('id', $row->link)->get('post')->row_array();
		        $kat = $this->db->where('id_kategori', $row->link)->get('post_kategori')->row_array();

		        $id = $row->id_menu;

		        $cek = '<label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
		                    <input type="checkbox" class="kt-checkable" value="'.$id.'">
		                    <span></span>
		                </label>';

		        $row->id_parent = ($par['menu']) ? $par['menu'] : '-';
		        $row->urut = ($row->urut <> 0) ? $row->urut : '-';
		        $row->tipe = ($row->tipe == 'page') ? 'Page' : (($row->tipe == 'kategori') ? 'Kategori' : 'Blank');
		        $row->link = ($row->tipe == 'Page') ? $page['judul'] : (($row->tipe == 'Kategori') ? $kat['kategori'] : $row->link);

		        $arr[] = array(
		        	'cek' => $cek,
		            'nama' => ucwords(strtolower($row->menu)),
		            'parent' => ucwords(strtolower($row->id_parent)),
		            'urut' => $row->urut,
		            'link' => ucwords(strtolower($row->link)),
		            'tipe' => $row->tipe,
		        );

	        endforeach;
		}

		else{
			$arr[] = array(
	        	'cek' => '',
	            'nama' => '',
	            'parent' => '',
	            'urut' => '',
	            'link' => '',
	            'tipe' => '',
	        );
		}

        $table['meta'] = array(
    		'page' => 1,
    		'pages' => 1,
    		'perpage' => -1,
    		'total' => $db->num_rows(),
    	);

    	$table['data'] = $arr;
		return $table;
	}
	
	function get_m_page($id = null){
	    $this->db->select('*');
        $this->db->order_by("judul", 'ASC');
        $hasil = $this->db->where('tipe', 'page')->get("post")->result();
		
		$m_page = '';
		foreach ($hasil as $row) {
			$sel = ($row->id == $id) ? 'selected':'';
			$m_page .= '<option value="'.$row->id.'" '.$sel.'>'.$row->judul.'</option>';
		}

		$page = '<select id="link" name="link" class="form-control">
	                '.$m_page.'
                </select>';

        return $page;
    }

    function get_m_kat($id = null){
    	$this->db->select('*');
        $this->db->order_by("kategori");
        $hasil = $this->db->get("post_kategori")->result();
		
		$m_kat = '';
		foreach ($hasil as $row) {
			$sel = ($row->id_kategori == $id) ? 'selected':'';
			$m_kat .= '<option value="'.$row->id_kategori.'" '.$sel.'>'.$row->kategori.'</option>';
		}

		$kat = '<select id="link" name="link" class="form-control">
	                '.$m_kat.'
                </select>';

        return $kat;
    }

    function simpan_menu()
    {
        $post = $this->input->post();
        $id = $post['id'];

        $cek = $this->db->where('id_menu', $id)->get('menu')->row_array();

        if($cek > 0){
        	unset($post['id']);
            $this->db->where('id_menu',$id)->update('menu',$post);
            $ket = array("error"=>false,'message'=>"Data Berhasil Diupdate");
        }
        else{
        	unset($post['id']);
            $this->db->insert('menu',$post);
            $ket = array("error"=>false,'message'=>"Data Berhasil Disimpan");
        }
        
        return $ket;
    }

    function hapus_menu(){
    	$id = $this->input->post('id');
		$db = $this->db->where_in('id_menu',$id)->get('menu')->result();

        foreach ($db as $row){
        	$this->db->where('id_menu',$row->id_menu)->delete('menu');
        }

        $ket = array("error"=>false,'message'=>"Data Berhasil Dihapus");
        
        return $ket;
    }


	function data_slide(){
		$db = $this->db->order_by('id_slider','desc')->get('slider');

		if ($db->num_rows() > 0) {
			$n = 0; foreach($db->result() as $row) : $n++;
		        $id = $row->id_slider;
		        
		       	$cek = ' <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
		                    <input type="checkbox" class="kt-checkable" value="'.$id.'">
		                    <span></span>
		                </label>';

		        $row->gambar = '<a href="#" class="kt-media ">
									<img src="'.base_url().'/uploads/slide/'.$row->gambar.'" alt="Slide">
								</a>'; 

				$row->link = '<a href="'.$row->link.'" target="blank">'.$row->link.'</a>';

		        $arr[] = array(
		        	'cek' => $cek,
		            'gambar' => $row->gambar,
		            'judul' => $row->judul,
		            'link' => $row->link,
		        );

	        endforeach;
		}
		else{
			$arr[] = array(
	        	'cek' => '',
	            'gambar' => '',
	            'judul' => '',
	            'link' => '',
	        );
		} 

        $table['meta'] = array(
    		'page' => 1,
    		'pages' => 1,
    		'perpage' => -1,
    		'total' => $db->num_rows(),
    	);

    	$table['data'] = $arr;
		return $table;
	}

	function simpan_slide()
    {
        $post = $this->input->post();
        $id = $post['id'];

        $cek = $this->db->where('id_slider', $id)->get('slider')->row_array();

        $config['upload_path']          = './uploads/slide/';
		$config['allowed_types']        = 'jpg|png';
		$config['overwrite']            = false;
		$config['encrypt_name']			= false;
		//$config['max_size']             = 1024; // 1MB

		$this->load->library('upload', $config);
		
		if($this->upload->do_upload('gambar')){
        	$data =  $this->upload->data();
        	$post['gambar'] = $data['file_name'];
        }

        $post['gambar'] = $post['gambar'] ? $post['gambar'] : $cek['gambar'];

        if($cek > 0){
        	if ($post['gambar'] <> $cek['gambar']) {
        		$this->delete_file($cek['gambar']);
        	}

        	unset($post['id']);
            $this->db->where('id_slider',$id)->update('slider',$post);
            $ket = array("error"=>false,'message'=>"Data Berhasil Diupdate");
        }
        else{
        	unset($post['id']);
            $this->db->insert('slider',$post);
            $ket = array("error"=>false,'message'=>"Data Berhasil Disimpan");
        }
        
        return $ket;
    }

    function hapus_slide(){
    	$id = $this->input->post('id');
		$db = $this->db->where_in('id_slider',$id)->get('slider')->result();

        foreach ($db as $row){
        	$this->db->where('id_slider',$row->id_slider)->delete('slider');
        	$this->delete_file($row->gambar);
        }

        $ket = array("error"=>false,'message'=>"Data Berhasil Dihapus");
        
        return $ket;
    }

	function data_pengguna(){
		$where = 'level <> 9';
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($where);
        $this->db->order_by('username', 'ASC');
		$db = $this->db->get();

		if ($db->num_rows() > 0) {
			$n = 0; foreach($db->result() as $row) : $n++;
		        $id = $row->id_user;

		       	$cek = ' <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
		                    <input type="checkbox" class="kt-checkable" value="'.$id.'">
		                    <span></span>
		                </label>';

		        $arr[] = array(
		        	'cek' => $cek,
		            'username' => $row->username,
		            'nama' => $row->nama,
		            'email' => $row->email
		        );

		    endforeach;
		}
		else{
			$arr[] = array(
	        	'cek' => '',
	            'username' => '',
	            'nama' => '',
	            'email' => ''
	        );
		}
        

        $table['meta'] = array(
    		'page' => 1,
    		'pages' => 1,
    		'perpage' => -1,
    		'total' => $db->num_rows(),
    	);

    	$table['data'] = $arr;
		return $table;
	}

	function simpan_user()
    {
        $post = $this->input->post();
        $id = $post['id'];

        $cek = $this->db->where('id_user', $id)->get('user')->row_array();

        $config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png';
		$config['overwrite']            = false;
		$config['encrypt_name']			= true;
		$config['max_size']             = 1024; // 1MB

		$this->load->library('upload', $config);
		
		if($this->upload->do_upload('gambar')){
        	$data =  $this->upload->data();
        	$post['gambar'] = $data['file_name'];
        }

        $post['gambar'] = $post['gambar'] ? $post['gambar'] : $cek['gambar'];
        $password = password_hash($post['password'], PASSWORD_DEFAULT);

        $post['password'] = $post['password2'] ? $password : $cek['password'];
        unset($post['password2']);
        unset($post['id']);

        if($cek > 0){
        	if ($post['gambar'] <> $cek['gambar']) {
        		$this->delete_file($cek['gambar']);
        	}
            $this->db->where('id_user',$id)->update('user',$post);
            $ket = array("error"=>false,'message'=>"Data Berhasil Diupdate");
        }
        else{
            $this->db->insert('user',$post);
            $ket = array("error"=>false,'message'=>"Data Berhasil Disimpan");
        }
        
        return $ket;
    }

    function hapus_user(){
    	$id = $this->input->post('id');
		$db = $this->db->where_in('id_user',$id)->get('user')->result();

        foreach ($db as $row){
        	$this->db->where('id_user',$row->id_user)->delete('user');
        	$this->delete_file($row->gambar);
        }

        $ket = array("error"=>false,'message'=>"Data Berhasil Dihapus");
        
        return $ket;
    }


    function delete_file($namafile){
		if(!$namafile){
			return;
		}
		else{
			return array_map('unlink', glob(FCPATH.'uploads/slide/'.$namafile.'*'));
		}
	}

	
}

/* End of file pengaturan_model.php */
/* Location: ./application/models/pengaturan_model.php */