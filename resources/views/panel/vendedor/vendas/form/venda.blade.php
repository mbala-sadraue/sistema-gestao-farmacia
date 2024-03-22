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

<section class="section dashboard section_form form-venda bg-white m-2" id="secionMain">
        <h2>Ola</h2>
</section>
@endsection