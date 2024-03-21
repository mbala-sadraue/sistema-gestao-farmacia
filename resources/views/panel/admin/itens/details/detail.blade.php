@extends("templates.painel.admin.admin-master.admin-layout")

@section('headTitle',$item->produto->nome )

<!----CONTENT ADMIN------>
@section('content-admin')
<div class="pagetitle">
  <div>
    <h1>{{ $item->produto->nome }}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/pedagogico/dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="/pedagogico/curso">Curso</a></li>
        <li class="breadcrumb-item active">{{ $item->produto->nome }}</li>
      </ol>
    </nav>

  </div>
</div><!-- End Page Title -->


<section class="section dashboard section_detalhes" id="section_detalhes">

  <div class="card bg-white py-3">
    <div class="card-body ">
      <div class="container-fluid">
        <div class="row">
           <div class="col-md-6">
            <table class="table table-bordered tableDetalhe" id="">
              <tr>
                <th scope="col" class="col-md-2">Cod.Produto</th>
                <td>{{ $item->codProduto }}</td>
              </tr>
              <tr>
                <th scope="col" class="col-md-2">Produto</th>
                <td>{{ $item->produto->name }}</td>
              </tr>
              <tr>
                <th scope="col" class="col-md-2">Descrição</th>
                <td> {{  $item->produto->description }}</td>
              </tr>
              <tr>
                <th scope="col" class="col-md-2">Fornecedor</th>
                <td>{{ $item->fornecedor->name}}</td>
              </tr>
            </table>
           </div>
           <div class="col-md-6">
            <table class="table table-bordered tableDetalhe" id="">
              <tr>
                <th scope="col" class="col-md-2 pl-1">Preço</th>
                <td>{{ $item->precoCompra }}</td>
              </tr>
              <tr>
                <th scope="col" class="col-md-2">Produto</th>
                <td>{{ $item->precoVenda }}</td>
              </tr>
              <tr>
                <th scope="col" class="col-md-2">Estoque A.</th>
                <td> {{ $item->quantEstoque}}</td>
              </tr>
              <tr>
                <th scope="col" class="col-md-2">Fornecedor</th>
                <td>{{ $item->fornecedor->name}}</td>
              </tr>
            </table>
           </div>
        </div>
      </div>
    </div>
  </div>
  <div>
    @include('templates.painel.componentes.alert.alert')
  </div>
  <div class="card">
    <div class="card-body px-3 py-2">
      <div id="tab-option">
        <ul class="nav nav-tabs" id="myTabButton" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="curso-tab" data-bs-toggle="tab" data-bs-target="#curso" type="button"
              role="tab" aria-controls="curso" aria-selected="false">Curso</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="estoque-tab" data-bs-toggle="tab" data-bs-target="#estoque"
              type="button" role="tab" aria-controls="classe" aria-selected="true">Estoque</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
              role="tab" aria-controls="contact" aria-selected="false">Contact</button>
          </li>
        </ul>
        <div id="box-button">
          <a href="#" class="d-none" id="buttonAdditen">
            <button type="button" class="btn btn-primary " id="btn-add" data-bs-toggle="modal"
              data-bs-target="#modalAddClasse">
              <i class="bi bi-plus-lg me-1"></i>adicionar
            </button></a>
        </div>
      </div>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="estoque" role="tabpanel" aria-labelledby="estoque-tab">
          <div class="bg-white p-3 pb-5">
            <div class="main_bottom">
              <div>
                <ul class="">
                  <button type="button" class="btn btn-primary " id="btn-add" data-bs-toggle="modal"
                    data-bs-target="#modalAddClasse">
                    <i class="bi bi-plus-lg me-1"></i>adicionar
                  </button>
                </ul>
              </div>
            </div>

            <table class="table tableList">
              <thead>
                <tr>
                  <th scope="col">Tipo de Transação</th>
                  <th scope="col">Qtd</th>
                  <th scope="col">Data/hora</th>
                  <th scope="col">Usuario</th>
                  <th scope="col">Obs.</th>
                </tr>
              </thead>
              <tbody>
                <!-- foreach($itens as $item) -->
                <tr>
                  <td>Saida</td>
                  <td>-5</td>
                  <td>22/03/2024 21:00</td>
                  <td>Mendes</td>
                  <td>Venda de produtos</td>
                </tr>
                <!-- endforeach -->
              </tbody>
              <!-- endif -->
            </table>
            <!--  $itens->links("vendor.pagination.my-pagination") -->
          </div>
        </div>
        <div class="tab-pane fade" id="curso" role="tabpanel" aria-labelledby="curso-tab">
          <div class="bg-white p-3">
            <table class="table table-bordered tableDetalhe" id="">
              <tr>
                <th scope="col" class="col-md-2">Curso</th>
                <td>{{ $item->produto->name }}</td>
              </tr>
              <tr>
                <th scope="col" class="col-md-2">Coordenador</th>
                <td>Antonio Pedro</td>
              </tr>
              <tr>
                <th scope="col" class="col-md-2">Classes</th>
                <td>{{ $item->count()}}</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

        </div>
      </div><!-- End Default Tabs -->
    </div><!------------->
  </div>
</section>
<div class="modal fade formModal" id="modalAddClasse" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div>
          <h6>lançar Estoque</h6>
          <p class="card-modal-p">Formulário para larnçamento de estoque</p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Vertical Form -->
      <form class=" g-3 needs-validation" novalidate method="post" action="{{route('intes.addnewestoque')}}">
        @csrf
        <div class="modal-body">
          <div class="col-md-12">
            <label for="validationCustom01" class="form-label">Produto</label>
            <input type="text" name="item_id" value="{{$item->produto->name}}" class="form-control"
              id="validationCustom01" disabled>
          </div>

          <div class="row">
            <div class="col-md-12">
              <label for="validatequantidade" class="form-label">Quantidade</label>
              <input type="number" name="quantCompra" class="form-control" id="validatequantidade" value=""
                title="Digite o Quantidade" min="1" required>
              <div class="invalid-feedback">
                Quantidade é obrigatório!
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 pr-1">
              <label for="validateValorCompra" class="form-label">Valor de compra</label>
              <input type="text" name="precoCompra" class="form-control" id="validateValorCompra"
                value="{{$item->precoCompra}}" title="Digite o Valor de compra" required>
              <div class="invalid-feedback">
                Valor de compra é obrigatório!
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <label for="validateValorVenda" class="form-label">Valor de venda</label>
              <input type="text" name="precoVenda" class="form-control" id="validateValorVenda"
                value="{{$item->precoVenda}}" title="Digite o Valor de venda" required>
              <div class="invalid-feedback">
                Valor de venda é obrigatório!
              </div>
            </div>

            <div>
              <input type="hidden" name="codProduto" value="{{ $item->codProduto}}" />
              <input type="hidden" name="fornecedor_id" value="{{ $item->fornecedor_id}}" />
              <input type="hidden" name="produto_id" value="{{ $item->produto_id}}" />
              <input type="hidden" name="id" value="{{ $item->id}}" />
            </div>
          </div>
          <div class="">
            <input type="hidden" name="item_id" value="{{$item->id}}" id="validationCustom01" class="">
          </div>
          <div class="modal-footer">
            <div class="col-12">
              <button type="reset" class="btn btn-secondary" id="btn-reset" data-bs-dismiss="modal">cancelar</button>
              <button type="submit" class="btn btn-primary" id="btn-save">Registar</button>
            </div>
          </div>
      </form><!-- Vertical Form -->
    </div>
  </div>
</div><!-- End Vertically centered Modal-->
@push("scripts")
<script src="{{asset('assets/js/my-js/detail.js')}}"></script>
@endpush
@endsection