<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ShortenedUrl extends Model
{
    protected $fillable = [
        'short_code',
        'original_url',
        'title',
        'click_count',
        'ip_address',
        'user_agent',
        'last_accessed',
        'is_active',
        'expires_at'
    ];

    protected $casts = [
        'last_accessed' => 'datetime',
        'expires_at' => 'datetime',
        'is_active' => 'boolean'
    ];

    /**
     * Generate a unique short code
     */
    public static function generateUniqueCode($length = 6)
    {
        do {
            $code = Str::random($length);
        } while (self::where('short_code', $code)->exists());

        return $code;
    }

    /**
     * Increment click count
     */
    public function incrementClicks($ipAddress = null, $userAgent = null)
    {
        $this->increment('click_count');
        $this->update([
            'last_accessed' => now(),
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent
        ]);
    }

    /**
     * Check if URL is expired
     */
    public function isExpired()
    {
        return $this->expires_at && $this->expires_at->isPast();
    }

    /**
     * Scope for active URLs
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                    ->where(function($q) {
                        $q->whereNull('expires_at')
                          ->orWhere('expires_at', '>', now());
                    });
    }
}
