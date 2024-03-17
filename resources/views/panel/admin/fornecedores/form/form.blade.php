@extends("templates.painel.admin.admin-master.admin-layout")
@push('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/form-steps/css/roboto-font.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('assets/form-steps/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/form-steps/css/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/form-steps/css/style.css')}}" />
<link rel="stylesheet" href="{{asset('assets/form-steps/css/form-steps.css')}}" />
@endpush

@section('headTitle','cadastar-Fornecedor')
<!----CONTENT------>
@section('content-admin')
<div class="pagetitle">
  <div>
    <h1>Fornecedor</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item "><a href="/admin/fornecedor">Fornecedor</a></li>
        <li class="breadcrumb-item active">Adicionar</li>
      </ol>
    </nav>

  </div>
  <div id="box-button">
    <a href="/admin/fornecedor">
      <button type="button" class="btn btn-primary" id="btn-add"><i class="bi bi-eye me-1"></i>Fornecedores</button>
    </a>
  </div>
</div><!-- End Page Title -->

<div class="page-content">

</div>

<section class="section dashboard section_form" id="secionMain">
  <div class="row">
    <div class="col-md-10 offset-md-1" id="card_form">
      <div class="card">
        <div>
          @include('templates.painel.componentes.alert.alert')
        </div>
        @if(isset($typeForm) && $typeForm == "create")

        <div class="card-header">
          <h6>Cadastrar Fornecedor</h6>
          <p class="card-header-p">Formulário para cadastrar fornecedor</p>
        </div>
        <!-- Vertical Form -->
        <form class=" g-3 needs-validation" novalidate method="post" action="/admin/fornecedor">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 pr-1">
                <label for="validateNome" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" id="validateNome" value="{{ old('nome')}}"
                  title="Digite o Nome" required>
                <div class="invalid-feedback">
                  Nome é obrigatório!
                </div>
              </div>
              <div class="col-md-6 pl-1">
                <label for="validaterepresentante" class="form-label">representante</label>
                <input type="text" name="representante" class="form-control" id="validaterepresentante"
                  value="{{ old('nome')}}" title="Digite o Representante" required>
                <div class="invalid-feedback">
                  Representante é obrigatório!
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 pr-1">
                <label for="validateNif" class="form-label">Nif</label>
                <input type="text" name="nif" class="form-control" id="validateNif" value="{{ old('nome')}}"
                  title="Digite o Nif" required>
                <div class="invalid-feedback">
                  Nif é obrigatório!
                </div>
              </div>
              <div class="col-md-6 pl-1">
                <label for="validateTelefone" class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" id="validateTelefone" value="{{ old('nome')}}"
                  title="Digite o Telefone" required>
                <div class="invalid-feedback">
                  Telefone é obrigatório!
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 pr-1">
                <label for="validateEmail" class="form-label">E-mail</label>
                <input type="text" name="email" class="form-control" id="validateEmail" value="{{ old('nome')}}"
                  title="Digite o E-mail" required>
                <div class="invalid-feedback">
                  E-mail é obrigatório!
                </div>
              </div>
              <div class="col-md-6 pl-1">
                <label for="validateEndereco" class="form-label">Endereço</label>
                <input type="text" name="endereco" class="form-control" id="validateEndereco" value="{{ old('nome')}}"
                  title="Digite o Endereço" required>
                <div class="invalid-feedback">
                  Endereço é obrigatório!
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="col-12">
              <button type="reset" class="btn btn-secondary" id="btn-reset">Limpar</button>
              <button type="submit" class="btn btn-primary" id="btn-save">salvar</button>
            </div>
          </div>
        </form><!-- Vertical Form -->
        @endif
        <!-- Vertical Form -->
        @if(isset($typeForm) && $typeForm == "edit")
        <div class="card-header">
          <h6>Editar Fornecedor</h6>
          <p class="card-header-p">Formulário para editar fornecedor</p>
        </div>
        <form class=" g-3 needs-validation" novalidate method="post" action="/admin/fornecedor/$fornecedor->id">
          @method('PUT')
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 pr-1">
                <label for="validateNome" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" id="validateNome"  value="{{ $fornecedor->name }}"
                  title="Digite o Nome" required>
                <div class="invalid-feedback">
                  Nome é obrigatório!
                </div>
              </div>
              <div class="col-md-6 pl-1">
                <label for="validaterepresentante" class="form-label">Resentante</label>
                <input type="text" name="representante" class="form-control" id="validaterepresentante"
                value="{{ $fornecedor->representante }}" title="Digite o Representante" required>
                <div class="invalid-feedback">
                  Representante é obrigatório!
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 pr-1">
                <label for="validateNif" class="form-label">Nif</label>
                <input type="text" name="nif" class="form-control" id="validateNif"
                value="{{ $fornecedor->nif }}"  title="Digite o Nif" required>
                <div class="invalid-feedback">
                  Nif é obrigatório!
                </div>
              </div>
              <div class="col-md-6 pl-1">
                <label for="validateTelefone" class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" id="validateTelefone"
                value="{{ $fornecedor->telefone }}" title="Digite o Telefone" required>
                <div class="invalid-feedback">
                  Telefone é obrigatório!
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 pr-1">
                <label for="validateEmail" class="form-label">E-mail</label>
                <input type="text" name="email" class="form-control" id="validateEmail"
                value="{{ $fornecedor->email }} "title="Digite o E-mail" required>
                <div class="invalid-feedback">
                  E-mail é obrigatório!
                </div>
              </div>
              <div class="col-md-6 pl-1">
                <label for="validateEndereco" class="form-label">Endereço</label>
                <input type="text" name="endereco" class="form-control" id="validateEndereco"
                  value="{{ $fornecedor->endereco }}" title="Digite o Endereço" required>
                <div class="invalid-feedback">
                  Endereço é obrigatório!
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="col-12">
              <button type="reset" class="btn btn-secondary" id="btn-reset">Limpar</button>
              <button type="submit" class="btn btn-primary" id="btn-save">salvar</button>
            </div>
          </div>
          <input type="hidden" name="id"  value="{{ $fornecedor->id }}">
        </form><!-- Vertical Form -->

        @endif
      </div>
    </div>
  </div>
</section>
@endsection
@push('scripts')
<script src="{{asset('assets/form-steps/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/form-steps/js/jquery.steps.js')}}"></script>
<script src="{{asset('assets/form-steps/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/form-steps/js/main.js')}}"></script
  @endpush