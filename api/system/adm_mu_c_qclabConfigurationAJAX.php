<script>
//update delete e insert
function fntUpdateInsert(){
  valor = document.getElementById("codigo").value;
  if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          alertify.alert('QCLAB CONFIGURATION', 'Please complete the following field:Code');
    return false;
  }

  alertify.confirm('QCLAB CONFIGURATION', 'Are you sure you wish to continue?  ', function(){ 
    var datos=$('#formData').serialize();
       //alert(datos);
       //return false;

        $.ajax({
            type:"POST",
            data:datos,
            dataType: 'json',
            url:"mu_c_qclabConfiguration.php?ajax=true&validaciones=insert",
            success:function(r){
              if( r.status ){
                  if( r.status==1){
                    alertify.alert('QCLAB CONFIGURATION', 'Data successfully updloaded');
                    //location.reload(); 
                  }
                }
                else{
                  alertify.alert('QCLAB CONFIGURATION', 'could not be completed!');
                  //location.reload(); 
                }
            }
        });
    }
      , function(){ alertify.error('Cancel')}
  )
    return false; 
};

</script>