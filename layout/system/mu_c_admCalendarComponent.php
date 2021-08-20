<section class="content col-lg-12"><br>
    <div class="container-fluid" id="contenido">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="cont col-lg-8">
                <form id="formData" method="POST">
                    <ul class="nav nav-pills nav-fill btn-dark">
                        <li class="nav-item">
                            <button type="button" id="insert" onclick="fntUpdateInsert()" id="save" class="btn btn-dark btn-block">Save</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" id="replace" onclick="fntReplace()" class="btn btn-dark btn-block">Replace</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" id="delete" onclick="fntDelete()" class="btn btn-dark btn-block">Delete</button>
                        </li>
                        <li class="nav-item">
                            <button type="reset" id="clear" onclick="activarInputCode()" class="btn btn-dark btn-block ">Clear Fields</button>
                        </li>
                        <li class="nav-item">
                            <a href="index.php" class="btn btn-dark btn-block "><i class="fas fa-2x fa-window-close"></i></a>
                        </li>
                    </ul><br>

                    <div class="form-group row">
                        <label for="start" class="col-sm-3 col-form-label">Start date</label>
                        <div class="col-sm-2">
                            <input class="form-control " name="id" id="id" type="hidden">
                            <input class="form-control " name="start" id="start" type="date">
                        </div>
                        <label for="end" class="col-sm-3 col-form-label">End date</label>
                        <div class="col-sm-2">
                            <input class="form-control " name="end" id="end" type="date">
                        </div>
                        <div class="div1 col-12">
                            <div id="Tabla" name="Tabla">
                                <!-- DIBUJO DE TABLA CATEGORIA PRODUCTO-->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    //FOCUS AL INICIAR PANTALLA
    //INICIO DE BOTONES INSERT REPLACE DELETE CLEAR
    document.getElementById('replace').disabled = true;
    document.getElementById('delete').disabled = true;
    //INICIO DE BOTONES DEL NAV
    document.getElementById('home').style.display = 'block';
    document.getElementById('back').style.display = 'block';
    document.getElementById('docOne').style.display = 'none';
    document.getElementById('docTwo').style.display = 'none';
    document.getElementById('window').style.display = 'block';
    document.getElementById('logout').style.display = 'block';

    //OCULTAR FORMULARIO
    function muestra_oculta(id) {
        if (document.getElementById) {
            var el = document.getElementById(id);
            el.style.display = (el.style.display == 'none') ? 'block' : 'none';
        }
    }

    function activarInputCode() {
        document.getElementById("code").focus();
    }

    function fntSelect(intParametro) {
        //VALIDAR CHECK
        //document.getElementById("review_").checked = true;
        //document.getElementById("approved_").checked = true;
        //document.getElementById("final_").checked = true;

        document.getElementById('replace').disabled = true;
        document.getElementById('delete').disabled = false;

        intParametro = !intParametro ? 0 : intParametro;

        if (intParametro > 0) {

            var strId = $("#hidvus_cal_id_" + intParametro).val();
            var strIni = $("#hidvus_cal_perini_" + intParametro).val();
            var strFin = $("#hidvus_cal_perfin_" + intParametro).val();

            // alert(strDPI + "                         strDPI");
            $("#id").val(strId);
            $("#start").val(strIni);
            $("#end").val(strFin);

        }

    };
</script>