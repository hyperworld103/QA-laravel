@extends('layout.index')
@section('content')

    @include('common.preloader')
    <div>
        @include('common.top-header')
        @include('common.aside-menu')
        <div class="page-wrapper">
          <div class="container-fluid">
              
              <div class="row page-titles">
                  <div class="col-md-12 align-self-center text-right">
                      <div class="d-flex justify-content-end align-items-center">
                          <a href="/question-post?id={{$subject_id}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Postar nova pergunta</a>
                      </div>
                  </div>
              </div>
              
              <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="m-b-0 text-white"><i class="fas fa-question"></i> Minha pergunta</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                  @if (sizeof($q_data) == "0")
                                    <p style="text-align: center">Sem perguntas ...</p>
                                  @endif
                                  @foreach($q_data as $q_data)
                                    <a href="show-detail-answer?id={{$q_data->id}}" data-id={{$q_data->id}}>
                                      <h4 style="font-weight: 500">{{$q_data->q_title}}</h4>
                                    </a>
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
                                        <p><i class="fa fa-paperclip m-r-10 m-b-10"></i>Anexos</p>
                                        <div>
                                         
                                          @if($q_data->UploadFile_List == null)
                                          <p>no files</p>
                                          @else 
                                          <a href="/{{$q_data->UploadFile_List->file_path}}" class="attachment" target="_blank">
                                            <p>{{$q_data->UploadFile_List->file_name}}</p>
                                          </a>
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                                    <p class="date question-posted-data">{{$q_data->updated_at}}</p>
                                    <hr class="m-t-0 m-b-5">
                                  @endforeach
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
              </div>
          </div>
        </div>
        @include('common.footer')
    </div>
@endsection