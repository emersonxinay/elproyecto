
/**
* Theme: Ubold Admin Template
* Author: Coderthemes
* SweetAlert
*/

!function ($) {
    "use strict";

    var SweetAlert = function () {
    };

    //examples
    SweetAlert.prototype.init = function () {

        //Basic
        $('#sa-basic').click(function () {
            swal("Aqui hay un mensaje!");
        });

        //A title with a text under
        $('#sa-title').click(function () {
            swal("Aqui hay un mensaje!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis")
        });

        //Success Message
        $('#sa-success').click(function () {
            swal("Buen Trabajo", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis", "success")
        });

        //Warning Message
        $('#sa-warning').click(function () {
            swal({
                title: "¿Estás seguro?",
                text: "¡No podrás recuperar este archivo!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-warning',
                confirmButtonText: "Si, Borrarlo",
                closeOnConfirm: false
            }, function () {
                swal("Eliminado", "Su archivo ah sido Eliminado", "éxito");
            });
        });

        //Parameter
        $('#sa-params').click(function () {
            swal({
                title: "¿Estas Seguro?",
                text: "No podras recuperar este archivo!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, borrarlo",
                cancelButtonText: "No, cancela",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    swal("Eliminado", "Su archivo ha sido Eliminado.", "éxito");
                } else {
                    swal("Cancelar", "Tu archivo es Seguro:)", "error");
                }
            });
        });

        //Custom Image
        $('#sa-image').click(function () {
            swal({
                title: "Dulce!",
                text: "Aqui hay una imagen personalizada.",
                imageUrl: "assets/plugins/bootstrap-sweetalert/thumbs-up.jpg"
            });
        });

        //Auto Close Timer
        $('#sa-close').click(function () {
            swal({
                title: "Alerta de Cierre automatico",
                text: "Cerrara en dos segundos.",
                timer: 2000,
                showConfirmButton: false
            });
        });

        //Primary
        $('#primary-alert').click(function () {
            swal({
                title: "¿Estas seguro?",
                text: "No podras recuperar este Archivo",
                type: "info",
                showCancelButton: true,
                cancelButtonClass: 'btn-white btn-md waves-effect',
                confirmButtonClass: 'btn-primary btn-md waves-effect waves-light',
                confirmButtonText: 'Primary!'
            });
        });

        //Info
        $('#info-alert').click(function () {
            swal({
                title: "¿Estas Seguro",
                text: "No podras recuperar este archivo",
                type: "info",
                showCancelButton: true,
                cancelButtonClass: 'btn-white btn-md waves-effect',
                confirmButtonClass: 'btn-info btn-md waves-effect waves-light',
                confirmButtonText: 'Info!'
            });
        });

        //Success
        $('#success-alert').click(function () {
            swal({
                title: "¿Estas Seguro?",
                text: "No podras recuperar este archivo!",
                type: "success",
                showCancelButton: true,
                cancelButtonClass: 'btn-white btn-md waves-effect',
                confirmButtonClass: 'btn-success btn-md waves-effect waves-light',
                confirmButtonText: 'Success!'
            });
        });

        //Warning
        $('#warning-alert').click(function () {
            swal({
                title: "¿Estas Seguro?",
                text: "No podras Recuperar este archivo! ",
                type: "warning",
                showCancelButton: true,
                cancelButtonClass: 'btn-white btn-md waves-effect',
                confirmButtonClass: 'btn-warning btn-md waves-effect waves-light',
                confirmButtonText: 'Warning!'
            });
        });

        //Danger
        $('#danger-alert').click(function () {
            swal({
                title: "¿Estas Seguro?",
                text: "No podras recuperar este archivo!",
                type: "error",
                showCancelButton: true,
                cancelButtonClass: 'btn-white btn-md waves-effect',
                confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
                confirmButtonText: 'Danger!'
            });
        });


    },
        //init
        $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing
    function ($) {
        "use strict";
        $.SweetAlert.init()
    }(window.jQuery);