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
                        <button type="button" id="insert" onclick="fntAuthorizeProces()" id="save" class="btn btn-dark btn-block">Save</button>
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
                        <input class="form-control " name="num_sol" id="num_sol" type="hidden" required>
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
                        <input class="form-control form-control-sm" name="pass" id="pass" type="text" required>
                    </div>
                </div>
                <div class="card-body bg-secondary sub-menu text-white col-12">
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link btn-dark sub-menu-btn text-white active" id="one" data-toggle="pill" href="#one_" role="tab" aria-controls="one" aria-selected="true">PERSONAL INFORMATION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-dark sub-menu-btn text-white" id="four" data-toggle="pill" href="#four_" role="tab" aria-controls="four" aria-selected="false">POWERS OD ATTORNEY</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-dark sub-menu-btn text-white" id="five" data-toggle="pill" href="#five_" role="tab" aria-controls="five" aria-selected="true">ACTION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-dark sub-menu-btn text-white" id="five" data-toggle="pill" href="#ten_" role="tab" aria-controls="ten" aria-selected="true">COMPANY</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="custom-content-below-tabContent content-input-size">
                        <div class="tab-pane fade col-12 show active" id="one_" role="tabpanel" aria-labelledby="one"><br>
                            <div class="form-group row">
                                <label for="first_name" class="col-sm-3 col-form-label">First name</label>
                                <div class="col-sm-2">
                                    <input class="form-control form-control-sm " name="first_name" id="first_name" type="text" required>
                                </div>
                                <label for="last_name" class="col-sm-3 col-form-label">Last name</label>
                                <div class="col-sm-2">
                                    <input class="form-control form-control-sm " name="last_name" id="last_name" type="text" required>
                                </div>
                                <label for="ci" class="col-sm-3 col-form-label">Identity Document No. </label>
                                <div class="col-sm-2">
                                    <input class="form-control form-control-sm " name="ci" id="ci" type="text" required>
                                </div>
                                <label for="tel" class="col-sm-3 col-form-label">Mobile phone</label>
                                <div class="col-sm-2">
                                    <input class="form-control form-control-sm " name="tel" id="tel" type="text" required>
                                </div>
                                <label for="geo_desc" class="col-sm-3 col-form-label">Geographic location</label>
                                <div class="col-sm-3">
                                    <textarea class="form-control form-control-sm " name="geo_desc" id="geo_desc" rows="3"></textarea>
                                </div>
                                <label for="dir" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-3">
                                    <textarea class="form-control form-control-sm " name="dir" id="dir" rows="3"></textarea>
                                </div>
                                <label for="cel" class="col-sm-3 col-form-label">Landline phone</label>
                                <div class="col-sm-2">
                                    <input class="form-control form-control-sm " name="cel" id="cel" type="text" required>
                                </div>
                                <label for="codpos" class="col-sm-3 col-form-label">Postal code</label>
                                <div class="col-sm-2">
                                    <input class="form-control form-control-sm " name="codpos" id="codpos" type="password" required>
                                </div><br>
                            </div><br>
                        </div>
                        <div class="tab-pane fade col-12" id="four_" role="tabpanel" aria-labelledby="four"><br>
                            <div class="col-md-12 tableFixHead">
                                <input type="hidden" name="company_id" id="company_id">
                                <input type="hidden" name="company_name" id="company_name">
                                <input type="hidden" name="vus_solupr_numreg" id="vus_solupr_numreg">
                                <input type="hidden" name="vus_solupr_p_nomprod" id="vus_solupr_p_nomprod">

                                <input type="hidden" name="vus_solupr_tpr_id" id="vus_solupr_tpr_id">
                                <input type="hidden" name="vus_solupp_solnume" id="vus_solupp_solnume">
                                <input type="hidden" name="vus_vus_solupr_tipo" id="vus_vus_solupr_tipo">
                                <input type="hidden" name="vus_solupr_poder_id" id="vus_solupr_poder_id">
                                <div id="dowload" name="dowload">
                                    <!-- ADITIONAL DOCUMENT -->
                                    <input name="codId" id="codId" type="hidden">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade col-12 input-size-cont" id="five_" role="tabpanel" aria-labelledby="five"><br>
                            <div class="form-group row">
                                <label for="estatus" class="col-sm-4 col-form-label">Action</label>
                                <div class="col-sm-2">
                                    <select class="form-control" name="estatus" id="estatus">
                                        <option value="0">Please Select</option>
                                        <option value="1">Authorize</option>
                                        <option value="2">Rejet</option>
                                    </select>
                                </div>
                                <input name="hid_status" id="hid_status" type="hidden">
                            </div>
                            <div class="form-group row">
                                <label for="obs" class="col-sm-2 col-form-label">Comments</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="obs" id="obs" rows="2" onkeyup="fntTextComent() "> </textarea>
                                </div>
                                <button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#myModal"><i class="far fa-window-maximize"></i></button>

                            </div><br>
                        </div>
                        <div class="tab-pane fade col-12 input-size-cont" id="ten_" role="tabpanel" aria-labelledby="ten"><br>
                            <div class="form-group row">
                                <div id="divCompany" name="divCompany">
                                    <!-- DFDA SECTION -->
                                </div>
                                <label for="rif" class="col-sm-2 col-form-label">Company ID</label>
                                <div class="col-sm-2">
                                    <input class="form-control form-control-sm " name="rif" id="rif" type="text" required>
                                </div>
                                <div class="col-sm-7"></div>
                                <label for="nombre" class="col-sm-2 col-form-label">company name</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control-sm " name="nombre" id="nombre" type="text" required>
                                </div>
                                <label for="tels" class="col-sm-2 col-form-label">Landline phone</label>
                                <div class="col-sm-4">
                                    <input class="form-control form-control-sm " name="tels" id="tels" type="text" required>
                                </div>
                                <label for="fax" class="col-sm-1 col-form-label">fax</label>
                                <div class="col-sm-4">
                                    <input class="form-control form-control-sm " name="fax" id="fax" type="text" required>
                                </div>
                                <label for="email1" class="col-sm-2 col-form-label">Email 1</label>
                                <div class="col-sm-4">
                                    <input class="form-control form-control-sm " name="email1" id="email1" type="text" required>
                                </div>
                                <label for="email2" class="col-sm-1 col-form-label">Email 2</label>
                                <div class="col-sm-4">
                                    <input class="form-control form-control-sm " name="email2" id="email2" type="text" required>
                                </div>
                                <label for="pweb" class="col-sm-2 col-form-label">WebPage</label>
                                <div class="col-sm-4">
                                    <input class="form-control form-control-sm " name="pweb" id="pweb" type="text" required>
                                </div><br>
                            </div><br>
                        </div>
                    </div>
            </form>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Comments</h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <textarea class="form-control" name="commentsModal" id="commentsModal" rows="18" onkeyup="fntTextComentModal() "></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
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
            fntUpdate()
        } else if (strhid_nombre == 2) {
            fntUpdate()
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

            var strNum_sol = $("#hid_num_sol" + intParametro).val();
            var strCodigoDes = $("#hid_codigo_des" + intParametro).val();
            var strFecsol = $("#hid_fecsol" + intParametro).val();
            var strTipctaDesc = $("#hid_tipcta_desc" + intParametro).val();
            var strAlias = $("#hid_alias" + intParametro).val();
            var strStatusOne = $("#hid_statusOne" + intParametro).val();
            var strEmail = $("#hid_email" + intParametro).val();
            var strPass = $("#hid_pass" + intParametro).val();

            var strFirstName = $("#hid_first_name" + intParametro).val();
            var strLastName = $("#hid_last_name" + intParametro).val();
            var strCi = $("#hid_ci" + intParametro).val();
            var strTel = $("#hid_tel" + intParametro).val();
            var strCel = $("#hid_cel" + intParametro).val();
            var strGeoDesc = $("#hid_geo_desc" + intParametro).val();
            var strDir = $("#hid_dir" + intParametro).val();
            var strCodPos = $("#hid_codpos" + intParametro).val();

            var strTprG = $("#hid_tpr_g" + intParametro).val();

            var strEstatus = $("#hid_estatus" + intParametro).val();
            var strObs = $("#hid_obs" + intParametro).val();

            var strRif = $("#hid_rif" + intParametro).val();

            //alert(strDescription + "                         strDescription");

            $("#num_sol").val(strNum_sol);
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

            if (strStatusOne == 1) {
                $("#adm_cnf_licence2").val('Autorizada');
            } else if (strStatusOne == 2) {
                $("#adm_cnf_licence2").val('Cancelado');
            } else if (strStatusOne == 3) {
                $("#adm_cnf_licence2").val('Suspendido');
            } else if (strStatusOne == 4) {
                $("#adm_cnf_licence2").val('Borrado');
            };

            $("#email").val(strEmail);
            $("#pass").val(strPass);

            $("#first_name").val(strFirstName);
            $("#last_name").val(strLastName);
            $("#ci").val(strCi);
            $("#tel").val(strTel);
            $("#cel").val(strCel);
            $("#geo_desc").val(strGeoDesc);
            $("#dir").val(strDir);
            $("#codpos").val(strCodPos);

            $("#hid_status").val(strEstatus);
            //$('#status').val($('#hid_status').val())
            $("#obs").val(strObs);

            $("#rif").val(strRif);

            $("#codId").val(strNum_sol);


        }

        //data text input company and dfda section
        fntDibujoDowload()

        var strHid_company_id = $("#hid_company_id" + intParametro).val();
        var strHid_company_name = $("#hid_company_name" + intParametro).val();
        var strHid_vus_solupr_numreg = $("#hid_vus_solupr_numreg" + intParametro).val();
        var strHid_vus_solupr_p_nomprod = $("#hid_vus_solupr_p_nomprod" + intParametro).val();

        var strHid_vus_solupr_tpr_id = $("#hid_vus_solupr_tpr_id" + intParametro).val();
        var strHid_vus_solupp_solnum = $("#hid_vus_solupp_solnum" + intParametro).val();
        var strHid_vus_vus_solupr_tipo = $("#hid_vus_vus_solupr_tipo" + intParametro).val();
        var strHid_vus_solupr_poder_id = $("#hid_vus_solupr_poder_id" + intParametro).val();

        $("#company_id").val(strHid_company_id);
        $("#company_name").val(strHid_company_name);
        $("#licence_number").val(strHid_vus_solupr_numreg);
        $("#product_name").val(strHid_vus_solupr_p_nomprod);

        $("#vus_solupr_tpr_id").val(strHid_vus_solupr_tpr_id);
        $("#vus_solupp_solnume").val(strHid_vus_solupp_solnum);
        $("#vus_vus_solupr_tipo").val(strHid_vus_vus_solupr_tipo);
        $("#vus_solupr_poder_id").val(strHid_vus_solupr_poder_id);
        //company
        fntDibujoCompany()

    };
</script>