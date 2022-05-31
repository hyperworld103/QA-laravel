@extends('layout.index')
@section('content')

    @include('common.preloader')
    <div class="dashboard-area">
      
        @include('common.top-header')
        @include('common.aside-menu')

        <div class="question-background" >
            <div class="container post-card">
              <div class="card" style="background: #eeeeef;">
                <div class="card-body">
                  <div class="row question-text">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <h3 class="card-title">Postar pergunta</h3>
                        <button type="button" class="btn waves-effect waves-light btn-rounded btn-info" onclick="Post_Question()">Pergantar</button>
                      </div>
                      <div class="form-group mt-2">
                          <input class="form-control" placeholder="Título:">
                      </div>
                      <div class="form-group">
                          <textarea class="textarea_editor form-control" rows="15" placeholder="Digite o texto ..."></textarea>
                      </div>
                      <h4><i class="ti-link"></i> Acessório</h4>
                      <form action="#" class="dropzone">
                          <div class="fallback">
                              <input name="file" type="file" multiple />
                          </div>
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
      function Post_Question() {
        document.location.href = "/answers"
      }
    </script>
@endsection