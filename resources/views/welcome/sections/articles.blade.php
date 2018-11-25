<section class="bg-white py-5" id="articles">
    <div class="container-fluid">
        <h3 class="text-center text-dark mb-3">Latest Articles</h3>
        <div class="card-deck">
            @foreach($articles as $article)
                <div class="card mb-3">
                    <div class="card-body">
                        <a class="card-title" href=""> {{ $article->title }}</a>
                        <p>
                            {{ $article->summarizedBody()}}
                        </p>
                        <div class="d-flex justify-content-between">
                            <div>
                                <span class="tag">{{ $article->categoryName }}</span>
                            </div>
                        
                            <small>
                                <em> {{ $article->created_at->diffForHumans() }}</em>
                            </small>
        
                        </div>
                    </div>
        
                </div>
            @endforeach
        </div>
    </div>
</section>
