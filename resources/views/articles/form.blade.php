@inject('categories', 'App\Category')
<form action="{{ route('articles.store') }}" method="post">
    @csrf
    <!-- article title -->
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{old('title',$article->title)}}" placeholder="Article title">
        @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
    <!-- article category -->
    <div class="form-group">
        <label>Category</label>
        <select type="text" class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}" name="category">
        <option value="">Select a category</option>
        @foreach($categories->getAll() as $category)
            <option value="{{ $category->id }}" {{ old('category',$article->category_id)==$category->id? "selected":""}}>
                {{ $category->name }}
            </option>
        @endforeach

      </select>
        @if ($errors->has('category'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('category') }}</strong>
            </span>
        @endif
    </div>

    <!-- article body -->
    <div class="form-group">
        <label>Article Body</label>
        <textarea type="text" class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}" name="body"  placeholder="Be specific and more precise so that your readers can easily grab the information">{{old('body',$article->body)}}</textarea>
        @if ($errors->has('body'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <button class="btn btn-dark">Submit Article</button>
    </div>
    
</form>

