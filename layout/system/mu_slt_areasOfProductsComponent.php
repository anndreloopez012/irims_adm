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
                    <li class="nav-item" >
                        <a href="index.php" class="btn btn-dark btn-block "><i class="fas fa-2x fa-window-close"></i></a>
                    </li>
                </ul><br>

              <div class="form-group row">
                <label for="Code" class="col-sm-2 col-form-label">Code</label>
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#basicExampleModal">
                  <i class="fas fa-search"></i>
                </button>
                <div class="col-sm-1">
                    <input class="form-control " name="id" id="id" type="hidden" >
                    <input class="form-control " name="code" id="code" onkeyup="fntValidacionCode();" type="text" >
                </div>
              </div>
              <div class="form-group row">
                <label for="Description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" id="description" rows="1" ></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="Acronym" class="col-sm-2 col-form-label">Acronym</label>
                <div class="col-sm-3">
                    <input class="form-control" name="acronym" id="acronym" type="text" >
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
        <?php require_once '../../interbase/tmfAdm.php'; ?>
        <table id="tableData" class="table table-bordered table-striped table-hover table-sm">
            <thead>
            <tr  class="table-info">
                <th>Code</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            
                <?php
                    if ( is_array($arrTypeProduct) && ( count($arrTypeProduct)>0 ) ){
                      $intContador = 1;
                        reset($arrTypeProduct);
                    foreach( $arrTypeProduct as $rTMP['key'] => $rTMP['value'] ){
                ?> 
                    <tr data-dismiss="modal" style="cursor:pointer;" onclick="fntSelect('<?php print $intContador; ?>');">
                        <td><?php echo  $rTMP["value"]['ctg_are_id']; ?></td>
                        <td><?php echo  $rTMP["value"]['ctg_are_desc']; ?></td>
                    </tr>
                        <input type="hidden" name="hidId_<?php print $intContador; ?>" id="hidId_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_id']; ?>">
                        <input type="hidden" name="hidCodigo_<?php print $intContador; ?>" id="hidCodigo_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_are_id']; ?>">
                        <input type="hidden" name="hidDescription_<?php print $intContador; ?>" id="hidDescription_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_are_desc']; ?>">
                        <input type="hidden" name="hidAcronym_<?php print $intContador; ?>" id="hidAcronym_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_are_siglas']; ?>">
                        <input type="hidden" name="hidComments_<?php print $intContador; ?>" id="hidComments_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_are_obs']; ?>">
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

    var strId = $("#hidId_"+intParametro).val();
    var strCodigo = $("#hidCodigo_"+intParametro).val();
    var strDescription = $("#hidDescription_"+intParametro).val();
    var strAcronym = $("#hidAcronym_"+intParametro).val();
    var strComments = $("#hidComments_"+intParametro).val();

    // alert(strDPI + "                         strDPI");

    $("#id").val(strId);
    $("#code").val(strCodigo);
    $("#description").val(strDescription);
    $("#acronym").val(strAcronym);
    $("#comments").val(strComments);

  }

 }

 //TEXTO REACTIVO DEL CAMPO COMENT
 function fntTextComentModal(){
 
  document.getElementById("comments").value = document.getElementById("commentsModal").value;

 }

 function fntTextComent(){
 
 document.getElementById("commentsModal").value = document.getElementById("comments").value;

}

 </script>

<script>
  //OCULTAR FORMULARIO
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
