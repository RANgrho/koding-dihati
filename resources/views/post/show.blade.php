@extends('layouts.main')

@section('css')
    <link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
 <!-- <div class="container col-12 bg-warning">
  <div class="backg">
    <h1 class="display-3">KODING DENGAN Komputer</h1>
    <p class="lead">Web Forum untuk berbagi, sharing, diskusi seputar Pemrograman Web</p>
    <hr class="my-4">
    <p>Karena berbagi itu buruk.</p>
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="{{ route('register') }}">Join Us</a>
    </p>
  </div>
</div>  -->
      
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-9 bg-light">
          <div class="card text-black bg-light m-3" style="max-width: 50rem;">
            <div class="card-header">
              {{-- 
              ======================================================================
              Memanggil data dari tabel "posts" yang ada di database
              Dan mengubah format created_at menjadi waktu yang bisa dibaca manusia
              Seperti 1 second ago, 2 days ago, 3 hours ago
              =======================================================================
               --}}
              <h3 class="card-title">{{ $data->title }}</h3>
              @if ($data->tag === 'Laravel')
                    <span class="badge badge-pill badge-danger">{{ $data->tag }}</span>    
                @elseif($data->tag === 'Python')
                    <span class="badge badge-pill badge-primary">{{ $data->tag }}</span>
                @elseif($data->tag === 'Ruby')
                    <span class="badge badge-pill badge-warning">{{ $data->tag }}</span>
                @elseif($data->tag === 'CSS')
                    <span class="badge badge-pill badge-secondary">{{ $data->tag }}</span>
                @elseif($data->tag === 'HTML')
                    <span class="badge badge-pill badge-light">{{ $data->tag }}</span>
                @elseif($data->tag === 'PHP')
                    <span class="badge badge-pill badge-dark">{{ $data->tag }}</span>
                @elseif($data->tag === 'Javascript')
                    <span class="badge badge-pill badge-success">{{ $data->tag }}</span>
                @endif
              </div>
              <div class="card-body">
              by {{ $data->author }}  
              <br>
              {{ $data->created_at->diffForHumans() }}
                            
              <p class="card-text"><hr>{{ $data->context }}.</p>
            </div>
          </div>
        </div>

        
    </div>
</div>
@endsection
