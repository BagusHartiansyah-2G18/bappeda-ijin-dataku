"use strict";
jQuery(document).ready(function() {
	MyDatatable.init();
});

var MyDatatable = function(){
// ================= Identifikasi ====================		
	var table = $('.kt-portlet__body');
	var tabhead = $('.kt-portlet__head');
	var menu_tbl = $('#menu_tbl');
	var slide_tbl = $('#slide_tbl');
	var pengguna_tbl = $('#pengguna_tbl');
	var tambah = $('#tambah');
	var edit = $('#edit');
	var hapus = $('#hapus');
// ================= Tambahan ====================		
	var ganti_tab = function(){
		tabhead.on('click', '.nav-link[href="#menu_tab"]', function() {
			slide_tbl.find('.kt-checkable, .kt-group-checkable').prop('checked', false);
			pengguna_tbl.find('.kt-checkable, .kt-group-checkable').prop('checked', false);
			tambah.attr('href', site_url + 'admin/pengaturan?menu=baru');
			edit.attr('href', '#');
			edit.removeClass('d-none');
		});	

		tabhead.on('click', '.nav-link[href="#slide_tab"]', function() {
			menu_tbl.find('.kt-checkable, .kt-group-checkable').prop('checked', false);
			pengguna_tbl.find('.kt-checkable, .kt-group-checkable').prop('checked', false);
			tambah.attr('href', site_url + 'admin/pengaturan?slide=baru');
			edit.attr('href', '#');
			edit.removeClass('d-none');
		});

		tabhead.on('click', '.nav-link[href="#pengguna_tab"]', function() {
			menu_tbl.find('.kt-checkable, .kt-group-checkable').prop('checked', false);
			slide_tbl.find('.kt-checkable, .kt-group-checkable').prop('checked', false);
			tambah.attr('href', site_url + 'admin/pengaturan?user=baru');
			edit.attr('href', '#');
			edit.removeClass('d-none');
		});
	}

	var current_tab = function(){
		var hash = window.location.hash;
		if(hash){
			$('a[href="'+hash+'"]').click();
		}
	        
	}
// ================= CRUD ====================	
	var initSelect = function(){
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
				edit.addClass('d-none');
			}
			else{
				edit.removeClass('d-none');	
			}
		}); 
	}

	var initEdit = function(){
		table.on('click', 'tbody tr .kt-checkable', function() {
			var tbl = $(this).closest('table').attr('id');
			var id = $(this).val();
			if (tbl == 'menu_tbl') {
				var link = 'admin/pengaturan?menu=';
			}

			if (tbl == 'slide_tbl') {
				var link = 'admin/pengaturan?slide=';
			}

			if (tbl == 'pengguna_tbl') {
				var link = 'admin/pengaturan?user=';
			}

			if ($(this).filter(':checked').length == 1) {
				edit.attr('href', site_url + link + id);	
			}else{
				edit.attr('href', '#');	
			}
		});
	}

	var initHapus = function(){
		hapus.on('click', function(){
			var tbl_name = $('.kt-checkable').filter(':checked').closest('table').attr('id');

			if (tbl_name == 'menu_tbl') {
				var link = site_url + 'hapus/menu';
			}

			if (tbl_name == 'slide_tbl') {
				var link = site_url + 'hapus/slide';
			}

			if (tbl_name == 'pengguna_tbl') {
				var link = site_url + 'hapus/pengguna';
			}

			aksi(tbl_name, link);
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

// ================= List Tabel ====================	
	var initTable = function(){
		menu_tbl.DataTable({
			responsive: true,
			autoWidth: true, 
			ajax: {
				url: site_url + '/data/menu',
				type: 'POST',
			},
			columns: [
				{data: 'cek'},
				{data: 'nama'},
				{data: 'parent'},
				{data: 'urut'},
				{data: 'link'},
				{data: 'tipe'}
			],
			columnDefs: [
				{width: "5%", target: 0},
				{width: "10%", targets: 3},
				{width: "30%", targets: 4},
				{width: "10%", targets: 5}
		    ],
		});

		
		slide_tbl.DataTable({
			responsive: false,
			autoWidth: false, 
			ajax: {
				url: site_url + '/data/slide',
				type: 'POST',
			},
			columns: [
				{data: 'cek'},
				{data: 'gambar'},
				{data: 'judul'},
				{data: 'link'},
			],
			columnDefs: [
				{ width: "5%", target: 0 },
				{ width: "10%", targets: 1 },
				{ width: "45%", targets: 2 },
				{ width: "40%", targets: 3 },
		    ],
		});

		pengguna_tbl.DataTable({
			responsive: false,
			autoWidth: false, 
			ajax: {
				url: site_url + '/data/pengguna',
				type: 'POST',
			},
			columns: [
				{data: 'cek'},
				{data: 'username'},
				{data: 'nama'},
				{data: 'email'},
			],
			columnDefs: [
				{ width: "5%", target: 0 },
				{ width: "35%", targets: 1 },
				{ width: "35%", targets: 2 },
				{ width: "25%", targets: 3 },
		    ],
		});
	}
// ================= End List Tabel ====================

	return {
		//main function to initiate the module
		init: function() {
			initTable();
			ganti_tab();
			current_tab();
			initSelect();
			initEdit();
			initHapus();
		},
	};

}();
