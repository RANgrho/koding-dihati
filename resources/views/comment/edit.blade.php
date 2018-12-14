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
                   
        @if (Auth::check())
            <div class="col-md-9 bg-light">
                    {{-- 
                    ======================================================================
                    Form Input Komentar
                    =======================================================================
                        --}}
                <form action="{{ route('comment.update', $comment->id) }}" method="POST" class="form-group m-3">
                    @csrf
                    @method('PUT')
                    <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" class="form-control" name="post_id" id="post_id" value="{{ $comment->post_id }}">
                    <textarea class="form-control" rows="5" name="comment" id="comment" placeholder="Tulis Jawaban Anda Disini ...">{{ $comment->comment }}</textarea>
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
