@extends('layouts.main')

@section('content')
<div class="bg-warning col-12 m-0">
    <div class="container jumbotron bg-warning">
        <h1 class="display-3">KODING DENGAN HATI</h1>
        <p class="lead">Web Forum untuk berbagi, sharing, diskusi seputar Pemrograman Web</p>
        <hr class="my-4">
        <p>Karena berbagi itu indah.</p>
        <p class="lead">
            @if (Auth::check())
                <h2 class="text-success">{{ "Selamat Datang ". Auth::user()->name }}</h2>
            @else
                <a class="btn btn-primary btn-lg" href="{{ route('register') }}">Join Us</a>
            @endif    
        </p>
    </div>
</div>

      
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-9 bg-light">
            @include('post.includes.post-list')
        </div>

        @include('post.includes.tags')
    </div>
</div>
@endsection
