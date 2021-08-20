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
                        <li class="nav-item" href="<?php $back; ?>">
                            <a href="index.php" class="btn btn-dark btn-block "><i class="fas fa-2x fa-window-close"></i></a>
                        </li>
                    </ul><br>
                    <div class="form-group row">
                        <label for="Code" class="col-sm-3 col-form-label-sm">Country of installation</label>
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#basicExampleModal">
                            <i class="fas fa-search"></i>
                        </button>
                        <div class="col-sm-1">
                            <input class="form-control form-control-sm" name="id" id="id" value="<?php echo $id; ?>" type="hidden" required>
                            <input class="form-control form-control-sm" name="codigo" id="codigo" value="<?php echo $vus_cnf_pais; ?>" type="text" required>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control form-control-sm" name="pais" id="pais" type="text" disabled>
                        </div>
                        <label for="vus_cnf_ver" class="col-sm-2 col-form-label">Version</label>
                        <div class="col-sm-2">
                            <input class="form-control form-control-sm" name="vus_cnf_ver" id="vus_cnf_ver" value="<?php echo $vus_cnf_ver; ?>" type="text" required>
                        </div>
                        <label for="vus_cnf_licence" class="col-sm-2 col-form-label-sm">Licence issued to</label>
                        <div class="col-sm-9">
                            <input class="form-control form-control-sm" name="vus_cnf_licence" id="vus_cnf_licence" value="<?php echo $vus_cnf_licence; ?>" type="text" required>
                        </div>
                        <label for="vus_cnf_licence2" class="col-sm-2 col-form-label-sm">Licence issued to</label>
                        <div class="col-sm-9">
                            <input class="form-control form-control-sm" name="vus_cnf_licence2" id="vus_cnf_licence2" value="<?php echo $vus_cnf_licence2; ?>" type="text" required>
                        </div>
                        <label for="vus_cnf_siglas" class="col-sm-2 col-form-label-sm">Acronym</label>
                        <div class="col-sm-4">
                            <input class="form-control form-control-sm" name="vus_cnf_siglas" id="vus_cnf_siglas" value="<?php echo $vus_cnf_siglas; ?>" type="text" required>
                        </div>
                        <label for="pagadere" class="col-sm-4 col-form-label-sm">Pay rights</label>
                        <div class="col-sm-1">
                            <select class="form-control form-control-sm" name="pagadere" id="pagadere" value="<?php echo $vus_cnf_pagadere; ?>">
                                <option value="1">YES</option>
                                <option value="0">NO</option>
                            </select>
                        </div>
                        <label for="vus_cnf_lang" class="col-sm-2 col-form-label-sm">Language</label>
                        <div class="col-sm-2">
                            <select class="form-control form-control-sm" name="vus_cnf_lang" id="vus_cnf_lang" value="<?php echo $vus_cnf_lang; ?>">
                                <option value="1">SPANISH</option>
                                <option value="2">ENGLISH</option>
                                <option value="3">FRENCH</option>
                                <option value="4">PORTUGUESE</option>
                            </select>
                        </div>
                        <label for="acceso" class="col-sm-6 col-form-label-sm">Access Enabled</label>
                        <div class="col-sm-1">
                            <select class="form-control form-control-sm" name="acceso" id="acceso" value="<?php echo $vus_cnf_acceso; ?>">
                                <option value="1">YES</option>
                                <option value="0">NO</option>
                            </select>
                        </div>
                        <label for="diasven" class="col-sm-4 col-form-label-sm">Permitted days prior to expiry date</label>
                        <div class="col-sm-1">
                            <input class="form-control form-control-sm" name="diasven" id="diasven" value="<?php echo $vus_cnf_diasven; ?>" type="text" required>
                        </div>
                        <label for="diasweek" class="col-sm-5 col-form-label-sm">Number of applications per week</label>
                        <div class="col-sm-1">
                            <input class="form-control form-control-sm" name="diasweek" id="diasweek" value="<?php echo $vus_cnf_numsolsem; ?>" type="text" required>
                        </div>
                    </div>
                    <div class="form-group checkRadio row">
                        <div class="form-check col-6">
                            <input type="checkbox" value="1" name="addprod" id="addprod"> <input type="hidden" value="<?php echo $vus_cnf_addprod; ?>" name="addprod_" id="addprod_" class="form-check-input">
                            <label class="form-check-label">Add Product </label>
                        </div>
                        <div class="form-check col-6 ">
                            <input type="checkbox" value="1" name="cnf_frame" id="cnf_frame"> <input type="hidden" value="<?php echo $vus_cnf_frame; ?>" name="cnf_frame_" id="cnf_frame_ " class="form-check-input">
                            <label class="form-check-label">Display Operations Frame</label>
                        </div>
                        <div class="form-check col-6">
                            <input type="checkbox" value="1" name="adm_cnf_backup" id="adm_cnf_backup"> <input type="hidden" value="<?php echo $vus_cnf_backup; ?>" name="adm_cnf_backup_" id="adm_cnf_backup_" class="form-check-input">
                            <label class="form-check-label">Perform Backup </label>
                        </div>
                        <div class="form-check col-6 ">
                            <input type="checkbox" value="1" name="editemp" id="editemp"> <input type="hidden" value="<?php echo $vus_cnf_editemp; ?>" name="editemp_" id="editemp_ " class="form-check-input">
                            <label class="form-check-label">Edit company </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-2 col-form-label-sm">IT Support Mailbox</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="email1" id="email1"  rows="1" required><?php echo $vus_cnf_email1; ?></textarea>
                        </div>
                        <label for="email2" class="col-sm-2 col-form-label-sm">Errors Mailbox</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="email2" id="email2"  rows="1" required><?php echo $vus_cnf_email2; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email3" class="col-sm-5 col-form-label-sm">Email for notifications</label>
                        <div class="col-sm-6">
                            <input class="form-control form-control-sm" name="email3" value="<?php echo $vus_cnf_email3; ?>" id="email3" type="text" required>
                        </div>
                        <label for="vus_cnf_numsolmes" class="col-sm-5 col-form-label-sm">Maximum number of applications per month per user</label>
                        <div class="col-sm-6">
                            <input class="form-control form-control-sm" name="vus_cnf_numsolmes" id="vus_cnf_numsolmes" value="<?php echo $vus_cnf_numsolmes; ?>" type="text" required>
                        </div>
                    </div>
                    <div class="alert alert-dark" role="alert" style="text-align:center;">INITIAL CORRELATES</div>
                    <div class="form-group row">
                        <label for="vus_cnf_regusr_cor" class="col-sm-4 col-form-label-sm">User Registration</label>
                        <div class="col-sm-1">
                            <input class="form-control form-control-sm" name="vus_cnf_regusr_cor" id="vus_cnf_regusr_cor" value="<?php echo $vus_cnf_regusr_cor; ?>" type="text" required>
                        </div>
                        <label for="vus_cnf_solreg_cor" class="col-sm-4 col-form-label-sm"> User Registration Applications</label>
                        <div class="col-sm-1">
                            <input class="form-control form-control-sm" name="vus_cnf_solreg_cor" id="vus_cnf_solreg_cor" value="<?php echo $vus_cnf_solreg_cor; ?>" type="text" required>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12 row">
                        <label for="dropOne" class="col-sm-2 col-form-label">Search</label>
                        <input class="form-control col-sm-10" name="Search" id="Search" type="text" onkeyup="fntDibujoTabla() ">
                    </div><br>
                    <div class="div1">
                        <div id="Tabla" name="Tabla">
                            <!-- DIBUJO DE TABLA CATEGORIA PRODUCTO-->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
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
</script>
<script>
    function fntSelect(intParametro) {
        //VALIDAR CHECK
        //document.getElementById("review_").checked = true;
        //document.getElementById("approved_").checked = true;
        //document.getElementById("final_").checked = true;

        document.getElementById('replace').disabled = true;
        document.getElementById('delete').disabled = true;

        intParametro = !intParametro ? 0 : intParametro;

        if (intParametro > 0) {

            var strId = $("#hidId_" + intParametro).val();
            var strCodigo = $("#hidCode_" + intParametro).val();
          
             //alert(strId + "                         strId");
             //alert(strCodigo + "                         strCodigo");
         
            $("#codigo").val(strId);
            $("#pais").val(strCodigo);
        
        }

    };

    //TEXTO REACTIVO DEL CAMPO COMENT
    function fntTextComentModal() {

        document.getElementById("comments").value = document.getElementById("commentsModal").value;

    }

    function fntTextComent() {

        document.getElementById("commentsModal").value = document.getElementById("comments").value;

    }

    function muestra_oculta(id) {
        if (document.getElementById) {
            var el = document.getElementById(id);
            el.style.display = (el.style.display == 'none') ? 'block' : 'none';
        }
    };

    function activarInputCode() {
        document.getElementById("code").focus();
    }

    function fntDibujoTabla() {

        var strSearch = $("#Search").val();
        //alert(strCategori + "                                  strCategori");

        $.ajax({

            url: "mu_c_userConfiguration.php?validaciones=busqueda_geografia",
            data: {
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

    function fntSelectCheck() {
        var strAddprod = $("#addprod_" ).val();
        var strCnf_frame = $("#cnf_frame_" ).val();
        var strAdm_cnf_backup = $("#adm_cnf_backup_" ).val();
        var strEditemp = $("#editemp_" ).val();

        var boolCheckPass = (strAddprod == 1) ? true : false;
        $("[name=addprod]").prop('checked', boolCheckPass);
        $("#addprod").val(strAddprod);
        $("#addprod_").val(strAddprod);

        var boolCheckPass = (strCnf_frame == 1) ? true : false;
        $("[name=cnf_frame]").prop('checked', boolCheckPass);
        $("#cnf_frame").val(strCnf_frame);
        $("#cnf_frame_").val(strCnf_frame);

        var boolCheckPass = (strAdm_cnf_backup == 1) ? true : false;
        $("[name=adm_cnf_backup]").prop('checked', boolCheckPass);
        $("#adm_cnf_backup").val(strAdm_cnf_backup);
        $("#adm_cnf_backup_").val(strAdm_cnf_backup);

        var boolCheckPass = (strEditemp == 1) ? true : false;
        $("[name=editemp]").prop('checked', boolCheckPass);
        $("#editemp").val(strEditemp);
        $("#editemp_").val(strEditemp);

    };

    window.addEventListener('load', fntSelectCheck, false)
    window.addEventListener('load', fntDibujoTabla, false)
</script>