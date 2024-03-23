
$(function(){


    $('#searchProdutByCod').keyup(function(){
    
        let query =  $(this).val().trim();
        
        $.ajax({
            url: '/admin/itens/serach-by-code/'+ query,
            type: 'get',
            data: {},
            dataType: 'json',
            success: function (response) {
    
                if(response['status'] == true)  {

                    let prutodos = response['data'];

                    
                }else{
                    console.log("um erro")
                }
              
            }
        })

        return;

       if(query.length > 2){
           console.log(query.length)
       } 
    });

    

})