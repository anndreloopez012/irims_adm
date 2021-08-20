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
                url: "ma_manageAccountRequests.php?ajax=true&validaciones=proces_update",
                success: function(r) {
                    if (r.status) {
                        if (r.status == 1) {
                            fntInsertUsuarios()
                            fntInsertFarmac()
                            fntInsertDfda()
                            $('#formData')[0].reset();
                            fntSelectTabla()
                            alertify.alert('AVISO', 'Datos cargados correctamente');
                            //location.reload(); 
                        }
                    } else {
                        $('#formData')[0].reset();
                        fntSelectTabla()
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

    function fntInsertUsuarios() {

        var datos = $('#formData').serialize();
        //alert(datos);
        //return false;

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "ma_manageAccountRequests.php?ajax=true&validaciones=proces_insert_usuarios",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                       // alertify.alert('AVISO', 'Datos cargados correctamente');
                        //location.reload(); 
                    }
                } else {
                   // alertify.alert('AVISO', 'no se pudo completar!');
                    //location.reload(); 
                }
            }
        });

        return false;
    };

    function fntInsertFarmac() {

        var datos = $('#formData').serialize();
        //alert(datos);
        //return false;

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "ma_manageAccountRequests.php?ajax=true&validaciones=proces_insert_farmac",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                       // alertify.alert('AVISO', 'Datos cargados correctamente');
                        //location.reload(); 
                    }
                } else {
                   // alertify.alert('AVISO', 'no se pudo completar!');
                    //location.reload(); 
                }
            }
        });

        return false;
    };

    function fntInsertDfda() {

        var datos = $('#formData').serialize();
        //alert(datos);
        //return false;

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "ma_manageAccountRequests.php?ajax=true&validaciones=proces_insert_dfda",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        //alertify.alert('AVISO', 'Datos cargados correctamente');
                        //location.reload(); 
                    }
                } else {
                    //alertify.alert('AVISO', 'no se pudo completar!');
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

            url: "ma_manageAccountRequests.php?validaciones=busqueda_tabla",
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

            url: "ma_manageAccountRequests.php?validaciones=dfda_section",
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

        var strRif = $("#rif").val();

        //alert(strCategori + "                                  strCategori");

        $.ajax({

            url: "ma_manageAccountRequests.php?validaciones=data_company",
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

        var strCod = $("#codigo_des").val();

        //alert(strCategori + "                                  strCategori");

        $.ajax({

            url: "ma_manageAccountRequests.php?validaciones=vus_solreg_ids",
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

    function fntDibujoDowload() {

        var strVus_solreg_id = $("#codigo_des").val();
        var strVus_solreg_fecsol = $("#fecsol").val();

        var strTipcta_desc = $("#data_tipcta_desc").val();

        var strDoc1 = $("#doc1").val();
        var strDoc2 = $("#doc2").val();
        var strDoc3 = $("#doc3").val();
        var strDoc4 = $("#doc4").val();
        var strDoc5 = $("#doc5").val();
        var strDoc6 = $("#doc6").val();
        var strDoc7 = $("#doc7").val();
        var strDoc8 = $("#doc8").val();
        var strDoc9 = $("#doc9").val();

        //alert(strCategori + "                                  strCategori");

        $.ajax({

            url: "ma_manageAccountRequests.php?validaciones=data_dowload",
            data: {
                vus_solreg_id: strVus_solreg_id,
                vus_solreg_fecsol: strVus_solreg_fecsol,

                tipcta_desc: strTipcta_desc,

                doc1: strDoc1,
                doc2: strDoc2,
                doc3: strDoc3,
                doc4: strDoc4,
                doc5: strDoc5,
                doc6: strDoc6,
                doc7: strDoc7,
                doc8: strDoc8,
                doc9: strDoc9,
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