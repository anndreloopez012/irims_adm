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
                        <label for="Code" class="col-sm-3 col-form-label">Country of installation</label>
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#basicExampleModal">
                            <i class="fas fa-search"></i>
                        </button>
                        <div class="col-sm-1">
                            <input class="form-control " name="codigo" id="codigo" value="<?php echo  $adm_cnf_pais; ?>" type="text" required>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control " name="pais" id="pais" type="text" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="adm_cnf_licence" class="col-sm-2 col-form-label">Licence issued to</label>
                        <div class="col-sm-9">
                            <input class="form-control form-control-sm" name="adm_cnf_licence" id="adm_cnf_licence" value="<?php echo  $adm_cnf_licence; ?>"  type="text" required>
                        </div>
                        <label for="adm_cnf_licence2" class="col-sm-2 col-form-label">Licence issued to</label>
                        <div class="col-sm-9">
                            <input class="form-control form-control-sm" name="adm_cnf_licence2" id="adm_cnf_licence2" value="<?php echo  $adm_cnf_licence2; ?>" type="text" required>
                        </div>
                    </div>
                    <div class="card-body bg-secondary text-white col-12">
                        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link btn-dark active" id="one" data-toggle="pill" href="#one_" role="tab" aria-controls="one" aria-selected="true">General Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-dark" id="three" data-toggle="pill" href="#three_" role="tab" aria-controls="three" aria-selected="false">SYSTEM</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-dark" id="four" data-toggle="pill" href="#four_" role="tab" aria-controls="four" aria-selected="false">VUS fields</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-dark" id="five" data-toggle="pill" href="#five_" role="tab" aria-controls="five" aria-selected="true">Signatures</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="custom-content-below-tabContent content-input-size">
                            <div class="tab-pane fade col-12 show active" id="one_" role="tabpanel" aria-labelledby="one"><br>

                                <div class="form-group size row">
                                    <label for="adm_cnf_siglas" class="col-sm-3 col-form-label-sm">Acronym</label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm" name="adm_cnf_siglas" id="adm_cnf_siglas" value="<?php echo  $adm_cnf_siglas; ?>" type="text" required>
                                    </div>
                                    <label for="correlative" class="col-sm-3 col-form-label-sm">Version</label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm" name="adm_cnf_ver" id="adm_cnf_ver" value="<?php echo  $adm_cnf_ver; ?>" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="adm_cnf_user" class="col-sm-3 col-form-label-sm">master User name</label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm" name="adm_cnf_user" id="adm_cnf_user" value="<?php echo  $adm_cnf_user; ?>" type="text" required>
                                    </div>
                                    <label for="ipint" class="col-sm-3 col-form-label-sm">Internal IP</label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm" name="ipint" id="ipint" value="<?php echo  $adm_cnf_ipint; ?>" type="text" value="<?php echo  $rTMP; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="adm_cnf_passw" class="col-sm-3 col-form-label-sm">Master user password</label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm" name="adm_cnf_passw" id="adm_cnf_passw" value="<?php echo  $adm_cnf_passw; ?>" type="text" required>
                                    </div>
                                    <label for="ipext" class="col-sm-3 col-form-label-sm">External IP</label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm" name="ipext" id="ipext" value="<?php echo  $adm_cnf_ipext; ?>" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="email1" class="col-sm-3 col-form-label-sm">IT Support Mailbox</label>
                                    <div class="col-sm-3">
                                        <textarea class="form-control form-control-sm" name="email1" id="email1" value="<?php echo  $adm_cnf_email1; ?>" type="text" required><?php echo  $adm_cnf_email1; ?></textarea>
                                    </div>
                                    <label for="email2" class="col-sm-3 col-form-label-sm">Errors Mailbox</label>
                                    <div class="col-sm-3">
                                        <textarea class="form-control form-control-sm" name="email2" id="email2" value="<?php echo  $adm_cnf_email2; ?>" type="text" required><?php echo  $adm_cnf_email2; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="adm_cfg_color" class="col-sm-3 col-form-label-sm">Color System</label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm" name="adm_cfg_color" id="adm_cfg_color" value="<?php echo  $adm_cnf_color; ?>" type="text" required>
                                    </div>
                                    <label for="uts_costo" class="col-sm-3 col-form-label-sm">Cost Tax Unit</label>
                                    <div class="col-sm-2">
                                        <input class="form-control form-control-sm" name="uts_costo" id="uts_costo" value="<?php echo  $adm_cnf_uts_costo; ?>" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="adm_cnf_tit_cor" class="col-sm-4 col-form-label-sm">Related Foreign Companies </label>
                                    <div class="col-sm-2">
                                        <input class="form-control form-control-sm" name="adm_cnf_tit_cor" id="adm_cnf_tit_cor" value="<?php echo  $adm_cnf_tit_cor; ?>" type="text" required>
                                    </div>
                                    <label for="adm_cnf_filesizeupl" class="col-sm-4 col-form-label-sm">Maximum Megabytes per document</label>
                                    <div class="col-sm-1">
                                        <input class="form-control form-control-sm" name="adm_cnf_filesizeupl" id="adm_cnf_filesizeupl" value="<?php echo  $adm_cnf_filesizeupl; ?>" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="adm_cnf_cdvcor" class="col-sm-5 col-form-label-sm">Correlative for verification code</label>
                                    <div class="col-sm-1">
                                        <input class="form-control form-control-sm" name="adm_cnf_cdvcor" id="adm_cnf_cdvcor" value="<?php echo  $adm_cnf_cdvcor; ?>" type="text" required>
                                    </div>
                                    <label for="adm_cnf_timref" class="col-sm-5 col-form-label-sm">Time in minutes to update applications procedures</label>
                                    <div class="col-sm-1">
                                        <input class="form-control form-control-sm" name="adm_cnf_timref" id="adm_cnf_timref" value="<?php echo  $adm_cnf_timref; ?>" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="email3" class="col-sm-3 col-form-label-sm">Email for notifications </label>
                                    <div class="col-sm-7">
                                        <input class="form-control form-control-sm" name="email3" id="email3" type="text" value="<?php echo  $adm_cnf_email3; ?>" required>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade col-12" id="three_" role="tabpanel" aria-labelledby="three"><br>
                                <div class="form-group size row">
                                    <label for="acceso" class="col-sm-3 col-form-label-sm">Access Enabled </label>
                                    <div class="col-sm-2">
                                        <select class="form-control form-control-sm" name="acceso" id="acceso" value="<?php echo  $adm_cnf_acceso; ?>">
                                            <option value="">..</option>
                                            <option value="1">YES</option>
                                            <option value="0">NO</option>
                                        </select>
                                    </div>
                                    <label for="adm_cnf_lang" class="col-sm-3 col-form-label-sm">Language</label>
                                    <div class="col-sm-3">
                                        <select class="form-control form-control-sm" name="adm_cnf_lang" id="adm_cnf_lang" value="<?php echo  $adm_cnf_lang; ?>">
                                            <option value="">..</option>
                                            <option value="1">SPANISH</option>
                                            <option value="2">ENGLISH</option>
                                            <option value="3">FRENCH</option>
                                            <option value="4">PORTUGUESE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="sistema_siglas" class="col-sm-3 col-form-label-sm">System acronym</label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-sm" name="sistema_siglas" id="sistema_siglas" value="<?php echo  $sistema_siglas; ?>" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="sistema_name" class="col-sm-3 col-form-label-sm">System name</label>
                                    <div class="col-sm-6">
                                        <input class="form-control form-control-sm" name="sistema_name" id="sistema_name" value="<?php echo  $sistema_name; ?>" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="sistema_logo" class="col-sm-3 col-form-label-sm">System logo</label>
                                    <div class="col-sm-6">
                                        <input class="form-control form-control-sm" name="sistema_logo" id="sistema_logo" value="<?php echo  $sistema_logo; ?>" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group checkRadio  row">
                                    <div class="form-check col-6">
                                        <input type="checkbox" value="1" name="cnf_frame" id="cnf_frame"> <input type="hidden"  value="<?php echo  $adm_cnf_frame; ?>" name="cnf_frame_" id="cnf_frame_" class="form-check-input">
                                        <label class="form-check-label">Display Operations Frame</label>
                                    </div>
                                    <div class="form-check col-6 ">
                                        <input type="checkbox" value="1" name="cnf_notas" id="cnf_notas"> <input type="hidden"  value="<?php echo  $adm_cnf_notas; ?>" name="cnf_notas_" id="cnf_notas_ " class="form-check-input">
                                        <label class="form-check-label">Turn on notes icon</label>
                                    </div>
                                    <div class="form-check col-6">
                                        <input type="checkbox" value="1" name="cnf_mensajes" id="cnf_mensajes"> <input type="hidden"  value="<?php echo  $adm_cnf_mensajes; ?>" name="cnf_mensajes_" id="cnf_mensajes_" class="form-check-input">
                                        <label class="form-check-label">Turn on internal messages icon </label>
                                    </div>
                                    <div class="form-check col-6">
                                        <input type="checkbox" value="1" name="cnf_actividades" id="cnf_actividades"> <input type="hidden"  value="<?php echo  $adm_cnf_actividades; ?>" name="cnf_actividades_" id="cnf_actividades_" class="form-check-input">
                                        <label class="form-check-label">Tusn on activities icon</label>
                                    </div>
                                    <div class="form-check col-6 ">
                                        <input type="checkbox" value="1" name="adm_cnf_backup" id="adm_cnf_backup"> <input type="hidden"  value="<?php echo  $adm_cnf_backup; ?>" name="adm_cnf_backup_" id="adm_cnf_backup_ " class="form-check-input">
                                        <label class="form-check-label">Perform Backup</label>
                                    </div>
                                    <div class="form-check col-6">
                                        <input type="checkbox" value="1" name="adm_cnf_revfalbol" id="adm_cnf_revfalbol"> <input type="hidden"  value="<?php echo  $adm_cnf_revfalbol; ?>" name="adm_cnf_revfalbol_" id="adm_cnf_revfalbol_" class="form-check-input">
                                        <label class="form-check-label">Performs review of missing nots / tickets for rejections</label>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="sistema_version" class="col-sm-2 col-form-label-sm">System version</label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" name="sistema_version" id="sistema_version" value="<?php echo  $sistema_version; ?>" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade col-12" id="four_" role="tabpanel" aria-labelledby="four"><br>
                                <div class="form-group size row">
                                    <label for="adm_cnf_numfal" class="col-sm-5 col-form-label-sm">Number of reiterations</label>
                                    <div class="col-sm-1">
                                        <input class="form-control form-control-sm" name="adm_cnf_numfal" id="adm_cnf_numfal" value="<?php echo  $adm_cnf_numfal; ?>" type="text" required>
                                    </div>
                                    <label for="adm_cnf_numbol" class="col-sm-5 col-form-label-sm">Number of reiterations of LOQ</label>
                                    <div class="col-sm-1">
                                        <input class="form-control form-control-sm" name="adm_cnf_numbol" id="adm_cnf_numbol" value="<?php echo  $adm_cnf_numbol; ?>" type="text" required>
                                    </div>
                                    <label for="adm_cnf_numfaldias" class="col-sm-5 col-form-label-sm">Maximum number of days to respond missing notes </label>
                                    <div class="col-sm-1">
                                        <input class="form-control form-control-sm" name="adm_cnf_numfaldias" id="adm_cnf_numfaldias" value="<?php echo  $adm_cnf_numfaldias; ?>" type="text" required>
                                    </div>
                                    <label for="adm_cnf_numboldias" class="col-sm-5 col-form-label-sm">Maximum days to respond to FDA requests</label>
                                    <div class="col-sm-1">
                                        <input class="form-control form-control-sm" name="adm_cnf_numboldias" id="adm_cnf_numboldias" value="<?php echo  $adm_cnf_numboldias; ?>" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade col-12 input-size-cont" id="five_" role="tabpanel" aria-labelledby="five"><br>
                                <div class="form-group size row">
                                    <label for="adm_cnf_firma" class="col-sm-6 col-form-label-sm">Signature name 	Professor Dr. Khin Zaw </label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control form-control-sm" name="adm_cnf_firma" id="adm_cnf_firma" value="<?php echo  $adm_cnf_firma; ?>" type="text" required><?php echo  $adm_cnf_firma; ?></textarea>
                                    </div>
                                    <label for="adm_cnf_firma2" class="col-sm-6 col-form-label-sm">Signature name 2 </label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-sm" name="adm_cnf_firma2" id="adm_cnf_firma2" value="<?php echo  $adm_cnf_firma2; ?>" type="text" required>
                                    </div>
                                    <label for="adm_cnf_desig1" class="col-sm-6 col-form-label-sm">Signature designation 1 </label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-sm" name="adm_cnf_desig1" id="adm_cnf_desig1" value="<?php echo  $adm_cnf_desig1; ?>" type="text" required>
                                    </div>
                                    <label for="adm_cnf_desig2" class="col-sm-6 col-form-label-sm">Signature designation 2 </label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-sm" name="adm_cnf_desig2" id="adm_cnf_desig2" value="<?php echo  $adm_cnf_desig2; ?>" type="text" required>
                                    </div>
                                    <label for="adm_cnf_formnr" class="col-sm-6 col-form-label-sm">QClab Anslyst Report Form number </label>
                                    <div class="col-sm-2">
                                        <input class="form-control form-control-sm" name="adm_cnf_formnr" id="adm_cnf_formnr" value="<?php echo  $adm_cnf_formnr; ?>" type="text" required>
                                    </div>
                                    <label for="adm_cnf_versnr" class="col-sm-6 col-form-label-sm">QClab Anslyst Report Version number </label>
                                    <div class="col-sm-2">
                                        <input class="form-control form-control-sm" name="adm_cnf_versnr" id="adm_cnf_versnr" value="<?php echo  $adm_cnf_versnr; ?>" type="text" required>
                                    </div>
                                    <label for="adm_cnf_sopnr" class="col-sm-6 col-form-label-sm">QClab Anslyst Report SOP number </label>
                                    <div class="col-sm-2">
                                        <input class="form-control form-control-sm" name="adm_cnf_sopnr" id="adm_cnf_sopnr" value="<?php echo  $adm_cnf_sopnr; ?>" type="text" required>
                                    </div>
                                    <label for="adm_cnf_formnr2" class="col-sm-6 col-form-label-sm">QClab Certificate of Anslyst Form number </label>
                                    <div class="col-sm-2">
                                        <input class="form-control form-control-sm" name="adm_cnf_formnr2" id="adm_cnf_formnr2" value="<?php echo  $adm_cnf_formnr2; ?>" type="text" required>
                                    </div>
                                    <label for="adm_cnf_versnr2" class="col-sm-6 col-form-label-sm">QClab Certificate of Anslyst Version number </label>
                                    <div class="col-sm-2">
                                        <input class="form-control form-control-sm" name="adm_cnf_versnr2" id="adm_cnf_versnr2" value="<?php echo  $adm_cnf_versnr2; ?>" type="text" required>
                                    </div>
                                    <label for="adm_cnf_sopnr2" class="col-sm-6 col-form-label-sm">QClab Certificate of Anslyst SOP number 	 </label>
                                    <div class="col-sm-2">
                                        <input class="form-control form-control-sm" name="adm_cnf_sopnr2" id="adm_cnf_sopnr2" value="<?php echo  $adm_cnf_sopnr2; ?>" type="text" required>
                                    </div>
                                    <label for="adm_cnf_superoff" class="col-sm-6 col-form-label-sm">QClabSupervising officer </label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm" name="adm_cnf_superoff" id="adm_cnf_superoff" value="<?php echo  $adm_cnf_superoff; ?>" type="text" required>
                                    </div>
                                </div>
                            </div>
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
    //FOCUS AL INICIAR PANTALLA
    document.getElementById("codigo").focus();
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
        document.getElementById('delete').disabled = false;

        intParametro = !intParametro ? 0 : intParametro;

        if (intParametro > 0) {

            var strId = $("#hidId_" + intParametro).val();
            var strCodigo = $("#hidCode_" + intParametro).val();

            // alert(strDPI + "                         strDPI");
            $("#codigo").val(strId);
            $("#pais").val(strCodigo);
        }

    };

    function muestra_oculta(id) {
        if (document.getElementById) {
            var el = document.getElementById(id);
            el.style.display = (el.style.display == 'none') ? 'block' : 'none';
        }
    };

    function activarInputCode() {
        document.getElementById("codigo").focus();
    }

    function fntDibujoTabla() {

        var strSearch = $("#Search").val();

        //alert(strCategori + "                                  strCategori");

        $.ajax({

            url: "mu_c_admConfiguration.php?validaciones=busqueda_geografia",
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

    window.addEventListener('load', fntDibujoTabla, false)
</script>