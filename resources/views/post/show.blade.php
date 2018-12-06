@extends('layouts.main')

@section('css')
    <link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="container col-12 bg-warning">
  <div class="backg">
    <h1 class="display-3">KODING DENGAN HATI</h1>
    <p class="lead">Web Forum untuk berbagi, sharing, diskusi seputar Pemrograman Web</p>
    <hr class="my-4">
    <p>Karena berbagi itu indah.</p>
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="{{ route('register') }}">Join Us</a>
    </p>
</div>
</div>
      
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-9 bg-light">
          <div class="card text-white bg-secondary m-3" style="max-width: 50rem;">
            <div class="card-header">
              {{-- 
              ======================================================================
              Memanggil data dari tabel "posts" yang ada di database
              Dan mengubah format created_at menjadi waktu yang bisa dibaca manusia
              Seperti 1 second ago, 2 days ago, 3 hours ago
              =======================================================================
               --}}
              <a href="#"><h3>{{ $data->author }}</h3></a>
              <p>{{ $data->created_at->diffForHumans() }}</p>
            </div>
            <div class="card-body">
              <h4 class="card-title">{{ $data->title }}</h4>
              
              <span class="badge badge-pill badge-primary">Primary</span>
              <span class="badge badge-pill badge-secondary">Secondary</span>
              <span class="badge badge-pill badge-success">Success</span>
              <span class="badge badge-pill badge-danger">Danger</span>
              <span class="badge badge-pill badge-warning">Warning</span>
              <span class="badge badge-pill badge-info">Info</span>
              <span class="badge badge-pill badge-light">Light</span>
              <span class="badge badge-pill badge-dark">Dark</span>  
                            
              <p class="card-text"><hr>{{ $data->context }}.</p>
            </div>
          </div>
        </div>

        @include('post.includes.tags')
    </div>
</div>
@endsection
