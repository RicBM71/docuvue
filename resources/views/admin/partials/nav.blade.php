    <ul class="sidebar-menu">
        <li class="header">Nav</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="{{ route('pages.home') }}">Inicio público</a></li>
        <li class="{{ setActiveRoute('admin') }}"><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> <span>Inicio</span></a></li>
        <li class="treeview {{ setActiveRoute('admin.posts.index') }}">
          <a href="#"><i class="fa fa-bars"></i> <span>Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ setActiveRoute('admin.posts.index') }}"><a href="{{ route('admin.posts.index') }}">Ver todos los posts</a></li>
            <li><a href="#" data-toggle="modal" data-target="#exampleModal">Crear post</a></li>
          </ul>
        </li>
         <li class="treeview {{ setActiveRoute(['admin.users.index','admin.users.create']) }}">
          <a href="#"><i class="fa fa-users"></i> <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ setActiveRoute('admin.users.index') }}"><a href="{{ route('admin.users.index') }}">Ver Usuarios</a></li>
            <li class="{{ setActiveRoute('admin.users.create') }}"><a href="{{ route('admin.users.create') }}">Crear Usuario</a></li>
          </ul>
        </li>
      </ul>