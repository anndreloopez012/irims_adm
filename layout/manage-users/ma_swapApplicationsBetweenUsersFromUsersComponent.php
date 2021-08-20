<section class="content col-lg-12"><br>
    <div class="container-fluid" id="tabla">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="cont col-lg-8">
                <form id="" method="POST">
                    <ul class="nav nav-pills nav-fill btn-dark">
                        <li class="nav-item">
                            <a href="index.php" class="btn btn-dark btn-block "><i class="fas fa-2x fa-window-close"></i></a>
                        </li>
                    </ul><br>
                    <div class="form-group row">
                        <label for="dropOne" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-3">
                            <select class="form-control form-control-sm" id="categori" name="categori" onchange="fntDibujoTabla() ">
                                <?php
                                if (is_array($arrTypeProduct) && (count($arrTypeProduct) > 0)) {
                                    reset($arrTypeProduct);
                                    foreach ($arrTypeProduct as $rTMP['key'] => $rTMP['value']) {
                                ?>
                                        <option value="<?php echo  $rTMP["value"]['ctg_tpr_id']; ?>"><?php echo  $rTMP["value"]['ctg_tpr_desc'];  ?></option>

                                <?PHP
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <input class="form-control form-control-sm " name="unit_" id="unit_" type="text" disabled>
                        </div>
                        <label for="dropOne" class="col-sm-2 col-form-label">Search</label>
                        <div class="col-sm-3">
                            <input class="form-control form-control-sm " name="id" id="id" type="hidden">
                            <input class="form-control form-control-sm " name="Search" id="Search" type="text" required onkeyup="fntDibujoTabla() ">
                        </div>
                    </div>

                    <div class="div1">
                        <div id="Tabla" name="Tabla">
                            <!-- DIBUJO DE TABLA CATEGORIA PRODUCTO-->
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
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
                        <a onclick="fntSelectTabla()" class="btn btn-dark btn-block "><i class="fas fa-2x fa-window-close"></i></a>
                    </li>

                </ul><br>
                <div class="form-group row">
                    <label for="Code" class="col-sm-2 col-form-label">User ID</label>
                    <div class="col-sm-2">
                        <input class="form-control " name="codigo_des" id="codigo_des" type="text" required>
                    </div>
                    <label for="Code" class="col-sm-1 col-form-label">Date</label>
                    <div class="col-sm-2">
                        <input class="form-control " name="fecsol" id="fecsol" type="date" required>
                    </div>
                    <label for="Code" class="col-sm-2 col-form-label">Account type</label>
                    <div class="col-sm-2">
                        <input class="form-control " name="tipcta_desc" id="tipcta_desc" type="text" required>
                        <input class="form-control " name="data_tipcta_desc" id="data_tipcta_desc" type="hidden" required>
                    </div>

                    <label for="alias" class="col-sm-2 col-form-label">User name</label>
                    <div class="col-sm-5">
                        <input class="form-control form-control-sm" name="alias" id="alias" type="text" required>
                    </div>
                    <label for="adm_cnf_licence2" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-3">
                        <input class="form-control form-control-sm" name="adm_cnf_licence2" id="adm_cnf_licence2" type="text" required>
                    </div>

                    <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-5">
                        <input class="form-control form-control-sm" name="email" id="email" type="text" required>
                    </div>
                    <label for="pass" class="col-sm-2 col-form-label">password</label>
                    <div class="col-sm-3">
                        <input class="form-control form-control-sm" name="pass" id="pass" type="password" required>
                    </div>
                </div>
                <div class="card-body bg-secondary sub-menu text-white col-12">
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link btn-dark sub-menu-btn text-white" id="five" data-toggle="pill" href="#ten_" role="tab" aria-controls="ten" aria-selected="true">COMPANY</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="custom-content-below-tabContent content-input-size">

                        <div class="nav-link btn-dark sub-menu-btn text-white active" id="ten_" role="tabpanel" aria-labelledby="ten"><br>
                            <div class="form-group row">
                                <label for="rif" class="col-sm-2 col-form-label">User ID</label>
                                <div class="col-sm-2">
                                    <input class="form-control form-control-sm " name="nusrid" id="nusrid" type="text" required>
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal" onclick="fntDibujoTablaUsuarios()" +>
                                        <i class="fad fa-search"></i>
                                    </button>
                                </div>
                                <div class="col-sm-6"></div>
                                <label for="nombre" class="col-sm-2 col-form-label">User name</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control-sm " name="nusr_nombre" id="nusr_nombre" type="text" required>
                                </div>
                                <br>
                            </div><br>
                        </div>
                    </div>
            </form>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">USERS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <label for="dropOne" class="col-sm-2 col-form-label">Search</label>
                                <input class="form-control form-control-sm " name="SearchUser" id="SearchUser" type="text" required onkeyup="fntDibujoTablaUsuarios() ">
                            </div>
                            <div class="div1">
                                <div id="TablaUsuarios" name="TablaUsuarios">
                                    <!-- DIBUJO DE TABLA USUARIOS-->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .sub-menu {
        background-color: #343a40 !important;
    }

    .sub-menu-btn {
        background-color: #000000 !important;
    }

    .sub-menu-btn:not(:disabled):not(.disabled).active {
        background-color: #343a40 !important;
        border-color: #343a40 !important;
    }
</style>


<script>
    //FOCUS AL INICIAR PANTALLA
    document.getElementById("Search").focus();
    document.getElementById('tabla').style.display = 'block';
    document.getElementById('contenido').style.display = 'none';
    //INICIO DE BOTONES INSERT REPLACE DELETE CLEAR
    document.getElementById('replace').disabled = true;
    document.getElementById('delete').disabled = true;
    document.getElementById('clear').disabled = true;
    //INICIO DE BOTONES DEL NAV
    document.getElementById('home').style.display = 'block';
    document.getElementById('back').style.display = 'block';
    document.getElementById('docOne').style.display = 'none';
    document.getElementById('docTwo').style.display = 'none';
    document.getElementById('window').style.display = 'block';
    document.getElementById('logout').style.display = 'block';

    function fntAuthorizeProces() {

        var strhid_nombre = $("#estatus").val();

        if (strhid_nombre == 1) {
            fntUpdateInsert()
        } else if (strhid_nombre == 2) {
            fntUpdateInsert()
        } else if (strhid_nombre == 0) {
            alertify.alert('AVISO', 'Seleccione una accion');
            document.getElementById("five").click();
        }
    };

    function muestra_oculta(id) {
        if (document.getElementById) {
            var el = document.getElementById(id);
            el.style.display = (el.style.display == 'none') ? 'block' : 'none';
        }
    };


    function activarInputCode() {
        document.getElementById("code").focus();
    }

    //TEXTO REACTIVO DEL CAMPO COMENT
    function fntTextComentModal() {

        document.getElementById("comments").value = document.getElementById("commentsModal").value;

    }

    function fntTextComent() {

        document.getElementById("commentsModal").value = document.getElementById("comments").value;

    }

    function fntSelectTabla() {

        document.getElementById('tabla').style.display = 'block';
        document.getElementById('contenido').style.display = 'none';

        $('#formData')[0].reset();

    }

    function fntSelect(intParametro) {

        document.getElementById('tabla').style.display = 'none';
        document.getElementById('contenido').style.display = 'block';

        intParametro = !intParametro ? 0 : intParametro;

        if (intParametro > 0) {

            var strCodigoDes = $("#hid_codigo_des" + intParametro).val();
            var strFecsol = $("#hid_fecsol" + intParametro).val();
            var strTipctaDesc = $("#hid_tipcta_desc" + intParametro).val();
            var strAlias = $("#hid_alias" + intParametro).val();
            var strStatusOne = $("#hid_statusOne" + intParametro).val();
            var strEmail = $("#hid_email" + intParametro).val();
            var strPass = $("#hid_pass" + intParametro).val();
            //alert(strDescription + "                         strDescription");

            $("#codigo_des").val(strCodigoDes);
            $("#fecsol").val(strFecsol);
            $("#data_tipcta_desc").val(strTipctaDesc);

            if (strTipctaDesc == 1) {
                $("#tipcta_desc").val('Patrocinante');
            } else if (strTipctaDesc == 2) {
                $("#tipcta_desc").val('Empresa');
            } else if (strTipctaDesc == 3) {
                $("#tipcta_desc").val('Persona_individual');
            } else if (strTipctaDesc == 4) {
                $("#tipcta_desc").val('Funcionario_msds');
            };

            $("#alias").val(strAlias);

            if (strStatusOne == 0) {
                $("#adm_cnf_licence2").val('Enviada');
            } else if (strStatusOne == 1) {
                $("#adm_cnf_licence2").val('Autorizada');
            } else if (strStatusOne == 2) {
                $("#adm_cnf_licence2").val('Rechazada');
            } else if (strStatusOne == 3) {
                $("#adm_cnf_licence2").val('Deshabilitada');
            } else if (strStatusOne == 4) {
                $("#adm_cnf_licence2").val('Cancelada');
            };

            $("#email").val(strEmail);
            $("#pass").val(strPass);

        }
    };

    function fntSelectUser(intParametro) {

        intParametro = !intParametro ? 0 : intParametro;

        if (intParametro > 0) {

            var strId = $("#hid_nusrid" + intParametro).val();
            var strName = $("#hid_nusr_nombre" + intParametro).val();
            //alert(strDescription + "                         strDescription");

            $("#nusrid").val(strId);
            $("#nusr_nombre").val(strName);

        }
    };
</script>