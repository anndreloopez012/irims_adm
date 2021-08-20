<section class="content col-lg-12"><br>
      <div class="container-fluid" id="contenido">
        <div class="row">
          <div class="col-lg-2"></div>
            <div class="cont col-lg-8">
            <form id="formData" method="POST"> 
            <ul class="nav nav-pills nav-fill btn-dark">
                <li class="nav-item">
                    <button type="button" data-toggle="modal" data-target="#basicExampleModal" id="add" class="btn btn-dark btn-block">Add</button>
                </li>
                <li class="nav-item" >
                    <a href="index.php" class="btn btn-dark btn-block "><i class="fas fa-2x fa-window-close"></i></a>
                </li>
            </ul><br>
                <div class="form-group row">
                    <label for="dropOne" class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="categori" name="categori" onchange="fntDibujoTablaMessage() ">                      
                            <option value="0">select</option>
                            <option value="1">uno</option>
                            <option value="2">dos</option>
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <input class="form-control " name="unit_" id="unit_" type="text"  disabled>
                    </div>
                    <label for="dropOne" class="col-sm-2 col-form-label">Search</label>
                    <div class="col-sm-3">
                        <input class="form-control " name="id" id="id" type="hidden" >
                        <input class="form-control " name="Search" id="Search" type="text" required onkeyup="fntDibujoTablaMessage() ">
                    </div>
                </div>

                <div class="div1">
                    <div  id="Tabla" name="Tabla">
                        <!-- DIBUJO DE TABLA CATEGORIA PRODUCTO-->
                    </div>
                </div>
                
            </form>  
          </div>
        </div>
      </div>
    </section>

<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
        </ul><br>
        <div class="form-group row">
            <label for="Acronym" class="col-sm-2 col-form-label">Code</label>
            <div class="col-sm-6">
                <input class="form-control" name="code_" id="code_" type="text" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="Description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="description_" id="description_" rows="2" required></textarea>
            </div>
        </div>
           
        <div class="form-group row">
            <label for="dropOne" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-3">
                <select class="form-control" id="categori_" name="categori_" onchange="fntDibujoTablaMessage() ">                      
                    <option value="0">select</option>
                    <option value="1">uno</option>
                    <option value="2">dos</option>
                </select>
            </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    
<script>
//FOCUS AL INICIAR PANTALLA
    document.getElementById("Search").focus();
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

    var strCodigo = $("#hidCode_"+intParametro).val();
    var strDescription = $("#hidDescription_"+intParametro).val();
    var strCategori = $("#hidCategori_"+intParametro).val();

     alert(strDescription + "                         strDescription");

    $("#code_").val(strCodigo);
    $("#description_").val(strDescription);
    $("#categori_").val(strCategori);

  }

  $('#basicExampleModal').modal('show');

 };

 //update delete e insert
function fntUpdateInsert(){
      var datos=$('#formData').serialize();
       //alert(datos);
       //return false;

        $.ajax({
            type:"POST",
            data:datos,
            url:"mu_slt_categoriesOfTypeOfProducts.php?validaciones=insert",
            success:function(r){
                if(r==1){
                  location.reload(); 
                  alert("Proceso realizado con exito");
                }else{
                  alert("No se pudo realizar el proceso");
                }
            }
        });
        return false;
    };
    function fntReplace(){
      var datos=$('#formData').serialize();
       //alert(datos);
       //return false;

        $.ajax({
            type:"POST",
            data:datos,
            url:"mu_slt_categoriesOfTypeOfProducts.php?validaciones=replace",
            success:function(r){
                if(r==1){ 
                  alert("Proceso realizado con exito");
                  location.reload();
                }else{
                  alert("No se pudo realizar el proceso");
                }
            }
        });
        return false;
    };
    function fntDelete() {
        var txt;
        if (confirm("Confirmacion")) {
            var datos=$('#formData').serialize();
            //alert(datos);
            //return false;

            $.ajax({
                type:"POST",
                data:datos,
                url:"mu_slt_categoriesOfTypeOfProducts.php?validaciones=delete",
                success:function(r){
                    if(r==1){
                    location.reload(); 
                    alert("Eliminado");
                    }else{
                    alert("No se pudo realizar el proceso");
                    }
                }
            });
            return false;
        }
        else {
            txt = "Cancel";
            } 
    };
  
    function muestra_oculta(id){
      if (document.getElementById){ 
      var el = document.getElementById(id); 
      el.style.display = (el.style.display == 'none') ? 'block' : 'none'; 
      }
    };
    
    
    function fntDibujoTablaMessage(){
                    
    var strCategori = $("#categori").val();
    var $strSearch = $("#Search").val();
    $("#unit_").val(strCategori);
    
    //alert(strCategori + "                                  strCategori");
    
    $.ajax({
    
        url: "mu_m_admMessages.php?validaciones=busqueda_messages",
        data: {
                categori:strCategori,
                Search:$strSearch,
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

