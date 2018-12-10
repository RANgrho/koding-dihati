@extends('layouts.main')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p class="text-center">{{ $message }}</p>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-9 bg-light">

            <!--
                ===================
                Form Create Post
                ===================
            -->
            <form action="{{ route('post.store')}}" method="POST" role="form">
                @csrf
                <fieldset>
                    <legend>Buat Post</legend>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="author" id="author" value="{{ Auth::user()->name }}">                    
                    </div>

                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Masukkan Judul">                    
                    </div>

                    <div class="form-group">
                        <label for="context">Deskripsi</label>
                        <textarea class="form-control" name="context" id="context" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tags">Tag</label>
                        <br>
                        <select class="custom-select m-0" name="tag" id="tag">
                            <option selected=""></option>                        
                            @forelse ($tags as $tag)
                                <option name="tag" id="tag" value="{{ $tag->tag }}">{{ $tag->tag }}</option>
                            @empty
                                
                            @endforelse ($tags as $tag)
                        </select>
                    </div>

                    <fieldset class="form-group">                    
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </fieldset>   
                </fieldset>
            </form>
            
        </div>
    </div>
</div>
@endsection
