<script>
//validar codigo 
function fntValidacionCode(){
                    
    var objCode = document.getElementById("code");
    var intCode = objCode.value*1;
      
    if ( !isNaN(intCode) && (intCode>0) ){
                                                
        $.ajax({
            
            url: "mu_slt_categoriesOfTypeOfProducts.php?validaciones=validacion_code&code="+intCode,
            async: true,
            global: false,

            success: function(data) {
                
                if (data == "Y"){
                    alertify.alert('Categories Of Type Products', 'this code is already being used');
                }
              }
          });
            
      }
      return false;
    }

//update delete e insert
function fntUpdateInsert(){
  valor = document.getElementById("code").value;
  if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          alertify.alert('Categories Of Type Products', 'Please complete the following field:Code');
    return false;
  }

  valor = document.getElementById("description").value;
  if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          alertify.alert('Status Of Products Type ', 'Please complete the following field:Description');
    return false;
  }

  alertify.confirm('Categories Of Type Products', 'Are you sure you wish to continue?  ', function(){ 
    var datos=$('#formData').serialize();
       alert(datos);
       return false;

        $.ajax({
            type:"POST",
            data:datos,
            dataType: 'json',
            url:"mu_slt_categoriesOfTypeOfProducts.php?ajax=true&validaciones=insert",
            success:function(r){
              if( r.status ){
                  if( r.status==1){
                    alertify.alert('Categories Of Type Products', 'Data successfully updloaded');
                    //location.reload(); 
                  }
                }
                else{
                  alertify.alert('Categories Of Type Products', 'could not be completed!');
                  //location.reload(); 
                }
            }
        });
    }
      , function(){ alertify.error('Cancel')}
  )
    return false; 
};
function fntReplace(){
  valor = document.getElementById("code").value;
  if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          alertify.alert('Categories Of Type Products', 'Please complete the following field:Code');
    return false;
  }

  valor = document.getElementById("description").value;
  if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          alertify.alert('Status Of Products Type ', 'Please complete the following field:Description');
    return false;
  }

  alertify.confirm('Categories Of Type Products', 'Are you sure you wish to continue? ', function(){ 
    var datos=$('#formData').serialize();
      //alert(datos);
      //return false;

      $.ajax({
          type:"POST",
          data:datos,
          dataType: 'json',
          url:"mu_slt_categoriesOfTypeOfProducts.php?ajax=true&validaciones=replace",
          success:function(r){
            if( r.status ){
                  if( r.status==1){
                    alertify.alert('Categories Of Type Products', 'Data successfully updloaded');
                    //location.reload(); 
                  }
                }
                else{
                  alertify.alert('Categories Of Type Products', 'could not be completed!');
                  //location.reload(); 
                }
          }
      });
    }
      , function(){ alertify.error('Cancel')}
  )
    return false; 
};

function fntDelete(){
  valor = document.getElementById("code").value;
  if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          alertify.alert('Categories Of Type Products', 'Please complete the following field:Code');
    return false;
  }

  valor = document.getElementById("description").value;
  if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          alertify.alert('Status Of Products Type ', 'Please complete the following field:Description');
    return false;
  }

  alertify.confirm('Categories Of Type Products', 'Are you sure you wish to continue?  ', function(){ 
    var datos=$('#formData').serialize();
    //alert(datos);
    //return false;

      $.ajax({
          type:"POST",
          data:datos,
          dataType: 'json',
          url:"mu_slt_categoriesOfTypeOfProducts.php?ajax=true&validaciones=delete",
          success:function(r){
            if( r.status ){
                  if( r.status==1){
                    alertify.alert('Categories Of Type Products', 'Data successfully updloaded');
                    //location.reload(); 
                  }
                }
                else{
                  alertify.alert('Categories Of Type Products', 'could not be completed!');
                  //location.reload(); 
                }
          }
      });
    }
  , function(){ alertify.error('Cancel')}
  )
    return false; 
};

function fntDibujoTablaProducto(){
                
    var strSearch = $("#Search").val();
    var strCategori = $("#categori").val();
    $("#unit_").val(strCategori);
    
    //alert(strCategori + "                                  strCategori");
    
    $.ajax({
    
        url: "mu_slt_categoriesOfTypeOfProducts.php?validaciones=busqueda_categoria",
        data: {
                categori:strCategori,
                Search:strSearch,
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
</script>