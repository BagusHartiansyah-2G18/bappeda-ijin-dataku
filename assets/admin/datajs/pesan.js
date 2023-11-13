"use strict";
jQuery(document).ready(function() {
	Pesan.init();
});

var Pesan = function() {

	var hapus =  function(){
		$('#hapus').on('click', function(){
			var checked = $('.kt-checkable').filter(':checked');
			var id = [];

			for (var i = 0; i < checked.length; i++) {
				id.push(checked[i].value);
			}

			$.ajax({
	            url: site_url + '/hapus/pesan',
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
	                    setTimeout(function(){window.location.reload()},1000);
	                }
	                if (data.error == true) {
	                	swal.fire('Error','Data Gagal Dihapus','error');
	                }
	            }
	        });
		});

		
        
	}

	return {
		//main function to initiate the module
		init: function() {
			hapus();
		},
	};

}();
