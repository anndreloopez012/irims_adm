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
                    <label for="dropOne" class="col-sm-2 col-form-label">UNIT</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="categori" name="categori" onchange="fntDibujoTablaProducto() ">
                        <?php require_once '../../interbase/tmfAdm.php'; ?>  
                        <?php
                            if ( is_array($arrTypeProduct) && ( count($arrTypeProduct)>0 ) ){
                                reset($arrTypeProduct);
                            foreach( $arrTypeProduct as $rTMP['key'] => $rTMP['value'] ){
                        ?>  
                            <option value="<?php echo  $rTMP["value"]['ctg_tpr_id']; ?>"><?php echo  $rTMP["value"]['ctg_tpr_desc'];  ?></option>       
                        <?PHP
                            }
                                    }
                        ?>    
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <input class="form-control " name="unit_" id="unit_" type="text"  disabled>
                        <input class="form-control " name="id" id="id" type="hidden"  >
                    </div>
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
        <div class="col-sm-12 row">
            <label for="dropOne" class="col-sm-2 col-form-label">Search</label>
            <input class="form-control col-sm-10" name="Search" id="Search" type="text" onkeyup="fntDibujoTablaProducto() ">
        </div><br>
      <div class="div1">
        <div  id="Tabla" name="Tabla">
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
    var strCodigo = $("#hidCode_"+intParametro).val();
    var strDescription = $("#hidDescription_"+intParametro).val();
    var strComment = $("#hidComment_"+intParametro).val();

    // alert(strDPI + "                         strDPI");

    $("#id").val(strId);
    $("#code").val(strCodigo);
    $("#description").val(strDescription);
    $("#comments").val(strComment);

  }

 };

//TEXTO REACTIVO DEL CAMPO COMENT
function fntTextComentModal(){
 
 document.getElementById("comments").value = document.getElementById("commentsModal").value;

}

function fntTextComent(){

 document.getElementById("commentsModal").value = document.getElementById("comments").value;

}

function muestra_oculta(id){
      if (document.getElementById){ //se obtiene el id
      var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
      el.style.display = (el.style.display == 'none') ? 'block' : 'none'; 
      }
    }

function activarInputCode(){
  document.getElementById("code").focus();
}

function fntDibujoTablaProducto(){
                
  var strCategori = $("#categori").val();
  $("#unit_").val(strCategori);
  
  //alert(strCategori + "                                  strCategori");
  
  $.ajax({
  
      url: "mu_slt_statusOfProductsType.php?validaciones=busqueda_categoria",
      data: {
              categori:strCategori,
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
  window.addEventListener('load', fntDibujoTablaProducto, false ) 
 </script>
