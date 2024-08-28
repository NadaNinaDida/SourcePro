
  <template>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user" style="color: blue;"></i>
            <span class="ml-2 text-primary"> {{ $page.props.auth.user.name }}</span>

          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a :href="route('profile.edit')" class="dropdown-item">Profil</a>
            <div class="dropdown-divider"></div>
            <a :href="route('logout')" method="post" class="dropdown-item">Déconnexion</a>

          </div>
        </li>
      </ul>
    </nav>
  </template>

  <script>

  </script>

  <style scoped>

  </style>

