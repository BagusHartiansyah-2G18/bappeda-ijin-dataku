"use strict";

// Class definition
var KTWizard2 = function () {
    // Base elements
    var wizardEl;
    var formEl;
    var validator;
    var wizard;
    var avatar1 = new KTAvatar('kt_user_avatar_1');

    // Private functions
    var initWizard = function () {
        // Initialize form wizard
        wizard = new KTWizard('kt_wizard_v2', {
            startStep: 1, // initial active step number
            clickableSteps: true  // allow step clicking
        });

        // Validation before going to next page
        wizard.on('beforeNext', function(wizardObj) {
            if (validator.form() !== true) {
                wizardObj.stop();  // don't go to the next step
            }
        });

        wizard.on('beforePrev', function(wizardObj) {
            if (validator.form() !== true) {
                wizardObj.stop();  // don't go to the next step
            }
        });

        // Change event
        wizard.on('change', function(wizard) {
            KTUtil.scrollTop();
        });
    }

    var initValidation = function() {
        validator = formEl.validate({
            // Validate only visible fields
            ignore: ":hidden",

            // Validation rules
            rules: {
                //= Step 1
                pengantar: {
                    required: true
                },
                
                //= Step 2
                nama: {
                    required: true
                },
                nim_npm: {
                    required: true
                },
                hp: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                no_identitas: {
                    required: true
                },

                //= Step 3
                instansi: {
                    required: true
                },
                fakultas: {
                    required: true
                },
                prodi: {
                    required: true
                },
                kab_instansi: {
                    required: true
                },

                //= Step 4
                lokasi: {
                    required: true
                },
                judul: {
                    required: true
                },
                tujuan: {
                    required: true
                },
                start: {
                    required: true
                },
                end: {
                    required: true
                },

                //= Step 5
                photo: {
                    required: (photo == '') ? true : false,
                    extension: "png|jpg",
                    filesize: 1048576
                },
                ktp: {
                    required: (ktp == '') ? true : false,
                    extension: "png|jpg",
                    filesize: 1048576
                },
                surat: {
                    required: (surat == '') ? true : false,
                    extension: "png|jpg",
                    filesize: 1048576
                },
                proposal: {
                    required: (proposal == '') ? true : false,
                    extension: "pdf",
                    filesize: 2048576
                },

                //= Step 6
                no_surat: {
                    required: true
                },
                tembusan: {
                    required: true
                },
                tgl_ttd: {
                    required: true
                },
            },

            messages: {
                photo: "File harus JPG atau PNG, Max 1 MB",
                ktp: "File harus JPG atau PNG, Max 1 MB",
                surat: "File harus JPG atau PNG, Max 1 MB",
                proposal: "File harus PDF, Max 2 MB"
            },

            // Display error
            invalidHandler: function(event, validator) {
                KTUtil.scrollTop();

                swal.fire({
                    "title": "",
                    "text": "Ada beberapa kesalahan dalam Permohonan anda. Mohon diperbaiki",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary"
                });
            },

            // Submit valid form
            submitHandler: function (form) {

            }
        });
    }

    var initSubmit = function() {
        var btn = formEl.find('[data-ktwizard-type="action-submit"]');

        btn.on('click', function(e) {
            e.preventDefault();
            //Swal.showLoading();

            if (validator.form()) {
                // See: src\js\framework\base\app.js
                KTApp.progress(btn);
                //KTApp.block(formEl);

                // See: http://malsup.com/jquery/form/#ajaxSubmit
                formEl.ajaxSubmit({
                    type : "POST",
                    dataType : "JSON",
                    success: function(data) {
                        KTApp.unprogress(btn);
                        //KTApp.unblock(formEl);
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

    var instansi = function(){
        var ji = $('#jenis_instansi');

        if (ji.val()  == 1) {
            $('#l_instansi').html('Nama Universitas');
            $('#instansi').attr('placeholder', 'Nama Universitas');
            $('#unv').removeClass('d-none');
        }

        if (ji.val()  == 2) {
            $('#l_instansi').html('Nama Instansi');
            $('#instansi').attr('placeholder', 'Nama Instansi');
            $('#unv').addClass('d-none');
        }

        ji.on('change',instansi);
    }

    var tanggal = function(){
       $('#kt_datepicker_5').datepicker({
            todayHighlight: true,
            format: 'yyyy-mm-dd',
        });

        $('#tgl_ttd').datepicker({
            todayHighlight: true,
            format: 'yyyy-mm-dd',
        });
    }

    return {
        // public functions
        init: function() {
            wizardEl = KTUtil.get('kt_wizard_v2');
            formEl = $('#kt_form');

            initWizard();
            initValidation();
            initSubmit();
            instansi();
            tanggal();
        }
    };
}();

jQuery(document).ready(function() {
    KTWizard2.init();
});
