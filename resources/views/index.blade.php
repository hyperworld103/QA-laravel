@extends('layout.index')
@section('content')

    @include('common.preloader')
    <div class="dashboard-area">
      
        @include('common.index-header')
        <video playsinline autoplay muted loop poster="polina.jpg" id="bgvid">
            <source src="assets/images/background/SolverorSolver.mp4" type="video/mp4">
        </video>
        @include('common.footer')
    </div>
    <script>
      function Question(elem) {
        var id = $(elem).attr('data-id');
        document.location.href = "/question"
      }
    </script>
@endsection