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
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
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

<section class="section dashboard section_form form-venda bg-white m-2" id="secionMain">
      

  <div class="container-fluid">
    <div class="row">
        <div class="col-md-4">A</div>
        <div class="col-md-4">C</div>
        <div class="col-md-4">B</div>
    </div>
    <div class="row">
      <div class="col-md-6">
          <div class="row">
              <div class="col-md-4 pr-1">
                <label for="validateSearchCod" class="form-label">Perquisar por Cod.</label>
                <input type="text" name="searchCod" class="form-control" id="validateSearchCod" value=""
                  title="Digite o Nome" required>
              </div>
              <div class="col-md-6 pl-1">
                <label for="validateSearchNameProduto" class="form-label">Pesquisar por Nome</label>
                <input type="text" name="description" class="form-control" id="validateSearchNameProduto"
                  value="" title="Digite o Nome Produto" required>
                
              </div>
          </div>
          <div class="row">
            <div class="row">
              <div class="col-md-6 pr-1">
                <label for="validateNome" class="form-label">Produto</label>
                <input type="text" name="name" class="form-control" id="validateNome" value=""
                  title="Digite o Nome" required disabled>
                <div class="invalid-feedback">
                  Nome é obrigatório!
                </div>
              </div>
              <div class="col-md-3 pl-1">
                <label for="quantidade" class="form-label">Quantidade</label>
                <input type="text" name="quantidade" class="form-control" id="quantidade"
                  value="" title="Digite oa Quantidade" required>
                <div class="invalid-feedback">
                  Quantidade é obrigatório!
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
                            <button
                                class="btn-accoes"><i class="ri-eye-fill"></i>
                            </button>
                        </a>
                        
                        <button class="btn-accoes BtnDeleteTrue" data-bs-toggle="modal"
                            data-bs-target="#verticalycentered" value=""
                            data-dt-url="" data-dt-titte="item">
                            <i class="bi bi-x-circle-fill"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</section>
@endsection