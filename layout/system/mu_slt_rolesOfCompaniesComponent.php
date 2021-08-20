<section class="content col-lg-12"><br>
      <div class="container-fluid" id="contenido">
        <div class="row">
          <div class="col-lg-2"></div>
            <div class="cont col-lg-8">
            <form id="formData" method="POST"> 
                <ul class="nav nav-pills nav-fill btn-dark">
                    <li class="nav-item">
                        <button type="button" id="insert" onclick="fntUpdateInsert()" class="btn btn-dark btn-block">Save</button>
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
                    <input class="form-control " id="code" name="code" onkeyup="fntValidacionCode();" type="text" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="Description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" rows="1" required></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-5 checkRadio">
                    <div class="form-check">
                        <input class="form-check-input" name="optradio" type="radio"  id="Applicant" value="1">
                        <label class="form-check-label" for="exampleRadios1">
                            Applicant/MAH 
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="optradio" id="Representatives" value="1">
                        <label class="form-check-label" for="exampleRadios2">
                            Representatives
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="optradio" id="Distributors" value="1">
                        <label class="form-check-label" for="exampleRadios2">
                            Distributors
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="optradio" id="Warehouses" value="1" >
                        <label class="form-check-label" for="exampleRadios1">
                            Warehouses
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="optradio" id="Providers" value="1">
                        <label class="form-check-label" for="exampleRadios2">
                            Providers active ingredient
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="optradio" id="Packing" value="1" >
                        <label class="form-check-label" for="exampleRadios1">
                            Packing Plant / Sponsorship for clinical trials
                        </label>
                    </div>
                </div>
                <div class="col-sm-5 checkRadio">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="optradio" id="Owners" value="1" >
                        <label class="form-check-label" for="exampleRadios1">
                            Owners
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="optradio" id="Importers" value="1">
                        <label class="form-check-label" for="exampleRadios2">
                            Importers
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="optradio" id="Conditioner" value="1" >
                        <label class="form-check-label" for="exampleRadios1">
                            Conditioner
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="optradio" id="Manufacturers" value="1">
                        <label class="form-check-label" for="exampleRadios2">
                            Manufacturers
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="optradio" id="Formulator" value="1" >
                        <label class="form-check-label" for="exampleRadios1">
                            Plant Formulator / Sponsorship for clinical studies
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="optradio" id="Sender" value="1">
                        <label class="form-check-label" for="exampleRadios2">
                            Sender
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="Comments" class="col-sm-2 col-form-label">Comments</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="comments" id="comments" rows="2"  onkeyup="fntTextComent() "></textarea>
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
                      <textarea class="form-control" name="commentsModal" id="commentsModal" rows="18" onkeyup="fntTextComentModal() " ></textarea>
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
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="div1 tableFixHead">
        <table id="tableData" class="table table-bordered table-striped table-hover table-sm">
            <thead>
            <tr  class="table-info">
                <th>Code</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            
                <?php
                    if ( is_array($arrRoles) && ( count($arrRoles)>0 ) ){
                      $intContador = 1;
                        reset($arrRoles);
                    foreach( $arrRoles as $rTMP['key'] => $rTMP['value'] ){
                ?> 
                    <tr data-dismiss="modal" style="cursor:pointer;" onclick="fntSelect('<?php print $intContador; ?>');">
                        <td><?php echo  $rTMP["value"]['ctg_rol_id']; ?></td>
                        <td><?php echo  $rTMP["value"]['ctg_rol_desc']; ?></td>
                    </tr>
                        <input type="hidden" name="hidCodigo_<?php print $intContador; ?>" id="hidCodigo_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_rol_id']; ?>">
                        <input type="hidden" name="hidDescription_<?php print $intContador; ?>" id="hidDescription_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_rol_desc']; ?>">
                        <input type="hidden" name="hidComments_<?php print $intContador; ?>" id="hidComments_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_rol_obs']; ?>">
                        
                        <input type="hidden" name="hidTits_<?php print $intContador; ?>" id="hidTits_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_rol_tit']; ?>">
                        <input type="hidden" name="hidProp_<?php print $intContador; ?>" id="hidProp_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_rol_prop']; ?>">
                        <input type="hidden" name="hidRepr_<?php print $intContador; ?>" id="hidRepr_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_rol_repr']; ?>">
                        <input type="hidden" name="hidFabr_<?php print $intContador; ?>" id="hidFabr_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_rol_fabr']; ?>">
                        <input type="hidden" name="hidEnva_<?php print $intContador; ?>" id="hidEnva_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_rol_enva']; ?>">
                        <input type="hidden" name="hidDist_<?php print $intContador; ?>" id="hidDist_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_rol_dist']; ?>">
                        <input type="hidden" name="hidAlma_<?php print $intContador; ?>" id="hidAlma_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_rol_alma']; ?>">
                        <input type="hidden" name="hidImpo_<?php print $intContador; ?>" id="hidImpo_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_rol_impo']; ?>">
                        <input type="hidden" name="hidLabo_<?php print $intContador; ?>" id="hidLabo_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_rol_labo']; ?>">
                        <input type="hidden" name="hidOtr_<?php print $intContador; ?>" id="hidOtr_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_rol_otr']; ?>">
                        <input type="hidden" name="hidAcon_<?php print $intContador; ?>" id="hidAcon_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_rol_acon']; ?>">
                        <input type="hidden" name="hidPat_<?php print $intContador; ?>" id="hidPat_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_rol_pat']; ?>">
                <?PHP
                    $intContador++;                    
                  }
                        }
                ?>     
            </tbody>
        </table>
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
    document.getElementById('replace').disabled=true;
    document.getElementById('delete').disabled=true;
  //INICIO DE BOTONES DEL NAV
    document.getElementById('home').style.display = 'block';
    document.getElementById('back').style.display = 'block';
    document.getElementById('docOne').style.display = 'none';
    document.getElementById('docTwo').style.display = 'none';
    document.getElementById('window').style.display = 'block';
    document.getElementById('logout').style.display = 'block';
</script>
<script>
 function fntSelect(intParametro){
  document.getElementById('replace').disabled=true;
  document.getElementById('delete').disabled=false;

  intParametro = !intParametro ? 0 : intParametro;

  if ( intParametro>0 ){

    var strCodigo = $("#hidCodigo_"+intParametro).val();
    var strDescription = $("#hidDescription_"+intParametro).val();
    var strComments = $("#hidComments_"+intParametro).val();

    var strApplicant = $("#hidTits_"+intParametro).val();
    var strRepresentatives = $("#hidProp_"+intParametro).val();
    var strDistributors = $("#hidRepr_"+intParametro).val();
    var strWarehouses = $("#hidFabr_"+intParametro).val();
    var strProviders = $("#hidEnva_"+intParametro).val();
    var strPacking = $("#hidDist_"+intParametro).val();
    var strOwners = $("#hidAlma_"+intParametro).val();
    var strImporters = $("#hidImpo_"+intParametro).val();
    var strConditioner = $("#hidLabo_"+intParametro).val();
    var strManufacturers = $("#hidOtr_"+intParametro).val();
    var strFormulator = $("#hidAcon_"+intParametro).val();
    var strSender = $("#hidPat_"+intParametro).val();

    // alert(strDPI + "                         strDPI");

    $("#code").val(strCodigo);
    $("#description").val(strDescription);
    $("#comments").val(strComments);

    var boolCheckPasslApplicant = (strApplicant == 1)?true:false;
    $("[id=approved]").prop('checked',boolCheckPassl);
    $("#Applicant").val(strApplicant);

    var boolCheckPasslRepresentatives = (strEvaluationDac == 1)?true:false;
    $("[id=approved]").prop('checked',boolCheckPassl);
    $("#Representatives").val(strRepresentatives);

    var boolCheckPasslDistributors = (strEvaluationDac == 1)?true:false;
    $("[id=approved]").prop('checked',boolCheckPassl);
    $("#Distributors").val(strDistributors);

    var boolCheckPasslWarehouses = (strWarehouses == 1)?true:false;
    $("[id=approved]").prop('checked',boolCheckPassl);
    $("#Warehouses").val(strWarehouses);

    var boolCheckPassl = (strProviders == 1)?true:false;
    $("[id=approved]").prop('checked',boolCheckPassl);
    $("#Providers").val(strProviders);

    var boolCheckPasslPacking = (strPacking == 1)?true:false;
    $("[id=approved]").prop('checked',boolCheckPassl);
    $("#Packing").val(strPacking);

    var boolCheckPasslOwners = (strOwners == 1)?true:false;
    $("[id=approved]").prop('checked',boolCheckPassl);
    $("#Owners").val(strOwners);

    var boolCheckPasslImporters = (strImporters == 1)?true:false;
    $("[id=approved]").prop('checked',boolCheckPassl);
    $("#Importers").val(strImporters);

    var boolCheckPasslConditioner = (strConditioner == 1)?true:false;
    $("[id=approved]").prop('checked',boolCheckPassl);
    $("#Conditioner").val(strConditioner);

    var boolCheckPasslManufacturers = (strManufacturers == 1)?true:false;
    $("[id=approved]").prop('checked',boolCheckPassl);
    $("#Manufacturers").val(strManufacturers);

    var boolCheckPasslFormulator = (strFormulator == 1)?true:false;
    $("[id=approved]").prop('checked',boolCheckPassl);
    $("#Formulator").val(strFormulator);

    var boolCheckPasslSender = (strSender == 1)?true:false;
    $("[id=approved]").prop('checked',boolCheckPassl);
    $("#Sender").val(strSender);

  }

 };

//TEXTO REACTIVO DEL CAMPO COMENT
function fntTextComentModal(){
 
 document.getElementById("comments").value = document.getElementById("commentsModal").value;

}

function fntTextComent(){

 document.getElementById("commentsModal").value = document.getElementById("comments").value;

}
 </script>
<script>
   function muestra_oculta(id){
      if (document.getElementById){
      var el = document.getElementById(id); 
      el.style.display = (el.style.display == 'none') ? 'block' : 'none'; 
      }
    }

    function activarInputCode(){
      document.getElementById("code").focus();
    }
 </script>