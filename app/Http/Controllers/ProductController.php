<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    
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
