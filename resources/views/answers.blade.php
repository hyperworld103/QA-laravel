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
                      {{-- <h4>This is</h4> --}}
                  </div>
              </div>
              
              <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="m-b-0 text-white"><i class="fas fa-question"></i> Minhas perguntas</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <h3>{{$q_data->q_title}}</h3>
                                    <hr class="m-t-0 m-b-5">
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <p class="form-control-static">{{$q_data->question}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-12">
                                        <p><i class="fa fa-paperclip m-r-10 m-b-10"></i>Attachments</p>
                                        @foreach($q_file as $files)
                                        <div>
                                          <a href="/{{$files->file_path}}" class="attachment" target="_blank">
                                            <p>{{$files->file_name}}</p>
                                          </a>
                                        </div>
                                        @endforeach
                                      </div>
                                    </div>
                                    <hr class="m-t-0 m-b-0">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="m-b-0 text-white"><i class="fas fa-book mr-2"></i>Respostas</h4>
                        </div>
                        <div class="card-body">
                          @if($a_data === null)
                            <p>Null</p>
                          @endif
                          @foreach($a_data as $answers) 
                          <div class="answer-blog p-3">
                            <div class="d-flex justify-content-between mb-2">
                              <div class="d-flex">
                                <div>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user" width="40" class="img-circle" /></a>
                                </div>
                                <div class="p-l-10">
                                    <h4 class="m-b-0">Pavan kumar</h4>
                                    <small class="text-muted">From: jonathan@domain.com</small>
                                </div>
                              </div>
                              <div>
                                <input type="checkbox" class="check answer-confirm" id="minimal-checkbox-1">
                              </div>
                            </div>
                            <div class="">
                              <p>{{$answers}}</p>
                            </div>
                          </div>
                          <hr class="mt-4 mb-4">
                          @endforeach
                        </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
        @include('common.footer')
    </div>
@endsection