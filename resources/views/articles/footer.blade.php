<div class="author-profile d-flex flex-wrap align-items-bottom justify-content-between">
    <div class="d-flex align-items-center">
        <img src="{{ $author->avatar() }}" alt="">
        <h6>
            By <a href="">{{ $author->name }}</a>
        </h6>
    </div>
    <div>
         <p  class=" badge badge-dark text-medium">{{ $article->categoryName }}</p>
    </div>
</div>