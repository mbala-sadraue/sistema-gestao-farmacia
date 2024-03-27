var itens;
var itemSelecionado;
const carrinhoProdutos = [];
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
        
        itemSelecionado = itens.find((item) => item.id == i);

         $('#produtoname').val(itemSelecionado.produto.name);
         $('#preco').val(itemSelecionado.precoVenda)
         $('#idItem').val(itemSelecionado.id);
        
        $('#searchProdutByCod').val('')
        $('#resultSearchProduto').html('')
    });


    // AÇÃO DE BOTÂO  QUE ADICIONAR PRODUTO NO CARRINHO
    $('#btnAdcionarProdutoCarrinho').click(function(){
        let idItem =  $('#idItem').val();
        let  quant =  $('#vendaQuant').val();
        let  desc =   $('#descontoVenda').val();

        if(itemSelecionado == undefined)
            return false;
        if(quant  <= 0  || desc < 0 )
            return false


        itemSelecionado.quantiVenda = quant
        itemSelecionado.descontoVenda = desc;
        
      
        let produtoExisteCarinho = carrinhoProdutos.findIndex((item) => item.id == idItem)
        if( produtoExisteCarinho >=0){
            carrinhoProdutos.splice(produtoExisteCarinho,1);
        }
      
    
        carrinhoProdutos.push(itemSelecionado)
          tebaleCarrinho()

          //LIMPAR CAMPOS 
            $('#idItem').val('');
            $('#produtoname').val('');
            $('#preco').val('')
            $('#idItem').val('');
            $('#vendaQuant').val(0);
            $('#descontoVenda').val(0);
            itemSelecionado = undefined
    })
    
    
})

// MEETODO RESPONSAVEL POR LISTAR OS  
// PRODUTOS DE CARRINHO NA TABELA
function tebaleCarrinho(){

    let tabody  = '';
    let index   = 1;
    let totalBruto   = 0;
    for(let itemCarrinho of carrinhoProdutos){
        let subTotal = itemCarrinho.quantiVenda * itemCarrinho.precoVenda;
        totalBruto += subTotal;
     let tr = `
        <tr>
            <td>${index}</td>
            <td>${itemCarrinho.codProduto}</td>
            <td>${itemCarrinho.produto.name}</td>
            <td>${itemCarrinho.quantiVenda}</td>
            <td>${itemCarrinho.precoVenda}</td>
            <td>${subTotal}</td>
            <td class="">
            <a href="">
                <button class="btn-accoes"><i class="ri-eye-fill"></i>
                </button>
            </a>

            <button class="btn-accoes BtnDeleteTrue" data-bs-toggle="modal" data-bs-target="#verticalycentered" value=""
                data-dt-url="" data-dt-titte="item">
                <i class="bi bi-x-circle-fill"></i>
            </button>
            </td>
        </tr>
     `; 
     index++;
     tabody += tr;
    }
    
    $('#valorBruto').text(totalBruto);
    $('#bodyCarrinho').html(tabody);
}



// Vue.component('tabela-carrinho',{

//     props:[],
//     template:`
//     <table class="table">
//     <thead>
//       <tr>
//         <th>#</th>
//         <th>Cod. Produto</th>
//         <th>Produto</th>
//         <th>Quantidade</th>
//         <th>Preço Unit.</th>
//         <th>Preço Total</th>
//         <th>acções</th>
//       </tr>
//     </thead>
//     <tbody>
//       <tr>
//         <td>1</td>
//         <td>27930RD</td>
//         <td>Sabão</td>
//         <td>4</td>
//         <td>2.000,00</td>
//         <td>4.00,00</td>
//         <td class="">
//           <a href="">
//             <button class="btn-accoes"><i class="ri-eye-fill"></i>
//             </button>
//           </a>

//           <button class="btn-accoes BtnDeleteTrue" data-bs-toggle="modal" data-bs-target="#verticalycentered" value=""
//             data-dt-url="" data-dt-titte="item">
//             <i class="bi bi-x-circle-fill"></i>
//           </button>
//         </td>
//       </tr>
//     </tbody>
//   </table>
//     `,
//     methods: {
//     }
// });

const root = new Vue({
    el: "#vendaMainApp",
    data:{
        venda:true
    },
    methods:{

    },
})

