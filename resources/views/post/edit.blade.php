@extends('layouts.main')

@section('content')
      
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-9 bg-light">

            <!--
                ===================
                Form Edit Post
                ===================
            -->
            <form action="{{ route('post.update', $post->id) }}" method="POST" role="form">
                @csrf
                @method('PUT')
                <fieldset>
                    <legend>Edit Post</legend>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="author" id="author" value="{{ Auth::user()->name }}">                    
                    </div>

                    <div class="form-group">
                        <label for="title">Judul</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" value="{{ $post->title}}">                    
                    </div>

                    <div class="form-group">
                        <label for="context">Deskripsi</label>
                        <textarea class="form-control" name="context" id="context" rows="10">{{ $post->context}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="tags">Tag Max 3</label>
                        <br>
                        <select class="custom-select border-0 m-0">
                                <option name="tag" id="tag" value="{{ $post->tag }}">{{ $post->tag }}</option>
                            @forelse ($tags as $tag)
                                <option name="tag" id="tag" value="{{ $tag->tag }}">{{ $tag->tag }}</option>
                            @empty
                                
                            @endforelse ($tags as $tag)
                        </select>
                    </div>

                    <fieldset class="form-group">                    
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </fieldset>   
                </fieldset>
            </form>
            
        </div>
    </div>
</div>
@endsection
