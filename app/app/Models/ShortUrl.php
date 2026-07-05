<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShortUrl extends Model
{
    protected $fillable = [
        'user_id',
        'original_url',
        'short_code',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function clicks(): HasMany
    {
        return $this->hasMany(Click::class);
    }

    public function getClicksCountAttribute(): int
    {
        return $this->clicks()->count();
    }

    protected static function booted(): void
    {
        static::creating(function ($model) {
            if (empty($model->short_code)) {
                $model->short_code = self::generateShortCode();
            }
        });
    }

    private static function generateShortCode(int $length = 6): string
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        do {
            $code = '';
            for ($i = 0; $i < $length; $i++) {
                $code .= $chars[random_int(0, strlen($chars) - 1)];
            }
        } while (self::where('short_code', $code)->exists());

        return $code;
    }
}
