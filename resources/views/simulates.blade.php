@extends('layout.index')
@section('content')

    @include('common.preloader')
    <div class="dashboard-area">
      
        @include('common.top-header')

        <div class="dashboard-background" >
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-12">
                        <h3 class="subject-title">ENEM e VESTIBULARES</h3>
                    </div>
                </div>
            </div>

            <div class="container-fluid mt-5">
              <div class="row">
                <div class="col-12">
                  <div class="subject-group">
                    <div class="row button-group">
                      <div class="col-lg-2 col-md-4">
                        @foreach($simulates as $simulates)
                          <button type="button" class="btn btn-block btn-lg {{$simulates->color}}" data-id="{{$simulates->id}}" onclick="SelectInstitution(this)">{{$simulates->name}}</button>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        @include('common.footer')
    </div>
    <script>
      function SelectInstitution(elem) {
        var institutionID = $(elem).attr('data-id');
        document.location.href = "/institution?id="+institutionID
      }
    </script>
@endsection