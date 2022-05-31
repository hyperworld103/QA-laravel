@extends('layout.index')
@section('content')

    @include('common.preloader')
    <div >
        @include('common.top-header')
        @include('common.aside-menu')
        <div class="page-wrapper">
          <div class="container-fluid">
              <div class="row page-titles">
                  <div class="col-md-5 align-self-center">
                  </div>
                  <div class="col-md-7 align-self-center text-right">
                      <div class="d-flex justify-content-end align-items-center">
                         
                      </div>
                  </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="m-b-0 text-white">Configurações de conta</h4>
                        </div>
                        <div class="card-body">
                            <form action="#">
                                <div class="form-body">
                                    <h3 class="card-title">Informação da conta</h3>
                                    <hr>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Nome do usuário</label>
                                                <input type="text" id="username" class="form-control" placeholder="John doe" value="{{$user->name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">O email</label>
                                                <input type="text" id="email" class="form-control" placeholder="admin@admin.com" value="{{$user->email}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Senha atual</label>
                                                <input type="text" id="current_pwd" class="form-control" placeholder="Senha atual">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Nova Senha</label>
                                                <input type="password" id="new_pwd" class="form-control" placeholder="Nova Senha">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="button" class="btn btn-success" onclick="ChangeUserInfo(this)" data-id="{{$user->id}}"> <i class="fa fa-check"></i> Atualizar</button>
                                    <button type="button" class="btn btn-inverse">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
    </div>

    <script>
        function ChangeUserInfo(elem) {
            var u_id = $(elem).attr('data-id');
            var name = $('#username').val();
            var email = $('#email').val();
            var current_password = $("#current_pwd").val();
            var new_password = $('#new_pwd').val();
          
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/change-userinfo',
                method: 'POST',
                data: {
                    id: u_id,
                    name: name,
                    email: email,
                    current_password: current_password,
                    new_password: new_password
                },
                dataType: false,
                success: function(data) {
                    console.log(data.data);
                    if(data.data == 1) {
                        $.toast({
                            heading: 'A senha foi atualizada com sucesso.',
                            position: 'top-center',
                            loaderBg:'#ff6849',
                            icon: 'success',
                            hideAfter: 3000, 
                            stack: 6
                        });
                    }
                    else{
                        $.toast({
                            heading: 'A senha atual não está correta. Por favor, escreva a senha atual correta.',
                            position: 'top-center',
                            loaderBg:'#ff6849',
                            icon: 'error',
                            hideAfter: 3500, 
                            stack: 6
                        });
                    }
                }
            });
        }
    </script>
@endsection