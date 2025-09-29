<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\SubredditFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Subreddit extends Model
{
    /** @use HasFactory<SubredditFactory> */
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'user_id'];

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany<Post, $this>
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    /**
     * @return HasMany<Comment, $this>
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
