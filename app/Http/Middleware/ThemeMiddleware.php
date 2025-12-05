<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ThemeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get theme from session or use default
        $theme = session('theme', config('theme.default'));
        $primaryColor = session('primary_color', config('theme.primary_color'));

        // Share theme variables with all views
        view()->share([
            'currentTheme' => $theme,
            'primaryColor' => $primaryColor,
            'themeConfig' => config('theme'),
            'themeColors' => config("theme.colors.{$primaryColor}.{$theme}", config("theme.colors.green.{$theme}"))
        ]);

        return $next($request);
    }
}