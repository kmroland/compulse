<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    /**
     * The mass assignable fields.
     *
     * @var array
     */
    protected $fillable = ['title', 'body', 'category_id', 'author_id'];

    /**
     * Summarizes the article body.
     *
     * @param int $count
     *
     * @return string
     */
    public function summarizedBody($count = 35)
    {
        return Str::limit($this->body, $count);
    }

    /**
     * Attributes that should be casted.
     *
     * @var array
     */
    protected $casts = [
        'author_id'=>'int',
    ];

    /**
     * Filters the articles by only those tht have been published.
     *
     * @param Illuminate\Database\Eloquent\Builder $builder
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public static function scopePublished($builder)
    {
        return $builder
            ->whereNotNull('published_at')
            ->whereColumn('published_at', '>', 'created_at');
    }

    /**
     * An article belongs to an author.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Publishes a given article.
     *
     * @return bool
     */
    public function publish()
    {
        $this->published_at = now();

        return $this->save();
    }

    /**
     * Un publishes a given article.
     *
     * @return bool
     */
    public function unPublish()
    {
        $this->published_at = null;

        return $this->save();
    }

    /**
     * Stores an article.
     *
     * @param array $data
     *
     * @return Article
     */
    public static function store($data)
    {
        $data['author_id'] = auth()->id();

        $data['category_id'] = (int) $data['category'];

        return static::create($data);
    }

    /**
     * Listen for when a model is booting up.
     */
    public static function boot()
    {
        parent::boot();

        // eager load category always
        static::addGlobalScope('category', function (Builder $query) {
            return  $query->with('category');
        });
    }

    /**
     * An article belongs to a given category.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Gets the category name.
     *
     * @return string|null
     */
    public function getCategoryNameAttribute()
    {
        return optional($this->category)->name;
    }

    public function image()
    {
        return new ArticleImage($this);
    }

    public function getDateAttribute()
    {
        return $this->created_at->format('d/M/Y');
    }
}
