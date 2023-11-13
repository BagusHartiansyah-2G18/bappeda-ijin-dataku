<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peneliti_model extends CI_Model {

	function db($where = null)
	{
		$this->db->select('*');
		$this->db->from('peneliti');
		$this->db->join('peneliti_pejabat', 'peneliti_pejabat.id_pejabat = peneliti.id_pejabat', 'left');
		if ($where == 'setuju') {
			$this->db->where('setuju', 1);
		}
		elseif ($where == 'berkas') {
			$this->db->where('berkas', 0);
			$this->db->where('setuju', 1);
		}
		elseif ($where == 'baca') {
			$this->db->where('setuju', 0);
		}
		elseif ($where == 'bacalimit') {
			$this->db->where('setuju', 0);
			$this->db->limit(3);
		}
		$this->db->order_by('id_peneliti', 'desc');
		$hasil = $this->db->get();
		return $hasil;
	}

	function data_peneliti(){
		$hasil = $this->db();

		if ($hasil->num_rows() > 0) {
			$n = 0; foreach($hasil->result_array() as $row) : $n++;

				$id = $row['id_peneliti'];
				$waktu = date("d-M",strtotime($row['mulai'])).' s.d '.date("d-M-Y",strtotime($row['sampai']));

				$cek = ' <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
		                    <input type="checkbox" class="kt-checkable" value="'.$id.'">
		                    <span></span>
		                </label>';

		        $span  = '<span class="text-info font-weight-bold">';

		        $ins = ($row['instansi']) ? explode('-', $row['instansi']) : array('','');

		        $row['nama'] = ucwords(strtolower($row['nama']));

				if ($row['setuju'] <> 0) {
					$nama = $row['nama'];
					$hp = $row['hp'];
					$instansi = $ins[1];
					$waktu = $waktu;
		        }else{
		        	$nama = $span.''.$row['nama'].'</span>';
					$hp = $span.''.$row['hp'].'</span>';
					$instansi = $span.''.$ins[1].'</span>';
					$waktu = $span.''.$waktu.'</span>';
		        }

				$arr[] = array(
					'cek' => $cek,
					'nama' => $nama,
					'hp' => $hp,
					'instansi' => $instansi,
					'waktu' => $waktu,
		            'status' => $this->status($row['setuju']).' '.$this->berkas($row['berkas'])
		        );

	        endforeach;
		}

		else{
			$arr[] = array(
				'cek' => '',
				'nama' => '',
				'hp' => '',
				'instansi' => '',
				'waktu' => '',
	            'status' => ''
	        );
		}

        $table['meta'] = array(
    		'page' => 1,
    		'pages' => 1,
    		'perpage' => -1,
    		'total' => $hasil->num_rows(),
    	);

    	$table['data'] = $arr;
		return $table;
	}

	function status($stj){
		if ($stj == 1) {
			$sts = '<span class="kt-badge kt-badge--success kt-badge--md"><i class="fa fa-thumbs-up"></i></span>';
		}
		elseif ($stj == 2) {
			$sts = '<span class="kt-badge kt-badge--danger kt-badge--md"><i class="fa fa-thumbs-down"></i></span>';
		}else{
			$sts = '<span class="kt-badge kt-badge--primary kt-badge--md"><i class="fa fa-eye-slash"></i></span>';
		}

		return $sts;
	}

	function berkas($bks){
		if ($bks == 1) {
			$sts = '<span class="kt-badge kt-badge--success kt-badge--md"><i class="fa fa-folder-open"></i></span>';
		}
		elseif ($bks == 2) {
			$sts = '<span class="kt-badge kt-badge--danger kt-badge--md"><i class="fa fa-folder"></i></span>';
		}else{
			$sts = '<span class="kt-badge kt-badge--primary kt-badge--md"><i class="fa fa-eye-slash"></i></span>';
		}

		return $sts;
	}

	

	function data_pejabat(){
		$hasil = $this->db->order_by('pejabat','ASC')->get('peneliti_pejabat');

		if ($hasil->num_rows() > 0) {
			$n = 0; foreach($hasil->result_array() as $row) : $n++;

		        $id = $row['id_pejabat'];

		        $cek = ' <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
		                    <input type="checkbox" class="kt-checkable" value="'.$id.'">
		                    <span></span>
		                </label>';

		        $arr[] = array(
		        	'cek' => $cek,
		            'pejabat' => $row['pejabat'],
		            'nip' => $row['nip'],
		            'jabatan' => $row['jabatan'],
		        );

	        endforeach;
		}

		else{
			$arr[] = array(
	        	'cek' => '',
	            'pejabat' => '',
	            'nip' => '',
	            'jabatan' => '',
	        );
		}
        

        $table['meta'] = array(
    		'page' => 1,
    		'pages' => 1,
    		'perpage' => -1,
    		'total' => $hasil->num_rows(),
    	);

    	$table['data'] = $arr;
		return $table;
	}

	function simpan(){
		$post = $this->input->post();
        $id = isset($post['id']) ? $post['id'] : '0';

        $cek = $this->db->where('id_peneliti', $id)->get('peneliti')->row_array();
        $post['no_identitas'] = $post['kartu'].'-'.$post['no_identitas'];
        $post['instansi'] = $post['jenis_instansi'].'-'.$post['instansi'];
        $post['mulai'] = $post['start'];
        $post['sampai'] = $post['end'];

        $config['upload_path']          = './uploads/peneliti/';
		$config['allowed_types']        = 'jpg|png|pdf';
		$config['encrypt_name']			= true;
		$config['max_size']             = 2024; // 1MB

		$this->load->library('upload', $config);
		
		if($this->upload->do_upload('photo')){
        	$data =  $this->upload->data();
        	$post['photo'] = $data['file_name'];
        }

		if($this->upload->do_upload('ktp')){
        	$data =  $this->upload->data();
        	$post['ktp'] = $data['file_name'];
        }

        if($this->upload->do_upload('surat')){
        	$data =  $this->upload->data();
        	$post['surat'] = $data['file_name'];
        }

        if($this->upload->do_upload('proposal')){
        	$data =  $this->upload->data();
        	$post['proposal'] = $data['file_name'];
        }

        unset($post['kartu']);
        unset($post['jenis_instansi']);
        unset($post['start']);
        unset($post['end']);
        unset($post['id']);

        $post['photo'] = $post['photo'] ? $post['photo'] : $cek['photo'];
        $post['ktp'] = $post['ktp'] ? $post['ktp'] : $cek['ktp'];
        $post['surat'] = $post['surat'] ? $post['surat'] : $cek['surat'];
        $post['proposal'] = $post['proposal'] ? $post['proposal'] : $cek['proposal'];

        if($cek > 0){
        	if ($post['photo'] <> $cek['photo']) {
        		$this->delete_file($cek['photo']);
        	}
        	if ($post['ktp'] <> $cek['ktp']) {
        		$this->delete_file($cek['ktp']);
        	}
        	if ($post['surat'] <> $cek['surat']) {
        		$this->delete_file($cek['surat']);
        	}
        	if ($post['proposal'] <> $cek['proposal']) {
        		$this->delete_file($cek['proposal']);
        	}
            $this->db->where('id_peneliti',$id);
            $this->db->update('peneliti',$post);
            $ket = array("error"=>false,'message'=>"Data Berhasil Diupdate");
        }
        else{
            $this->db->insert('peneliti',$post);
            $ket = array("error"=>false,'message'=>"Data Berhasil Disimpan");
        }
        return $ket;
	}

	function setuju_up(){
		$id = $this->input->post('id');
		$db = $this->db->where_in('id_peneliti',$id)->get('peneliti')->result();

        foreach ($db as $row){
        	$this->db->where('id_peneliti',$row->id_peneliti)->update('peneliti', array('setuju' => 1));
        }

        $ket = array("error"=>false,'message'=>"Dewan Riset Disetujui");
        
        return $ket;
	}

	function berkas_up(){
		$id = $this->input->post('id');
		$db = $this->db->where_in('id_peneliti',$id)->get('peneliti')->result();

        foreach ($db as $row){
        	$this->db->where('id_peneliti',$row->id_peneliti)->update('peneliti', array('berkas' => 1));
        }

        $ket = array("error"=>false,'message'=>"Berkas Diterima");
        
        return $ket;
	}

	function simpan_pp(){
		$post = $this->input->post();
		$id = $post['id'];

		$cek = $this->db->where('id_pejabat', $id)->get('peneliti_pejabat')->row_array();

		if ($cek > 0) {
			unset($post['id']);
			$this->db->where('id_pejabat', $id)->update('peneliti_pejabat', $post);
			$ket = array("error"=>false,'message'=>"Data Berhasil Diupdate");
		}
		else{
			unset($post['id']);
			$this->db->insert('peneliti_pejabat',$post);
            $ket = array("error"=>false,'message'=>"Data Berhasil Disimpan");
		}

		return $ket;

	}

	function hapus(){
		$id = $this->input->post('id');
		$db = $this->db->where_in('id_peneliti',$id)->get('peneliti')->result();

        foreach ($db as $row){
        	$this->delete_file($row->ktp);
        	$this->delete_file($row->surat);
        	$this->delete_file($row->proposal);
        	$this->delete_file($row->photo);
        	$this->db->where('id_peneliti',$row->id_peneliti)->delete('peneliti');
        }

        $ket = array("error"=>false,'message'=>"Data Berhasil Dihapus");
        
        return $ket;
	}


	function hapus_pp(){
		$id = $this->input->post('id');
		$db = $this->db->where_in('id_pejabat',$id)->get('peneliti_pejabat')->result();

        foreach ($db as $row){
        	$this->db->where('id_pejabat',$row->id_pejabat)->delete('peneliti_pejabat');
        }

        $ket = array("error"=>false,'message'=>"Data Berhasil Dihapus");
        
        return $ket;
	}

	function delete_file($namafile){
		$this->load->helper('file');
		$file = get_filenames(FCPATH.'/uploads/peneliti/');

		if (in_array($namafile, $file)){
			return array_map('unlink', glob(FCPATH.'/uploads/peneliti/'.$namafile.'*'));
		}
	}


	function addInformasi($v){
		$this->db->query("insert into informasi (kategori, keterangan, file) values 
			('".$v['kategori']."','".$v['keterangan']."','".$v['file']."')
		");
		// return ();
		if(strlen($this->db->error())>0){
			return false;
		}
		return true;
	}
	function delInformasi($id){
		$this->db->query("delete from informasi where kdInformasi=".$id);
		if(strlen($this->db->error())>0){
			return false;
		}
		return true;
	}
}

/* End of file peneliti_model.php */
/* Location: ./application/models/peneliti_model.php */