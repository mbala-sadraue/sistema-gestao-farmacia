@extends("templates.painel.admin.admin-master.admin-layout")
@push('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/form-steps/css/roboto-font.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('assets/form-steps/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/form-steps/css/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/form-steps/css/style.css')}}" />
<link rel="stylesheet" href="{{asset('assets/form-steps/css/form-steps.css')}}" />
@endpush

@section('headTitle','cadastar-Usuário')
<!----CONTENT------>
@section('content-admin')
<div class="pagetitle">
  <div>
    <h1>Usuário</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item "><a href="/admin/user">Usuário</a></li>
        <li class="breadcrumb-item active">Adicionar</li>
      </ol>
    </nav>

  </div>
  <div id="box-button">
    <a href="/admin/user">
      <button type="button" class="btn btn-primary" id="btn-add"><i class="bi bi-eye me-1"></i>Usuários</button>
    </a>
  </div>
</div><!-- End Page Title -->

<div class="page-content">
  <div class="wizard-v3-content">
    <div class="wizard-form">
      @if(isset($typeForm) && $typeForm == "create")
      <div class="wizard-header">
        <h3 class="heading">Adicionar o Usuário</h3>
        <p>Preencha todos os campos do formulário, para ir para próxima etapa. </p>
      </div>
      <form class="form-register" action="/admin/user" method="post">
        @csrf
        <div id="form-total">
          <!-- SECTION 1 -->
          <h2>
            <span class="step-icon"><i class="zmdi zmdi-account"></i></span>
            <span class="step-text">Perfil</span>
          </h2>
          <section>
            <div>

            </div>
            <div class="inner">
              <h3>Dados Pessoais</h3>

              <div class="row">
                <div class="col-md-12 pr-1">
                  <label class="form-label" for="nome">Nome<span class="required">*</span></label>
                  <input type="text" name="nome" id="nome" class="form-control" required>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12 pr-1">
                  <label class="form-label" for="cargos">Cargo<span class="required">*</span></label>
                  <select class="form-select" id="cargos" name="cargo" required>
                    <option selected disabled value="">Selecione Cargo</option>
                    @if(isset($cargos) && count($cargos) > 0)

                    @foreach($cargos as $cargo)
                    <option value="{{ $cargo->id }}"> {{ $cargo->name }} </option>
                    @endforeach
                    @endif
                  </select>
                </div>
              </div>
          </section>

          <!-- SECTION 2 -->
          <h2>
            <span class="step-icon"><i class="zmdi zmdi-phone"></i></span>
            <span class="step-text">Contactos</span>
          </h2>

          <section>
            <div class="inner">
              <h3>Contactos:</h3>
              <div class="row ">
                <div class="col-md-6 pr-1">
                  <label class="form-label" for="telefone">Telefone <span class="required">*</span></label>
                  <input type="text" name="telefone" id="telefone" class="form-control" required>
                </div>
                <div class="col-md-6 pl-1">
                  <label class="form-label" for="email">E-mail<span class="required">*</span></label>
                  <input type="text" name="email" id="email" class="form-control" required />
                </div>
              </div>
            </div>
          </section>
          <!-- SECTION 3 -->
          <h2>
            <span class="step-icon"><i class="zmdi zmdi-lock"></i></span>
            <span class="step-text">Credenciais</span>
          </h2>
          <section>
            <div class="inner">
              <h3>Credenciais:</h3>
            </div>

            <div class="row mt-3">
              <div class="col-md-6 pr-1">
                <label class="form-label" for="password">Senha <span class="required">*</span></label>
                <input type="text" name="password" id="password" class="form-control" required>
              </div>
              <div class="col-md-6 pl-1">
                <label class="form-label" for="obs">Conforma a Senha<span class="required">*</span></label>
                <input type="text" name="obs" id="passwordConfirm" class="form-control" required />
              </div>
            </div>
          </section>
          <!-- SECTION 4 -->
          <h2>
            <span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
            <span class="step-text">Confirmar</span>
          </h2>
          <section>
            <div class="inner">
              <h3>Confirmar Detalhes:</h3>
              <div class="form-row table-responsive">
                <table class="table">
                  <tbody>
                    <tr class="space-row">
                      <th>Nome:</th>
                      <td id="nome-detail"></td>
                    </tr>
                    <tr class="space-row">
                      <th>Sexo:</th>
                      <td id="sexo-detail"></td>
                    </tr>
                    <tr class="space-row">
                      <th>Estado Civil:</th>
                      <td id="estado_civil-detail"></td>
                    </tr>
                    <tr class="space-row">
                      <th>Telefone:</th>
                      <td id="telefone-detail"></td>
                    </tr>
                    <tr class="space-row">
                      <th>E-mail:</th>
                      <td id="email-detail"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
        </div>
      </form>
    </div>
    @endif

    {{----------EDITAR-------------}}

    @if(isset($typeForm) && $typeForm == "edit")
    <div class="wizard-header">
      <h3 class="heading">Adicionar o Usuário</h3>
      <p>Preencha todos os campos do formulário, para ir para próxima etapa. </p>
    </div>
    <form class="form-register" action="/admin/user/{{$user->id}}" method="post">
      @method('PUT')
      @csrf
      <div id="form-total">
        <!-- SECTION 1 -->
        <h2>
          <span class="step-icon"><i class="zmdi zmdi-account"></i></span>
          <span class="step-text">Perfil</span>
        </h2>
        <section>
          <div>

          </div>
          <div class="inner">
            <h3>Dados Pessoais</h3>

            <div class="row">
              <div class="col-md-12 pr-1">
                <label class="form-label" for="nome">Nome<span class="required">*</span></label>
                <input type="text" name="nome" value="{{ $user->name}}" id="nome" class="form-control" required>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-12 pr-1">
                <label class="form-label" for="cargos">Cargo<span class="required">*</span></label>
                <select class="form-select" id="cargos" name="cargo" required>
                  <option selected disabled value="">Selecione Cargo</option>
                  @if(isset($cargos) && count($cargos) > 0)

                  @foreach($cargos as $cargo)
                  <option value="{{ $cargo->id }}" {{ $role_id == $cargo->id?'selected':''}}> {{ $cargo->name }} </option>
                  @endforeach
                  @endif
                </select>
              </div>
              <div>
                <div class="form-check form-switch mt-3">
                  <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckChecked" {{
                    $user->status?"checked":""}}>
                  <label class="form-check-label" for="flexSwitchCheckChecked">status</label>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- SECTION 2 -->
        <h2>
          <span class="step-icon"><i class="zmdi zmdi-phone"></i></span>
          <span class="step-text">Contactos</span>
        </h2>

        <section>
          <div class="inner">
            <h3>Contactos:</h3>
            <div class="row ">
              <div class="col-md-6 pr-1">
                <label class="form-label" for="telefone">Telefone <span class="required">*</span></label>
                <input type="text" name="telefone" value="{{ $user->telefone}}" id="telefone" class="form-control"
                  required>
              </div>
              <div class="col-md-6 pl-1">
                <label class="form-label" for="email">E-mail<span class="required">*</span></label>
                <input type="text" name="email" value="{{ $user->email}}" id="email" class="form-control" required />
              </div>
            </div>
          </div>
        </section>
        <!-- SECTION 3 -->
        <h2>
          <span class="step-icon"><i class="zmdi zmdi-lock"></i></span>
          <span class="step-text">Credenciais</span>
        </h2>
        <section>
          <div class="inner">
            <h3>Credenciais:</h3>
          </div>

          <div class="row mt-3">
            <div class="col-md-6 pr-1">
              <label class="form-label" for="password">Senha <span class="required">*</span></label>
              <input type="text" name="password" id="password" class="form-control" required>
            </div>
            <div class="col-md-6 pl-1">
              <label class="form-label" for="obs">Conforma a Senha<span class="required">*</span></label>
              <input type="text" name="obs" id="passwordConfirm" class="form-control" required />
            </div>
          </div>
        </section>
        <!-- SECTION 4 -->
        <h2>
          <span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
          <span class="step-text">Confirmar</span>
        </h2>
        <section>
          <div class="inner">
            <h3>Confirmar Detalhes:</h3>
            <div class="form-row table-responsive">
              <table class="table">
                <tbody>
                  <tr class="space-row">
                    <th>Nome:</th>
                    <td id="nome-detail"></td>
                  </tr>
                  <tr class="space-row">
                    <th>Telefone:</th>
                    <td id="telefone-detail"></td>
                  </tr>
                  <tr class="space-row">
                    <th>E-mail:</th>
                    <td id="email-detail"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
      <input type="hidden" value="{{ $user->id}}" name="id" />
    </form>
  </div>
  @endif
</div>
</div>
@endsection
@push('scripts')
<script src="{{asset('assets/form-steps/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/form-steps/js/jquery.steps.js')}}"></script>
<script src="{{asset('assets/form-steps/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/form-steps/js/main.js')}}"></script
  @endpush