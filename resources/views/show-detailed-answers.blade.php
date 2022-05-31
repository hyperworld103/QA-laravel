
@extends('layout.index')
@section('content')

    @include('common.preloader')
    <div >
      
        @include('common.top-header')
        @include('common.aside-menu')
        <div class="page-wrapper">
          <div class="container-fluid">
              
              <div class="row page-titles">
                  <div class="col-md-12 align-self-center text-right">
                      <div class="d-flex justify-content-end align-items-center">
                          <a href="/question-post?id={{$subject_id->s_id}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Postar nova pergunta</a>
                      </div>
                  </div>
              </div>
              
              <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                  <div class="card">
                      <div class="card-header bg-info">
                          <h4 class="m-b-0 text-white"><i class="fas fa-book mr-2"></i>Respostas</h4>
                      </div>
                      <div class="card-body">
                        @if (sizeof($answerslist) == "0")
                            <p style="text-align: center">Sem respostas...</p>
                        @endif
                        @foreach($answerslist as $key => $answer) 
                        @if ($key == 5)
                            @break;
                        @endif
                        <div class="answer-blog p-3">
                          <div class="d-flex justify-content-between mb-2">
                            <div class="d-flex">
                              <div>
                                  <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user" width="40" class="img-circle" /></a>
                              </div>
                              <div class="p-l-10">
                                  <h4 class="m-b-0">{{$answer->Answers_user->name}}</h4>
                                  <small class="text-muted">From: {{$answer->Answers_user->email}}</small>
                              </div>
                            </div>
                            <div class="d-flex">
                              @if($answer->read == "1")
                              {{-- <div class="d-flex align-items-center mr-2"><input type="checkbox" class="check answer-confirm"><p style="font-size: 22px">👎</p></div> --}}
                              <input type="checkbox" class="check answer-confirm" checked disabled><p style="font-size: 22px">👍</p>
                              @elseif($answer->read == "0")
                              {{-- <div class="d-flex align-items-center mr-2"><input type="checkbox" class="check answer-confirm"><p style="font-size: 22px">👎</p></div> --}}
                              <div class="d-flex align-items-center"><input type="checkbox" class="check answer-confirm" id="answer_status" data-id="{{$answer->id}}"><p style="font-size: 22px">👍</p></div>
                              @endif
                            </div>
                          </div>
                          <div class="">
                            <p>{!!$answer->answers!!}</p>
                          </div>
                        </div>
                        <hr class="mt-4 mb-4">
                        @endforeach
                      </div>
                  </div>
                </div>
                <div class="col-lg-3"></div>
              </div>
          </div>
        </div>
        @include('common.footer')
    </div>
    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script> 
    <script>
     $(document).ready(function() {
      
      $('#answer_status').change(function() {
          var answer_id = "";
          answer_id = $("#answer_status").attr('data-id');
          if($(this).is(":checked")) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
              url: '/answer-readed',
              method: 'POST',
              data: {
                state: '1',
                id: answer_id
              },
              dataType: false,
              success: function(data) {
                console.log(data);
              }
            });
          }
          else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
              url: '/answer-readed',
              method: 'POST',
              data: {
                state: '0',
                id: answer_id
              },
              dataType: false,
              success: function(data) {
                console.log(data);
              }
            });
          }
      });
  });
    </script>
@endsection