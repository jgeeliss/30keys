<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        // Get keyboards with ratings and calculate average
        $topKeyboards = Keyboard::with('ratings')
            ->get()
            // note:fn() is used to create an arrow function
            ->filter(fn($keyboard) => $keyboard->totalRatings() > 0)
            ->sortByDesc(fn($keyboard) => $keyboard->averageRating())
            ->take(3);

        // Get latest 3 uploaded keyboards
        $latestKeyboards = Keyboard::with(['ratings', 'user'])
            ->latest()
            ->take(3)
            ->get();

        return view('home', compact('topKeyboards', 'latestKeyboards'));
    }
}
