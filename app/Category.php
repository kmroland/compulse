<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Turn off the timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Gets all the categories.
     *
     * @return Illuminate\Support\Collection
     */
    public static function getAll()
    {
        return cache()->rememberForever('categories.all', function () {
            return static::oldest('name')->get();
        });
    }
}
