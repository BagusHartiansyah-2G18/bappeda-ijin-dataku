"use strict";
var KTWizard2 = function () {
// ================= Identifikasi ====================      
    var wizardEl;
    var formEl;
    var validator;
    var wizard;
    var tipe = $('#tipe');
    var link_m = $('#link_m');
    var link_mv = '';

    var initWizard = function () {
        wizard = new KTWizard('kt_wizard_v2', {
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
                menu: {
                    required: true
                },
                link: {
                    required: true
                }
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

    var initTipe = function(){
        tipe.on('change', function(){
            if (tipe.val() == 'blank') {
                link_mv = '<input type="text" id="link" value="'+link_menu+'" name="link" placeholder="Masukan Link" class="form-control">';
                link_m.html(link_mv);
            }

            if (tipe.val() == 'kategori') {
                $.ajax({
                    type  : 'POST',
                    url   : site_url + 'data/get_m_kat',
                    dataType: "json",
                    async : false,
                    contentType: "application/json",
                    success : function(data){
                        var html = '';
                        html += data;
                        link_m.html(html);
                    }
                });
            }

            if (tipe.val() == 'page') {
                $.ajax({
                    type  : 'POST',
                    url   : site_url + 'data/get_m_page',
                    dataType: "json",
                    async : false,
                    contentType: "application/json",
                    success : function(data){
                        var html = '';
                        html += data;
                        link_m.html(html);
                    }
                });
            }
        }).change();
    }
    

    var initSubmit = function() {
        var btn = formEl.find('[data-ktwizard-type="action-submit"]');

        btn.on('click', function(e) {
            e.preventDefault();
            //Swal.showLoading();

            if (validator.form()) {
                KTApp.progress(btn);
                formEl.ajaxSubmit({
                    type : "POST",
                    dataType : "JSON",
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
            wizardEl = KTUtil.get('kt_wizard_v2');
            formEl = $('#kt_form');

            initWizard();
            initValidation();
            initSubmit();
            initTipe();
        }
    };
}();

jQuery(document).ready(function() {
    KTWizard2.init();
});
