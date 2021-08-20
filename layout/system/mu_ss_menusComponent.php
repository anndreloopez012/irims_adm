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
                    <label for="dropOne" class="col-sm-2 col-form-label">Module</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="categori" name="categori" onchange="fntDibujoTablaModulo_l() ">
                          <option >..</option>
                        <?php require_once '../../interbase/tmfAdm.php'; ?>  
                        <?php
                            if ( is_array($arrTypeModulo) && ( count($arrTypeModulo)>0 ) ){
                                $intContador = 1;
                                reset($arrTypeModulo);
                            foreach( $arrTypeModulo as $rTMP['key'] => $rTMP['value'] ){
                        ?>  
                            <option value="<?php echo  $rTMP["value"]['id']; ?>"><?php echo  $rTMP["value"]['adm_name'];  ?></option>
                            
                        <?PHP
                                $intContador++;  
                            }
                                    }
                        ?>     
                        </select>
                        </div>
                    <div class="col-sm-1">
                        <input class="form-control " name="unit_" id="unit_" type="text"  disabled>
                    </div>
                        
                </div>
                <div class="form-group row">
                <label for="Code" class="col-sm-2 col-form-label">Menu</label>
                      <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#basicExampleModal">
                        <i class="fas fa-search"></i>
                      </button>
                    <div class="col-sm-2">
                        <input class="form-control " name="id" id="id" type="hidden" >
                        <input class="form-control " name="code" id="code" onkeyup="fntValidacionCode();" type="text" required>
                    </div>
                </div>
                <div class="form-group row">
                <label for="Code" class="col-sm-2 col-form-label">Order</label>
                    <div class="col-sm-2">
                      <input class="form-control " name="numOrder" id="numOrder" type="text" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="description" rows="1" required></textarea>
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
        <div class="div1">
            <div  id="Tabla" name="Tabla">
                <!-- DIBUJO DE TABLA CATEGORIA MENU-->
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="basicExampleModalTwo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="div1">
            <div  id="TablaTwo" name="TablaTwo">
                <!-- DIBUJO DE TABLA CATEGORIA OPCION-->
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="basicExampleModalThre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="div1">
            <div  id="TablaThre" name="TablaThre">
                <!-- DIBUJO DE TABLA CATEGORIA SUB OPCION-->
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
 function fntSelectModulo_l(intParametro){
  document.getElementById('replace').disabled=true;
  document.getElementById('delete').disabled=false;

  intParametro = !intParametro ? 0 : intParametro;

  if ( intParametro>0 ){

    var strId = $("#hidId_"+intParametro).val();
    var strCodigo = $("#hidCode_"+intParametro).val();
    var strDescrip = $("#hidDescrip_"+intParametro).val();
    var strComent = $("#hidObs_"+intParametro).val();
    var strOrder = $("#hidNum_"+intParametro).val();

    $("#id").val(strId);
    $("#code").val(strCodigo);
    $("#comments").val(strComent);
    $("#description").val(strDescrip);
    $("#numOrder").val(strOrder);
    
  }

    var strCode = $("#code").val();

    //alert(strCode + "                                  strCode");
                
        $.ajax({
        
            url: "mu_ss_menus.php?validaciones=busqueda_modulos_ll",
            data: {
                    code:strCode,
                },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
                success: function(data) {

                $("#TablaTwo").html("");
                $("#TablaTwo").html(data);

                return false;
            }
        });

 };

 function fntSelectModulo_ll(intParametro){
  document.getElementById('replace').disabled=true;
  document.getElementById('delete').disabled=false;

  intParametro = !intParametro ? 0 : intParametro;

  if ( intParametro>0 ){

    var strIdOption = $("#hidId_ll_"+intParametro).val();
    var strOption = $("#hidCode_ll_"+intParametro).val();
    

    $("#idOptions").val(strIdOption);
    $("#Options").val(strOption);
    
  }

    var strOption = $("#Options").val();

    //alert(strOption + "                                  strOption");
                
        $.ajax({
        
            url: "mu_ss_menus.php?validaciones=busqueda_modulos_lll",
            data: {
                    Options:strOption,
                },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
                success: function(data) {

                $("#TablaThre").html("");
                $("#TablaThre").html(data);

                return false;
            }
        });

 };

//TEXTO REACTIVO DEL CAMPO COMENT
function fntTextComentModal(){
 
 document.getElementById("comments").value = document.getElementById("commentsModal").value;

}

function fntTextComent(){

 document.getElementById("commentsModal").value = document.getElementById("comments").value;

}

 
function muestra_oculta(id){
  if (document.getElementById){ 
  var el = document.getElementById(id); 
  el.style.display = (el.style.display == 'none') ? 'block' : 'none'; 
  }
};
    
    
function fntDibujoTablaModulo_l(){
                    
        var strCategori = $("#categori").val();
        $("#unit_").val(strCategori);
        
        //alert(strCategori + "                                  strCategori");
        
        $.ajax({
        
            url: "mu_ss_menus.php?validaciones=busqueda_modulos_l",
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
            

    function activarInputCode(){
      document.getElementById("code").focus();
    }
 </script>
