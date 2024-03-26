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

    $('#btnAdcionarProdutoCarrinho').click(function(){
        let idItem =  $('#idItem').val();

        itemSelecionado.quantiVenda = $('#vendaQuant').val()
        itemSelecionado.descontoVenda = $('#descontoVenda').val()
        carrinhoProdutos.push(itemSelecionado)

          $('#idItem').val('');
          tebaleCarrinho()
    })
    
    
})

function tebaleCarrinho(){

    let tabody = '';
    let index = 1;
    for(let itemCarrinho of carrinhoProdutos){
     let tr = `
        <tr>
            <td>${index}</td>
            <td>${itemCarrinho.codProduto}</td>
            <td>${itemCarrinho.produto.carrinho}</td>
            <td>${itemCarrinho.quantiVenda}</td>
            <td>${itemCarrinho.precoVenda}</td>
            <td>4.00,00</td>
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

