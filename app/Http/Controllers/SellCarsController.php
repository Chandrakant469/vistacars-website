<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellCarsController extends Controller
{
    public function sellCars()
    {
        $title = 'Sell Your Car || Vistacars';
        $description = 'Sell your Pre-Owned Car smoothly with Vistacars. You can find our locations in Mumbai, Navi Mumbai and Pune.';
        return view('sell_cars' ,compact('title','description'));
    }
}
