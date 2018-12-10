<div class="">
    <h3 class="card-header dark bg-light">Pertanyaan Populer</h3>

    @forelse ($posts as $post)
        <div class="card mb-3"> 
            @if (Auth::check())
                @if (Auth::user()->name === $post->author)
                    <div class="float-left col-12 pr-2 pt-2">
                        <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="mr-0 text-danger">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger mr-0 float-right"><i class="material-icons float-right">delete</i></button>
                        
                            <a href="{{ route('post.edit', $post->id) }}" class="mr-2 text-light btn btn-primary float-right">
                                <i class="material-icons float-right">create</i>
                            </a>
                        </form>
                    </div>                                  
                @elseif(Auth::user()->isAdmin === 1)
                    <div class="float-left col-12 pr-2 pt-2">
                        <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="mr-0 text-danger">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger mr-0 float-right"><i class="material-icons float-right">delete</i></button>
                        </form>
                    </div> 
                @endif
            
            @endif  
            
            <a href="/post/{{ $post->id }}" style="text-decoration: none;" class="text-dark">         
                <div class="card-body">
                    <h4 class="card-title">{{ $post->title }}</h4>
                    <h6 class="card-subtitle text-muted">by : {{ $post->author }}</h6>
                    <i class="material-icons text-success" style="font-size: 20px;">visibility</i>
                    <br>
                    <i class="material-icons text-primary"  style="font-size: 20px;">comment</i>
                </div>    
                <div class="card-body">
                    <p class="card-text">{{ $post->context }}.</p>
                </div>     
            </a>         
            <div class="card-footer text-muted">  
                <span class="badge badge-pill badge-primary">{{ $post->tag }}</span>
                <span class="badge badge-pill badge-secondary">Secondary</span>
                <span class="badge badge-pill badge-success">Success</span>
                <span class="badge badge-pill badge-danger">Danger</span>
                <span class="badge badge-pill badge-warning">Warning</span>
                <span class="badge badge-pill badge-info">Info</span>
                <span class="badge badge-pill badge-light">Light</span>
                <span class="badge badge-pill badge-dark">Dark</span>    

                <div class="text-right">{{ $post->created_at->diffForHumans() }}</div>
            </div>            
        </div>        
    @empty
        <div class="card mb-3">
            <div class="card-body">
                <p class="text-center">Tidak ada post</p>        
            </div>
        </div>  
    @endforelse ($posts as $post)  
    
    <div class="row justify-content-center">
        {{ $posts->links() }}
    </div>
    
</div>