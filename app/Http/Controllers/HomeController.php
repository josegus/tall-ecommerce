<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController
{
    public function __invoke()
    {
        return view('home', ['products' => Product::all()]);
    }
}
