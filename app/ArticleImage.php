<?php

namespace App;

use Illuminate\Support\Facades\File;
use Image;

class ArticleImage
{
    /**
     * Creates an instance of the article image class.
     *
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Adds an an image to an article.
     *
     * @param bool
     */
    public function add($image)
    {
        $path = $this->makePath($image);

        $this->ensurePublicPathExists();

        Image::make($image)->resize(640, null)->save(public_path($path));

        $this->article->image_path = $path;

        return  $this->article->save();
    }

    /**
     * Makes a path for a given image.
     *
     * @param string $image
     *
     * @return string
     */
    public function makePath($image)
    {
        return vsprintf('/images/articles/%s.%s', [
            $this->article->id,
             $image->guessExtension(),
         ]);
    }

    /**
     * The string representation of this class.
     *
     * @return string
     */
    public function __toString()
    {
        return (string) optional($this->article)->image_path;
    }

    protected function ensurePublicPathExists()
    {
        if (File::exists(public_path('images/articles'))) {
            return;
        }
        File::makeDirectory(public_path('images/articles'));
    }
}
