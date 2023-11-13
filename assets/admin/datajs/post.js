"use strict";

var MyDatatable = function() {

// ================= Identifikasi ====================		
	var table = $('.kt-portlet__body');
	var tabhead = $('.kt-portlet__head');
	var post_tbl = $('#post_tbl');
	var page_tbl = $('#page_tbl');
	var kategori = $('#kat_tbl');
	var tambah = $('#tambah');
	var edit = $('#edit');
	var hapus = $('#hapus');
	var cari = $('.cari');
// ================= Tambahan ====================		
	var ganti_tab = function(){
		tabhead.on('click', '.nav-link[href="#post_tab"]', function() {
			page_tbl.find('.kt-checkable, .kt-group-checkable').prop('checked', false);
			kategori.find('.kt-checkable, .kt-group-checkable').prop('checked', false);
			tambah.attr('href', site_url + 'admin/post?post=baru');
			edit.attr('href', '#');
			edit.removeClass('d-none');
			cari.val('');
			$('.kt-subheader__search').removeClass('d-none');
		});	

		tabhead.on('click', '.nav-link[href="#page_tab"]', function() {
			post_tbl.find('.kt-checkable, .kt-group-checkable').prop('checked', false);
			kategori.find('.kt-checkable, .kt-group-checkable').prop('checked', false);
			tambah.attr('href', site_url + 'admin/post?page=baru');
			edit.attr('href', '#');
			edit.removeClass('d-none');
			cari.val('');
			$('.kt-subheader__search').removeClass('d-none');
		});

		tabhead.on('click', '.nav-link[href="#kat_tab"]', function() {
			post_tbl.find('.kt-checkable, .kt-group-checkable').prop('checked', false);
			page_tbl.find('.kt-checkable, .kt-group-checkable').prop('checked', false);
			tambah.attr('href', site_url + 'admin/post?kat=baru');
			edit.attr('href', '#');
			edit.removeClass('d-none');
			$('.kt-subheader__search').addClass('d-none');
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
			if (tbl == 'post_tbl') {
				var link = 'admin/post?post=';
			}

			if (tbl == 'page_tbl') {
				var link = 'admin/post?page=';
			}

			if (tbl == 'kat_tbl') {
				var link = 'admin/post?kat=';
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

			if (tbl_name == 'post_tbl') {
				var link = site_url + 'hapus/post';
			}

			if (tbl_name == 'page_tbl') {
				var link = site_url + 'hapus/post';
			}

			if (tbl_name == 'kat_tbl') {
				var link = site_url + 'hapus/kategori';
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
	var initTable = function() {
		tabhead.on('click', '.nav-link[href="#post_tab"]', function() {
			cari.attr('id', 'cari_page');
			$('#cari_post').on('keyup change', function () {
				tbl_post.column(1).search($(this).val()).draw();
			});
		});

		tabhead.on('click', '.nav-link[href="#page_tab"]', function() {
			cari.attr('id', 'cari_page');
			$('#cari_page').on('keyup change', function () {
				tbl_page.column(1).search($(this).val()).draw();
			});
		});

		$('#cari_post').on('keyup change', function () {
			tbl_post.column(1).search($(this).val()).draw();
		});

		var tbl_post = post_tbl.DataTable({
            columnDefs : [{
            	targets : 0,
            	orderable : true
            }],
            processing : true,
            serverSide : true,
            ajax : site_url + '/data/post/post',
            dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            //"searching": false
        });

		var tbl_page = page_tbl.DataTable({
            columnDefs : [{
            	targets : 0,
            	orderable : true
            }],
            processing : true,
            serverSide : true,
            ajax : site_url + '/data/post/page',
            dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            //"searching": false
        });

        kategori.DataTable({
			responsive: false,
			autoWidth: false, 
			ajax: {
				url: site_url + '/data/kategori',
				type: 'POST',
			},
			columns: [
				{data: 'cek'},
				{data: 'kategori'},
				{data: 'jml_post'},
			],
			columnDefs: [
				{ width: "5%", target: 0 },
				{ width: "80%", targets: 1 },
				{ width: "15%", targets: 2 },
		    ],
		});

		
	};

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

jQuery(document).ready(function() {
	MyDatatable.init();
});
