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
                        <label for="Code" class="col-sm-2 col-form-label">Code</label>
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#basicExampleModal">
                            <i class="fas fa-search"></i>
                        </button>
                        <div class="col-sm-1">
                            <input class="form-control " name="idTpr" id="idTpr" type="hidden">
                            <input class="form-control " name="id" id="id" type="hidden">
                            <input class="form-control " name="code" id="code" onkeyup="fntValidacionCode();" type="text" required>
                        </div>

                        <label for="dropOne" class="col-sm-2 col-form-label">USE</label>
                        <div class="col-sm-3">
                            <select class="form-control" id="categori" name="categori" onchange="fntDibujoTablaProducto() ">
                                <?php require_once '../../interbase/tmfAdm.php'; ?>
                                <?php
                                if (is_array($arrTypeProduct) && (count($arrTypeProduct) > 0)) {
                                    $intContador = 1;
                                    reset($arrTypeProduct);
                                    foreach ($arrTypeProduct as $rTMP['key'] => $rTMP['value']) {
                                ?>
                                        <option value="<?php echo  $rTMP["value"]['ctg_tpr_id']; ?>"><?php echo  $rTMP["value"]['ctg_tpr_desc'];  ?></option>

                                <?PHP
                                        $intContador++;
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <input class="form-control " name="unit_" id="unit_" type="text" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" id="description" rows="1" required></textarea>
                        </div>
                    </div>
                    <div class="card-body bg-secondary text-white col-12">
                        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link btn-dark active" id="one" data-toggle="pill" href="#one_" role="tab" aria-controls="one" aria-selected="true">General Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-dark" id="two" data-toggle="pill" href="#two_" role="tab" aria-controls="two" aria-selected="false">Area</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-dark" id="three" data-toggle="pill" href="#three_" role="tab" aria-controls="three" aria-selected="false">Cost</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-dark" id="four" data-toggle="pill" href="#four_" role="tab" aria-controls="four" aria-selected="false">Grafic</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-dark" id="five" data-toggle="pill" href="#five_" role="tab" aria-controls="five" aria-selected="true">Requirements</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-dark" id="six" data-toggle="pill" href="#six_" role="tab" aria-controls="six" aria-selected="false">Asignature</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-dark" id="seven" data-toggle="pill" href="#seven_" role="tab" aria-controls="seven" aria-selected="false">Acronym</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-dark" id="eight" data-toggle="pill" href="#eight_" role="tab" aria-controls="eight" aria-selected="false">Users Module Config</a>
                            </li>
                        </ul>
                        
                        <div class="tab-content" id="custom-content-below-tabContent content-input-size">
                            <div class="tab-pane fade col-12 show active" id="one_" role="tabpanel" aria-labelledby="one">

                                <div class="form-group size row">
                                    <label for="preparation" class="col-sm-4 col-form-label-sm">Days of preparation</label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm" name="preparation" id="preparation" type="text" required>
                                    </div>
                                    <label for="correlative" class="col-sm-2 col-form-label-sm">Admision correlative</label>
                                    <div class="col-sm-2">
                                        <input class="form-control form-control-sm" name="correlative" id="correlative" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="authorization" class="col-sm-4 col-form-label-sm">Years validity of the authorization</label>
                                    <div class="col-sm-1">
                                        <input class="form-control form-control-sm" name="authorization" id="authorization" type="text" required>
                                    </div>
                                    <label for="Enabled" class="col-sm-5 col-form-label-sm">Enabled</label>
                                    <div class="col-sm-1">
                                        <select class="form-control form-control-sm" name="enabled" id="enabled">
                                            <option value="">..</option>
                                            <option value="1">YES</option>
                                            <option value="0">NO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="file" class="col-sm-4 col-form-label-sm">Location file</label>
                                    <div class="col-sm-6">
                                        <input class="form-control form-control-sm" name="file" id="file" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="report-1" class="col-sm-4 col-form-label-sm">E-mail report 1</label>
                                    <div class="col-sm-6">
                                        <input class="form-control form-control-sm" name="report-1" id="report-1" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="report-2" class="col-sm-4 col-form-label-sm">E-mail report 2</label>
                                    <div class="col-sm-7">
                                        <input class="form-control form-control-sm" name="report-2" id="report-2" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="report-3" class="col-sm-4 col-form-label-sm">E-mail report 3</label>
                                    <div class="col-sm-7">
                                        <input class="form-control form-control-sm" name="report-3" id="report-3" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="report-4" class="col-sm-4 col-form-label-sm">E-mail report 4</label>
                                    <div class="col-sm-7">
                                        <input class="form-control form-control-sm" name="report-4" id="report-4" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="report-5" class="col-sm-4 col-form-label-sm">E-mail report 5</label>
                                    <div class="col-sm-7">
                                        <input class="form-control form-control-sm" name="report-5" id="report-5" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="images" class="col-sm-4 col-form-label-sm">Maximum size in kilobytes to upload images</label>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm" name="images" id="images" type="text" required>
                                    </div>
                                    <label for="from" class="col-sm-3 col-form-label-sm">DRC number starts from</label>
                                    <div class="col-sm-1">
                                        <input class="form-control form-control-sm" name="from" id="from" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="sponsorship" class="col-sm-4 col-form-label-sm">It requires power of sponsorship Product</label>
                                    <div class="col-sm-1">
                                        <select class="form-control form-control-sm" name="sponsorship" id="sponsorship">
                                            <option value="">..</option>
                                            <option value="1">YES</option>
                                            <option value="0">NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade col-12" id="two_" role="tabpanel" aria-labelledby="two">
                                <div class="row col-12 checkRadio">
                                    <section class="row col-6 ">
                                        <div class="form-check col-12">
                                            <input type="radio" name="tipo_producto" id="tipo_producto" value="01-pa">
                                            <label class="col-form-label-sm" onmouseover="this.style.cursor='pointer'" for="pa" style="cursor: pointer;">01 - Foods and Liqueurs</label>
                                        </div>
                                        <div class="form-check col-12">
                                            <input type="radio" name="tipo_producto" id="tipo_producto" value="02-ef">
                                            <label class="col-form-label-sm" onmouseover="this.style.cursor='pointer'" for="ef" style="cursor: pointer;">02 - Drugs</label>
                                        </div>
                                        <div class="form-check col-12">
                                            <input type="radio" name="tipo_producto" id="tipo_producto" value="03-mm">
                                            <label class="col-form-label-sm" onmouseover="this.style.cursor='pointer'" for="mm" style="cursor: pointer;">03 - Medical Material</label>
                                        </div>
                                        <div class="form-check col-12">
                                            <input type="radio" name="tipo_producto" id="tipo_producto" value="04-pc">  
                                            <label class="col-form-label-sm" onmouseover="this.style.cursor='pointer'" for="pc" style="cursor: pointer;">04 - Cosmetics</label>
                                        </div>
                                        <div class="form-check col-12">
                                            <input type="radio" name="tipo_producto" id="tipo_producto" value="05-pn">
                                            <label class="col-form-label-sm" onmouseover="this.style.cursor='pointer'" for="pn" style="cursor: pointer;">05 - Natural Products</label>
                                        </div>
                                        <div class="form-check col-12">
                                            <input type="radio" name="tipo_producto" id="tipo_producto" value="06-pb">
                                            <label class="col-form-label-sm" onmouseover="this.style.cursor='pointer'" for="pb" style="cursor: pointer;">06 - Biological Products</label>
                                        </div>
                                    </section>
                                    <section class="row col-6">
                                        <div class="form-check col-12">
                                            <input type="radio" name="tipo_producto" id="tipo_producto" value="07-lc">
                                            <label class="col-form-label-sm" onmouseover="this.style.cursor='pointer'" for="lc" style="cursor: pointer;">07 - Companies</label>
                                        </div>
                                        <div class="form-check col-12">
                                            <input type="radio" name="tipo_producto" id="tipo_producto" value="08-in">
                                            <label class="col-form-label-sm" onmouseover="this.style.cursor='pointer'" for="in" style="cursor: pointer;">08 - Inspections</label>
                                        </div>
                                        <div class="form-check col-12">
                                            <input type="radio" name="tipo_producto" id="tipo_producto" value="09-ap">
                                            <label class="col-form-label-sm" onmouseover="this.style.cursor='pointer'" for="ap" style="cursor: pointer;">09 - Appointments</label>
                                        </div>
                                        <div class="form-check col-12">
                                            <input type="radio" name="tipo_producto" id="tipo_producto" value="10-qc">
                                            <label class="col-form-label-sm" onmouseover="this.style.cursor='pointer'" for="qc" style="cursor: pointer;">10 - QClab tests</label>
                                        </div>
                                        <div class="form-check col-12">
                                            <input type="radio" name="tipo_producto" id="tipo_producto" value="11-in">
                                            <label class="col-form-label-sm" onmouseover="this.style.cursor='pointer'" for="in" style="cursor: pointer;">11 - Inspections reports</label>
                                        </div>
                                        <div class="form-check col-12">
                                            <input type="radio" name="tipo_producto" id="tipo_producto" value="12-al">
                                            <label class="col-form-label-sm" onmouseover="this.style.cursor='pointer'" for="al" style="cursor: pointer;">12 - Alerts reports</label>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <div class="tab-pane fade col-12" id="three_" role="tabpanel" aria-labelledby="three">
                                <div class="form-group  row">
                                    <label for="report-1" class="col-sm-6 col-form-label-sm">Cost per use rights</label>
                                </div>
                                <div class="form-group size row">
                                    <label for="report-1" class="col-sm-5 col-form-label-sm">Drug Registration Account 	</label>
                                    <div class="col-sm-3">
                                        <input class="text-input form-control" name="ctg_tpr_cuopat" id="ctg_tpr_cuopat" maxlength="10" size="10" value="" type="text" style="text-align:right">
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="report-2" class="col-sm-5 col-form-label-sm">Companies </label>
                                    <div class="col-sm-3">
                                        <input class="text-input form-control" name="ctg_tpr_cuoemp" id="ctg_tpr_cuoemp" maxlength="10" size="10" value="" type="text" style="text-align:right">
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="report-3" class="col-sm-5 col-form-label-sm">Company licensing</label>
                                    <div class="col-sm-3">
                                        <input class="text-input form-control" name="ctg_tpr_cuoper" id="ctg_tpr_cuoper" maxlength="10" size="10" value="" type="text" style="text-align:right">
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="report-4" class="col-sm-5 col-form-label-sm">QClab tests account </label>
                                    <div class="col-sm-3">
                                        <input class="text-input form-control" name="ctg_tpr_cuofun" id="ctg_tpr_cuofun" maxlength="10" size="10" value="" type="text" style="text-align:right">
                                    </div>
                                </div><br>
                            </div>
                            <div class="tab-pane fade col-12" id="four_" role="tabpanel" aria-labelledby="four">
                                <br>
                                <div class="sm-col-12">
                                    <div class="btn-group btn-group-toggle bottomRadio row col-12 " data-toggle="buttons">
                                    <?php
                                        if ( is_array($arrImages) && ( count($arrImages)>0 ) ){
                                            reset($arrImages);
                                        foreach( $arrImages as $rTMP['key'] => $rTMP['value'] ){
                                    ?> 
                                            <label class="btn btn-dark bottomRadio">
                                                <input type="radio" name="options" id="option1" autocomplete="off" > <?php echo  $rTMP["value"]['gra_btn']; ?><br> <?php echo  $rTMP["value"]['gra_name']; ?>
                                            </label><br>
                                    <?PHP
                                            }
                                        }
                                    ?> 
                                    </div><br><br>
                                </div>
                            </div>
                            <div class="tab-pane fade col-12 input-size-cont" id="five_" role="tabpanel" aria-labelledby="five">
                                <div class="row col-12 ">
                                    <section class="row col-4 checkRadio">
                                        <div class="col-12 bg-info text-white">PRODUCT INFORMATION</div>
                                        <div class="form-check col-12 ">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_formula" id="ctg_tpr_req_formula">                                            <input type="hidden" value="1" name="review_val" id="review_val " class="form-check-input">
                                            <label class="form-check-label">Compositions</label>
                                        </div>
                                        <div class="form-check col-12">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_sec" id="ctg_tpr_req_sec">                                               <input type="hidden" value="1" name="approved_val" id="approved_val" class="form-check-input">
                                            <label class="form-check-label">Container Closure System</label>
                                        </div>
                                        <div class="form-check col-12">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_dci" id="ctg_tpr_req_dci">                                            <input type="hidden" value="1" name="final_val" id="final_val" class="form-check-input">
                                            <label class="form-check-label">PRODUCT IMAGES</label>
                                        </div>
                                        <div class="form-check col-12">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_mon" id="ctg_tpr_req_mon">                                            <input type="hidden" value="1" name="review_val" id="review_val " class="form-check-input">
                                            <label class="form-check-label">Monograph</label>
                                        </div>
                                        <div class="form-check col-12">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_ins" id="ctg_tpr_req_ins">                                            <input type="hidden" value="1" name="approved_val" id="approved_val" class="form-check-input">
                                            <label class="form-check-label">Additional Data Sheet </label>
                                        </div>
                                        <div class="form-check col-12">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_abo" id="ctg_tpr_req_abo">                                            <input type="hidden" value="1" name="final_val" id="final_val" class="form-check-input">
                                            <label class="form-check-label">Attorney information</label>
                                        </div>
                                    </section>
                                    <section class="row col-8 checkRadio">
                                        <div class="col-12 bg-info text-white">COMPANIES</div>
                                        <div class="form-check col-6">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_titular" id="ctg_tpr_req_titular">                                            <input type="hidden" value="1" name="approved_val" id="approved_val" class="form-check-input">
                                            <label class="form-check-label">Applicant/MAH</label>
                                        </div>
                                        <div class="form-check col-6 ">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_prop" id="ctg_tpr_req_prop">                                            <input type="hidden" value="1" name="review_val" id="review_val " class="form-check-input">
                                            <label class="form-check-label">Owner</label>
                                        </div>
                                        <div class="form-check col-6">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_repr" id="ctg_tpr_req_repr">                                            <input type="hidden" value="1" name="approved_val" id="approved_val" class="form-check-input">
                                            <label class="form-check-label">Representative</label>
                                        </div>
                                        <div class="form-check col-6">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_imp" id="ctg_tpr_req_imp">                                           <input type="hidden" value="1" name="approved_val" id="approved_val" class="form-check-input">
                                            <label class="form-check-label">Importer</label>
                                        </div>
                                        <div class="form-check col-6 ">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_dist" id="ctg_tpr_req_dist">                                            <input type="hidden" value="1" name="review_val" id="review_val " class="form-check-input">
                                            <label class="form-check-label">Distributor</label>
                                        </div>
                                        <div class="form-check col-6">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_acon" id="ctg_tpr_req_acon">                                            <input type="hidden" value="1" name="approved_val" id="approved_val" class="form-check-input">
                                            <label class="form-check-label">Conditioner</label>
                                        </div>
                                        <div class="form-check col-6">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_alm" id="ctg_tpr_req_alm">                                            <input type="hidden" value="1" name="approved_val" id="approved_val" class="form-check-input">
                                            <label class="form-check-label">Wharehouse</label>
                                        </div>
                                        <div class="form-check col-6 ">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_fab" id="ctg_tpr_req_fab">                                            <input type="hidden" value="1" name="review_val" id="review_val " class="form-check-input">
                                            <label class="form-check-label">Manufacturer</label>
                                        </div>
                                        <div class="form-check col-6">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_fabmatpri" id="ctg_tpr_req_fabmatpri">                                            <input type="hidden" value="1" name="approved_val" id="approved_val" class="form-check-input">
                                            <label class="form-check-label">Manufacturer raw material</label>
                                        </div>
                                        <div class="form-check col-6 ">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_fabprofin" id="ctg_tpr_req_fabprofin">                                            <input type="hidden" value="1" name="review_val" id="review_val " class="form-check-input">
                                            <label class="form-check-label">End product manufacturer</label>
                                        </div>
                                        <div class="form-check col-6">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_fabpriact" id="ctg_tpr_req_fabpriact">                                            <input type="hidden" value="1" name="approved_val" id="approved_val" class="form-check-input">
                                            <label class="form-check-label">Active ingredient manufacturer</label>
                                        </div>
                                        <div class="form-check col-6">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_fabenv" id="ctg_tpr_req_fabenv">                                            <input type="hidden" value="1" name="approved_val" id="approved_val" class="form-check-input">
                                            <label class="form-check-label">Manufacturer packager</label>
                                        </div>
                                        <div class="form-check col-6 ">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_fabenvadi" id="ctg_tpr_req_fabenvadi">                                            <input type="hidden" value="1" name="review_val" id="review_val " class="form-check-input">
                                            <label class="form-check-label">Additional manufacturer packer</label>
                                        </div>
                                        <div class="form-check col-6">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_fabadi" id="ctg_tpr_req_fabadi">                                            <input type="hidden" value="1" name="approved_val" id="approved_val" class="form-check-input">
                                            <label class="form-check-label">Other manufacturers</label>
                                        </div>
                                        <div class="form-check col-6">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_enva" id="ctg_tpr_req_enva">                                            <input type="hidden" value="1" name="approved_val" id="approved_val" class="form-check-input">
                                            <label class="form-check-label">Providers active ingredient</label>
                                        </div>
                                        <div class="form-check col-6 ">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_remi" id="ctg_tpr_req_remi">                                            <input type="hidden" value="1" name="review_val" id="review_val " class="form-check-input">
                                            <label class="form-check-label">Sender</label>
                                        </div>
                                        <div class="form-check col-12 ">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_penc" id="ctg_tpr_req_penc">                                            <input type="hidden" value="1" name="review_val" id="review_val " class="form-check-input">
                                            <label class="form-check-label">Plant Formulator / Sponsorship for clinical studies</label>
                                        </div>
                                        <div class="form-check col-12 ">
                                            <input type="checkbox" value="1" name="ctg_tpr_req_pesc" id="ctg_tpr_req_pesc">                                           <input type="hidden" value="1" name="review_val" id="review_val " class="form-check-input">
                                            <label class="form-check-label">Packing Plant / Sponsorship for clinical trials</label>
                                        </div>
                                        
                                    </section><br>
                                </div>
                            </div>
                            <div class="tab-pane fade col-12" id="six_" role="tabpanel" aria-labelledby="six">
                                <div class="form-group row">
                                    <label for="desc_email" class="col-sm-6 col-form-label">Email signature</label>
                                    <div class="col-sm-11">
                                        <textarea class="form-control" name="desc_email" id="desc_email" rows="5" onkeyup="fntTextComentEmail() "></textarea>
                                    </div>
                                    <button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#myModal"><i class="far fa-window-maximize"></i></button><br>
                                </div><br>
                             </div>
                            <div class="tab-pane fade col-12" id="seven_" role="tabpanel" aria-labelledby="seven">
                                <div class="form-group size row">
                                    <label for="report-1" class="col-sm-5 col-form-label-sm">1.</label>
                                    <div class="col-sm-1">
                                        <input class="text-input form-control" name="ctg_tpr_sig1" id="ctg_tpr_sig1" maxlength="10" size="10" value="" type="text">
                                    </div>
                                </div>   
                                <div class="form-group size row">
                                    <label for="report-1" class="col-sm-5 col-form-label-sm">2.</label>
                                    <div class="col-sm-1">
                                        <input class="text-input form-control" name="ctg_tpr_sig2" id="ctg_tpr_sig2" maxlength="10" size="10" value="" type="text">
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="report-1" class="col-sm-5 col-form-label-sm">3.</label>
                                    <div class="col-sm-1">
                                        <input class="text-input form-control" name="ctg_tpr_sig3" id="ctg_tpr_sig3" maxlength="10" size="10" value="" type="text">
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="report-1" class="col-sm-5 col-form-label-sm">4.</label>
                                    <div class="col-sm-1">
                                        <input class="text-input form-control" name="ctg_tpr_sig4" id="ctg_tpr_sig4" maxlength="10" size="10" value="" type="text">
                                    </div>
                                </div>
                                <div class="form-group size row">
                                    <label for="report-1" class="col-sm-5 col-form-label-sm">5.</label>
                                    <div class="col-sm-1">
                                        <input class="text-input form-control" name="ctg_tpr_sig5" id="ctg_tpr_sig5" maxlength="10" size="10" value="" type="text">
                                    </div>
                                </div><br>                         
                            </div>
                            <div class="tab-pane fade col-12" id="eight_" role="tabpanel" aria-labelledby="eight">
                                <div class="form-group size row">
                                    <label for="preparation" class="col-sm-5 col-form-label-sm">Number of applications per company per month</label>
                                    <div class="col-sm-3">
                                        <input class="text-input" name="ctg_tpr_vus_nusolemp" id="ctg_tpr_vus_nusolemp" maxlength="5" size="7" value="" type="text" >
                                    </div>
                                    <label for="correlative" class="col-sm-5 col-form-label-sm">Number of images allowed</label>
                                    <div class="col-sm-3">
                                        <input class="text-input" name="ctg_tpr_numimg" id="ctg_tpr_numimg" maxlength="5" size="7" value="" type="text" >
                                    </div>
                                    <label for="preparation" class="col-sm-5 col-form-label-sm">Number of applications per applicant per day</label>
                                    <div class="col-sm-3">
                                        <input class="text-input" name="ctg_tpr_vus_nusolpat" id="ctg_tpr_vus_nusolpat" maxlength="5" size="7" value="" type="text" >
                                    </div>
                                </div>  
                                <div class="form-group size row">
                                    <label for="Enabled" class="col-sm-5 col-form-label-sm">Allows new ingredients in Composition</label>
                                    <div class="col-sm-1">
                                        <select class="form-control form-control-sm" name="ctg_tpr_vus_newing" id="ctg_tpr_vus_newing">
                                            <option value="">..</option>
                                            <option value="1">YES</option>
                                            <option value="0">NO</option>
                                        </select>
                                    </div>
                                </div>                          
                            </div>
                        </div>
                    </div><br>
                  
                    <div class="form-group row">
                        <label for="Comments" class="col-sm-2 col-form-label">Comments</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="comments" id="comments" rows="2" onkeyup="fntTextComent() "></textarea>
                        </div>
                        <button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#myModal"><i class="far fa-window-maximize"></i></button>

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
                                    <textarea class="form-control" name="commentsModalEmail" id="commentsModalEmail" rows="18" onkeyup="fntTextComentEmail() "></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="myModalTwo" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Comments</h4>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="commentsModal" id="commentsModal" rows="18" onkeyup="fntTextComentEmail() "></textarea>
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
                        <input class="form-control col-sm-10" name="Search" id="Search" type="text" onkeyup="fntDibujoTablaProducto() ">
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
    document.getElementById("code").focus();
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

            var strIdTpr = $("#hidIdTpr_" + intParametro).val();
            var strId = $("#hidId_" + intParametro).val();
            var strCodigo = $("#hidCode_" + intParametro).val();
            var strDescription = $("#hidDescription_" + intParametro).val();
            var strEvaluationPass = $("#hidEvaluationPass_" + intParametro).val();
            var strEvaluationDac = $("#hidEvaluationDac_" + intParametro).val();
            var strEvaluationPassT = $("#hidEvaluationPassT_" + intParametro).val();
            var strVus = $("#hidVus_" + intParametro).val();
            var strComments = $("#hidComments_" + intParametro).val();

            // alert(strDPI + "                         strDPI");
            console.log(intParametro)
            $("#idTpr").val(strIdTpr);
            $("#id").val(strId);
            $("#code").val(strCodigo);
            $("#description").val(strDescription);

            var boolCheckPass = (strEvaluationPass == 1) ? true : false;
            $("[name=review]").prop('checked', boolCheckPass);
            $("#review").val(strEvaluationPass);
            $("#review_val").val(strEvaluationPass);

            var boolCheckPassl = (strEvaluationDac == 1) ? true : false;
            $("[name=approved]").prop('checked', boolCheckPassl);
            $("#approved").val(strEvaluationDac);
            $("#approved_val").val(strEvaluationDac);

            var boolCheckPassll = (strEvaluationPassT == 1) ? true : false;
            $("[name=final]").prop('checked', boolCheckPassll);
            $("#final").val(strEvaluationPassT);
            $("#final_val").val(strEvaluationPassT);
            $("#vus").val(strVus);
            $("#comments").val(strComments);

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

    function fntDibujoTablaProducto() {

        var strSearch = $("#Search").val();
        var strCategori = $("#categori").val();
        $("#unit_").val(strCategori);

        //alert(strCategori + "                                  strCategori");

        $.ajax({

            url: "mu_slt_categoriesOfTypeOfProducts.php?validaciones=busqueda_categoria",
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

    window.addEventListener('load', fntDibujoTablaProducto, false)
</script>