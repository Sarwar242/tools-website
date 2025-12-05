<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolUsage extends Model
{
    protected $table = 'tool_usage';

    protected $fillable = [
        'tool_name',
        'ip_address',
        'user_agent',
        'is_premium',
        'metadata',
        'used_at'
    ];

    protected $casts = [
        'metadata' => 'array',
        'is_premium' => 'boolean',
        'used_at' => 'datetime'
    ];

    /**
     * Log tool usage
     */
    public static function logUsage($toolName, $ipAddress, $userAgent = null, $isPremium = false, $metadata = null)
    {
        return self::create([
            'tool_name' => $toolName,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'is_premium' => $isPremium,
            'metadata' => $metadata,
            'used_at' => now()
        ]);
    }

    /**
     * Get usage stats for a tool
     */
    public static function getToolStats($toolName, $days = 30)
    {
        return self::where('tool_name', $toolName)
                   ->where('used_at', '>=', now()->subDays($days))
                   ->selectRaw('
                       DATE(used_at) as date,
                       COUNT(*) as usage_count,
                       COUNT(DISTINCT ip_address) as unique_users
                   ')
                   ->groupBy('date')
                   ->orderBy('date')
                   ->get();
    }

    /**
     * Get popular tools
     */
    public static function getPopularTools($limit = 10)
    {
        return self::selectRaw('
                tool_name,
                COUNT(*) as total_usage,
                COUNT(DISTINCT ip_address) as unique_users
            ')
            ->where('used_at', '>=', now()->subDays(30))
            ->groupBy('tool_name')
            ->orderByDesc('total_usage')
            ->limit($limit)
            ->get();
    }
}
