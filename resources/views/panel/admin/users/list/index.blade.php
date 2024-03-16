@extends("templates.painel.admin.admin-master.admin-layout")

@section('headTitle','Funcionarios')

@section('content-admin')
<div class="pagetitle">
        <div>
            <h1>Usuário</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Usuários</li>
                </ol>
            </nav>

        </div>
        <div id="box-button">
            <a href="/admin/user/create">
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
                            <th scope="col">Foto</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Status</th>
                            <th scope="col"> Acções</th>
                        </tr>
                    </thead>
                    @if (isset($users) && $users != null)
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div id="td-box-img">
                                            <img src="{{ asset($user->avatar)  }}" class="img-fluid">
                                        </div>
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if( $user->status )
                                        <i class="bi bi-circle-fill Status-active"></i>
                                        @else
                                        <i class="bi bi-circle-fill Status-not-active"></i>
                                        @endif

                                    </td>
                                    <td class="">
                                        <a href="/admin/user/detail/{{ $user->id }}"><button
                                                class="btn-accoes"><i class="ri-eye-fill"></i></button></a>
                                        <a href="/admin/user/{{ $user->id }}/edit">
                                            <button class="btn-accoes"><i class="ri-edit-box-line"></i></button></a>
                                        <button class="btn-accoes BtnDeleteTrue" data-bs-toggle="modal"
                                            data-bs-target="#verticalycentered" value="{{ $user->id }}"
                                            data-dt-url="/admin/user/" data-dt-titte="user">
                                            <i class="bi bi-x-circle-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
                {{$users->links("vendor.pagination.my-pagination")}}
            </div>
        </div>
    </section>
@endsection
