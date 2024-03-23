
$(function(){


    $('#searchProdutByCod').keyup(function(){
    
        let query =  $(this).val().trim();
        
        $.ajax({
            url: '/admin/itens/serach-by-code/'+ query,
            type: 'get',
            data: {},
            dataType: 'json',
            success: function (response) {
    
              
                console.log('dados: ',response);
            }
        })

        return;

       if(query.length > 2){
           console.log(query.length)
       } 
    });

    

})