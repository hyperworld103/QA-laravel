@extends('layout.index')
@section('content')

    @include('common.preloader')
    <div class="dashboard-area">
      
        @include('common.top-header')
        @include('common.solution-menu')

        <div class="math-solution-background" >
            <div class="container-fluid mt-4 mb-3">
                <h3 class="card-title" style="color:white; text-align:center; font-weight:600">Perguntas e respostas para {{$subject->name}}</h3>
                <div class="row col-12">
                    <div class="col-6">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <h4 class="card-title">Perguntas recentes</h4>
                            <select class="custom-select w-25 ml-auto">
                                <option selected="">All</option>
                                <option value="1">Today</option>
                                <option value="2">Week</option>
                                <option value="3">Month</option>
                            </select>
                          </div>
                          <div class="table-responsive m-t-40">
                              <table class="table stylish-table">
                                  <thead>
                                      <tr>
                                          <th style="width:60%">Pergunta</th>
                                          <th>Solver</th>
                                          <th>Data</th>
                                          <th>Status</th>
                                          <th>View</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($questions as $question)
                                      <tr class="each-question">
                                          <td>
                                              <h6>{{$question->q_title}}</h6>
                                              <small class="text-muted sm-question-content">{!!$question->question!!}</small>
                                          </td>
                                          <td class="align-middle">
                                              <h6>{{$question->Question_user->name}}</h6>
                                          </td>
                                          <td class="align-middle"><p data-id={{$question->statu}}>{{$question->updated_at}}</p></td>
                                          @if($question->statu == "0")
                                            <td class="align-middle">
                                                <button type="button" class="btn btn-success" data-whatever="reply" data-id={{$question->id}} onclick="ReplyQuestion(this)">Responder</button>
                                            </td>
                                          @else
                                          <td class="align-middle">
                                             <span class="btn btn-warning">Respondida</span>
                                          </td>
                                          @endif
                                          <td class="align-middle">
                                             @if(count($question->Answers_List)=="0")
                                                <p style="color:rgb(235, 42, 42);text-align:center">sem resposta</p>
                                             @else
                                                <a href="javascript:;" data-toggle="modal" data-target="#AnswerListModal" data-whatever="reply" data-id="{{$question->Answers_List[0]->q_id}}" onclick="Answers(this)"><i class="fas fa-eye text-success show-icon"></i> </a>
                                             @endif
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <h4 class="card-title">Respostas recentes</h4>
                            <select class="custom-select w-25 ml-auto">
                                <option selected="">All</option>
                                <option value="1">Today</option>
                                <option value="2">Week</option>
                                <option value="3">Month</option>
                            </select>
                          </div>
                          <div class="table-responsive m-t-40">
                              <table class="table stylish-table">
                                  <thead>
                                      <tr>
                                          <th style="width:60%">Respostas</th>
                                          <th>Do utilizador</th>
                                          <th>Encontro</th>
                                          <th>Status</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($replyanswers as $Answers)
                                      <tr class="each-question">
                                          <td>
                                              <p class="text-muted sm-question-content">{!!$Answers->answers!!}</p>
                                          </td>
                                          <td class="align-middle">
                                              <h6>{{$Answers->Answers_user->name}}</h6>
                                          </td>
                                          <td class="align-middle">
                                            <p>{{$Answers->updated_at}}</p>
                                           
                                          </td>
                                          <td class="align-middle">
                                            
                                              <a href="javascript:;" data-toggle="modal" data-target="#replyAnswerModal" data-whatever="reply" data-id="{{$Answers->id}}" onclick="DetailAnswers(this)"><i class="fas fa-eye text-success show-icon"></i> </a>
                                              <a href="javascript:;" data-toggle="tooltip" title="Remover uma pergunta" data-id="{{$Answers->id}}" onclick="RemoveAnswers(this)"> <i class="mdi mdi-delete-forever text-primary remove-icon"></i></a>
                                              @if($Answers->read == "1")
                                              <div>👍</div>
                                              @elseif($Answers->read == "0")
                                              <div>🖐</div>
                                              @endif
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
        </div>
        @include('common.footer')
    </div>
    {{-- Sent Answer Modal --}}
    <div class="modal fade" id="questionReplyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabel1">Por favor responda a uma pergunta</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body" >
                  <div id="question">

                  </div>
                  <p style="font-weight: 400"><i class="fa fa-paperclip m-r-10 m-b-10"></i>Attachments</p>
                  <div id="attampt_file">
                      
                  </div>
                  <div id="reply_answer">
                     <div class="form-group">
                        <label for="message-text" class="control-label">Responder:</label>
                        <textarea class="textarea_editor form-control" rows="13" placeholder="Digite o texto ..." id="answer_content"></textarea>
                        <p class="answer-alert">Por favor, insira as respostas corretas para esta pergunta.</p>  
                     </div>
                     <div class="form-group">
                        <form action="/upload-answers-file" method="post" class="dropzone">
                            <div class="fallback">
                                <input name="file" type="file" id="drop_val" multiple />
                            </div>
                            @csrf
                        </form>
                     </div>
                  </div>
              </div>
              <div id="reply_button">

              </div>
          </div>
      </div>
    </div>

    {{-- Show the answers --}}
    <div class="modal fade" id="replyAnswerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabel1" style="font-weight:500">Responder</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                  <h5 style="font-weight: 400;"><i class="fas fa-question mr-1"></i>Question</h5>
                  <form id="detail_question">
                        
                  </form>
                  <hr class="mt-1 mb-1">
                  <h5 style="font-weight: 400;"><i class="far fa-edit mr-1"></i>Answer</h5>
                  <form id="detail_answer">
                     
                  </form>
                  <div id="answer_files">

                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
              </div>
          </div>
      </div>
    </div>

    {{-- Show the answerslist --}}
    <div class="modal fade" id="AnswerListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabel1" style="font-weight:500">Responder</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                  <h5 style="font-weight: 400;"><i class="far fa-edit mr-1"></i>Answer</h5>
                  <form id="answerslist">
                     
                  </form>
                  <div id="answer_files">

                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
              </div>
          </div>
      </div>
    </div>

    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script> 
    <script>
      $(document).ready(function() {
          $('.textarea_editor').wysihtml5();
      });

      function ReplyQuestion(elem) {
          var q_id = $(elem).attr('data-id');
          $("#questionReplyModal").modal();

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
              url:'/reply-answer',
              method: 'POST',
              data: {
                  id: q_id
              },
              dataType: false,
              success: function(data) {
                var reply_html = "";
                var attampt = "";
                var reply_btn = "";
                reply_html += '<div class="form-group">\n'+
                                '<h6 style="font-weight: 400">'+data.data[0].q_title+'</h6>\n'+
                            '</div>\n'+
                            '<div class="form-group">\n'+
                                '<p>'+data.data[0].question+'</p>\n'+
                            '</div>\n';
                var count = data.attampt.length;
                for (var item of data.attampt) {
                attampt += '<a href="/'+item.file_path+'" class="attachment" target="_blank">\n'+
                                '<p>'+item.file_name+'</p>\n'+
                            '</a>';
                }
               
                reply_btn += '<div class="modal-footer">\n'+
                                    '<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>\n'+
                                    '<button type="button" class="btn btn-primary" data-id="'+data.data[0].id+'" onclick="ReplyAnswer(this)">Enviar resposta</button>\n'+
                                '</div>';
            
                $("#question").html(reply_html);
                $("#attampt_file").html(attampt);
                $("#reply_button").html(reply_btn);
              }
          })
      }

      function ReplyAnswer(elem) {
          var q_id = '';
          var answer = '';
          q_id = $(elem).attr('data-id');
          answer = $("#answer_content").val();
         
         if(answer == '') {
            $(".answer-alert").show();
         }
         else {
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
              url:'/send-answer',
              method: 'POST',
              data: {
                  id: q_id,
                  answer: answer
              },
              dataType: false,
              success: function(data) {
                console.log(data);
                  if(data.data = '1') {
                    $.toast({
                            heading: 'Sua resposta foi postada corretamente. Obrigada.',
                            position: 'top-center',
                            loaderBg:'#ff6849',
                            icon: 'success',
                            hideAfter: 3000, 
                            stack: 6
                     });

                    setTimeout(function() { 
                        window.location.reload(true);
                    }, 3000);
                  }
              }
          })
         }
      }

      function DetailAnswers(elem) {
          var a_id = '';
          a_id = $(elem).attr('data-id');
          
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
            url: '/detail-answer',
            method: 'POST',
            data: {
                id: a_id
            },
            dataType: false,
            success: function(data) {
                
                var question_html = '';
                question_html += '<div class="form-group">\n'+
                                    '<h6>'+data.question.q_title+'</h6>\n'+
                                '</div>\n'+
                                '<div class="form-group">\n'+
                                    '<p>'+data.question.question+'</p>\n'+
                                '</div>'
                 $("#detail_question").html(question_html);     

                 var answer_html = '';
                 answer_html += '<div class="form-group">\n'+
                                    '<p>'+data.data.answers+'</p>\n'+
                                '</div>';
                 $("#detail_answer").html(answer_html);

                var count = data.answer_file.length;
                for(var i=0; i<count; i++) {
                    var answer_files = '';
                    answer_files += '<div class="answerfile-area">\n'+
                    '<p>Anexar arquivo</p>\n'+
                    '<a href="/'+data.answer_file[i].file_path+'" target="_blank" class="answer_file">'+data.answer_file[i].file_name+'</a>\n'+
                    '</div>';
                }
                $("#answer_files").html(answer_files);
               
            }
          });
      }

      function RemoveAnswers(elem) {
          var id = $(elem).attr('data-id');
          
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
                url:'/remove-answers',
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

      function Answers(elem) {
          var q_id = '';
          q_id = $(elem).attr('data-id');
          
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
              url:'/answerslist',
              method: 'post',
              data: {
                  q_id: q_id
              },
              dataType: false,
              success: function(data) {
                  var count = data.data.length;
                  var answerslist = '';
                  for(var i=0; i<count; i++) {
                      answerslist += 
                                    '<div class="form-group">\n'+
                                        '<p>'+data.data[i].answers+'</p>\n'+
                                    '</div>\n'+
                                    '<hr>';
                  }
                  $("#answerslist").html(answerslist);
              }
          });
      }
    </script>
@endsection