<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'published_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Scope a query to only published posts.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->whereNotNull('published_at');
    }

    /**
     * Slug the slug attribute when set.
     *
     * @param  string  $value
     * @return void
     */
    public function setSlugAttribute(string $value)
    {
        $this->attributes['slug'] = str_slug($value);
    }

    /**
     * The post belongs to a user.
     *
     * @return \Illuminate\Database\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
