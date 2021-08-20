<script>
    //update delete e insert
    function fntUpdateInsert() {

        alertify.confirm('AVISO', 'Seguro que desea continuar? ', function() {
            var datos = $('#formData').serialize();
            //alert(datos);
            //return false;

            $.ajax({
                type: "POST",
                data: datos,
                dataType: 'json',
                url: "ma_swapApplicationsBetweenUsersFromUsers.php?ajax=true&validaciones=proces",
                success: function(r) {
                    if (r.status) {
                        if (r.status == 1) {

                            $('#formData')[0].reset();
                            fntSelectTabla()
                            alertify.alert('AVISO', 'Datos cargados correctamente');
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

    function fntDibujoTabla() {

        var strCategori = $("#categori").val();
        var $strSearch = $("#Search").val();
        $("#unit_").val(strCategori);

        //alert(strCategori + "                                  strCategori");

        $.ajax({

            url: "ma_swapApplicationsBetweenUsersFromUsers.php?validaciones=busqueda_tabla",
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


    function fntDibujoTablaUsuarios() {

        var strCategori = $("#categori").val();
        var $strSearch = $("#SearchUser").val();
        var $strUser = $("#codigo_des").val();
        $("#unit_").val(strCategori);

        //alert(strCategori + "                                  strCategori");

        $.ajax({

            url: "ma_swapApplicationsBetweenUsersFromUsers.php?validaciones=busqueda_tabla_usuarios",
            data: {
                categori : strCategori,
                Search : $strSearch,
                User : $strUser,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#TablaUsuarios").html("");
                $("#TablaUsuarios").html(data);

                return false;
            }
        });

    };

    

  
    window.addEventListener('load', fntDibujoTabla, false)
</script>