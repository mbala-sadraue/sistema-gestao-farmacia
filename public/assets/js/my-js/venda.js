
$(function(){



    $('#resultSearchProduto').on('click','li','a',function(){

        console.log("Produto adicionado")
    });


    $('#searchProdutByCod').keyup(function(){
    
        let query =  $(this).val().trim();
        
        $.ajax({
            url: '/admin/itens/serach-by-code/'+ query,
            type: 'get',
            data: {},
            dataType: 'json',
            success: function (response) {
    
                if(response['status'] == true)  {

                    let itens = response['data'];
                   
                    for( let item of itens){

                        let li = document.createElement('li');
                        li.setAttribute('class','nav-item');
                        let a = document.createElement('a');
                        a.setAttribute('href','#');
                        a.setAttribute('class','nav-link');
                        a.setAttribute('data-bs-dismiss','modal')

                        
                        a.innerText = item.codProduto +' - '+ item.produto.name
                        li.appendChild(a);
                        $('#resultSearchProduto').html(li)
                      
                    }

                    
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