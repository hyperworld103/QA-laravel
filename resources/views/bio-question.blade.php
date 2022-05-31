@extends('layout.index')
@section('content')

    @include('common.preloader')
    <div class="dashboard-area">
      
        @include('common.top-header')
        @include('common.aside-menu')

        <div class="bio-question-background" >
            <div class="container post-card">
                <div class="card" style="background: #eeeeef;">
                  <div class="card-body">
                    <div class="row question-text">
                      <div class="card-body">
                        <h3 class="card-title" style="text-align: center">Biologia</h3>
                        <div class="d-flex justify-content-between">
                          <a href="/question-answerlist?id={{$id}}" class="btn btn-primary btn-rounded"><i class="far fa-smile"></i> MMinhas perguntas</a>
                          <button type="button" class="btn waves-effect waves-light btn-rounded btn-info" data-id="{{$id}}" onclick="Post_Question(this)"><i class="fas fa-upload mr-1"></i>enviar pergunta</button>
                        </div>
                        <div class="form-group mt-2">
                            <input class="form-control" placeholder="Título:" id="question_title">
                        </div>
                        <div class="form-group">
                          <textarea id="mymce" name="area"></textarea>
                        </div>
                        <h4><i class="ti-link"></i> Acessório</h4>
                        <form action="/upload-question-file" method="post" class="dropzone">
                            <div class="fallback">
                                <input name="file" type="file" id="drop_val" multiple />
                            </div>
                            @csrf
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        @include('common.footer')
    </div>
    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script> 
    <script>
      $(document).ready(function() {
          $('.textarea_editor').wysihtml5();
      });
      function Post_Question(elem) {
        var s_id = $(elem).attr('data-id');
        var title = "";
        var question = "";
        title = $("#question_title").val();
        question = tinymce.activeEditor.getContent({ format: "text" });

        if(title == "" || question == "") {
          $.toast({
            text: 'Escreva o título e as perguntas corretamente.',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'warning',
            hideAfter: 3500, 
            stack: 6
          });
        }
        else {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
            url: '/question-upload',
            method: 'post',
            data: {
              s_id: s_id,
              q_title: title,
              question: question
            },
            dataType: false,
            success: function(data) {
              if(data.data == "success") {
                $.toast({
                    heading: 'Sua pergunta foi postada com sucesso.',
                    position: 'top-center',
                    loaderBg:'#ff6849',
                    icon: 'success',
                    hideAfter: 3000, 
                    stack: 6
                });

                setTimeout(function() { 
                    window.location.href="/question-answerlist?id="+s_id;
                }, 3000);
              }
              else if(data.data == "0") {
                $.toast({
                    heading: 'Desculpa! A mesma pergunta já postada.',
                    position: 'top-center',
                    loaderBg:'#ff6849',
                    icon: 'warning',
                    hideAfter: 3000, 
                    stack: 6
                });
              }
            }
          });
        }
      }
    </script>
@endsection