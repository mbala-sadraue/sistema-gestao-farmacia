 <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <div id="sidebar">
      <div id="box-prtfil">
        <div id="box-img">

            <img src="{{asset('assets/img/avatar.png')}}" alt="Profile" class="rounded-circle" id="sidebar-perfil-img">
            <p>
              <span class="d-md-block ps-2 sidebar-perfil-nome"> {{ getUserAuth('name') }}</span>
              <span class="d-md-block ps-2 sidebar-perfil-email"> {{ getUserAuth('email') }}</span>
            </p>

        </div>
      </div>
    </div>
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item-box">
        <span class="nav-item-header">Dashboards</span>
        <span class="nav-item-p">Métricas da aplicação</span>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="/">
          <i class="bi bi-grid"></i>
          <span>Geral</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item-box">
        <span class="nav-item-header">Dados</span>
        <span class="nav-item-p">Gerenciamento do sistema</span>
      </li>
      @yield('menus')
      <li class="nav-heading">Pages</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="/logout">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Terminar sensão</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->
