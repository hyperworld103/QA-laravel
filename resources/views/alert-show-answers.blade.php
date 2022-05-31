
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
                          <a href="/select-category" class="btn btn-info d-none d-lg-block m-l-15"><i class="fas fa-undo mr-1"></i>Painel</a>
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
                        
                        <div class="answer-blog p-3">
                          <div class="d-flex justify-content-between mb-2">
                            <div class="d-flex">
                              <div>
                                  <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user" width="40" class="img-circle" /></a>
                              </div>
                              <div class="p-l-10">
                                  <h4 class="m-b-0">{{$answers[0]->Answers_user->name}}</h4>
                                  <small class="text-muted">From: {{$answers[0]->Answers_user->email}}</small>
                              </div>
                            </div>
                            <div>
                             
                              <input type="checkbox" class="check answer-confirm" id="answer_status" data-id="{{$answers[0]->id}}">
                             
                            </div>
                          </div>
                          <div class="">
                            <p>{{$answers[0]->answers}}</p>
                          </div>
                        </div>
                        <hr class="mt-4 mb-4">
                      
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