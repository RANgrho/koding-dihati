<div class="list-group col-md-3 p-3 bg-light">
    <a href="/post/create" class="btn btn-success btn-lg btn-block">Buat Postingan</a>  
    @if (Auth::check())
        @if (Auth::user()->isAdmin === 1)
            <a href="/tag/create" class="btn btn-success btn-lg btn-block">Tambah Tags</a>
        @endif        
    @endif
    
    <br>
    <b class="list-group-item list-group-item-action active">
        Tags
    </b>
{{--     @forelse ($tags as $tag)
        <a href="#" class="list-group-item list-group-item-action">{{ $tag->tag }}</a>   
    @empty
        
    @endforelse --}}
    <!-- <a href="#" class="list-group-item list-group-item-action">php
    </a>
    <a href="#" class="list-group-item list-group-item-action">laravel
    </a>
</div> -->