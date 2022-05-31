<header class="topbar">
  <nav class="navbar top-navbar navbar-expand-md navbar-dark">
      <!-- ============================================================== -->
      <!-- Logo -->
      <!-- ============================================================== -->
      <div class="navbar-header" style="background: rgb(1 192 200);">
          <div class="navbar-brand" href="/">
              <!-- Logo icon --><b>
                  <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                  <!-- Dark Logo icon -->
                  {{-- <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                  <!-- Light Logo icon -->
                  <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" /> --}}
              </b>
              <!--End Logo icon -->
              <!-- Logo text --><span class="hidden-sm-down">
               <!-- dark Logo text -->
               <img src="../assets/images/qa-logo.png" alt="homepage" class="dark-logo qa-logo" />
               <!-- Light Logo text -->    
               <img src="../assets/images/qa-logo.png" class="light-logo qa-logo" alt="homepage" /></span> </div>
      </div>
      <div class="navbar-collapse">
          <ul class="navbar-nav mr-auto">
          </ul>
          <ul class="navbar-nav my-lg-0">
              <li class="nav-item dropdown">
                  <a class="nav-link waves-effect login-bar" href="{{route('login')}}"><span class="mr-1">😜</span>Conecte-se</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link waves-effect login-bar" href="{{route('reigster')}}" > <span class="mr-1">🧐</span>Registro</a>
              </li>
          </ul>
      </div>
  </nav>
</header>