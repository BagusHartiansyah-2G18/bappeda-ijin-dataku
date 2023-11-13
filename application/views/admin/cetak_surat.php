<html lang="en">
<head>
    <title>Cetak Surat Rekomendasi</title>
    <style type="text/css">
        @page {
            margin: 1.5cm;
            margin-bottom: 1cm;
            margin-top: 1.5cm;
            font-family: Helvetica, Arial, sans-serif;
            font-size: 11pt;
        }

        ol {margin: 0 0 3px 0; padding-left: 20px;}
        .font1{font-size: 11pt;}
        .font2{font-size: 7pt;}
        .kiri{float: left; text-align: justify;}
        .kanan{float: right; text-align: justify;}
        .tengah{text-align: center; width: 100%;}
        .bersih{clear: left; clear: right;}
        .judul{font-weight: bold; font-size: 25px; width: 100%; text-align: center; margin-top: 15px;}
        .logo{border-bottom:double; border-bottom-width:medium; border-bottom-color:#000;}
    </style>
</head>
<body>

<?php foreach ($db as $key => $row) : ?>
<!--============= HEADER =========-->
<div id="header">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="10%" 
                rowspan="4" align="center" class="logo">
                <img src="<?php echo base_url()?>/uploads/ksb.png" width="64" height="73"/>
            </td>

            <td width="90%" align="center">
                <font style="font-weight:bold; font-size: 16px;">PEMERINTAH KABUPATEN SUMBAWA BARAT</font>
            </td>
        </tr>
        <tr>
            <td align="center">
                <font style="font-weight:bold; font-size: 18px;">BADAN PERENCANAAN PEMBANGUNAN DAERAH</font>
            </td>
        </tr>
        <tr>
            <td align="center">
                <font style="font-weight:bold; font-size: 18px;">DAN PENELITIAN PENGEMBANGAN</font>
            </td>
        </tr>
        <tr>
            <td align="center" style="border-bottom:double; border-bottom-width:medium; border-bottom-color:#000"><font style="font-weight:bold; font-size: 12px;"><i>Jln. Bung Karno No. 05 Kompleks Kemutar Telu (KTC) Telp. (0372) 81595 Fax. (0372) 81424</i></font>
            </td>
        </tr>
    </table>
</div>
<!--============= END HEADER =========-->

<!--============= JUDUL ==============-->
<div class="judul"><u>S &nbsp;U&nbsp; R&nbsp; A&nbsp; T &nbsp;&nbsp; I&nbsp; Z&nbsp; I&nbsp; N</u></div>
<div class="tengah">Nomor : <?php echo $row->no_surat; ?></div>
<div class="tengah" style="margin-top: 10px">Tentang</div>
<div class="tengah" style="margin-top: 10px;"><b>KEGIATAN PENELITIAN</b></div>
<!--============= END JUDUL ==========-->

<!--============= ISI ================-->
<div class="kiri" style="width: 20%; margin-top: 20px">Dasar</div>
<div class="kiri" style="width: 2%">:</div>
<div class="kiri" style="width: 3%">a. </div>
<div class="kanan" style="width: 75%">Peraturan Bupati Sumbawa Barat No. 40 Tahun 2017 tentang Rincian Tugas, Fungsi dan Tata Kerja Badan Perencanaan Pembangunan Daerah dan Penelitian Pengembangan Kabupaten Sumbawa Barat</div>

<p class="bersih"></p>

<div class="kiri" style="width: 20%;"></div>
<div class="kiri" style="width: 2%">:</div>
<div class="kiri" style="width: 3%">b. </div>
<div class="kanan" style="width: 75%"><?php echo $row->pengantar; ?></div>

<p class="bersih"></p>
<!--============= END ISI ============-->

<!--============= ISI BIODATA ====================-->

<div class="tengah" style="padding-top: 20px;"><b>MENGIZINKAN</b></div>
<div>Kepada</div>
<div class="kiri" style="width: 20%;">Nama</div>
<div class="kiri" style="width: 2%">:</div>
<div class="kanan" style="width: 78%"><?php echo $row->nama; ?></div>
<p class="bersih"></p>

<div class="kiri" style="width: 20%;">NIM / NPM</div>
<div class="kiri" style="width: 2%">:</div>
<div class="kanan" style="width: 78%"><?php echo $row->nim_npm; ?></div>
<p class="bersih"></p>

<div class="kiri" style="width: 20%;">Program Studi</div>
<div class="kiri" style="width: 2%">:</div>
<div class="kanan" style="width: 78%"><?php echo $row->prodi ? $row->prodi:'-'; ?></div>
<p class="bersih"></p>

<div class="kiri" style="width: 20%;">Universitas</div>
<div class="kiri" style="width: 2%">:</div>
<?php $ins = $row->instansi?explode('-', $row->instansi):array('',''); ?>
<div class="kanan" style="width: 78%"><?php echo $ins[1]?$ins[1]:'-'; ?></div>
<p class="bersih"></p>

<div class="kiri" style="width: 20%;">Jenjang</div>
<div class="kiri" style="width: 2%">:</div>
<div class="kanan" style="width: 78%"><?php echo $row->pendidikan; ?></div>
<p class="bersih"></p>

<div class="kiri" style="width: 20%;">Lama Penelitian</div>
<div class="kiri" style="width: 2%">:</div>
<div class="kanan" style="width: 78%"><?php echo tgl_indo($row->mulai); ?> s/d <?php echo tgl_indo($row->sampai); ?></div>
<p class="bersih"></p>

<div class="kiri" style="width: 20%;">Lokasi</div>
<div class="kiri" style="width: 2%">:</div>
<div class="kanan" style="width: 78%"><?php echo $row->lokasi; ?></div>
<p class="bersih"></p>

<div class="kiri" style="width: 20%;">Tujuan</div>
<div class="kiri" style="width: 2%">:</div>
<div class="kanan" style="width: 78%"><?php echo $row->tujuan; ?></div>
<p class="bersih"></p>

<div class="kiri" style="width: 20%;">Judul Penelitian</div>
<div class="kiri" style="width: 2%">:</div>
<div class="kanan" style="width: 78%"><?php echo $row->judul; ?></div>
<p class="bersih"></p>
<!--============= END ISI BIODATA ================-->

<!--============= KETERANGAN ====================--->
<div style="text-align: justify; padding-top: 10px;">Laporan akhir penelitian atau hasil kajian harus diserahkan sebanyak 1 (satu) examplar kepada Bappeda Litbang Kabupaten Sumbawa Barat paling lambat 7 (tujuh) hari setelah selesai menyelesaikan penyusunan laporan akhir
<ol>
    <li>Surat Izin ini berlaku sampai dengan tanggal : <?php echo tgl_indo($row->sampai); ?></li>
    <li>Setelah tanggal di atas, Surat Izin ini dinyatakan tidak berlaku lagi</li>
    <li>Apabila Penelitian belum selesai, maka ijin penelitian dapat diperpanjang dengan syarat membawa hasil penelitian sementara dan surat ijin penelitian awal yang asli ke Badan Perencanaan Pembangunan Daerah dan Penelitian Pengembangan (BAPPEDA LITBANG) Kabupaten Sumbawa Barat.</li>
</ol>
</div>
<!--============= END KETERANGAN ===============--->

<!--============= TTD ============-->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td>&nbsp;</td>
      <td width="40%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td width="35%">Dikeluarkan di</td>
            <td>: Taliwang</td>
          </tr>
          <tr>
            <td>Pada Tanggal</td>
            <?php
                $row->tgl_ttd = $row->tgl_ttd ? $row->tgl_ttd : date("Y-m-d"); 
            ?>
            <td>: <?php echo tgl_indo($row->tgl_ttd); ?>
            </td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><?php echo $row->jabatan; ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Kabupaten Sumbawa Barat</td>
    </tr>
    <tr>
      <td height="50">&nbsp;</td>
      <td></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><b><?php echo $row->pejabat; ?></b><br>NIP. <?php echo $row->nip; ?></td>
    </tr>
  </tbody>
</table>
<!--============= END TTD ==========-->

<!--============= TEMBUSAN =========-->
<p></p>

<?php 
    $row->tembusan = explode("\n", $row->tembusan);
?>
<div style="font-size: 11px;"><b>Tembusan disampaikan kepada, Yth :</b></div>
<ol>
    <?php foreach ($row->tembusan as $t) : ?>
        <li style="font-size: 11px"><?php echo $t; ?></li>
    <?php endforeach; ?>
</ol>

<!--============= END TEMBUSAN =====-->
<?php
    if ($end != $key) {
        echo '<span style="page-break-after: always;"></span>';
    } 
?>


<?php endforeach; ?>



</body>
</html>