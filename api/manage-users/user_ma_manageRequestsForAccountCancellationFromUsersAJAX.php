<script>
    //update delete e insert
    function fntUpdateSolicitudes() {

        alertify.confirm('AVISO', 'Seguro que desea continuar? ', function() {
            var datos = $('#formData').serialize();
            //alert(datos);
            //return false;

            $.ajax({
                type: "POST",
                data: datos,
                dataType: 'json',
                url: "ma_manageRequestsForAccountCancellationFromUsers.php?ajax=true&validaciones=proces_update_solicitudes",
                success: function(r) {
                    if (r.status) {
                        if (r.status == 1) {
                            fntUpdateUsuario()
                            fntDibujoTabla()
                            $('#formData')[0].reset();
                            fntSelectTabla()
                            alertify.alert('AVISO', 'Datos procesados correctamente');
                            //location.reload(); 
                        }
                        if (r.status == 2) {
                            //fntUpdateUsuario()
                            fntDibujoTabla()
                            $('#formData')[0].reset();
                            fntSelectTabla()
                            alertify.alert('AVISO', 'Datos rechazada correctamente');
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

    function fntUpdateUsuario() {

            var datos = $('#formData').serialize();
            //alert(datos);
            //return false;

            $.ajax({
                type: "POST",
                data: datos,
                dataType: 'json',
                url: "ma_manageRequestsForAccountCancellationFromUsers.php?ajax=true&validaciones=proces_update_usuario",
                success: function(r) {
                    if (r.status) {
                        if (r.status == 1) {
                            alertify.alert('AVISO', 'Datos procesados correctamente');
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

            url: "ma_manageRequestsForAccountCancellationFromUsers.php?validaciones=busqueda_tabla",
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

    function fntDibujoDfdaSection() {

        var strProducto = $("#categori").val();
        //alert(strCategori + "                                  strCategori");

        $.ajax({

            url: "ma_manageRequestsForAccountCancellationFromUsers.php?validaciones=dfda_section",
            data: {
                producto: strProducto,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#divSection").html("");
                $("#divSection").html(data);

                return false;
            }
        });

    };

    function fntDibujoCompany() {

        var strRif= $("#rif").val();

        //alert(strCategori + "                                  strCategori");

        $.ajax({

            url: "ma_manageRequestsForAccountCancellationFromUsers.php?validaciones=data_company",
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
    
    function fntDibujoIdSolReg() {

        var strCod= $("#codigo_des").val();

        //alert(strCategori + "                                  strCategori");

        $.ajax({

            url: "ma_manageRequestsForAccountCancellationFromUsers.php?validaciones=vus_solreg_ids",
            data: {
                hid_codigo_des: strCod,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#divSection").html("");
                $("#divSection").html(data);

                return false;
            }
        });

    };
   
    window.addEventListener('load', fntDibujoTabla, false)
</script>