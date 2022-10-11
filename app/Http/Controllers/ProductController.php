<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate();

        return view('product.index', compact('products'));
    }
    
    public function form_upload(Request $req)
    {
       return view('product.upload');
    }

    public function upload(Request $req)
    {
        $f_name = $req->image->getClientOriginalName();
        $req->image->move(public_path('uploads'), $f_name);
       dd ($f_name);
    }
}