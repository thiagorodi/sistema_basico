$(function(){

    
        $("select[name='COD_PRODUTO']").change(function(){
            url = "../Controller/busca_valor.php";
            parametro = {COD_PRODUTO: $("select[name='COD_PRODUTO']").val()};
            
          $.post(url,parametro).done(function(data){
                var option = 0;
                option = '<option>'+ data +'</option>';

            $('#VALOR_PRODUTO').html(option).show();
            });
               // $('#VALOR_PRODUTO').html(data).show();
                //console.log(data);
               // $("#VALOR_PRODUTO").val(data);
        });
});