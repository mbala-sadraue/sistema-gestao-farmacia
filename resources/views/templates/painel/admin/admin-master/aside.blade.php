 @extends('templates.painel.admin.includes.aside')

 @section('menus')
 
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
