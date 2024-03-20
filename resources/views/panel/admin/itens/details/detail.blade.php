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
       <div> 
          @include('templates.painel.componentes.alert.alert')
      </div>
      <div class="card">
        <div class="card-body px-3 py-2">
            <div id="tab-option">
              <ul class="nav nav-tabs" id="myTabButton" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="curso-tab" data-bs-toggle="tab" data-bs-target="#curso" type="button" role="tab" aria-controls="curso" aria-selected="false">Curso</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="iten-tab" data-bs-toggle="tab" data-bs-target="#iten" type="button" role="tab" aria-controls="classe" aria-selected="true">Classes</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                </li>
              </ul>
              <div id="box-button" >
                 <a href="#" class="d-none" id="buttonAdditen">
                  <button type="button" class="btn btn-primary " id="btn-add"  data-bs-toggle="modal" data-bs-target="#modalAddClasse">
                    <i class="bi bi-plus-lg me-1"></i>adicionar
                  </button></a>
               </div>
            </div>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="iten" role="tabpanel" aria-labelledby="iten-tab">
                <div class="bg-white p-3 py-5">
                  <table class="table tableList">
                    <thead>
                      <tr>
                        <th scope="col">Proudto</th>
                        <th scope="col">Fornecedor</th>
                        <th scope="col">Status</th>
                        <th scope="col"> Acções</th>
                      </tr>
                    </thead>
               
                    <tbody>
                      <!-- foreach($itens as $item) -->
                      <tr>
                        <td>{{$item->produto->name }}</td>
                        <td>{{ $item->fornecedor->name }}</td>
                        <td>
                            @if( $item->status)
                              <i class="bi bi-circle-fill Status-active"></i>
                            @else
                              <i class="bi bi-circle-fill Status-not-active"></i>
                            @endif

                         </td>
                        <td class="">iten
                          <a href="/pedagogico/ano-escolar/detail/{{ $item->id }}">
                          <button class="btn-accoes">
                            <i class="ri-eye-fill"></i>
                          </button>
                        </a>

                          <a href="/pedagogico/ano-escolar/{{ $item->id }}/edit">
                            <button class="btn-accoes"><i class="ri-edit-box-line"></i></button></a>
                          <button class="btn-accoes BtnDeleteTrue" data-bs-toggle="modal" data-bs-target="#verticalycentered"  value="{{ $item->id }}"  data-dt-url="/pedagogico/ano-escolar/" data-dt-titte="Classe">
                            <i class="bi bi-x-circle-fill"></i>
                          </button>
                        </td>
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
      <div class="modal fade formModal" id="modalAddClasse" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static" >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div>
                         <h6>Cadastrar Classe</h6>
                         <p class="card-modal-p">Formulário para cadastrar a classe</p>
                      </div>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                     <!-- Vertical Form -->
                      <form class=" g-3 needs-validation" novalidate method="post" action="/pedagogico/ano-escolar">
                      @csrf
                      <div class="modal-body">
                         <div class="col-md-12">
                          <label for="validationCustom01" class="form-label">Curso</label>
                          <input type="text" name="curso" value="{{$item->produto->nome}}" class="form-control" id="validationCustom01" title="Digite o Nome" disabled>
                          <div class="valid-feedback">
                            Esta bom!
                          </div>
                        </div>
                        <div class="col-md-12">
                        <label for="validationCustom5" class="form-label">Clico</label>
                        <select class="form-select" id="validationCustom5" name="ciclo" required >
                          <option selected disabled value="">Selecione o Cliclo</option>
                              <option value="Creche">Creche </option>
                              <option value="1º clico do ensino primário">1º clico do ensino primário</option>
                              <option value="2º clico do ensino primário">2º clico do ensino primário</option>
                              <option value="1º clico do ensino secundário">1º clico do ensino secundario</option>
                               <option value="Ensino Médio">Ensino Médio </option>
                        </select>
                        </div>
                        <div class="col-md-12">
                          <label for="validationCustom01" class="form-label">Classe</label>
                          <input type="text" name="nome" class="form-control" id="validationCustom01" value="" title="Digite o Nome"required>
                          <div class="valid-feedback">
                            Esta bom!
                          </div>
                        </div>
                      </div>
                      <div class="">
                        <input type="hidden" name="cursos_id" value="{{$item->id}}"  id="validationCustom01" class="" >
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