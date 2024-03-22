@extends('templates.painel.admin.includes.aside')

@section('menus')

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#configuaracoes-nav" data-bs-toggle="collapse" href="#">
    <i class="ri-settings-2-line"></i><span>Cadastros</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="configuaracoes-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
      <a href="/admin/itens">
        <i class="bi bi-circle"></i><span>Itens</span>
      </a>
    </li>
    <li>
      <a href="/admin/produto">
        <i class="bi bi-circle"></i><span>Produtos</span>
      </a>
    </li>
    <li>
      <a href="/admin/fornecedor">
        <i class="bi bi-circle"></i><span>fornecedores</span>
      </a>
    </li>
  </ul>
</li><!-- CADASTROS-->

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#configuaracoes-nav" data-bs-toggle="collapse" href="#">
    <i class="ri-settings-2-line"></i><span>Configurações</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="configuaracoes-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
      <a href="/admin/user">
        <i class="bi bi-circle"></i><span>Usuarios</span>
      </a>
    </li>
  </ul>
</li><!-- Configurações-->

@endsection