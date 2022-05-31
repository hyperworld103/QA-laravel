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
                    <h4 class="text-themecolor">Todas as perguntas</h4>
                  </div>
                  <div class="col-md-7 align-self-center text-right">
                      <div class="d-flex justify-content-end align-items-center">
                          <a href="{{route('ask-subject')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Postar nova pergunta</a>
                      </div>
                  </div>
              </div>

              <div class="row col-12">
                    <div class="card" style="width: 100%">
                        <div class="card-body">
                            <h4 class="card-title">Todas as perguntas</h4>
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 72%; text-align: center">Perguntas</th>
                                            <th style="text-align: center">Date</th>
                                            <th style="text-align: center">User</th>
                                            <th style="text-align: center" >answer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($total_questions as $questions)
                                        <tr>
                                            <td class="align-middle">
                                                <p style="font-weight:600">{{$questions->q_title}}</p>
                                                <p class="sm-question-content">{{$questions->question}}</p>
                                            </td>
                                            <td class="align-middle" style="text-align: center">{{$questions->updated_at}}</td>
                                            <td class="align-middle" style="text-align: center">{{$questions->Question_user->name}}</td>
                                            <td class="align-middle" style="text-align: center">
                                                <a href="show-answers?id={{$questions->id}}" data-toggle="tooltip" title="Mostre a resposta detalhada" data-id={{$questions->id}}><i class="fas fa-eye text-success show-icon"></i> </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
              </div>
          </div>
        </div>
    </div>
    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>   
    <script>
        $(function() {
            $('#myTable').DataTable();
        });

        function RemoveQuestion(elem) {
            var id = $(elem).attr('data-id');
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url:'/remove-question',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: false,
                success: function(data) {
                    if(data.data == "removed") {
                        $.toast({
                            heading: 'Excluir resposta.',
                            text: 'Resposta selecionada excluída corretamente.',
                            position: 'top-right',
                            loaderBg:'#ff6849',
                            icon: 'success',
                            hideAfter: 3000, 
                            stack: 6
                        });
                        setTimeout(function() { 
                            location.reload();
                        }, 3000);
                    }
                }
            });
        }
    </script>
    
@endsection