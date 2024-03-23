var itens;
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

                    itens = response['data'];
                   
                    let i = document.createElement('div');
                    for( let item of itens){

                        let li= document.createElement('li');
                        li.setAttribute('class','nav-item');
                        let a = document.createElement('a');
                        a.setAttribute('href','#');
                        a.setAttribute('class','nav-link');
                        a.setAttribute('data-bs-dismiss','modal')
                        a.setAttribute('data-id',item.id)

                        
                        a.innerText = item.codProduto +' - '+ item.produto.name
                        li.appendChild(a);
                        i.appendChild(li)
                    }
                    $('#resultSearchProduto').html(i);

                    
                }else{
                    console.log("um erro")
                }
              
            }
        })

        return;

    //    if(query.length > 2){
    //        console.log(query.length)
    //    } 
    });

    $('#resultSearchProduto').on('click','li','a',function(){

        let i = $(this).find('a').attr('data-id');
        let itemSelecionado;
        itemSelecionado = itens.find((item) => item.id == i);
        console.log(itemSelecionado);

         $('#produtoname').val(itemSelecionado.produto.name);
         $('#preco').val(itemSelecionado.precoVenda)
        
        $('#searchProdutByCod').val('')
        $('#resultSearchProduto').html('')
    });


    

})