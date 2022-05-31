<header class="topbar">
  <nav class="navbar top-navbar navbar-expand-md navbar-dark">
      <!-- ============================================================== -->
      <!-- Logo -->
      <!-- ============================================================== -->
      <div class="navbar-header" style="background: rgb(1 192 200);">
          <div class="navbar-brand" href="javascript:;">
              <!-- Logo icon --><b>
                  <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                  <!-- Dark Logo icon -->
                  {{-- <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" /> --}}
                  <!-- Light Logo icon -->
                  {{-- <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" /> --}}
              </b>
              <!--End Logo icon -->
              <!-- Logo text --><span class="hidden-sm-down">
               <!-- dark Logo text -->
               <img src="../assets/images/qa-logo.png" alt="homepage" class="dark-logo qa-logo" />
               <!-- Light Logo text -->    
               <img src="../assets/images/qa-logo.png" class="light-logo qa-logo" alt="homepage" /></span> </div>
      </div>
      <!-- ============================================================== -->
      <!-- End Logo -->
      <!-- ============================================================== -->
      <div class="navbar-collapse">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav mr-auto">
              <!-- This is  -->
              <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
              <li class="nav-item"> <a class="nav-link sidebartoggler d-none waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
              <!-- ============================================================== -->
          </ul>
          <!-- ============================================================== -->
          <!-- User profile and search -->
          <!-- ============================================================== -->
          <ul class="navbar-nav my-lg-0">
              <!-- ============================================================== -->
              <!-- Comment -->
              <!-- ============================================================== -->
              {{-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                      <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                      <ul>
                          <li>
                              <div class="drop-title">Respostas mais recentes</div>
                          </li>
                          <li>
                              <div class="message-center">
                                  <!-- Message -->
                                  @foreach($answers as $key => $answer)
                                  @if($key == "4")
                                  @break;
                                  @endif
                                  <a href="/alert-show-answer?id={{$answer->id}}">
                                      <div class="btn btn-warning btn-circle"><i class="far fa-envelope"></i></div>
                                      <div class="mail-contnet">
                                          <h5>{{$answer->Answers_user->name}}</h5> <span class="mail-desc">{{$answer->answers}}</span> <span class="time">{{$answer->updated_at}}</span> </div>
                                  </a>
                                  @endforeach
                              </div>
                          </li>
                      </ul>
                  </div>
              </li> --}}

              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="far fa-question-circle"></i>
                      <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                      <ul>
                          <li>
                              <div class="drop-title">Novas questões</div>
                          </li>
                          <li>
                              <div class="message-center">
                                  <!-- Message -->
                                  @foreach($questions_list as $key => $question)
                                  @if($key == "4")
                                  @break;
                                  @endif
                                  <a href="/solution?id={{$question->Subjects_List->id}}">
                                      <div class="btn btn-info btn-circle"><i class="fas fa-question"></i></div>
                                      <div class="mail-contnet">
                                          <h5 class="mail-desc">{{$question->q_title}}</h5> <span class="mail-desc">{{$question->question}}</span> <span class="time">{{$question->updated_at}}</span> </div>
                                  </a>
                                  @endforeach
                              </div>
                          </li>
                      </ul>
                  </div>
              </li>

              <li class="nav-item dropdown u-pro">
                  <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user" class=""> <span class="hidden-md-down">Mark &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                  <div class="dropdown-menu dropdown-menu-right animated flipInY">
                      <!-- text-->
                      <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user mr-1"></i>Meu perfil</a>
                      <!-- text-->
                      <div class="dropdown-divider"></div>
                      <!-- text-->
                      <a href="{{route('account-setting')}}" class="dropdown-item"><i class="ti-settings mr-1"></i>Configurações de conta</a>
                      <!-- text-->
                      <div class="dropdown-divider"></div>
                      <!-- text-->
                      <a href="{{route('logout')}}" class="dropdown-item"><i class="fa fa-power-off mr-1"></i>Sistema de logout</a>
                      <!-- text-->
                  </div>
          </ul>
      </div>
  </nav>
</header>