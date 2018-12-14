<div class="">
    <h3 class="card-header dark bg-light">Artikel terbaru</h3>

    @forelse ($posts as $post)
        <div class="card mb-3"> 
            @if (Auth::check())
                @if (Auth::user()->id === $post->user_id)
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
            
            <a href="/post/{{ $post->id }}" style="" class="text-dark" style="">         
                <div class="card-body">
                    <h3 class="card-title">{{ strtoupper($post->title) }}</h3></a>  
                    <h6 class="card-subtitle text-muted">by : {{ $post->user->name }}</h6>
                    <i class="material-icons text-success" style="font-size: 15px;">visibility</i>
                    <br>
                    <i class="material-icons text-primary"  style="font-size: 15px;">comment</i>
                </div>        
                <div class="card-body">
                    <hr>
                    <p class="card-text">{{ $post->context }}.</p>
                </div>     
                   
            <div class="card-footer text-muted">  
                @if ($post->tag === 'Laravel')
                    <span class="badge badge-pill badge-danger">{{ $post->tag }}</span>    
                @elseif($post->tag === 'Python')
                    <span class="badge badge-pill badge-primary">{{ $post->tag }}</span>
                @elseif($post->tag === 'Ruby')
                    <span class="badge badge-pill badge-warning">{{ $post->tag }}</span>
                @elseif($post->tag === 'CSS')
                    <span class="badge badge-pill badge-secondary">{{ $post->tag }}</span>
                @elseif($post->tag === 'HTML')
                    <span class="badge badge-pill badge-info">{{ $post->tag }}</span>
                @elseif($post->tag === 'PHP')
                    <span class="badge badge-pill badge-dark">{{ $post->tag }}</span>
                @elseif($post->tag === 'Javascript')
                    <span class="badge badge-pill badge-success">{{ $post->tag }}</span>
                @endif

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