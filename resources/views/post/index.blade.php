@extends('layouts.main')

@section('content')
<div class="container jumbotron">
  <h1 class="display-3">KODING DENGAN HATI</h1>
  <p class="lead">Web Forum untuk berbagi, sharing, diskusi seputar Pemrograman Web</p>
  <hr class="my-4">
  <p>Karena berbagi itu indah.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Join Us</a>
  </p>
</div>
      
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 bg-light">
            @include('post.includes.post-list')

            <div class="row justify-content-center">
                <ul class="pagination">
                    <li class="page-item disabled">
                    <a class="page-link" href="#">&laquo;</a>
                    </li>
                    <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                    <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                    <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                    <a class="page-link" href="#">4</a>
                    </li>
                    <li class="page-item">
                    <a class="page-link" href="#">5</a>
                    </li>
                    <li class="page-item">
                    <a class="page-link" href="#">&raquo;</a>
                    </li>
                </ul>
            </div>

        </div>

        @include('post.includes.tags')
    </div>
</div>
@endsection
