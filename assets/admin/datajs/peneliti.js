"use strict";
jQuery(document).ready(function() {
	MyDatatable.init();
});

var MyDatatable = function() {
	var table = $('.kt-portlet__body');
	var tabhead = $('.kt-portlet__head');
	
	var ganti_tab = function(){
		tabhead.on('click', '.nav-link[href="#peneliti_tab"]', function() {
			$('#pejabat_tbl').find('.kt-checkable, .kt-group-checkable').prop('checked', false);
			$('#tambah_post').attr('href', site_url + 'admin/dewan_riset?form=baru');
			$('#edit_post').attr('href', '#');
			$('#setuju').removeClass('d-none');
			$('#berkas').removeClass('d-none');
			$('#cetak').removeClass('d-none');
		});	

		tabhead.on('click', '.nav-link[href="#pejabat_tab"]', function() {
			$('#peneliti_tbl').find('.kt-checkable, .kt-group-checkable').prop('checked', false);
			$('#tambah_post').attr('href', site_url + 'admin/dewan_riset?pejabat=baru');
			$('#edit_post').attr('href', '#');
			$('#setuju').addClass('d-none');
			$('#berkas').addClass('d-none');
			$('#cetak').addClass('d-none');
		});
	}

	var current_tab = function(){
		var hash = window.location.hash;
		if(hash){
			$('a[href="'+hash+'"]').click();
		}
	        
	}

	var select = function(){
		table.on('change', '.kt-group-checkable', function() {
			var set = $(this).closest('table').find('td:first-child .kt-checkable');
			var checked = $(this).is(':checked');

			$(set).each(function() {
				if (checked) {
					$(this).prop('checked', true);
					$(this).closest('tr').addClass('active');
				}
				else {
					$(this).prop('checked', false);
					$(this).closest('tr').removeClass('active');
				}
			});
		});

		table.on('change', 'tbody tr .kt-checkbox', function() {
			$(this).parents('tr').toggleClass('active');
		});

		table.change(function(){
			var jml_cek = $('.kt-checkable').filter(':checked').length;
			if (jml_cek > 1) {
				$('#edit_post').addClass('d-none');
			}
			else{
				$('#edit_post').removeClass('d-none');	
			}
		}); 
	}

	var edit = function(){
		var edit_post = $('#edit_post');
		table.on('click', 'tbody tr .kt-checkable', function() {
			var tbl = $(this).closest('table').attr('id');
			var id = $(this).val();
			if (tbl == 'peneliti_tbl') {
				var link = 'admin/dewan_riset?form=';
			}

			if (tbl == 'pejabat_tbl') {
				var link = 'admin/dewan_riset?pejabat=';
			}

			if ($(this).filter(':checked').length == 1) {
				edit_post.attr('href', site_url + link + id);	
			}else{
				edit_post.attr('href', '#');	
			}
		});
	}

	var status = function(){
		var hapus_post = $('#hapus_post');
		var setuju = $('#setuju');
		var berkas = $('#berkas');

		hapus_post.on('click', function(){
			var tbl_name = $('.kt-checkable').filter(':checked').closest('table').attr('id');

			if (tbl_name == 'peneliti_tbl') {
				var link = site_url + 'hapus/dewan_riset';
			}

			if (tbl_name == 'pejabat_tbl') {
				var link = site_url + 'hapus/pejabat';
			}
			aksi(tbl_name, link);
		});

		setuju.on('click', function(){
			var link = site_url + 'simpan/setuju';
			aksi('peneliti_tbl', link);
		});

		berkas.on('click', function(){
			var link = site_url + 'simpan/berkas';
			aksi('peneliti_tbl', link);
		});
	}

	var cetak =  function(){
		var ctk = $('#cetak');
		ctk.on('click', function(){
			var checked = $('#peneliti_tbl').find('.kt-checkable').filter(':checked');
			var id = [];

			for (var i = 0; i < checked.length; i++) {
				id.push(checked[i].value);
			}

			var get = '?id=' + id.join(',');

			window.open(site_url + 'cetak' + get, '_blank');
			//console.log(get);
		});
	}

	var aksi =  function(tbl, link){
		var checked = $('#'+tbl+'').find('.kt-checkable').filter(':checked');
		var id = [];

		for (var i = 0; i < checked.length; i++) {
			id.push(checked[i].value);
		}
		//console.log(id);
        $.ajax({
            url: link,
            type: "POST",
            data: {id:id},
            dataType: "JSON",
            success: function (data) {
            	if(data.error==false){
                    swal.fire({
                        title: '',
                        text: data.message,
                        type: 'success',
                        timer: 1000,
                        showCancelButton: false,
                        showConfirmButton: false
                    });
                    //setTimeout(function(){window.location.reload()},1000);
                    $('#'+tbl+'').DataTable().ajax.reload();
                }
                if (data.error == true) {
                	swal.fire('Error','Data Gagal Dihapus','error');
                }
            }
        }); 
	}

	var initTable = function() {
		var peneliti_tbl = $('#peneliti_tbl');
			peneliti_tbl.DataTable({
				responsive: true,
				//autoWidth: false, 
				ajax: {
					url: site_url + '/data/peneliti',
					type: 'POST',
				},
				columns: [
					{data: 'cek'},
					{data: 'nama'},
					{data: 'hp'},
					{data: 'instansi'},
					{data: 'waktu'},
					{data: 'status'},
				],
				columnDefs: [
					{width: "5%", target: 0},
					{width: "20%", targets: 1},
					{width: "10%", targets: 2},
					{width: "40%", targets: 3},
					{width: "20%", targets: 4},
					{width: "10%", targets: 5},
			    ],
			});

		var pejabat_tbl = $('#pejabat_tbl');
			pejabat_tbl.DataTable({
				responsive: true,
				autoWidth: false, 
				ajax: {
					url: site_url + '/data/pejabat',
					type: 'POST',
				},
				columns: [
					{data: 'cek'},
					{data: 'pejabat'},
					{data: 'nip'},
					{data: 'jabatan'},
				],
				columnDefs: [
					{width: "5%", target: 0},
					{width: "40%", targets: 1},
					{width: "20%", targets: 2},
					{width: "35%", targets: 3},
			    ],
			});
	};

	return {
		//main function to initiate the module
		init: function() {
			initTable();
			ganti_tab();
			select();
			edit();
			status();
			cetak();
			current_tab();

		},
	};

}();
