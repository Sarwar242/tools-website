<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Switch theme (light/dark)
     */
    public function switch(Request $request)
    {
        $theme = $request->input('theme');
        
        if (!in_array($theme, ['light', 'dark'])) {
            return response()->json(['error' => 'Invalid theme'], 400);
        }
        
        session(['theme' => $theme]);
        
        return response()->json(['success' => true, 'theme' => $theme]);
    }
    
    /**
     * Change primary color
     */
    public function changeColor(Request $request)
    {
        $color = $request->input('color');
        $availableColors = array_keys(config('theme.colors', []));
        
        if (!in_array($color, $availableColors)) {
            return response()->json(['error' => 'Invalid color'], 400);
        }
        
        session(['primary_color' => $color]);
        
        return response()->json(['success' => true, 'color' => $color]);
    }
}