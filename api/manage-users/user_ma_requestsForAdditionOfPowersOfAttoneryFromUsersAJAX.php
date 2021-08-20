<script>
    //update delete e insert
    function fntUpdate() {

        alertify.confirm('AVISO', 'Seguro que desea continuar? ', function() {
            var datos = $('#formData').serialize();
            //alert(datos);
            //return false;

            $.ajax({
                type: "POST",
                data: datos,
                dataType: 'json',
                url: "ma_requestsForAdditionOfPowersOfAttoneryFromUsers.php?ajax=true&validaciones=proces_update",
                success: function(r) {
                    if (r.status) {
                        if (r.status == 1) {
                            fntSelectTabla()
                            
                            fntProcesInsert()

                            $('#formData')[0].reset();
                            fntSelectTabla()
                            alertify.alert('AVISO', 'Datos cargados correctamente');
                            //location.reload(); 
                        }
                        if (r.status == 2) {
                            //fntProsesDelete()
                            fntSelectTabla()
                            alertify.alert('AVISO', 'Datos rechazados correctamente');
                            //location.reload(); 
                        }
                    } else {
                        alertify.alert('AVISO', 'no se pudo completar!');
                        //location.reload(); 
                    }
                }
            });
        }, function() {
            alertify.error('Cancel')
        })
        return false;
    };


    function fntProcesInsert() {

        var datos = $('#formData').serialize();
        //alert(datos);
        //return false;

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "ma_requestsForAdditionOfPowersOfAttoneryFromUsers.php?ajax=true&validaciones=proces_insert_poderes",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        //fntDibujoTabla()
                        //fntUpdate()
                        //alertify.alert('AVISO', 'Datos cargados correctamente');
                        //location.reload(); 
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                    //location.reload(); 
                }
            }
        });
        return false;
    };

   

    function fntDibujoTabla() {

        var strCategori = $("#categori").val();
        var $strSearch = $("#Search").val();
        $("#unit_").val(strCategori);

        //alert(strCategori + "                                  strCategori");

        $.ajax({

            url: "ma_requestsForAdditionOfPowersOfAttoneryFromUsers.php?validaciones=busqueda_tabla",
            data: {
                categori: strCategori,
                Search: $strSearch,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#Tabla").html("");
                $("#Tabla").html(data);

                return false;
            }
        });

    };

    function fntDibujoCompany() {

        var strRif= $("#rif").val();

        //alert(strCategori + "                                  strCategori");

        $.ajax({

            url: "ma_requestsForAdditionOfPowersOfAttoneryFromUsers.php?validaciones=data_company",
            data: {
                rif: strRif,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#divCompany").html("");
                $("#divCompany").html(data);

                var strhid_nombre = $("#hid_nombre").val();
                var strhid_tels = $("#hid_tels").val();
                var strhid_fax = $("#hid_fax").val();
                var strhid_email1s = $("#hid_email1").val();
                var strhid_email2 = $("#hid_email2").val();
                var strhid_pweb = $("#hid_pweb").val();

                $("#nombre").val(strhid_nombre);
                $("#tels").val(strhid_tels);
                $("#fax").val(strhid_fax);
                $("#email1").val(strhid_email1s);
                $("#email2").val(strhid_email2);
                $("#pweb").val(strhid_pweb);

                return false;
            }
        });

    };


    function fntDibujoDowload() {

        var strCodId = $("#codId").val();

        //alert(strCategori + "                                  strCategori");

        $.ajax({

            url: "ma_requestsForAdditionOfPowersOfAttoneryFromUsers.php?validaciones=data_dowload",
            data: {
                CodId: strCodId,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#dowload").html("");
                $("#dowload").html(data);

                return false;
            }
        });

    };
    window.addEventListener('load', fntDibujoTabla, false)
</script>