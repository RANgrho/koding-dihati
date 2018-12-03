@extends('layouts.main')

@section('content')
      
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 bg-light">
            <form action="{{ route('post.store')}}" method="POST" role="form">
                {{ csrf_field() }}
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
                    {{-- @php
                        $author = Auth::user()->name;
                    @endphp --}}
                    
                    {{-- <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                    </div> --}}
                    <fieldset class="form-group">                    
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </fieldset>   
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection
