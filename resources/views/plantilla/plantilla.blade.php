<!DOCTYPE html>
<html
  lang="es"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>SGCM</title>
    
    @include('layouts.header')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="" class="app-brand-link">
              <span>
                <div class="d-flex justify-content-center">
                  <img src="{{asset('imagenes/logo_login.png')}}" alt=""
                      class="brand-image" style="opacity: .8;" width="50%">
                </div>
              </span>
              {{-- <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span> --}}
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            {{-- <li class="menu-item {{ request()->routeIs('company.dashboard') ? 'active open' : '' }}">
              <a href="{{route('company.dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li> --}}
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>

            @if (Auth::user()->rol == 'Admin')
            <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active open' : '' }}">
              <a href="{{route('admin.dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            @endif
            <li class="menu-item {{ request()->routeIs('user.password') ? 'active open' : '' }}">
              <a href="{{route('user.password')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-lock"></i>
                <div data-i18n="Analytics">Cambiar contraseña</div>
              </a>
            </li>
            @if (Auth::user()->rol == 'Admin' || Auth::user()->rol == 'Doctor')
            <li class="menu-item {{ request()->routeIs('buscar-historial') ? 'active open' : '' }}">
              <a href="{{route('buscar-historial')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-history"></i>
                <div data-i18n="Analytics">Buscar historial</div>
              </a>
            </li>
            @endif
            @if (Auth::user()->rol == 'Admin')  
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Usuarios</span></li>
              <!-- Administradores -->
              <li class="menu-item {{ request()->routeIs('admin.administrador*') ? 'active open' : '' }}">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bxs-user-badge"></i>
                  <div data-i18n="Ensayos de laboratorio">Administradores</div>
                  </a>

                  <ul class="menu-sub">
                  <li class="menu-item {{ request()->routeIs('admin.administrador.index') ? 'active' : '' }}">
                      <a href="{{ route('admin.administrador.index') }}" class="menu-link">
                      <div data-i18n="Fisico-Quimico">Ver administradores</div>
                      </a>
                  </li>

                  <li class="menu-item {{ request()->routeIs('admin.administrador.create') ? 'active' : '' }}">
                      <a href="{{ route('admin.administrador.create') }}" class="menu-link">
                      <div data-i18n="Cromatograficas">Crear administrador</div>
                      </a>
                  </li>
                  </ul>
              </li>

              <li class="menu-item {{ request()->routeIs('admin.paciente*') ? 'active open' : '' }}">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bxs-user-circle"></i>
                  <div data-i18n="Ensayos de laboratorio">Afiliados</div>
                  </a>

                  <ul class="menu-sub">
                  <li class="menu-item {{ request()->routeIs('admin.paciente.index') ? 'active' : '' }}">
                      <a href="{{ route('admin.paciente.index') }}" class="menu-link">
                      <div data-i18n="Fisico-Quimico">Ver afiliados</div>
                      </a>
                  </li>

                  <li class="menu-item {{ request()->routeIs('admin.paciente.create') ? 'active' : '' }}">
                      <a href="{{ route('admin.paciente.create') }}" class="menu-link">
                      <div data-i18n="Cromatograficas">Crear afiliado</div>
                      </a>
                  </li>
                  </ul>
              </li>

              <li class="menu-item {{ request()->routeIs('admin.doctor*') ? 'active open' : '' }}">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bxs-user-pin"></i>
                  <div data-i18n="Ensayos de laboratorio">Doctores</div>
                  </a>

                  <ul class="menu-sub">
                  <li class="menu-item {{ request()->routeIs('admin.doctor.index') ? 'active' : '' }}">
                      <a href="{{ route('admin.doctor.index') }}" class="menu-link">
                      <div data-i18n="Fisico-Quimico">Ver doctores</div>
                      </a>
                  </li>

                  <li class="menu-item {{ request()->routeIs('admin.doctor.create') ? 'active' : '' }}">
                      <a href="{{ route('admin.doctor.create') }}" class="menu-link">
                      <div data-i18n="Cromatograficas">Crear doctor</div>
                      </a>
                  </li>
                  </ul>
              </li>
              <li class="menu-header small text-uppercase"><span class="menu-header-text">Instalaciones</span></li>
              <!-- Salas -->
              <li class="menu-item {{ request()->routeIs('admin.sala*') ? 'active open' : '' }}">
                <a href="{{ route('admin.sala.index') }}" class="menu-link">
                  <i class='menu-icon tf-icons bx bx-store-alt'></i>
                  <div data-i18n="Transformadores">Salas</div>
                </a>
              </li>
              <li class="menu-header small text-uppercase"><span class="menu-header-text">Citas</span></li>
              <!-- Calendario -->
              <li class="menu-item {{ request()->routeIs('admin.calendar*') ? 'active open' : '' }}">
                <a href="{{ route('admin.calendar.index') }}" class="menu-link">
                  <i class='menu-icon tf-icons bx bx-calendar'></i>
                  <div data-i18n="Transformadores">Calendario</div>
                </a>
              </li>

              <!-- Solicitudes -->
              <li class="menu-item {{ request()->routeIs('admin.solicitud*') ? 'active open' : '' }}">
                <a href="{{ route('admin.solicitud.index') }}" class="menu-link">
                  <i class='menu-icon tf-icons bx bx-git-pull-request'></i>
                  <div data-i18n="Transformadores">Solicitudes</div>
                </a>
              </li>
            @endif
            @if (Auth::user()->rol == 'Paciente')
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Citas</span></li>
              <li class="menu-item {{ request()->routeIs('paciente.calendar*') ? 'active open' : '' }}">
                <a href="{{ route('paciente.calendar.index') }}" class="menu-link">
                  <i class='menu-icon tf-icons bx bx-calendar'></i>
                  <div data-i18n="Transformadores">Calendario</div>
                </a>
              </li>
              <!-- Solicitudes -->
              <li class="menu-item {{ request()->routeIs('paciente.solicitud*') ? 'active open' : '' }}">
                <a href="{{ route('paciente.solicitud.index') }}" class="menu-link">
                  <i class='menu-icon tf-icons bx bx-git-pull-request'></i>
                  <div data-i18n="Transformadores">Solicitudes</div>
                </a>
              </li>
            @endif
            @if (Auth::user()->rol == 'Doctor')
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Citas</span></li>
              <li class="menu-item {{ request()->routeIs('doctor.calendar*') ? 'active open' : '' }}">
                <a href="{{ route('doctor.calendar.index') }}" class="menu-link">
                  <i class='menu-icon tf-icons bx bx-calendar'></i>
                  <div data-i18n="Transformadores">Calendario</div>
                </a>
              </li>
            @endif
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center" style="width: 100%">
                <div class="nav-item d-flex align-items-center" style="width: 100%">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Buscar..." id="buscador"
                    aria-label="Buscar..." onkeypress="buscar_menu()" onkeydown="buscar_menu()" onkeyup="buscar_menu()" 
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{asset('sneat/assets/img/avatars/8.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{asset('sneat/assets/img/avatars/8.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            @if (Auth::user()->rol == 'Admin')
                              <span class="fw-semibold d-block">{{Auth::user()->admin->nombre}} {{Auth::user()->admin->apellidos}}</span>
                            @elseif (Auth::user()->rol == 'Paciente')
                              <span class="fw-semibold d-block">{{Auth::user()->paciente->nombre}} {{Auth::user()->paciente->apellidos}}</span>
                            @elseif (Auth::user()->rol == 'Doctor')
                              <span class="fw-semibold d-block">{{Auth::user()->doctor->nombre}} {{Auth::user()->doctor->apellidos}}</span>
                            @endif
                            <small class="text-muted">{{Auth::user()->rol}}</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    {{-- <li>
                      <div class="dropdown-divider"></div>
                    </li> --}}
                    {{-- <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li> --}}
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    {{-- <li>
                      <a class="dropdown-item" href="">
                        <i class='bx bxs-user me-2'></i>
                        <span class="align-middle">Perfil</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="">
                        <i class='bx bxs-dollar-circle me-2'></i>
                        <span class="align-middle">Transacciones</span>
                      </a>
                    </li> --}}
                    <li>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); 
                        document.getElementById('logout-form').submit();"
                      >
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Salir</span>
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y">

              {{-- RESULTADO DEL BUSCADOR --}}
              <div class="row" style="display: none" id="cuadro-res">
                <div class="col-4"></div>
                <div class="col-4">
                  <div class="card mb-3">
  
                    <ul class="list-group" id="res-busqueda">
                    </ul>
  
                  </div>
                </div>
                <div class="col-4"></div>
              </div>
              {{-- RESULTADO DEL BUSCADOR --}}
  
              @yield('contenido')
  
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  
                  {{-- <a href="https://solucion-web.info/" target="_blank" class="footer-link fw-bolder">{{env('COMPANY')}}</a> --}}
                </div>
                {{-- <div>
                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Soporte</a
                  >
                </div> --}}
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    @include('layouts.footer')
  </body>
</html>
