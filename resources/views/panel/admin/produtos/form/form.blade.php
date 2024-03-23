@extends("templates.painel.admin.admin-master.admin-layout")

@section('headTitle','cadastar-produto')
<!----CONTENT------>
@section('content-admin')
<div class="pagetitle">
  <div>
    <h1>Produto</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item "><a href="/admin/produto">Produto</a></li>
        <li class="breadcrumb-item active">Adicionar</li>
      </ol>
    </nav>

  </div>
  <div id="box-button">
    <a href="/admin/produto">
      <button type="button" class="btn btn-primary" id="btn-add"><i class="bi bi-eye me-1"></i>produtoes</button>
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
          <h6>Cadastrar produto</h6>
          <p class="card-header-p">Formulário para cadastrar produto</p>
        </div>
        <!-- Vertical Form -->
        <form class=" g-3 needs-validation" novalidate method="post" action="/admin/produto">
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
                <label for="validatedescription" class="form-label">Descrição</label>
                <input type="text" name="description" class="form-control" id="validatedescription"
                  value="{{ old('description')}}" title="Digite oa Descrição" required>
                <div class="invalid-feedback">
                  Descrição é obrigatório!
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
          <h6>Editar produto</h6>
          <p class="card-header-p">Formulário para editar produto</p>
        </div>
        <form class=" g-3 needs-validation" novalidate method="post" action="/admin/produto/$produto->id">
          @method('PUT')
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 pr-1">
                <label for="validateNome" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" id="validateNome"  value="{{ $produto->name }}"
                  title="Digite o Nome" required>
                <div class="invalid-feedback">
                  Nome é obrigatório!
                </div>
              </div>
              <div class="col-md-6 pl-1">
                <label for="validatedescription" class="form-label">Resentante</label>
                <input type="text" name="description" class="form-control" id="validatedescription"
                value="{{ $produto->description }}" title="Digite o Descrição" required>
                <div class="invalid-feedback">
                  Descrição é obrigatório!
                </div>
              </div>
            </div>
            <div class="row">
             <div class="col-md-12">
              <div class="form-check form-switch mt-3">
                <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckChecked" {{
                  $produto->status?"checked":""}}>
                <label class="form-check-label" for="flexSwitchCheckChecked">status</label>
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
          <input type="hidden" name="id"  value="{{ $produto->id }}">
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