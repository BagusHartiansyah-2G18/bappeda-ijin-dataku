<?php
	function show_array($arr)
    {
        echo "<pre>";
	        print_r($arr);
        echo "</pre>";
    }

    function arr_dropdown($vTable, $vINDEX, $vVALUE, $vORDERBY)
    {
        $ci=& get_instance();
        $ci->db->order_by($vORDERBY);
        $res  = $ci->db->get($vTable);
         
        $ret = array();
        foreach($res->result_array() as $row) : 
            $ret[$row[$vINDEX]] = $row[$vVALUE];
        endforeach;
        return $ret;
    }

    function arr_dropdown2($vDATA,$vINDEX, $vVALUE)
    {
        $ret = array();

        foreach($vDATA as $row) : 
            $ret[$row[$vINDEX]] = $row[$vVALUE];
        endforeach;
        
        return $ret;
    }
    
    function add_arr_head($arr,$index,$str)
    {
        $res[$index] = $str;
        foreach($arr as $x => $y) : 
        $res[$x] = $y;
        endforeach;
        return $res;
    }

    function file_size($bytes, $decimals = 2) {
      $sz = 'BKMGTP';
      $factor = floor((strlen($bytes) - 1) / 3);
      return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)).' '. @$sz[$factor] .'b';
    }

    function tgl_indo($tanggal){
        $bulan = array(1 =>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

        $pecahkan = explode('-', $tanggal);

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
?>