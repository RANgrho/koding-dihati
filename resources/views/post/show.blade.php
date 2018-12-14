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
      <a class="btn btn-primary btn-lg" href="{{-- {{ route('register') }} --}}">Join Us</a>
    </p>
  </div>
</div>  -->

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p class="text-center">{{ $message }}</p>
    </div>
@endif
      
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-9 bg-light">
          <div class="card text-black bg-white m-3" style="max-width: 50rem;">
            <div class="card-header">
                @if (Auth::check())
                    @if (Auth::user()->id === $data->user_id)
                        <div class="float-left col-12 pr-2 pt-2">
                            <form action="{{ route('post.destroy', $data->id) }}" method="POST" class="mr-0 text-danger">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger mr-0 float-right"><i class="material-icons float-right">delete</i></button>
                            
                                <a href="{{ route('post.edit', $data->id) }}" class="mr-2 text-light btn btn-primary float-right">
                                    <i class="material-icons float-right">create</i>
                                </a>
                            </form>
                        </div>                                  
                    @elseif(Auth::user()->isAdmin === 1)
                        <div class="float-left col-12 pr-2 pt-2">
                            <form action="{{ route('post.destroy', $data->id) }}" method="POST" class="mr-0 text-danger">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger mr-0 float-right"><i class="material-icons float-right">delete</i></button>
                            </form>
                        </div> 
                    @endif
                
                @endif
              {{-- 
              ======================================================================
              Memanggil data dari tabel "posts" yang ada di database
              Dan mengubah format created_at menjadi waktu yang bisa dibaca manusia
              Seperti 1 second ago, 2 days ago, 3 hours ago
              =======================================================================
               --}}
              <h3 class="card-title">{{ strtoupper($data->title) }}</h3>
              @if ($data->tag === 'Laravel')
                    <span class="badge badge-pill badge-danger">{{ $data->tag }}</span>    
                @elseif($data->tag === 'Python')
                    <span class="badge badge-pill badge-primary">{{ $data->tag }}</span>
                @elseif($data->tag === 'Ruby')
                    <span class="badge badge-pill badge-warning">{{ $data->tag }}</span>
                @elseif($data->tag === 'CSS')
                    <span class="badge badge-pill badge-secondary">{{ $data->tag }}</span>
                @elseif($data->tag === 'HTML')
                    <span class="badge badge-pill badge-info">{{ $data->tag }}</span>
                @elseif($data->tag === 'PHP')
                    <span class="badge badge-pill badge-dark">{{ $data->tag }}</span>
                @elseif($data->tag === 'Javascript')
                    <span class="badge badge-pill badge-success">{{ $data->tag }}</span>
                @endif
              </div>
              <div class="card-body">
              by {{ $data->user->name }}  
              <br>
              <p style="font-size: 10px">{{ $data->created_at->diffForHumans() }}</p>
                            
              <p class="card-text"><hr>{{ $data->context }}.</p>
            </div>
          </div>
        </div>

        <div class="col-md-9 bg-light">
            <hr>
            <div class="card text-black bg-secondary m-3" style="max-width: 50rem;">
                <div class="card-body text-center text-white">
                    JAWABAN
                </div>
            </div>
            <hr>
        </div>        

        <div class="col-md-9 bg-light">
        {{-- 
            ======================================================================
            Memanggil data dari tabel "comment"
            =======================================================================
                --}}
            @forelse ($data->comment as $comment)
                <div class="card text-black bg-white m-3" style="max-width: 50rem;">                
                    <div class="card-body">
                        by {{ $comment->user->name }}  
                        <p style="font-size: 10px">{{ $comment->created_at->diffForHumans() }}</p>
                        <hr>
                        <p class="card-text">{{ $comment->comment }}.</p>
                    </div>
                </div>    
            @empty
                
            @endforelse
            
        </div>        
        
        @if (Auth::check())
            <div class="col-md-9 bg-light">
                    {{-- 
                    ======================================================================
                    Form Input Komentar
                    =======================================================================
                        --}}
                <form action="{{ route('comment.store') }}" method="POST" class="form-group m-3">
                    @csrf
                    <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" class="form-control" name="post_id" id="post_id" value="{{ $data->id }}">
                    <textarea class="form-control" rows="5" name="comment" id="comment" placeholder="Tulis Jawaban Anda Disini ..."></textarea>
                    <button class="btn btn-secondary btn-block mt-2">submit jawaban</button>
                </form>
            </div>  
        @else
            <div class="col-md-9">
                <a href="/login" style="text-decoration:none;" class="text-white">
                    <p class="card-text text-center bg-info m-3" style="border:1; border-radius:20px;">
                        Untuk memberi jawaban atau komentar silahkan login dahulu
                    </p>
                </a>
            </div>
        @endif
        
    </div>    
</div>
@endsection
