
$(function(){


    $('#searchProdutByCod').keyup(function(){
    
       let query =  $(this).val().trim();
        


       if(query.length > 2){
           console.log(query.length)
       } 
    });

    return;

    
    $.ajax({
        url: '/get-palavras',
        type: 'get',
        data: {},
        dataType: 'json',
        success: function (response) {

          

        }
    })

})