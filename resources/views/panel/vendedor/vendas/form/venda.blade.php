@extends("templates.painel.admin.admin-master.admin-layout")
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/venda.css')}}" />
@endpush
@section('headTitle','cadastar-produto')
<!----CONTENT------>
@section('content-admin')
<div class="pagetitle">
  <div>
    <h1>Efetuar Venda</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item "><a href="/admin/venda/create">Venda</a></li>
        <li class="breadcrumb-item active">Efectual a venda</li>
      </ol>
    </nav>

  </div>
  <div id="box-button">
    <a href="/admin/produto">
      <button type="button" class="btn btn-primary" id="btn-add"><i class="bi bi-eye me-1"></i>produtoes</button>
    </a>
  </div>
</div><!-- End Page Title -->

<section class="section dashbord section_form form-venda bg-white m-2" id="secionMain">





  <div class="my-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="box-info py-3">
            <h6>Total Bruto</h6>
            <h3>7000,00</h3>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box-info bg-azul py-3">
            <h6>Desconto</h6>
            <h3>7000,00</h3>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box-info bg-verde py-3">
            <h6>Total</h6>
            <h3>7000,00</h3>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="my-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <a href="#" id="buttonAdditen">
                <button type="button" class="btn btn-primary " id="btn-add" data-bs-toggle="modal"
                  data-bs-target="#modalAddClasse">
                  <i class="bi bi-search me-1"></i>Pesquisar Prouto
                </button></a>
            </div>
          </div>
          <div class="row">
              <div class="col-md-4 pr-1">
                <label for="produtoname" class="form-label">Produto</label>
                <input type="text" name="name" class="form-control" id="produtoname" value="" title="Digite o Nome"
                  required disabled>
              </div>
              <div class="col-md-2 pr-1 pl-1">
                <label for="produtoname" class="form-label">Preço Unit.</label>
                <input type="text" name="preco" class="form-control" id="preco" value="" title="Digite o Nome"
                  required disabled>
              </div>
              <div class="col-md-2 pl-1 pr-1">
                <label for="quantidade" class="form-label">Quantidade</label>
                <input type="number" min="1" name="quantidade" class="form-control" id="quantidade" value=""
                  title="Digite a Quantidade" required>
              </div>
              <div class="col-md-2 pl-1">
                <label for="desconto" class="form-label">Desc</label>
                <input type="number" min="1" name="desconto" class="form-control" id="desconto" value=""
                  title="Digite o desconto" required>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Tabela de registro de venda -->
  <div class="" id="tabelaVenda">

    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Cod. Produto</th>
          <th>Produto</th>
          <th>Quantidade</th>
          <th>Preço Unit.</th>
          <th>Preço Total</th>
          <th>acções</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>27930RD</td>
          <td>Sabão</td>
          <td>4</td>
          <td>2.000,00</td>
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
      </tbody>
    </table>

  </div>
</section>


<div class="modal fade formModal" id="modalAddClasse" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <div>
          <h6>lançar Estoque</h6>
          <p class="card-modal-p">Formulário para pesquisar o produto</p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Vertical Form -->
      <form class=" g-3 needs-validation" novalidate method="post" action="">
        @csrf
        <div class="modal-body">

          <div class="row">
            <div class="col-md-6 pr-1">
              <label for="searchProdutByCod" class="form-label">Perquisar por Cod.</label>
              <input type="text" name="searchCod" class="form-control" id="searchProdutByCod" value=""
                title="Digite o Nome" required>
            </div>
            <div class="col-md-6 pl-1">
              <label for="validateSearchNameProduto" class="form-label">Pesquisar por Nome</label>
              <input type="text" name="description" class="form-control" id="validateSearchNameProduto" value=""
                title="Digite o Nome Produto" required>
            </div>
          </div>

          <div class="row mt-2">
              <div class="col-md-12">
                  <ul class="nav-pill" id="resultSearchProduto"></ul>
              </div>
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
@endsection
@push('scripts')
<script src="{{asset('assets/js/my-js/venda.js')}}"></script
  @endpush