<!-- header header  -->
<div class="header">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- Logo -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon -->
                <b><img src="{{asset('assets/admin/images/logo.png')}}" alt="homepage" class="dark-logo" /></b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span><img src="{{asset('assets/admin/images/logo-text.png')}}" alt="homepage" class="dark-logo" /></span>
            </a>
        </div>
        <!-- End Logo -->
        <div class="navbar-collapse">
            <!-- toggle and nav items -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"><a href="{{URL::route('home')}}" class="nav-link">Ver Site</a></li>
            </ul>
            <!-- User profile and search -->
            <ul class="navbar-nav my-lg-0">

                <!-- Search -->
                <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Buscar aqui"> <a class="srh-btn"><i class="ti-close"></i></a>
                    </form>
                </li>
                <!-- Comment -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i></a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                        <ul>
                          <li>
                              <div class="drop-title">Você não possui nenhuma notificação</div>
                          </li>
                        </ul>
                    </div>
                </li>
                <!-- End Comment -->
                <!-- Messages -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted  " href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope"></i></a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                        <ul>
                            <li>
                                <div class="drop-title">Você não possui nenhuma mensagem</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- End Messages -->
                <!-- Profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('uploads/avatars/' . Auth::user()->avatar)}}" alt="user" class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                        <ul class="dropdown-user">
                            <li><a href="{{URL::route('profile.profile', ['id' => Auth::user()->user])}}"><i class="ti-user"></i> Perfil</a></li>
                            <li><a href="#"><i class="ti-settings"></i> Configurações</a></li>
                            <li><a href="{{URL::route('logout')}}"><i class="fa fa-power-off"></i> Sair</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- End header header -->
<!-- Left Sidebar  -->
<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">Home</li>
                <li>
                  <a href="{{URL::route('dashboard.index')}}" aria-expanded="false"><i class="fa fa-tachometer"></i>
                    <span class="hide-menu">Dashboard</span>
                  </a>
                </li>

                <li class="nav-label">Educação</li>

                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-video"></i><span class="hide-menu">Tutoriais</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{URL::route('tutorials.index')}}">Ver Todos</a></li>
                        <li><a href="{{URL::route('tutorials.create')}}">Adicionar Tutorial</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-graduation-cap"></i><span class="hide-menu">Cursos</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{URL::route('courses.index')}}">Ver Todos</a></li>
                        <li><a href="{{URL::route('courses.create')}}">Adicionar Curso</a></li>
                    </ul>
                </li>

                <li class="nav-label">Conteúdo</li>

                <li>
                  <a href="{{URL::route('categories.index')}}" aria-expanded="false"><i class="fa fa-folder"></i>
                    <span class="hide-menu">Categorias</span>
                  </a>
                </li>

                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Páginas</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{URL::route('pages.index')}}">Ver Todas</a></li>
                        <li><a href="{{URL::route('pages.create')}}">Adicionar Página</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-edit"></i><span class="hide-menu">Postagem</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{URL::route('posts.index')}}">Ver Todas</a></li>
                        <li><a href="{{URL::route('posts.create')}}">Adicionar Postagem</a></li>
                    </ul>
                </li>

                <li>
                  <a href="{{URL::route('library.index')}}" aria-expanded="false"><i class="fa fa-cloud"></i>
                    <span class="hide-menu">Galeria</span>
                  </a>
                </li>

                <li class="nav-label">Configurações</li>

                <li>
                  <a href="{{URL::route('settings.index')}}" aria-expanded="false"><i class="fa fa-cog"></i>
                    <span class="hide-menu">Configurações</span>
                  </a>
                </li>

                <li>
                  <a href="#" aria-expanded="false"><i class="fa fa-paint-brush"></i>
                    <span class="hide-menu">Estilo</span>
                  </a>
                </li>

                <li class="nav-label">Moderação</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Usuários</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{URL::route('users.index')}}">Ver Todos</a></li>
                        <li><a href="{{URL::route('users.create')}}">Adicionar Usuário</a></li>
                    </ul>
                </li>

                <li>
                  <a href="#" aria-expanded="false"><i class="fa fa-comments"></i>
                    <span class="hide-menu">Comentários</span>
                  </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->
<!-- Page wrapper  -->
