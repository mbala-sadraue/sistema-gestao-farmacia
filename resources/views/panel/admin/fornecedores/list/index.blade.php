@extends("templates.painel.admin.admin-master.admin-layout")

@section('headTitle','Funcionarios')

@section('content-admin')
<div class="pagetitle">
        <div>
            <h1>Fornecedores</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Fornecedores</li>
                </ol>
            </nav>

        </div>
        <div id="box-button">
            <a href="/admin/fornecedor/create">
                <button type="button" class="btn btn-primary" id="btn-add">
                    <i class="bi bi-plus-lg me-1"></i>adicionar
                </button>
            </a>
        </div>
    </div><!-- End Page Title -->

    <section class="section dashboard" id="secionMain">
        <div class="card">
            <div class="card-body">
                @if (session('status'))

                    @if (session('status')['status'] == true)
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                            <i class="bi bi-check-circle-fill me-1"></i>
                            {!! session('status')['messages'] !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(session('status')['status'] == false)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
                            <i class="bi bi-x-circle-fill me-1"></i>
                            {!! session('status')['messages'] !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Representante</th>
                            <th scope="col">Nif</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Status</th>
                            <th scope="col"> Acções</th>
                        </tr>
                    </thead>
                    @if (isset($fornecedores) && $fornecedores != null)
                        <tbody>
                            @foreach ($fornecedores as $fornecedor)
                                <tr>
                                    <td>{{ $fornecedor->name }}</td>
                                    <td>{{ $fornecedor->representante }}</td>
                                    <td>{{ $fornecedor->nif }}</td>
                                    <td>{{ $fornecedor->telefone }}</td>
                                    <td>{{ $fornecedor->email }}</td>
                                    <td>{{ $fornecedor->endereco }}</td>
                                    <td>
                                        @if( $fornecedor->status )
                                        <i class="bi bi-circle-fill Status-active"></i>
                                        @else
                                        <i class="bi bi-circle-fill Status-not-active"></i>
                                        @endif

                                    </td>
                                    <td class="">
                                        <a href="#"><button
                                                class="btn-accoes"><i class="ri-eye-fill"></i></button></a>
                                        <a href="/admin/fornecedor/{{ $fornecedor->id }}/edit">
                                            <button class="btn-accoes"><i class="ri-edit-box-line"></i></button></a>
                                        <button class="btn-accoes BtnDeleteTrue" data-bs-toggle="modal"
                                            data-bs-target="#verticalycentered" value="{{ $fornecedor->id }}"
                                            data-dt-url="/admin/fornecedor/" data-dt-titte="fornecedor">
                                            <i class="bi bi-x-circle-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
                {{$fornecedores->links("vendor.pagination.my-pagination")}}
            </div>
        </div>
    </section>
@endsection
