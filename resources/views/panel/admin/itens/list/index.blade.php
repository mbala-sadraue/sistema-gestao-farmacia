@extends("templates.painel.admin.admin-master.admin-layout")

@section('headTitle','Itens')

@section('content-admin')
<div class="pagetitle">
        <div>
            <h1>Itens</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Itens</li>
                </ol>
            </nav>

        </div>
        <div id="box-button">
            <a href="/admin/itens/create">
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
                            <th scope="col">Cod.Produto</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Quant. Compra</th>
                            <th scope="col">Quant.Venda</th>
                            <th scope="col">Quant.Estoque</th>
                            <th scope="col">v.Compra</th>
                            <th scope="col">v.Venda</th>
                            <th scope="col">Forncedor</th>
                            <th scope="col">Status</th>
                            <th scope="col"> Acções</th>
                        </tr>
                    </thead>
                    @if (isset($itens) && $itens != null)
                        <tbody>
                            @foreach ($itens as $item)
                                <tr>
                                    <td>{{ $item->codProduto }}</td>
                                    <td>{{ $item->produto->name }}</td>
                                    <td>{{ $item->quantCompra }}</td>
                                    <td>{{ $item->quantVendido }}</td>
                                    <td>{{ $item->quantEstoque }}</td>
                                    <td>{{ $item->precoCompra }}</td>
                                    <td>{{ $item->precoVenda }}</td>
                                    <td>{{ $item->fornecedor_id }}</td>
                                    <td>
                                        @if( $item->status )
                                        <i class="bi bi-circle-fill Status-active"></i>
                                        @else
                                        <i class="bi bi-circle-fill Status-not-active"></i>
                                        @endif

                                    </td>
                                    <td class="">
                                        <a href="#"><button
                                                class="btn-accoes"><i class="ri-eye-fill"></i></button></a>
                                        <a href="#">
                                            <button class="btn-accoes"><i class="ri-edit-box-line"></i></button></a>
                                        <button class="btn-accoes BtnDeleteTrue" data-bs-toggle="modal"
                                            data-bs-target="#verticalycentered" value="{{ $item->id }}"
                                            data-dt-url="/admin/itens/" data-dt-titte="item">
                                            <i class="bi bi-x-circle-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
                {{$itens->links("vendor.pagination.my-pagination")}}
            </div>
        </div>
    </section>
@endsection
