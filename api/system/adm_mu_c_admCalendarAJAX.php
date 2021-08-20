<script>
    //update delete e insert
    function fntUpdateInsert() {

        alertify.confirm('Areas Of Products', 'Are you sure you wish to continue?  ', function() {
            var datos = $('#formData').serialize();
            //alert(datos);
            //return false;

            $.ajax({
                type: "POST",
                data: datos,
                dataType: 'json',
                url: "mu_c_admCalendar.php?ajax=true&validaciones=insert",
                success: function(r) {
                    if (r.status) {
                        if (r.status == 1) {
                            alertify.alert('Areas Of Products', 'Data successfully updloaded');
                            //location.reload();
                        }
                    } else {
                        alertify.alert('Areas Of Products', 'could not be completed!');
                        //location.reload();
                    }
                }
            });
        }, function() {
            alertify.error('Cancel')
        })
        return false;
    };


    function fntDelete() {

        alertify.confirm('Areas Of Products', 'Are you sure you wish to continue?  ', function() {
            var datos = $('#formData').serialize();
            //alert(datos);
            //return false;

            $.ajax({
                type: "POST",
                data: datos,
                dataType: 'json',
                url: "mu_c_admCalendar.php?ajax=true&validaciones=delete",
                success: function(r) {
                    if (r.status) {
                        if (r.status == 1) {
                            alertify.alert('Areas Of Products', 'Data successfully updloaded');
                            //location.reload();
                        }
                    } else {
                        alertify.alert('Areas Of Products', 'could not be completed!');
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

        var strSearch = $("#Search").val();
        var strCategori = $("#categori").val();
        $("#unit_").val(strCategori);

        //alert(strCategori + "                                  strCategori");

        $.ajax({

            url: "mu_c_admCalendar.php?validaciones=busqueda_tabla",
            data: {
                categori: strCategori,
                Search: strSearch,
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

    window.addEventListener('load', fntDibujoTabla, false)
</script>