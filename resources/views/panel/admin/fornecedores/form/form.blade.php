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
    <h1>Fornecedores</h1>
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
        <div class="col-md-6 offset-md-3"  id="card_form">
            <div class="card">
              <div> 
                @include('templates.painel.componentes.alert.alert')
              </div>
              @if(isset($typeForm) && $typeForm == "create")
            
                <div class="card-header">
                  <h6>Cadastrar Curso</h6>
                  <p class="card-header-p">Formulário para cadastrar curso</p>
                </div>
                <!-- Vertical Form -->
                <form class=" g-3 needs-validation" novalidate method="post" action="/pedagogico/curso">
                  @csrf
                  <div class="card-body">
                    <div class="col-md-12">
                      <label for="validationCustom01" class="form-label">Nome</label>
                      <input type="text" name="nome" class="form-control" id="validationCustom01" value="{{ old('nome')}}" title="Digite o Nome"required>
                      <div class="valid-feedback">
                        Esta bom!
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

               @if(isset($typeForm) && $typeForm == "edit")
            
                <div class="card-header">
                  <h6>Editar Curso</h6>
                  <p class="card-header-p">Formulário para edição do Curso</p>
                </div>
                <!-- Vertical Form -->
                <form class=" g-3 needs-validation" novalidate method="post" action="/pedagogico/curso/{{$curso->id}}">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    <div class=" col-md-12">
                      <label for="validationCustom04" class="form-label">Departamento</label>
                      <select class="form-select" id="validationCustom04" name="departamentos_id" required >
                        @if(isset($departamentos) && count($departamentos) > 0)

                          @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}" {{ ( $departamento->id == $curso->departamentos_id)?'selected':'' }}> {{ $departamento->nome }} </option>
                          @endforeach
                        @endif
                      </select>
                    </div>
                    <div class="col-md-12">
                      <label for="validationCustom01" class="form-label">Nome</label>
                      <input type="text" name="nome" class="form-control" id="validationCustom01" value="{{$curso->nome}}" required>
                      <div class="valid-feedback">
                        Esta bom!
                      </div>
                    </div>
                    <div class="form-check form-switch mt-3">
                      <input class="form-check-input"name="status" type="checkbox" id="flexSwitchCheckChecked" {{ $curso->status?"checked":""}}>
                      <label class="form-check-label" for="flexSwitchCheckChecked">status</label>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="col-12">
                        <button type="reset" class="btn btn-secondary" id="btn-reset">Resetar</button>
                        <button type="submit" class="btn btn-primary" id="btn-save">actualizar</button>
                      </div>
                  </div>
                     <input type="hidden" name="id" class="form-control" id="id" value="{{$curso->id}}" required>
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