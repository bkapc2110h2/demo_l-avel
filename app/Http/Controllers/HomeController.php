<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $newProduct = Product::isNew(8)->get();
        $saleProduct = Product::sale(8)->get();
        $ramdomProduct = Product::inRandomOrder()->limit(8)->get();

        return view('home', compact('newProduct','saleProduct','ramdomProduct'));
    }

    public function about()
    {
        return view('about');
    }

}