"use strict";

var KTWizard3 = function () {
    var wizardEl;
    var formEl;
    var validator;
    var wizard;

    var initWizard = function () {
        wizard = new KTWizard('kt_wizard_v3', {
            startStep: 1,
            clickableSteps: true
        });

        wizard.on('beforeNext', function(wizardObj) {
            if (validator.form() !== true) {
                wizardObj.stop();
            }
        });

        wizard.on('beforePrev', function(wizardObj) {
            if (validator.form() !== true) {
                wizardObj.stop();
            }
        });

        wizard.on('change', function(wizard) {
            KTUtil.scrollTop();
        });
    }

    var initValidation = function() {
        validator = formEl.validate({
            ignore: ":hidden",

            rules: {
                //= Step 1
                judul: {
                    required: true
                },
                id_kategori: {
                    required: true
                },
            },

            invalidHandler: function(event, validator) {
                KTUtil.scrollTop();
                swal.fire({
                    "title": "",
                    "text": "Ada beberapa kesalahan dalam Permohonan anda. Mohon diperbaiki",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary"
                });
            },

            submitHandler: function (form) {

            }
        });
    }

    var initTinymce = function(){
        tinymce.init({
            mode : "textareas",
            //menubar : false,
            forced_root_block : false,
            force_br_newlines : true,
            force_p_newlines : false,
            height: 500,
            plugins: [
                 "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                 "searchreplace wordcount visualblocks visualchars code fullscreen",
                 "insertdatetime nonbreaking save table directionality",
                 "emoticons template paste  textpattern responsivefilemanager"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image responsivefilemanager",

            external_filemanager_path: base_url + "/filemanager/",
            filemanager_title:"Responsive Filemanager" ,
            external_plugins: { "filemanager" : base_url + "/filemanager/plugin.min.js"},
            image_advtab: true,        
        });
    }

    var initKat = function(){
        if (tipe == 'post') {
            $('#kategori').removeClass('d-none');
        }
        else{
            $('#kategori').addClass('d-none');
        }
    }

    var initSubmit = function() {
        var btn = formEl.find('[data-ktwizard-type="action-submit"]');

        btn.on('click', function(e) {
            var isi = tinymce.get('isi').getContent();
            e.preventDefault();

            if (validator.form()) {
                KTApp.progress(btn);
                formEl.ajaxSubmit({
                    type : "POST",
                    dataType : "JSON",
                    data : {isi : isi},
                    success: function(data) {
                        KTApp.unprogress(btn);
                        if(data.error==false){
                            swal.fire({
                                title: '',
                                text: data.message,
                                type: 'success',
                                showCancelButton: false,
                                showConfirmButton: false
                            });
                            setTimeout(function(){window.location.reload()},1000);
                        }
                        if (data.error == true) {
                            swal.fire('Error','Gagal Disimpan','error');
                        }
                    }
                });
            }
        });
    }

    return {
        init: function() {
            wizardEl = KTUtil.get('kt_wizard_v3');
            formEl = $('#kt_form');

            initWizard();
            initValidation();
            initTinymce();
            initSubmit();
            initKat();
        }
    };
}();

jQuery(document).ready(function() {
    KTWizard3.init();
});