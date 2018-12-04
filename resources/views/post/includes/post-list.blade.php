<div>
    <h3 class="card-header dark bg-light">Pertanyaan Populer</h3>

    @forelse ($posts as $post)
        <a href="" style="text-decoration: none">
            <div class="card mb-3">                
                <div class="card-body">
                    <h4 class="card-title">{{ $post->title }}</h4>
                    <h6 class="card-subtitle text-muted">by : {{ $post->author }}</h6>
                </div>    
                <div class="card-body">
                    <p class="card-text">{{ $post->context }}.</p>
                </div>              
                <div class="card-footer text-muted">  
                    <span class="badge badge-pill badge-primary">Primary</span>
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
        </a>
    @empty
        <div class="card mb-3">
            <div class="card-body">
                <p class="text-center">Tidak ada post</p>        
            </div>
        </div>  
    @endforelse ($posts as $post)  
    
</div>